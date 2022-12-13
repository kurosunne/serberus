<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\HjualObat;
use App\Models\JanjiTemu;
use App\Models\JanjiRawat;
use App\Models\Konsultasi;
use App\Models\Obat;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PasienController extends Controller
{
    //
    public function indexHome(Request $req)
    {
        # code...
        $dokter = Dokter::inRandomOrder()->limit(9)->get();
        $obat = Obat::inRandomOrder()->limit(9)->get();
        $pasien = Pasien::where('ps_email',Session::get('active')['email'])->first();
        $konsultasi = Konsultasi::where('ps_id',$pasien->ps_id)->orderBy('ks_id','desc')->get();
        $hjual_obat = HjualObat::where('ps_id',$pasien->ps_id)->orderBy("ho_id",'desc')->get();
        return view('pasien.home',compact('dokter','obat','konsultasi','hjual_obat'));
    }

    public function indexRiwayattemu(Request $req)
    {
        if($req->query("order") && !$req->query("sort")){
            return redirect()->route('pasien.historitemu');
        }

        $user = Pasien::where("ps_email", Session::get("active")["email"])->first();

        $sort_key = [
            "id" => "je_id",
            "dokter" => "dk_nama",
            "tanggal" => "jt_tanggal",
            "status" => "janji_temu.deleted_at",
        ];

        $sort_status = [
            "sort" => $req->query("sort") ?? "id",
            "order" => $req->query("order") ?? "asc"
        ];
        $sort = $sort_status["sort"];
        $order = $sort_status["order"];

        $janji_temu = JanjiTemu::onlyTrashed()
        ->where("ps_id", $user->ps_id)
        ->join('dokter', 'janji_temu.dk_id','=', 'dokter.dk_id')
        ->select(['je_id', 'dk_nama', 'dk_telp', 'jt_tanggal', 'janji_temu.created_at', 'janji_temu.updated_at', 'janji_temu.deleted_at']);

        $janji_temu = $janji_temu->orderBy($sort_key[$sort], $order)->get();

        $sort_link = [
            "id" => [
                "sort" => "id",
                "order" => ($sort == "id" && $order == "desc") ? "asc" : (($sort != "id" )? "asc" : "desc"),
            ],
            "dokter" => [
                "sort" => "dokter",
                "order" => ($sort == "dokter" && $order == "desc") ? "asc" : (($sort != "dokter" )? "asc" : "desc"),
            ],
            "tanggal" => [
                "sort" => "tanggal",
                "order" => ($sort == "tanggal" && $order == "desc") ? "asc" : (($sort != "tanggal" )? "asc" : "desc"),
            ],
            "status" => [
                "sort" => "status",
                "order" => ($sort == "status" && $order == "desc") ? "asc" : (($sort != "status" )? "asc" : "desc"),
            ],
        ];
        return view('pasien.historitemu',compact('janji_temu', 'sort_link', "sort_status"));
    }

    public function indexRiwayatobat(Request $req)
    {
        $user = Pasien::where("ps_email", Session::get("active")["email"])->first();

        $hjual_obat = HjualObat::where("ps_id",$user->ps_id)->get();

        return view('pasien.historiobat',compact('hjual_obat'));
    }

    public function indexJanji(Request $req)
    {
        if($req->query("order") && !$req->query("sort")){
            return redirect()->route('pasien.janji');
        }

        $user = Pasien::where("ps_email", Session::get("active")["email"])->first();

        $sort_key = [
            "id" => "je_id",
            "dokter" => "dk_nama",
            "tanggal" => "jt_tanggal",
            "status" => "janji_temu.deleted_at",
        ];

        $sort_status = [
            "sort" => $req->query("sort") ?? "id",
            "order" => $req->query("order") ?? "asc"
        ];
        $sort = $sort_status["sort"];
        $order = $sort_status["order"];

        $janji_temu = JanjiTemu::
        where("ps_id", $user->ps_id)
        ->join('dokter', 'janji_temu.dk_id','=', 'dokter.dk_id')
        ->select(['je_id', 'dk_nama', 'dk_telp', 'jt_tanggal', 'janji_temu.created_at', 'janji_temu.updated_at', 'janji_temu.deleted_at']);

        $janji_temu = $janji_temu->orderBy($sort_key[$sort], $order)->get();

        $sort_link = [
            "id" => [
                "sort" => "id",
                "order" => ($sort == "id" && $order == "desc") ? "asc" : (($sort != "id" )? "asc" : "desc"),
            ],
            "dokter" => [
                "sort" => "dokter",
                "order" => ($sort == "dokter" && $order == "desc") ? "asc" : (($sort != "dokter" )? "asc" : "desc"),
            ],
            "tanggal" => [
                "sort" => "tanggal",
                "order" => ($sort == "tanggal" && $order == "desc") ? "asc" : (($sort != "tanggal" )? "asc" : "desc"),
            ],
            "status" => [
                "sort" => "status",
                "order" => ($sort == "status" && $order == "desc") ? "asc" : (($sort != "status" )? "asc" : "desc"),
            ],
        ];

        return view('pasien.JanjiTemu',compact('janji_temu', 'sort_link', "sort_status"));
    }

    public function indexJanjiPerawat(Request $req)
    {
        if($req->query("order") && !$req->query("sort")){
            return redirect()->route('pasien.janjiperawat');
        }

        $user = Pasien::where("ps_email", Session::get("active")["email"])->first();

        $sort_key = [
            "id" => "jr_id",
            "perawat" => "pr_nama",
            "tanggal" => "jr_tanggal",
            "status" => "janji_rawat.deleted_at",
        ];

        $sort_status = [
            "sort" => $req->query("sort") ?? "id",
            "order" => $req->query("order") ?? "asc"
        ];
        $sort = $sort_status["sort"];
        $order = $sort_status["order"];

        $janji_rawat = JanjiRawat::
        where("ps_id", $user->ps_id)
        ->join('perawat', 'janji_rawat.pr_id','=', 'perawat.pr_id')
        ->select(['jr_id', 'pr_nama', 'pr_telp', 'jr_tanggal', 'janji_rawat.created_at', 'janji_rawat.updated_at', 'janji_rawat.deleted_at']);

        $janji_rawat = $janji_rawat->orderBy($sort_key[$sort], $order)->get();

        $sort_link = [
            "id" => [
                "sort" => "id",
                "order" => ($sort == "id" && $order == "desc") ? "asc" : (($sort != "id" )? "asc" : "desc"),
            ],
            "perawat" => [
                "sort" => "perawat",
                "order" => ($sort == "perawat" && $order == "desc") ? "asc" : (($sort != "perawat" )? "asc" : "desc"),
            ],
            "tanggal" => [
                "sort" => "tanggal",
                "order" => ($sort == "tanggal" && $order == "desc") ? "asc" : (($sort != "tanggal" )? "asc" : "desc"),
            ],
            "status" => [
                "sort" => "status",
                "order" => ($sort == "status" && $order == "desc") ? "asc" : (($sort != "status" )? "asc" : "desc"),
            ],
        ];

        return view('pasien.janjitemuperawat',compact('janji_rawat', 'sort_link', "sort_status"));
    }

    public function indexDetailJanji(Request $req)
    {
        # code...
        return view('pasien.detailJanjiTemu');
    }
    public function indexDetailObat(Request $req)
    {
        $obat = Obat::find($req->id);
        return view('pasien.detailObat',compact("obat"));
    }
    public function indexKeranjang(Request $req)
    {
        # code...
        return view('pasien.keranjang');
    }
    public function indexObat(Request $req)
    {
        $page = $req->page;
        $filter = $req->filter;
        $search = $req->search;
        if ($req->filter==null){
            $obat = Obat::limit(8)->offset(8*($req->page-1))->get();
            $total = DB::select("select count(*) as ctr from obat ")[0];
        }else{
            if ($req->filter=="alfasc") {
                $fil = "ob_nama";
                $sort = "asc";
            }else if ($req->filter=="alfdesc") {
                $fil = "ob_nama";
                $sort = "desc";
            }else if ($req->filter=="harasc") {
                $fil = "ob_harga";
                $sort = "asc";
            }else if ($req->filter=="hardesc") {
                $fil = "ob_harga";
                $sort = "desc";
            }
            $total = DB::select("select count(*) as ctr from obat where ob_nama like '%".$req->search."%'")[0];
            if ($page>($total->ctr)/8) {
                $page = 1;
            }
            $obat = Obat::where("ob_nama",'like','%'.$req->search.'%')->orderBy($fil,$sort)->limit(8)->offset(8*($req->page-1))->get();
        }
        return view('pasien.obat',compact('obat','total','page','search','filter'));
    }

    public function indexKonsultasi(Request $req)
    {
        # code...
        return view('pasien.konsultasi');
    }

    public function indexBeliObat(Request $req){
        $keranjang = array();
        if (Session::has("keranjang")) {
            $keranjang = Session::get("keranjang");
        }
        $ada = false;
        foreach ($keranjang as $key => $value) {
            if ($value["ob_id"]==$req->id) {
                $ada = true;
                $keranjang[$key]["ob_stok"] += $req->stok;
            }
        }
        if (!$ada){
            array_push($keranjang,["ob_id"=>$req->id, "ob_stok"=>$req->stok]);
        }
        Session::put("keranjang",$keranjang);
        Session::put("msg","Berhasil Memasukan Ke Keranjang");
        return back();
    }
}
