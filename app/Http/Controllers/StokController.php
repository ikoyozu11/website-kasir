<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Purchasing_Order_Detail;
use App\Models\Stok;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
        $stok = Stok::with(['po.header' => function ($query) {
            $query->orderBy('tanggal_order', 'asc'); 
        }])->orderByRaw('harga_barang_jual IS NULL DESC')->orderBy('id_barang')->get();
        return view('super_admin.stok.list')->with('stok', $stok);
    }

    public function update(Request $request)
    {

        try {
            // Loop melalui setiap item data yang diterima
            foreach ($request->data as $item) {
                // Cari Stok berdasarkan ID
                $stok = Stok::findOrFail($item['id']);

                // Update harga_barang_jual dan jumlah_barang
                $stok->harga_barang_jual = $item['harga_barang_jual'];
                
                // Simpan perubahan
                $stok->save();

                $po = Purchasing_Order_Detail::findOrFail($item['id_po']);
                $po->jumlah_barang = $item['jumlah_barang'];
                $po->save();
            }

            return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
        } catch (\Exception $e) {
            // Tangani jika terjadi kesalahan
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    // soft delete
    public function destroy($id)
    {
        $kategori = Stok::find($id);
        $kategori->update(
            ['status' => 0]
        );

        return redirect()->back()->with('success', 'Stok berhasil di non aktifkan.');
    }

    public function restore($id)
    {
        $kategori = Stok::find($id);
        $kategori->update(
            ['status' => 1]
        );

        return redirect()->back()->with('success', 'Stok berhasil di aktifkan.');
    }
}
