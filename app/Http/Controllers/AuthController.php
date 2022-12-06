<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Perawat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function indexPasien(Request $req)
    {
        # code...
        return view('loginregis/welcome');
    }

    public function loginPasien(Request $req)
    {
        $req->validate([
            'email' => 'required|exists:pasien,ps_email',
            'password' => 'required',
        ]);

        // $user = Pasien::where('ps_email', $req->email)->first();

        $credential = [
            "ps_email" => $req->email,
            "password" => $req->password,
        ];

        if (Auth::guard("pasien")->attempt($credential)) {
            //TODO:Pasien Home
            Session::put('active', [
                'email' => $req->email,
                'role' => 'perawat'
            ]);
            return redirect()->route('pasien.home');
        } else {
            return back()->with('msg', 'Password tidak sesuai');
        }
    }

    public function indexPerawat(Request $req)
    {
        # code...
        return view('loginregis/LoginPerawat');
    }

    public function loginPerawat(Request $req)
    {
        $req->validate([
            'email' => 'required|exists:perawat,pr_email',
            'password' => 'required',
        ]);

        $credential = [
            "pr_email" => $req->email,
            "password" => $req->password,
        ];

        if (Auth::guard("perawat")->attempt($credential)) {
            //TODO:Perawat Home
            Session::put('active', [
                'email' => $req->email,
                'role' => 'perawat'
            ]);
            return redirect()->route('perawat.home');
        } else {
            return back()->with('msg', 'Password tidak sesuai');
        }
    }

    public function indexDokter(Request $req)
    {
        # code...
        return view('loginregis/LoginDokter');
    }

    public function loginDokter(Request $req)
    {
        $req->validate([
            'email' => 'required|exists:dokter,dk_email',
            'password' => 'required',
        ]);

        $credential = [
            "dk_email" => $req->email,
            "password" => $req->password,
        ];

        if (Auth::guard("dokter")->attempt($credential)) {
            //TODO:Dokter Home
            Session::put('active', [
                'email' => $req->email,
                'role' => 'dokter'
            ]);
            return redirect()->route('dokter.home');
        } else {
            return back()->with('msg', 'Password tidak sesuai');
        }
    }

    public function indexAdmin(Request $req)
    {
        # code...
        return view('loginregis/LoginAdmin');
    }

    public function loginAdmin(Request $req)
    {
        $req->validate([
            'email' => 'required|exists:admin,ad_email',
            'password' => 'required',
        ]);

        $credential = [
            "ad_email" => $req->email,
            "password" => $req->password,
        ];

        if (Auth::guard("admin")->attempt($credential)) {
            //TODO:Admin Home
            Session::put('active', [
                'email' => $req->email,
                'role' => 'admin'
            ]);
            return redirect()->route('admin.home');
        } else {
            return back()->with('msg', 'Password tidak sesuai');
        }
    }

    public function formPasien(Request $req)
    {
        # code...
        return view('loginregis/RegisterPasien');
    }

    public function registerPasien(Request $req)
    {
        $req->validate(
            [
                'nama' => 'required',
                'email' => 'required|email|unique:pasien,ps_email|unique:dokter,dk_email|unique:perawat,pr_email',
                'telepon' => 'required|numeric|gte:10|lte:13',
                'password' => 'required|confirmed|gte:8',
            ],
            [
                'telepon.gte' => 'Telepon harus 10-13 digit',
                'telepon.lte' => 'Telepon harus 10-13 digit',
                'password.gte' => 'Password minimal 8 digit',
            ]
        );

        Pasien::insert([
            'ps_nama' => $req->nama,
            'ps_email' => $req->email,
            'ps_telp' => $req->telepon,
            'ps_password' => $req->password,
        ]);

        return back()->with('succ', 'Berhasil mendaftar');
    }

    public function formPerawat(Request $req)
    {
        # code...
        return view('loginregis/RegisterPerawat');
    }

    public function registerPerawat(Request $req)
    {
        $req->validate(
            [
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
            ]
        );

        Perawat::insert([
            'pr_nama' => $req->nama,
            'pr_email' => $req->email,
            'pr_telp' => $req->telepon,
            'pr_password' => $req->password,
            'rs_id' => $req->rs
        ]);

        return back()->with('succ', 'Berhasil mendaftar');
    }

    public function formDokter(Request $req)
    {
        # code...
        return view('loginregis/RegisterDokter');
    }

    public function registerDokter(Request $req)
    {
        $req->validate(
            [
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
            ]
        );

        Pasien::insert([
            'dk_nama' => $req->nama,
            'dk_email' => $req->email,
            'dk_telp' => $req->telepon,
            'dk_password' => $req->password,
            'rs_id' => $req->rs,
            'sp_id' => $req->sp,
        ]);

        return back()->with('succ', 'Berhasil mendaftar');
    }
}
