<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Keranjang;

use App\Models\Hkranjangs;
use App\Models\Dkranjangs;

use App\Models\Htrans;
use App\Models\Dtrans;

class KasirController extends Controller
{
    public function buatPesanan(Request $request)
    {
        // Buat entri baru di tabel hkranjangs
        $hkranjangs = new Hkranjangs();
        $hkranjangs->tanggal_trans = date('Y-m-d');
        $hkranjangs->save();

        $keranjangItems = Keranjang::all();

        // Loop melalui setiap item dalam keranjang
        foreach ($keranjangItems as $item) 
        {
            // Ambil data barang dari tabel keranjang
            $barangKeranjang = Keranjang::findOrFail($item->id_keranjang);

            // Buat entri baru dalam tabel dkranjangs
            $dkranjangs = new Dkranjangs();
            
            // Associate dkranjangs dengan hkranjangs
            $dkranjangs->hkranjangs()->associate($hkranjangs);

            // Isi data barang dari tabel keranjang
            $dkranjangs->id_barang = $barangKeranjang->id_barang;
            $dkranjangs->nama_barang = $barangKeranjang->nama_barang;
            $dkranjangs->harga_barang = $barangKeranjang->harga_barang;
            $dkranjangs->jumlah_barang = $barangKeranjang->jumlah_barang;
            $dkranjangs->subtotal_barang = $barangKeranjang->subtotal_barang;
            $dkranjangs->save();
        }

        // Hapus semua item keranjang setelah pesanan disimpan
        Keranjang::truncate();

        // Redirect kembali ke halaman keranjang dengan pesan sukses
        return redirect()->back()->with('success', 'Pesanan berhasil disimpan');
    }

    public function lihatTransaksi()
    {
        // Ambil semua data transaksi dari tabel Htrans
        $hkranjangsItems = Hkranjangs::all();

        // Ambil total harga untuk setiap transaksi
        foreach ($hkranjangsItems as $transaksi) 
        {
            $totalHarga = Dtrans::where('id_htrans', $transaksi->id_hkranjangs)->sum('subtotal_barang');
            $transaksi->total_harga = $totalHarga;
        }

        return view('admin.pesanan', ['hkranjangsItems' => $hkranjangsItems]);
    }

    public function lihatPesanan($id_hkranjangs)
    {
        // Ambil semua data transaksi dari tabel Dtrans dengan id_htrans yang sesuai
        $dkranjangsItems = Dkranjangs::where('id_hkranjangs', $id_hkranjangs)->get();

        return view('admin.detail_pesanan', ['dkranjangsItems' => $dkranjangsItems]);
    }

    public function lihatTrans()
    {
        // Ambil semua data transaksi dari tabel Htrans
        $hkranjangsItems = Hkranjangs::all();

        // Ambil total harga untuk setiap transaksi
        foreach ($hkranjangsItems as $transaksi) 
        {
            $totalHarga = Dkranjangs::where('id_hkranjangs', $transaksi->id_hkranjangs)->sum('subtotal_barang');
            $transaksi->total_harga = $totalHarga;
        }

        return view('admin.transaksi', ['hkranjangsItems' => $hkranjangsItems]);
    }

    public function hapusTransaksi($id_hkranjangs)
    {
        // Cari transaksi berdasarkan ID
        $transaksi = Hkranjangs::findOrFail($id_hkranjangs);

        // Hapus transaksi
        $transaksi->delete();

        // Redirect kembali ke halaman daftar transaksi dengan pesan sukses
        return redirect()->back()->with('success', 'Transaksi berhasil dihapus');
    }

    public function prosesTransaksi(Request $request)
    {   
        // dd($request);
        // Simpan metode pembayaran ke dalam database
        $hkranjangs = Hkranjangs::findOrFail($request->id_hkranjangs);
        $hkranjangs->metode_pembayaran = $request->metode_pembayaran;
        $hkranjangs->total_harga = $request->total_harga;
        $hkranjangs->save();

        // Simpan data ke dalam tabel Htrans
        $htrans = new Htrans();
        $htrans->tanggal_trans = date('Y-m-d');
        $htrans->metode_pembayaran = $hkranjangs->metode_pembayaran;
        $htrans->total_harga = $hkranjangs->total_harga;
        $htrans->save();

        // Ambil data detail transaksi dari tabel dkranjangs
        $dkranjangsItems = Dkranjangs::where('id_hkranjangs', $request->id_hkranjangs)->get();

        // Loop melalui setiap item dalam dkranjangs
        foreach ($dkranjangsItems as $item) 
        {
            // Ambil data barang dari tabel keranjang
            $barangKeranjang = Dkranjangs::findOrFail($item->id_dkranjangs);

            // Kurangi jumlah_masuk pada barang
            $barang = Barang::findOrFail($barangKeranjang->id_barang);
            $barang->jumlah_masuk -= $barangKeranjang->jumlah_barang;
            $barang->jumlah_keluar = $barangKeranjang->jumlah_barang;
            $barang->save();

            // Buat entri baru dalam tabel dtrans
            $dtrans = new Dtrans();
            
            // Associate dtrans dengan htrans
            $dtrans->id_htrans = $htrans->id_htrans;

            // Isi data barang dari tabel Dkranjangs
            $dtrans->id_barang = $barangKeranjang->id_barang;
            $dtrans->nama_barang = $barangKeranjang->nama_barang;
            $dtrans->harga_barang = $barangKeranjang->harga_barang;
            $dtrans->jumlah_barang = $barangKeranjang->jumlah_barang;
            $dtrans->subtotal_barang = $barangKeranjang->subtotal_barang;
            $dtrans->save();

            Dkranjangs::where('id_dkranjangs', $item->id_dkranjangs)->delete();
        }

        Hkranjangs::where('id_hkranjangs', $request->id_hkranjangs)->delete();

        return redirect()->back()->with('success', 'Transaksi berhasil diproses');
    }

    public function tambahTransaksiView()
    {
        $barang = Barang::all();
        $keranjang = Keranjang::all();
        return view('admin.tambah_trans', [
            'barang' => $barang,
            'keranjang' => $keranjang,
        ]);
    }

    public function tambahKeranjang(Request $request)
    {
        // Simpan data ke dalam model Keranjang
        $keranjang = new Keranjang();
        $keranjang->id_barang = $request->id_barang;
        $keranjang->nama_barang = $request->nama_barang;
        $keranjang->harga_barang = $request->harga_barang;
        $keranjang->jumlah_barang = $request->jumlah_barang;
        $keranjang->subtotal_barang = $request->subtotal_barang;
        $keranjang->save();

        // Redirect kembali ke halaman sebelumnya
        return back()->with('success', 'Barang berhasil ditambahkan ke keranjang.');
    }
        
    public function showKeranjang()
    {
        // Ambil semua data keranjang dari database
        $barang = Barang::all();
        $keranjang = Keranjang::all();
        
        // Kirim data ke view 'keranjang' dan tampilkan dengan tabel HTML
        return view('admin.tambah_trans', [
            'barang' => $barang,
            'keranjang' => $keranjang,
        ]);
    }

    public function hapusKeranjang($id_keranjang)
    {
        // dd($id_keranjang);
        // Temukan item keranjang berdasarkan ID
        $keranjangItem = Keranjang::findOrFail($id_keranjang);
        
        // Hapus item keranjang
        $keranjangItem->delete();

        // Redirect kembali ke halaman keranjang dengan pesan sukses
        return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang');
    }

}
