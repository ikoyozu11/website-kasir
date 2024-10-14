<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Purchasing_Order_Detail;
use App\Models\Purchasing_Order_Header;
use App\Models\Stok;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index($id)
    {
        $barang = Barang::where('id_supplier',$id)->get();
        return view('super_admin.supplier.list_barang',[
            'barang' => $barang,
            'id_supplier' => $id,
        ]);
    }

    public function list()
    {
        $order = Purchasing_Order_Header::all();
        return view('super_admin.purchase_order.list',[
            'order' => $order
        ]);
    }

    public function store(Request $request)
    {
        $dataToSubmit = $request->input('dataToSubmit');
        $id_supplier = $request->input('id_supplier');
        $total_harga = $request->input('total_harga');

        try {
            // Memulai transaksi
            DB::beginTransaction();
    
            // Membuat header transaksi pembelian
            $purchasingOrderHeader = new Purchasing_Order_Header();
            $purchasingOrderHeader->tanggal_order = Carbon::now();
            $purchasingOrderHeader->total_order = $total_harga;
            $purchasingOrderHeader->id_supplier = $id_supplier;
            $purchasingOrderHeader->save();
    
            // Menyimpan detail transaksi pembelian dan stok barang
            foreach ($dataToSubmit as $data) {
                // dd($data);
                $purchasingOrderDetail = new Purchasing_Order_Detail();
                $purchasingOrderDetail->id_purchasing_order_header = $purchasingOrderHeader->getKey();
                $purchasingOrderDetail->id_barang = $data['id_barang'];
                $purchasingOrderDetail->jumlah_barang = $data['jumlah_barang'];
                $purchasingOrderDetail->harga_barang = $data['harga_barang'];
                $purchasingOrderDetail->sub_total = $data['jumlah_barang'] * $data['harga_barang'];
                $purchasingOrderDetail->save();
    
                $stok = new Stok();
                $stok->id_barang = $data['id_barang'];
                $stok->id_purchasing_order_detail = $purchasingOrderDetail->getKey();
                $stok->harga_barang_jual = null;
                $stok->save();
            }
    
            // Menyelesaikan transaksi
            DB::commit();
    
            return response()->json(['message' => 'Data berhasil diproses']);
        } catch (\Exception $e) {
            // Membatalkan transaksi jika terjadi kesalahan
            DB::rollback();
    
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    // ubah
    public function edit($id)
    {
        $order = Purchasing_Order_Detail::where('id_purchasing_order_header', $id)->get();
    
        return view('super_admin.purchase_order.ubah', [
            'order' => $order,
            'id' => $id,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'data' => 'required|array',
            'data.*.jumlah_barang' => 'required|numeric|min:0',
            'data.*.harga_barang' => 'required|numeric|min:0',
            'data.*.sub_total' => 'required|numeric|min:0',
        ]);
        try {
            // Loop melalui setiap baris data
            foreach ($request->data as $rowData) {
                // Simpan atau update data ke database
                // Misalnya, jika Anda memiliki model Order:
                $order = Purchasing_Order_Detail::find($rowData['id']); // Sesuaikan dengan kolom yang menyimpan ID order
                $order->jumlah_barang = $rowData['jumlah_barang'];
                $order->harga_barang = $rowData['harga_barang'];
                $order->sub_total = $rowData['sub_total'];
                $order->save();
            }

            $header = Purchasing_Order_Header::find($request->id);
            $header->total_order = $request->total;
            $header->save();

            // Berhasil menyimpan data, kirimkan respons JSON
            return response()->json(['message' => 'Data berhasil diperbarui'], 200);
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['message' => 'Terjadi kesalahan saat memperbarui data'], 500);
        }
    }

    // soft delete
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->update(
            ['status_supplier' => 0]
        );

        return redirect()->back()->with('success', 'Barang berhasil di non aktifkan.');
    }

    public function restore($id)
    {
        $supplier = Supplier::find($id);
        $supplier->update(
            ['status_supplier' => 1]
        );

        return redirect()->back()->with('success', 'Barang berhasil di aktifkan.');
    }
}
