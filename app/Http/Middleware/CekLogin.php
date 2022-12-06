<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $page)
    {
        if (Auth::guard("pasien")->check()){
            if($page=="pasien"){
                return $next($request);
            }else{
                return redirect()->route('pasien.home');
            }
        }
        else if (Auth::guard("dokter")->check()){
            if($page=="dokter"){
                return $next($request);
            }else{
                return redirect()->route('dokter.home');
            }
        }
        else if (Auth::guard("perawat")->check()){
            if($page=="perawat"){
                return $next($request);
            }else{
                return redirect()->route('perawat.home');
            }
        }
        else if (Auth::guard("admin")->check()){
            if($page=="admin"){
                return $next($request);
            }else{
                return redirect()->route('admin.home');
            }
        }
        else if($page == "auth"){
            return $next($request);
        }else{
            return redirect()->route('login.indexpasien');
        }
    }
}
