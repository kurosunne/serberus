<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    //
    public function indexHome(Request $req)
    {
        # code...
        return view('pasien.home');
    }
    public function indexRiwayat(Request $req)
    {
        # code...
        return view('pasien.histori');
    }
    public function indexJanji(Request $req)
    {
        # code...
        return view('pasien.JanjiTemu');
    }
    public function indexObat(Request $req)
    {
        # code...
        return view('pasien.obat');
    }
    public function indexKonsultasi(Request $req)
    {
        # code...
        return view('pasien.konsultasi');
    }

}
