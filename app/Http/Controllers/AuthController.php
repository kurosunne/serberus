<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Perawat;
use App\Models\RumahSakit;
use App\Models\Spesialis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function indexPasien(Request $req)
    {
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
                'role' => 'pasien'
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
            return redirect()->route('perawat.janji');
        } else {
            return back()->with('msg', 'Password tidak sesuai');
        }
    }

    public function indexDokter(Request $req)
    {

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
            return redirect()->route('dokter.janji');
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
                'email' => 'required|email|unique:pasien,ps_email|unique:dokter,dk_email|unique:pasien,ps_email|unique:perawat,pr_email',
                'telepon' => 'required|numeric|digits_between:10,15|unique:dokter,dk_telp|unique:pasien,ps_telp|unique:perawat,pr_telp',
                'password' => 'required|min:8',
                'confirm' => 'required|same:password',
                'alamat' => 'required',
            ],
            [
                //VALIDATION NAMA
                'nama.required' => 'Nama tidak boleh kosong',

                //VALIDATION EMAIL
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email tidak valid',
                'email.unique' => 'Email sudah terdaftar',

                //VALIDATION TELEPON
                'telepon.required' => 'Telepon tidak boleh kosong',
                'telepon.numeric' => 'Telepon harus berupa angka',
                'telepon.digits_between' => 'Telepon harus berupa angka',
                'telepon.unique' => 'Telepon sudah terdaftar',

                //VALIDATION PASSWORD
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password minimal 8 karakter',

                //VALIDATION CONFIRM
                'confirm.required' => 'Konfirmasi password tidak boleh kosong',
                'confirm.same' => 'Konfirmasi password tidak sama',

                //VALIDATION ALAMAT
                'alamat.required' => 'Alamat tidak boleh kosong'
            ]
        );

        Pasien::insert([
            'ps_nama' => $req->nama,
            'ps_email' => $req->email,
            'ps_telp' => $req->telepon,
            'ps_alamat' => $req->alamat,
            'ps_password' => $req->password,
        ]);

        $psId = Pasien::limit(1)->latest('ps_id')->first()->ps_id;
        File::copy('foto/psdef.png', 'foto/ps' . $psId . '.png');

        return back()->with('succ', 'Berhasil mendaftar');
    }

    public function formPerawat(Request $req)
    {
        $rumahSakit = RumahSakit::all();

        return view('loginregis/RegisterPerawat', compact('rumahSakit'));
    }

    public function registerPerawat(Request $req)
    {
        $req->validate(
            [
                'nama' => 'required',
                'email' => 'required|email|unique:pasien,ps_email|unique:dokter,dk_email|unique:perawat,pr_email|uniqure:pasien,ps_email',
                'telepon' => 'required|numeric|digits_between:10,15|unique:perawat,pr_telp|unique:dokter,dk_telp|unique:pasien,ps_telp',
                'password' => 'required|min:8',
                'confirm' => 'required|same:password',
            ],
            [
                //VALIDATION NAMA
                'nama.required' => 'Nama tidak boleh kosong',

                //VALIDATION EMAIL
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email tidak valid',
                'email.unique' => 'Email sudah terdaftar',

                //VALIDATION TELEPON
                'telepon.required' => 'Telepon tidak boleh kosong',
                'telepon.numeric' => 'Telepon harus berupa angka',
                'telepon.digits_between' => 'Telepon harus 10-15 digit',
                'telepon.unique' => 'Telepon sudah terdaftar',

                //VALIDATION PASSWORD
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password minimal 8 digit',

                //VALIDATION CONFIRM
                'confirm.required' => 'Konfirmasi password tidak boleh kosong',
                'confirm.same' => 'Konfirmasi password tidak sesuai',
            ]
        );

        Perawat::insert([
            'pr_nama' => $req->nama,
            'pr_email' => $req->email,
            'pr_telp' => $req->telepon,
            'pr_password' => $req->password,
            'rs_id' => $req->rs,
        ]);

        $prId = Perawat::limit(1)->latest('pr_id')->first()->pr_id;
        File::copy('foto/prdef.png', 'foto/pr' . $prId . '.png');

        return back()->with('succ', 'Berhasil mendaftar');
    }

    public function formDokter(Request $req)
    {
        $rumahSakit = RumahSakit::all();
        $spesialis = Spesialis::all();

        return view('loginregis/RegisterDokter', compact('rumahSakit', 'spesialis'));
    }

    public function registerDokter(Request $req)
    {
        $sp = $req->spesialis;
        $req->validate(
            [
                'nama' =>  ['required'],
                'email' =>  ['required', 'email', 'unique:dokter,dk_email', 'unique:perawat,pr_email', 'unique:pasien,ps_email'],
                'telepon' => ['required', 'digits_between :10,15', 'numeric', 'unique:dokter,dk_telp', 'unique:perawat,pr_telp', 'unique:pasien,ps_telp'],
                'password' => ['required', 'min:8'],
                'confirm' => ['required', 'same:password'],
                'sip' => ['required'],
            ],
            [
                //VALIDATION NAMA
                'nama.required' => 'Nama tidak boleh kosong',

                //VALIDATION EMAIL
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email tidak valid',
                'email.unique' => 'Email sudah terdaftar',

                //VALIDATION TELEPON
                'telepon.required' => 'Telepon tidak boleh kosong',
                'telepon.digits_between' => 'Telepon harus 10-15 digit',
                'telepon.numeric' => 'Telepon harus berupa angka',
                'telepon.unique' => 'Telepon sudah terdaftar',

                //VALIDATION PASSWORD
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password minimal 8 digit',

                //VALIDATION CONFIRM
                'confirm.required' => 'Konfirmasi password tidak boleh kosong',
                'confirm.same' => 'Konfirmasi password tidak sesuai',

                //VALIDATION SIP
                'sip.required' => "Surat Ijin Praktek tidak boleh kosong"
            ]
        );

        Dokter::insert([
            'dk_nama' => $req->nama,
            'dk_email' => $req->email,
            'dk_telp' => $req->telepon,
            'dk_password' => Hash::make($req->password),
            'rs_id' => $req->rs,
            'sp_id' => $req->spesialis,
            'dk_status' => 0
        ]);

        $dkId = Dokter::limit(1)->latest('dk_id')->first()->dk_id;
        $req->file('sip')->storeAs('sip', $dkId . '.png', 'local');

        File::copy('foto/dkdef.png', 'foto/dk' . $dkId . '.png');

        return back()->with('succ', 'Berhasil mendaftar');
    }
}
