<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Dokter;
use App\Models\JanjiTemu;
use App\Models\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        if($req->query("order") && !$req->query("sort")){
            return redirect()->route('dokter.janji');
        }

        $user = Dokter::where("dk_email", Session::get("active")["email"])->first();
        $janji_temu = DB::table('janji_temu')
        ->where("dk_id", $user->dk_id)
        ->join('pasien', 'janji_temu.ps_id','=', 'pasien.ps_id')
        ->select(['je_id', 'ps_nama', 'jt_tanggal', 'janji_temu.created_at', 'janji_temu.updated_at']);

        $sort_key = [
            "id" => "je_id",
            "pasien" => "ps_nama",
            "tanggal" => "jt_tanggal",
        ];

        $sort_status = [
            "sort" => $req->query("sort") ?? "id",
            "order" => $req->query("order") ?? "asc"
        ];
        $sort = $sort_status["sort"];
        $order = $sort_status["order"];

        $janji_temu = $janji_temu->orderBy($sort_key[$sort], $order)->get();
        $sort_link = [
            "id" => [
                "sort" => "id",
                "order" => ($sort == "id" && $order == "desc") ? "asc" : (($sort != "id" )? "asc" : "desc"),
            ],
            "pasien" => [
                "sort" => "pasien",
                "order" => ($sort == "pasien" && $order == "desc") ? "asc" : (($sort != "pasien" )? "asc" : "desc"),
            ],
            "tanggal" => [
                "sort" => "tanggal",
                "order" => ($sort == "tanggal" && $order == "desc") ? "asc" : (($sort != "tanggal" )? "asc" : "desc"),
            ],
        ];

        return view('dokter.janjitemu', compact('janji_temu', 'sort_link', "sort_status"));
    }

    public function indexRiwayat(Request $req)
    {
        if($req->query("order") && !$req->query("sort")){
            return redirect()->route('dokter.riwayat');
        }

        $user = Dokter::where("dk_email", Session::get("active")["email"])->first();
        $janji_temu = JanjiTemu::onlyTrashed()
        ->where("dk_id", $user->dk_id)
        ->join('pasien', 'janji_temu.ps_id','=', 'pasien.ps_id')
        ->select(['je_id', 'ps_nama', 'jt_tanggal', 'janji_temu.created_at', 'janji_temu.updated_at']);

        $sort_key = [
            "id" => "je_id",
            "pasien" => "ps_nama",
            "tanggal" => "jt_tanggal",
        ];

        $sort_status = [
            "sort" => $req->query("sort") ?? "id",
            "order" => $req->query("order") ?? "asc"
        ];
        $sort = $sort_status["sort"];
        $order = $sort_status["order"];

        $janji_temu = $janji_temu->orderBy($sort_key[$sort], $order)->get();
        $sort_link = [
            "id" => [
                "sort" => "id",
                "order" => ($sort == "id" && $order == "desc") ? "asc" : (($sort != "id" )? "asc" : "desc"),
            ],
            "pasien" => [
                "sort" => "pasien",
                "order" => ($sort == "pasien" && $order == "desc") ? "asc" : (($sort != "pasien" )? "asc" : "desc"),
            ],
            "tanggal" => [
                "sort" => "tanggal",
                "order" => ($sort == "tanggal" && $order == "desc") ? "asc" : (($sort != "tanggal" )? "asc" : "desc"),
            ],
        ];

        return view('dokter.riwayat', compact('janji_temu', 'sort_link', "sort_status"));
    }

    public function indexKonsultasi(Request $req, String $konsultasi_id = null)
    {
        $user = Dokter::where("dk_email", Session::get("active")["email"])->first();
        $konsultasi = Konsultasi::where("dk_id", $user->dk_id)->get();

        return view('dokter.konsultasi',compact('konsultasi', 'konsultasi_id'));
    }

    public function chatKonsultasi(Request $req, String $konsultasi_id = null)
    {
        $chat = Chat::where("ks_id", $konsultasi_id)->get();
        return json_encode($chat);
    }

    public function sendChatKonsultasi(Request $req, String $konsultasi_id = null)
    {
        Chat::insert([
            "ch_sender_is_dokter" => $req->sender_is_dokter,
            "ks_id" => $konsultasi_id,
            "ch_teks" => $req->message
        ]);
    }
}
