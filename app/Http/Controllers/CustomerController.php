<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        return view('admin.customer.list',[
            'customer' => $customer
        ]);
    }

    // tambah
    public function create()
    {
        return view('admin.customer.tambah_customer');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'nama_customer' => 'required|string',
        //     'nama_customer' => 'required|string',
        //     'nama_customer' => 'required|string',
        //     'nama_customer' => 'required|string',
        // ],[
        //     'nama_customer.required' => 'Nama customer wajib diisi.',
        // ]);

        Customer::create([
            'nama_customer' => $request->nama_customer,
            'alamat_customer' => $request->alamat_customer,
            'email_customer' => $request->email_customer,
            'telp_customer' => $request->telp_customer,
        ]);

        return redirect()->route('admin.customer')->with('success', 'Barang berhasil ditambahkan');
    }

    // ubah
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customer.ubah_customer', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'nama_customer' => 'required|string',
        // ]);

        $barang = Customer::findOrFail($id);
        $barang->update([
            'nama_customer' => $request->nama_customer,
            'alamat_customer' => $request->alamat_customer,
            'email_customer' => $request->email_customer,
            'telp_customer' => $request->telp_customer,
        ]);

        return redirect()->route('admin.customer')->with('success', 'Data barang berhasil diperbarui.');
    }

    // soft delete
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->update(
            ['status_customer' => 0]
        );

        return redirect()->back()->with('success', 'Barang berhasil di non aktifkan.');
    }

    public function restore($id)
    {
        $customer = Customer::find($id);
        $customer->update(
            ['status_customer' => 1]
        );

        return redirect()->back()->with('success', 'Barang berhasil di aktifkan.');
    }
}
