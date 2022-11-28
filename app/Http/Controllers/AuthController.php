<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Perawat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function indexPasien(Request $req)
    {
        # code...
    }

    public function loginPasien(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = Pasien::where('ps_email', $req->email)->first();

        if($user != null){
            if(Hash::check($req->password, $user->ps_password)){
                //TODO:Pasien Home
                Session::put('active', [
                    'email' => $user->email,
                    'role' => 'pasien'
                ]);
                return redirect()->route('');
            }
            else{
                return back()->with('err', 'Password tidak sesuai');
            }
        }
        else{
            return back()->with('err', 'User tidak ditemukan');
        }
    }

    public function indexPerawat(Request $req)
    {
        # code...
    }

    public function loginPerawat(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = Perawat::where('pr_email', $req->email)->first();

        if($user != null){
            if(Hash::check($req->password, $user->pr_password)){
                //TODO:Perawat Home
                Session::put('active', [
                    'email' => $user->email,
                    'role' => 'perawat'
                ]);
                return redirect()->route('');
            }
            else{
                return back()->with('err', 'Password tidak sesuai');
            }
        }
        else{
            return back()->with('err', 'User tidak ditemukan');
        }
    }

    public function indexDokter(Request $req)
    {
        # code...
    }

    public function loginDokter(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = Dokter::where('dk_email', $req->email)->first();

        if($user != null){
            if(Hash::check($req->password, $user->dk_password)){
                //TODO:Dokter Home
                Session::put('active', [
                    'email' => $user->email,
                    'role' => 'dokter'
                ]);
                return redirect()->route('');
            }
            else{
                return back()->with('err', 'Password tidak sesuai');
            }
        }
        else{
            return back()->with('err', 'User tidak ditemukan');
        }
    }

    public function formPasien(Request $req)
    {
        # code...
    }

    public function registerPasien(Request $req)
    {
        $req->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:pasien,ps_email|unique:dokter,dk_email|unique:perawat,pr_email',
            'telepon' => 'required|numeric|gte:10|lte:13',
            'password' => 'required|confirmed|gte:8',
        ],
        [
            'telepon.gte' => 'Telepon harus 10-13 digit',
            'telepon.lte' => 'Telepon harus 10-13 digit',
            'password.gte' => 'Password minimal 8 digit',
        ]);

        Pasien::insert([
            'ps_nama' => $req->nama,
            'ps_email' => $req->email,
            'ps_telp' => $req->telepon,
            'ps_password' => $req->password,
        ]);

        return back()->with('succ','Berhasil mendaftar');
    }

    public function formPerawat(Request $req)
    {
        # code...
    }

    public function registerPerawat(Request $req)
    {
        $req->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:pasien,ps_email|unique:dokter,dk_email|unique:perawat,pr_email',
            'telepon' => 'required|numeric|gte:10|lte:13',
            'password' => 'required|confirmed|gte:8',
            'rs' => 'required',
        ],
        [
            'telepon.gte' => 'Telepon harus 10-13 digit',
            'telepon.lte' => 'Telepon harus 10-13 digit',
            'password.gte' => 'Password minimal 8 digit',
        ]);

        Perawat::insert([
            'pr_nama' => $req->nama,
            'pr_email' => $req->email,
            'pr_telp' => $req->telepon,
            'pr_password' => $req->password,
            'rs_id' => $req->rs
        ]);

        return back()->with('succ','Berhasil mendaftar');
    }

    public function formDokter(Request $req)
    {
        # code...
    }

    public function registerDokter(Request $req)
    {
        $req->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:pasien,ps_email|unique:dokter,dk_email|unique:perawat,pr_email',
            'telepon' => 'required|numeric|gte:10|lte:13',
            'password' => 'required|confirmed|gte:8',
            'rs' => 'required',
            'sp' => 'required',
        ],
        [
            'telepon.gte' => 'Telepon harus 10-13 digit',
            'telepon.lte' => 'Telepon harus 10-13 digit',
            'password.gte' => 'Password minimal 8 digit',
        ]);

        Pasien::insert([
            'dk_nama' => $req->nama,
            'dk_email' => $req->email,
            'dk_telp' => $req->telepon,
            'dk_password' => $req->password,
            'rs_id' => $req->rs,
            'sp_id' => $req->sp,
        ]);

        return back()->with('succ','Berhasil mendaftar');
    }
}
