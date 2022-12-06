<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function indexHome(Request $req)
    {
        return view('dokter.home');
    }

    public function indexJanji(Request $req)
    {
        return view('dokter.janjitemu');
    }

    public function indexRiwayat(Request $req)
    {
        return view('dokter.riwayat');
    }

    public function indexKonsultasi(Request $req)
    {
        return view('dokter.konsultasi');
    }
}
