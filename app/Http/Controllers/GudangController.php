<?php

namespace App\Http\Controllers;

use App\Models\TempTransaksiHeader;
use App\Models\TransaksiDetail;
use App\Models\TransaksiHeader;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    public function list()
    {
        $trans = TransaksiHeader::all();
        return view('gudang.transaksi.list_transaksi',[
            'trans' => $trans
        ]);
    }

    function konfirmasi($id) {

        $trans = TransaksiHeader::findOrFail($id);
        $trans->update([
            'status_transaksi' => 2,
        ]);
        return redirect()->route('gudang.transaksi');
    }

    function batal(Request $request, $id) {
        $idTransaksi = $id;
        $deskripsi = $request->description;

        $trans = TransaksiHeader::findOrFail($idTransaksi);
        $trans->update([
            'status_transaksi' => 0,
            'deskripsi' => $deskripsi
        ]);

        return redirect()->route('gudang.transaksi');
    }

    function viewDetail($id){
        $trans = TransaksiDetail::where('id_transaksi_header', $id)->get();
        return view('gudang.transaksi.list_transaksi_detail',[
            'trans' => $trans
        ]);
    }
}
