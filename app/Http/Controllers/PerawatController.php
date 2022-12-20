<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JanjiRawat;
use App\Models\Perawat;
use App\Models\Dokter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class PerawatController extends Controller
{
    public function indexHome(Request $req)
    {
        return view('perawat.home');
    }

    public function indexJanji(Request $req)
    {
        if ($req->query("order") && !$req->query("sort")) {
            return redirect()->route('perawat.janji');
        }

        $user = Perawat::where("pr_email", Session::get("active")["email"])->first();

        $sort_key = [
            "id" => "jr_id",
            "pasien" => "ps_nama",
            "tanggal" => "jr_tanggal",
            "status" => "janji_rawat.deleted_at",
        ];

        $sort_status = [
            "sort" => $req->query("sort") ?? "id",
            "order" => $req->query("order") ?? "asc"
        ];
        $sort = $sort_status["sort"];
        $order = $sort_status["order"];

        $janji_rawat = JanjiRawat::where("pr_id", $user->pr_id)
            ->join('pasien', 'janji_rawat.ps_id', '=', 'pasien.ps_id')
            ->select(['jr_id', 'ps_nama', 'ps_telp', 'jr_tanggal', 'janji_rawat.created_at', 'janji_rawat.updated_at', 'janji_rawat.deleted_at']);

        $janji_rawat = $janji_rawat->orderBy($sort_key[$sort], $order)->get();

        $sort_link = [
            "id" => [
                "sort" => "id",
                "order" => ($sort == "id" && $order == "desc") ? "asc" : (($sort != "id") ? "asc" : "desc"),
            ],
            "pasien" => [
                "sort" => "pasien",
                "order" => ($sort == "pasien" && $order == "desc") ? "asc" : (($sort != "pasien") ? "asc" : "desc"),
            ],
            "tanggal" => [
                "sort" => "tanggal",
                "order" => ($sort == "tanggal" && $order == "desc") ? "asc" : (($sort != "tanggal") ? "asc" : "desc"),
            ],
            "status" => [
                "sort" => "status",
                "order" => ($sort == "status" && $order == "desc") ? "asc" : (($sort != "status") ? "asc" : "desc"),
            ],
        ];

        return view('perawat.janjirawat', compact('janji_rawat', 'sort_link', "sort_status"));

    }

    public function indexKonsultasi(Request $req)
    {
        return view('perawat.konsultasi');
    }

    public function deleterawat(Request $req)
    {
        $janji_rawat = JanjiRawat::withTrashed()->find($req->jr_id);

        $res = $janji_rawat->delete();

        if ($res) {
            return redirect()->route('perawat.janji')->with('success', 'Berhasil menyelesaikan janji rawat');
        } else {
            return redirect()->route('perawat.janji')->with('error', 'Data gagal dihapus');
        }
    }

    public function indexRiwayat(Request $req)
    {
        if($req->query("order") && !$req->query("sort")){
            return redirect()->route('perawat.riwayat');
        }

        $user = Perawat::where("pr_email", Session::get("active")["email"])->first();
        $janji_rawat = JanjiRawat::onlyTrashed()
        ->where("pr_id", $user->pr_id)
        ->join('pasien', 'janji_rawat.ps_id','=', 'pasien.ps_id')
        ->select(['jr_id', 'ps_nama', 'jr_tanggal', 'janji_rawat.created_at', 'janji_rawat.updated_at', 'ps_telp']);

        $sort_key = [
            "id" => "jr_id",
            "pasien" => "ps_nama",
            "tanggal" => "jr_tanggal",
        ];

        $sort_status = [
            "sort" => $req->query("sort") ?? "id",
            "order" => $req->query("order") ?? "asc"
        ];
        $sort = $sort_status["sort"];
        $order = $sort_status["order"];

        $janji_rawat = $janji_rawat->orderBy($sort_key[$sort], $order)->get();
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

        return view('perawat.riwayat', compact('janji_rawat', 'sort_link', "sort_status"));
    }
}
