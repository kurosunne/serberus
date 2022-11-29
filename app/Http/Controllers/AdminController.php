<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home(){
        return view('admin.homeadmin');
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

    //SELECT DATABASE MODEL

    public function listRumahSakit(Request $req)
    {
        $rumahsakit = RumahSakit::select(['rs_id', 'rs_nama', 'rs_alamat', 'created_at'])->get();
        return view('admin.listrumahsakit', ['rumahsakit' => $rumahsakit]);
    }
}
