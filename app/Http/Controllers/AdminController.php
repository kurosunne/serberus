<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
