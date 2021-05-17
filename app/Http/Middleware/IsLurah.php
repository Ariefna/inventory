<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;


class IsLurah
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('role')) {
            if (Session::get('role') == 'lurah') {
            return $next($request);
            }else {
                return redirect('/login')->with('failed', 'Maaf, Anda Tidak Ada Akses Ke Halaman Tertentu');
            }
        }
    return redirect('/login');
    }
}
