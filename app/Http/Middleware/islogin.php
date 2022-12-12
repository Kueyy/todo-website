<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class islogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //crk apakah ada history login di authnya, kalau ada dibolehin lanjut akses laman
        if(Auth::check()){
        return $next($request);
        }
        // kalau gaada history login bakal dilanjutin lagi ke login dengan pesan
        return redirect('/')->with('notAllowed', 'Silahkan login terlebih dahulu');
    }
}
