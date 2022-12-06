<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerawatController extends Controller
{
    public function indexHome(Request $req)
    {
        return view('perawat.home');
    }

    public function indexJanji(Request $req)
    {
        return view('perawat.janjitemu');

    }

    public function indexKonsultasi(Request $req)
    {
        return view('perawat.konsultasi');
    }

    public function indexRiwayat(Request $req)
    {
        return view('perawat.riwayat');
    }
}
