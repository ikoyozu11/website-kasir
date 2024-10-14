<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\Barang2Controller;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\Laporan2Controller;

use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    return view('login/login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => AuthMiddleware::class], function ()
{
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin');

        Route::group(['prefix' => 'customer'], function () {
            Route::get('/', [CustomerController::class, 'index'])->name('admin.customer');

             // tambah barang
             Route::get('/tambah', [CustomerController::class, 'create'])->name('admin.tambah_customer');
             Route::post('/tambah', [CustomerController::class, 'store']);

             // ubah barang
             Route::get('/ubah/{id_customer}', [CustomerController::class, 'edit'])->name('admin.ubah_customer');
             Route::put('/ubah/{id_customer}', [CustomerController::class, 'update']);

             // hapus barang
             Route::delete('/hapus/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
             Route::patch('/restore/{id}', [CustomerController::class, 'restore'])->name('customer.restore');
        });

        Route::group(['prefix' => 'transaksi'], function () {
            Route::get('/', [TransaksiController::class, 'index'])->name('admin.transaksi');
            Route::get('/list', [TransaksiController::class, 'list'])->name('admin.transaksi.list');
            Route::get('/viewDetail/{id}', [TransaksiController::class, 'viewDetail'])->name('admin.transaksi.viewDetail');

             // tambah transksi
             Route::post('/tambah', [TransaksiController::class, 'store'])->name('admin.buat_pesanan');
             Route::get('/invoice/{id}', [AdminController::class, 'generateInvoice'])->name('generate.invoice');

             Route::group(['prefix' => 'temp'], function () {
                Route::get('/', [TransaksiController::class, 'temp'])->name('admin.transaksi.temp');
                Route::post('/konfirmasi/{id}', [TransaksiController::class, 'konfirmasi'])->name('admin.transaksi.konfirmasi');
                Route::post('/bayar/{id}', [TransaksiController::class, 'bayar'])->name('admin.transaksi.bayar');
                Route::post('/batal/{id}', [TransaksiController::class, 'batal'])->name('admin.transaksi.batal');
            });

        });

    });

    // gudang //

    // lihat daftar barang
    Route::group(['prefix' => 'gudang'], function () {
        Route::get('/', function () {
            return view('gudang/dashboard');
        })->name('gudang.dashboard');

        Route::group(['prefix' => 'transaksi'], function () {
            Route::get('/', [GudangController::class, 'list'])->name('gudang.transaksi');
            Route::get('/viewDetail/{id}', [GudangController::class, 'viewDetail'])->name('gudang.transaksi.viewDetail');
            Route::post('/konfirmasi/{id}', [GudangController::class, 'konfirmasi'])->name('gudang.transaksi.konfirmasi');
            Route::post('/batal/{id}', [GudangController::class, 'batal'])->name('gudang.transaksi.batal');
        });

    });

    // super admin //
    Route::group(['prefix' => 'super_admin'], function () {
        Route::get('/', function () {
            return view('super_admin/dashboard');
        })->name('super_admin.dashboard');

        Route::group(['prefix' => 'barang'], function () {
            Route::get('/', [BarangController::class, 'index'])->name('super_admin.barang');

            // tambah barang
            Route::get('/tambah', [BarangController::class, 'create'])->name('super_admin.tambah_barang');
            Route::post('/tambah', [BarangController::class, 'store']);

            // ubah barang
            Route::get('/ubah/{id_barang}', [BarangController::class, 'edit'])->name('super_admin.ubah_barang');
            Route::put('/ubah/{id_barang}', [BarangController::class, 'update']);

            // hapus barang
            Route::delete('/hapus/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
            Route::patch('/restore/{id}', [BarangController::class, 'restore'])->name('barang.restore');
        });

        Route::group(['prefix' => 'kategori'], function () {
            Route::get('/', [KategoriController::class, 'index'])->name('super_admin.kategori');
           // tambah kategori
            Route::get('/tambah', [KategoriController::class, 'create']);
            Route::post('/tambah', [KategoriController::class, 'store']);

            // ubah kategori
            Route::get('/ubah/{id_kategori}', [KategoriController::class, 'edit'])->name('super_admin.ubah_kategori');
            Route::put('/ubah/{id_kategori}', [KategoriController::class, 'update']);

            // hapus kategori
            Route::delete('/hapus/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
            Route::patch('/hapus/{id}', [KategoriController::class, 'restore'])->name('kategori.restore');
        });

        Route::group(['prefix' => 'supplier'], function () {
            Route::get('/', [SupplierController::class, 'index'])->name('super_admin.supplier');

            Route::get('/tambah', [SupplierController::class, 'create']);
            Route::post('/tambah', [SupplierController::class, 'store']);

            Route::get('/ubah/{id_supplier}', [SupplierController::class, 'edit'])->name('super_admin.ubah_supplier');
            Route::put('/ubah/{id_supplier}', [SupplierController::class, 'update']);

            Route::delete('/hapus/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
            Route::patch('/hapus/{id}', [SupplierController::class, 'restore'])->name('supplier.restore');

            Route::group(['prefix' => 'order'], function () {
                Route::get('/{id_supplier}', [OrderController::class, 'index'])->name('super_admin.supplier.order');

                Route::post('/tambah', [OrderController::class, 'store']);
            });
        });

        Route::group(['prefix' => 'po'], function () {
            Route::get('/', [OrderController::class, 'list'])->name('super_admin.po');

            Route::get('/ubah/{id_purchasing_order_header}', [OrderController::class, 'edit'])->name('po.ubah');
            Route::post('/ubah', [OrderController::class, 'update'])->name('po.update');


            Route::delete('/hapus/{id}', [OrderController::class, 'destroy'])->name('po.destroy');
            Route::patch('/hapus/{id}', [OrderController::class, 'restore'])->name('po.restore');
        });

        Route::group(['prefix' => 'laporan'], function () {
            Route::get('/harian', [reportController::class, 'harian'])->name('report.harian');
            Route::get('/bulanan', [reportController::class, 'bulanan'])->name('report.bulanan');
            Route::get('/neracaBulanan', [reportController::class, 'neracaBulanan'])->name('report.neracaBulanan');
            Route::get('/pemasukan_pengeluaran_barang', [reportController::class, 'pemasukanPengeluaranBarang'])->name('report.pemasukan_pengeluaran_barang');
        });

        Route::group(['prefix' => 'stok'], function () {
            Route::get('/', [StokController::class, 'index'])->name('super_admin.stok');
            // ubah stok
            Route::get('/ubah/{id_stok}', [StokController::class, 'edit'])->name('super_admin.ubah_stok');
            Route::post('/ubah', [StokController::class, 'update'])->name('super_admin.update_stok');
        });
    });

});
