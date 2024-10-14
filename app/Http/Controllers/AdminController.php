<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\TransaksiHeader;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // $customer = Customer::all();
        return view('admin.dashboard');
    }

    public function generateInvoice($id)
    {
        $transaksi = TransaksiHeader::with(['customer', 'detail.stok'])->findOrFail($id);
        // dd($transaksi);

        return view('admin.transaksi.invoice', compact('transaksi'));
    }
}
