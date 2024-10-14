<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('super_admin.kategori.list')->with('kategori', $kategori);
    }

    // tambah
    public function create()
    {
        return view('super_admin.kategori.tambah_kategori');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string',
        ],[
            'nama_kategori.required' => 'Nama Kategori wajib diisi.',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('super_admin.kategori')->with('success', 'Barang berhasil ditambahkan');
    }

    // ubah
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('super_admin.kategori.ubah_kategori', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string',
        ]);

        $barang = Kategori::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('super_admin.kategori')->with('success', 'Data barang berhasil diperbarui.');
    }

    // soft delete
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->update(
            ['status' => 0]
        );

        return redirect()->back()->with('success', 'Barang berhasil di non aktifkan.');
    }

    public function restore($id)
    {
        $kategori = Kategori::find($id);
        $kategori->update(
            ['status' => 1]
        );

        return redirect()->back()->with('success', 'Barang berhasil di aktifkan.');
    }
}
