<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (!Auth::check()) 
        // {
        //     return redirect('/');
        // }

        if (Auth::check()) {
            $nama_pengguna = Auth::user()->nama_pengguna;
        
            if ($nama_pengguna === 'admin') {
                return redirect('/admin');
            } elseif ($nama_pengguna === 'superadmin') {
                return redirect('/super_admin');
            } elseif ($nama_pengguna === 'gudang') {
                return redirect('/gudang');
            }
        }

        return $next($request);
    }
}
