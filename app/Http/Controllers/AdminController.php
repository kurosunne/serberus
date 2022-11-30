<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\RumahSakit;
use App\Models\Perawat;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home(){
        return view('admin.homeadmin');
    }
    public function perawat()
    {
        $perawat = Perawat::all();
        return view('admin.listperawat', compact('perawat'));
    }
    public function pasien(){
        $pasien = Pasien::all();

        return view('admin.listpasien', compact('pasien'));
    }
    public function rumahsakit(){
        $rumahsakit = RumahSakit::all();

        return view('admin.listrumahsakit', compact('rumahsakit'));
    }
    public function dokter(){
        $dokter = Dokter::all();

        return view('admin.listdokter', compact('dokter'));
    }
    public function obat(){
        $obat = Obat::all();

        return view('admin.listobat', compact('obat'));
    }

    //SEARCH FUNCTION


    //ADD FUNCTION
    public function addpasien(Request $req)
    {
        $pasien = new Pasien;
        $pasien->ps_nama = $req->createnamapasien;
        $pasien->ps_alamat = $req->createalamatpasien;
        $pasien->ps_telp = $req->createteleponpasien;
        $pasien->ps_email=$req->createemailpasien;
        $pasien->ps_password='123';
        $pasien->save();

        return redirect()->route('admin.pasien');
    }
}
