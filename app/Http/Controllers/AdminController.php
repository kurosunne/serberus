<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RumahSakit;

class AdminController extends Controller
{
    public function home(){
        return view('admin.homeadmin');
    }
    public function pasien(){
        return view('admin.listpasien');
    }
    public function rumahsakit(){
        return view('admin.listrumahsakit');
    }
    public function dokter(){
        return view('admin.listdokter');
    }
    public function obat(){
        return view('admin.listobat');
    }

    //SELECT DATABASE MODEL

    public function listRumahSakit(Request $req)
    {
        $rumahsakit = RumahSakit::select(['rs_id', 'rs_nama', 'rs_alamat', 'created_at'])->get();
        return view('admin.listrumahsakit', ['rumahsakit' => $rumahsakit]);
    }
}
