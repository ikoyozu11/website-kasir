<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengguna;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nama_pengguna' => 'required',
            'password_pengguna' => 'required',
        ]);

        $pengguna = Pengguna::where('nama_pengguna', $request->nama_pengguna)->first();

        if ($pengguna && $pengguna->password_pengguna === $request->password_pengguna) {
            if ($pengguna->nama_pengguna === 'admin') {
                return redirect()->route('admin');
            } 
            else if ($pengguna->nama_pengguna === 'gudang') {
                return redirect()->route('gudang.dashboard');
            }
            else if ($pengguna->nama_pengguna === 'superadmin') {
                return redirect()->route('super_admin.dashboard');
            }
        }

        return redirect()->route('login')->with('error', 'Nama pengguna atau kata sandi salah');
    }


    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('logout_success', 'anda telah berhasil keluar.');
    }
}
