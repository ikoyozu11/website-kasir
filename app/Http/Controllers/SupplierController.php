<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::all();
        return view('super_admin.supplier.list')->with('supplier', $supplier);
    }

    // tambah
    public function create()
    {
        return view('super_admin.supplier.tambah_supplier');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'nama_supplier' => 'required|string',
        //     'nama_supplier' => 'required|string',
        //     'nama_supplier' => 'required|string',
        //     'nama_supplier' => 'required|string',
        // ],[
        //     'nama_supplier.required' => 'Nama supplier wajib diisi.',
        // ]);

        Supplier::create([
            'nama_supplier' => $request->nama_supplier,
            'alamat_supplier' => $request->alamat_supplier,
            'email_supplier' => $request->email_supplier,
            'telp_supplier' => $request->telp_supplier,
        ]);

        return redirect()->route('super_admin.supplier')->with('success', 'Barang berhasil ditambahkan');
    }

    // ubah
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('super_admin.supplier.ubah_supplier', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'nama_supplier' => 'required|string',
        // ]);

        $barang = Supplier::findOrFail($id);
        $barang->update([
            'nama_supplier' => $request->nama_supplier,
            'alamat_supplier' => $request->alamat_supplier,
            'email_supplier' => $request->email_supplier,
            'telp_supplier' => $request->telp_supplier,
        ]);

        return redirect()->route('super_admin.supplier')->with('success', 'Data barang berhasil diperbarui.');
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
