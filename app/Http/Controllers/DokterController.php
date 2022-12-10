<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\JanjiTemu;
use App\Models\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DokterController extends Controller
{
    public function indexHome(Request $req)
    {
        $user = Dokter::where("dk_email", Session::get("active")["email"])->first();
        $janji_temu = JanjiTemu::where("dk_id", $user->dk_id)->get();
        $konsultasi = Konsultasi::where("dk_id", $user->dk_id)->get();

        return view('dokter.home', compact('janji_temu', 'konsultasi'));
    }

    public function indexJanji(Request $req)
    {
        $user = Dokter::where("dk_email", Session::get("email"))->first();
        
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
