<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Obat;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    //
    public function indexHome(Request $req)
    {
        # code...
        $dokter = Dokter::inRandomOrder()->limit(9)->get();
        $obat = Obat::inRandomOrder()->limit(9)->get();
        return view('pasien.home',compact('dokter','obat'));
    }
    public function indexRiwayattemu(Request $req)
    {
        # code...
        return view('pasien.historitemu');
    }
    public function indexRiwayatobat(Request $req)
    {
        # code...
        return view('pasien.historiobat');
    }
    public function indexJanji(Request $req)
    {
        # code...
        return view('pasien.JanjiTemu');
    }
    public function indexDetailJanji(Request $req)
    {
        # code...
        return view('pasien.detailJanjiTemu');
    }
    public function indexObat(Request $req)
    {
        $obat = Obat::limit(8)->offset(8*($req->page-1))->get();
        return view('pasien.obat',compact('obat'));
    }
    public function indexKonsultasi(Request $req)
    {
        # code...
        return view('pasien.konsultasi');
    }

}
