<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Stok;
use App\Models\TempTransaksiDetail;
use App\Models\TempTransaksiHeader;
use App\Models\TransaksiDetail;
use App\Models\TransaksiHeader;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    //
    public function index()
    {
        $customer = Customer::orderBy('nama_customer', 'asc')->get();
        $stok = Stok::with(['po.header' => function ($query) {
            $query->orderBy('tanggal_order', 'asc'); 
        }])
        ->whereNotNull('harga_barang_jual')
        ->orderBy('id_barang')
        ->get();
        return view('admin.transaksi.list',[
            'customers' => $customer,
            'stok' => $stok,
        ]);
    }

    public function temp()
    {
        $temp = TempTransaksiHeader::all();
        return view('admin.transaksi.temp',[
            'temp' => $temp
        ]);
    }

    public function list()
    {
        $trans = TransaksiHeader::all();
        return view('admin.transaksi.list_transaksi',[
            'trans' => $trans
        ]);
    }

    function viewDetail($id){
        $trans = TransaksiDetail::where('id_transaksi_header', $id)->get();
        return view('admin.transaksi.list_transaksi_detail',[
            'trans' => $trans
        ]);
    }

    function store(Request $request){

        try {
            $header = new TempTransaksiHeader();
            $header->id_customer = $request->customer;
            $header->tanggal_transaksi = Carbon::now();
            $header->total_transaksi = $request->totalSubtotal;
            $header->save();
            // Loop melalui setiap item pesanan yang diterima
            foreach ($request->pesanan as $item) {
                // Simpan pesanan ke database
                $detail = new TempTransaksiDetail();
                $detail->id_transaksi_header = $header->getKey();
                $detail->id_stok = $item['id_stok'];
                $detail->jumlah = $item['qty'];
                $detail->sub_total = $item['subtotal'];
                $detail->save();
                
                // // Update stok barang
                // $stok = Stok::findOrFail($item['id_stok']);
                // $stok->stok -= $item['qty']; // Mengurangi stok sesuai dengan jumlah yang dipesan
                // $stok->save();
            }

            // Response jika berhasil
            return response()->json(['success' => false, 'message' => 'Sukses membuat draft pesanan']);
        } catch (\Exception $e) {
            // Response jika terjadi kesalahan
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    function konfirmasi($id){
        $tempHeader = TempTransaksiHeader::findOrFail($id);
        
        $header = new TransaksiHeader();
        $header->id_customer = $tempHeader->id_customer;
        $header->tanggal_transaksi = $tempHeader->tanggal_transaksi;
        $header->total_transaksi = $tempHeader->total_transaksi;
        $header->save();

        $tempDetail = TempTransaksiDetail::where('id_transaksi_header',$id)->get();
        foreach ($tempDetail as $key => $item) {
            $detail = new TransaksiDetail();
            $detail->id_transaksi_header = $header->getKey();
            $detail->id_stok = $item->id_stok;
            $detail->jumlah = $item->jumlah;
            $detail->sub_total = $item->sub_total;
            $detail->save();

            // Hapus data dari tabel TempTransaksiDetail
            $item->delete();
        }

        $tempHeader->delete();

        return redirect()->route('admin.transaksi.list');
    }

    function batal($id){
        $tempHeader = TempTransaksiHeader::findOrFail($id);
        $tempDetail = TempTransaksiDetail::where('id_transaksi_header',$id)->get();
        $tempHeader->delete();
        foreach ($tempDetail as $key => $value) {
            $value->delete();
        }
        
        return redirect()->back()->with('message','Transaksi berhasil dibatalkan');
    }

    function bayar($id){
        $trans = TransaksiHeader::findOrFail($id);
        $trans->update([
            'status_transaksi' => 3
        ]);

        return redirect()->route('admin.transaksi.list');
    }



}
