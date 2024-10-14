<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Purchasing_Order_Detail;
use App\Models\Stok;
use App\Models\TransaksiDetail;
use App\Models\TransaksiHeader;
use Carbon\Carbon;
use Illuminate\Http\Request;

class reportController extends Controller
{
    // Laporan Transaksi

    public function harian(Request $request)
    {
        $tanggal = $request->input('tanggal') ? Carbon::createFromFormat('Y-m-d', $request->input('tanggal')) : Carbon::now();

        $transaksiDetails = TransaksiDetail::with(['stok', 'header'])
            ->whereHas('header', function($query) use ($tanggal) {
                $query->whereDate('tanggal_transaksi', $tanggal);
            })
            ->get();

        $laporan = [];
        $totalPenjualan = 0;
        $totalHpp = 0;
        $totalUntung = 0;

        foreach ($transaksiDetails as $detail) {
            $stok = $detail->stok;
            $purchasingOrderDetail = Purchasing_Order_Detail::where('id_barang', $stok->id_barang)->first();

            $hpp = $purchasingOrderDetail ? $purchasingOrderDetail->harga_barang * $detail->jumlah : 0;
            $untung = $detail->sub_total - $hpp;

            $laporan[] = [
                'waktu' => Carbon::parse($detail->header->tanggal_transaksi)->format('H.i'),
                'barang' => $stok->barang->nama_barang,
                'jumlah' => $detail->jumlah,
                'harga_jual' => $detail->sub_total,
                'pembayaran' => $detail->header->metode_pembayaran, // Asumsikan ada metode pembayaran di TransaksiHeader
                'hpp' => $hpp,
                'untung' => $untung,
            ];

            $totalPenjualan += $detail->sub_total;
            $totalHpp += $hpp;
            $totalUntung += $untung;
        }

        return view('super_admin.reports.harian', compact('laporan', 'totalPenjualan', 'totalHpp', 'totalUntung', 'tanggal'));
    }

    // Laporan Laba Rugi

    public function bulanan(Request $request)
    {
        // Ambil bulan dan tahun dari request
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // Biaya tetap bulanan
        $biayaTetapBulanan = 4000000;

        // Menghitung total omzet penjualan dari TransaksiHeader
        $totalOmzetPenjualan = TransaksiHeader::whereMonth('tanggal_transaksi', $bulan)
                                ->whereYear('tanggal_transaksi', $tahun)
                                ->sum('total_transaksi');

        // Menghitung HPP total dari TransaksiDetail berdasarkan tanggal order di Stok->po
        $transaksiDetails = TransaksiDetail::whereHas('stok.po.header', function($query) use ($bulan, $tahun) {
            $query->whereMonth('tanggal_order', $bulan)
                ->whereYear('tanggal_order', $tahun);
        })->get();

        $totalHPP = $transaksiDetails->sum(function($detail) {
            return $detail->stok->po->harga_barang * $detail->jumlah;
        });

        // Menghitung laba kotor
        $labaKotor = $totalOmzetPenjualan - $totalHPP;

        // Total biaya operasional dan administrasi umum
        $totalBiayaOperasional = $biayaTetapBulanan;  // Biaya tetap bulanan

        // Menghitung laba bersih
        $labaBersih = $labaKotor - $totalBiayaOperasional;

        return view('super_admin.reports.bulanan', compact('bulan', 'tahun', 'totalOmzetPenjualan', 'totalHPP', 'labaKotor', 'totalBiayaOperasional', 'labaBersih'));
    }

    // Laporan Neraca

    public function neracaBulanan(Request $request)
    {
        // Ambil bulan dan tahun dari request
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // Biaya tetap bulanan
        $biayaTetapBulanan = 4000000;

        // Ambil modal usaha pertama kali
        $modalUsaha = Pengguna::find(2)->saldo; // Asumsi ID pengguna adalah 1

        // Menghitung total omzet penjualan dari TransaksiHeader
        $totalOmzetPenjualan = TransaksiHeader::whereMonth('tanggal_transaksi', $bulan)
                                ->whereYear('tanggal_transaksi', $tahun)
                                ->sum('total_transaksi');

        // Menghitung HPP total dari TransaksiDetail berdasarkan tanggal order di Stok->po
        $transaksiDetails = TransaksiDetail::whereHas('stok.po.header', function($query) use ($bulan, $tahun) {
            $query->whereMonth('tanggal_order', $bulan)
                ->whereYear('tanggal_order', $tahun);
        })->get();

        $totalHPP = $transaksiDetails->sum(function($detail) {
            return $detail->stok->po->harga_barang * $detail->jumlah;
        });

        // Menghitung laba kotor
        $labaKotor = $totalOmzetPenjualan - $totalHPP;

        // Total biaya operasional dan administrasi umum
        $totalBiayaOperasional = $biayaTetapBulanan;  // Biaya tetap bulanan

        // Menghitung laba bersih
        $labaBersih = $labaKotor - $totalBiayaOperasional;

        // Hitung akun-akun neraca
        $kas = $modalUsaha + $totalOmzetPenjualan - $totalBiayaOperasional - $totalHPP;

        // Buat neraca dalam bentuk array untuk dikirim ke view
        $neraca = [
            ['akun' => 'Kas', 'debet' => $kas, 'kredit' => 0],
            ['akun' => 'Modal', 'debet' => 0, 'kredit' => $modalUsaha],
            ['akun' => 'Laba Bulan Berjalan', 'debet' => 0, 'kredit' => $labaBersih],
        ];

        // Hitung total debet dan kredit
        $totalDebet = array_sum(array_column($neraca, 'debet'));
        $totalKredit = array_sum(array_column($neraca, 'kredit'));

        // Adjust if needed to balance the debits and credits
        if ($totalDebet != $totalKredit) {
            $difference = $totalDebet - $totalKredit;
            if ($difference > 0) {
                $neraca[] = ['akun' => 'Akun Penyeimbang', 'debet' => 0, 'kredit' => $difference];
            } else {
                $neraca[] = ['akun' => 'Akun Penyeimbang', 'debet' => -$difference, 'kredit' => 0];
            }
            $totalDebet = array_sum(array_column($neraca, 'debet'));
            $totalKredit = array_sum(array_column($neraca, 'kredit'));
        }

        return view('super_admin.reports.neraca_bulanan', compact('bulan', 'tahun', 'neraca', 'totalDebet', 'totalKredit'));
    }

    // Laporan Pemasukan dan Pengeluaran Barang

    public function pemasukanPengeluaranBarang(Request $request)
    {
        // Ambil bulan dan tahun dari request
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // Format tanggal
        $tanggalAwal = Carbon::create($tahun, $bulan, 1)->startOfMonth();
        $tanggalAkhir = Carbon::create($tahun, $bulan, 1)->endOfMonth();

        // Ambil semua stok barang
        $stokBarang = Stok::all();

        // Hitung stok awal, barang masuk, barang keluar, dan stok akhir untuk setiap barang
        $laporanStok = $stokBarang->map(function($stok) use ($tanggalAwal, $tanggalAkhir) {
            // Hitung stok awal
            $stokAwal = $stok->po()
                            ->whereHas('header', function($query) use ($tanggalAwal) {
                                $query->where('tanggal_order', '<', $tanggalAwal);
                            })
                            ->sum('jumlah_barang');

            // Hitung barang masuk
            $barangMasuk = $stok->po()
                                ->whereHas('header', function($query) use ($tanggalAwal, $tanggalAkhir) {
                                    $query->whereBetween('tanggal_order', [$tanggalAwal, $tanggalAkhir]);
                                })
                                ->sum('jumlah_barang');

            // Hitung barang keluar
            $barangKeluar = $stok->transaksi()
                                ->whereHas('header', function($query) use ($tanggalAwal, $tanggalAkhir) {
                                    $query->whereBetween('tanggal_transaksi', [$tanggalAwal, $tanggalAkhir]);
                                })
                                ->sum('jumlah');

            // Hitung stok akhir
            $stokAkhir = $stokAwal + $barangMasuk - $barangKeluar;

            return [
                'nama_barang' => $stok->barang->nama_barang,
                'stok_awal' => $stokAwal,
                'barang_masuk' => $barangMasuk,
                'barang_keluar' => $barangKeluar,
                'stok_akhir' => $stokAkhir
            ];
        });

        return view('super_admin.reports.barang', compact('laporanStok', 'bulan', 'tahun'));
    }
}
