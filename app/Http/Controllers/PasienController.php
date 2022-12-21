<?php

namespace App\Http\Controllers;

use App\Mail\TransaksiMail;
use App\Models\Chat;
use App\Models\DjualObat;
use App\Models\Dokter;
use App\Models\HjualObat;
use App\Models\JanjiTemu;
use App\Models\JanjiRawat;
use App\Models\Konsultasi;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PasienController extends Controller
{
    //
    public function indexHome(Request $req)
    {
        # code...
        $dokter = Dokter::inRandomOrder()->limit(9)->get();
        $obat = Obat::inRandomOrder()->limit(9)->get();
        $pasien = Pasien::where('ps_email', Session::get('active')['email'])->first();
        $konsultasi = Konsultasi::where('ps_id', $pasien->ps_id)->orderBy('ks_id', 'desc')->get();
        $hjual_obat = HjualObat::where('ps_id', $pasien->ps_id)->orderBy("ho_id", 'desc')->get();
        return view('pasien.home', compact('dokter', 'obat', 'konsultasi', 'hjual_obat'));
    }

    public function indexRiwayattemu(Request $req)
    {
        if ($req->query("order") && !$req->query("sort")) {
            return redirect()->route('pasien.historitemu');
        }

        $user = Pasien::where("ps_email", Session::get("active")["email"])->first();

        $sort_key = [
            "id" => "jt_id",
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
            ->join('dokter', 'janji_temu.dk_id', '=', 'dokter.dk_id')
            ->select(['jt_id', 'dk_nama', 'dk_telp', 'jt_tanggal', 'janji_temu.created_at', 'janji_temu.updated_at', 'janji_temu.deleted_at']);

        $janji_temu = $janji_temu->orderBy($sort_key[$sort], $order)->get();

        $sort_link = [
            "id" => [
                "sort" => "id",
                "order" => ($sort == "id" && $order == "desc") ? "asc" : (($sort != "id") ? "asc" : "desc"),
            ],
            "dokter" => [
                "sort" => "dokter",
                "order" => ($sort == "dokter" && $order == "desc") ? "asc" : (($sort != "dokter") ? "asc" : "desc"),
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
        return view('pasien.historitemu', compact('janji_temu', 'sort_link', "sort_status"));
    }

    public function indexRiwayatobat(Request $req)
    {
        $user = Pasien::where("ps_email", Session::get("active")["email"])->first();

        $hjual_obat = HjualObat::where("ps_id", $user->ps_id)->get();

        return view('pasien.historiobat', compact('hjual_obat'));
    }

    public function indexRiwayatPerawat(Request $req)
    {
        if ($req->query("order") && !$req->query("sort")) {
            return redirect()->route('pasien.historitemu');
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

        $janji_rawat = JanjiRawat::onlyTrashed()
            ->where("ps_id", $user->ps_id)
            ->join('perawat', 'janji_rawat.pr_id', '=', 'perawat.pr_id')
            ->select(['jr_id', 'pr_nama', 'pr_telp', 'jr_tanggal', 'janji_rawat.created_at', 'janji_rawat.updated_at', 'janji_rawat.deleted_at']);

        $janji_rawat = $janji_rawat->orderBy($sort_key[$sort], $order)->get();

        $sort_link = [
            "id" => [
                "sort" => "id",
                "order" => ($sort == "id" && $order == "desc") ? "asc" : (($sort != "id") ? "asc" : "desc"),
            ],
            "perawat" => [
                "sort" => "perawat",
                "order" => ($sort == "perawat" && $order == "desc") ? "asc" : (($sort != "perawat") ? "asc" : "desc"),
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
        return view('pasien.historiperawat', compact('janji_rawat', 'sort_link', "sort_status"));
    }

    public function indexJanji(Request $req)
    {
        if ($req->query("order") && !$req->query("sort")) {
            return redirect()->route('pasien.janji');
        }

        $user = Pasien::where("ps_email", Session::get("active")["email"])->first();

        $sort_key = [
            "id" => "jt_id",
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

        $janji_temu = JanjiTemu::where("ps_id", $user->ps_id)
            ->join('dokter', 'janji_temu.dk_id', '=', 'dokter.dk_id')
            ->select(['jt_id', 'dk_nama', 'dk_telp', 'jt_tanggal', 'janji_temu.created_at', 'janji_temu.updated_at', 'janji_temu.deleted_at']);

        $janji_temu = $janji_temu->orderBy($sort_key[$sort], $order)->get();

        $sort_link = [
            "id" => [
                "sort" => "id",
                "order" => ($sort == "id" && $order == "desc") ? "asc" : (($sort != "id") ? "asc" : "desc"),
            ],
            "dokter" => [
                "sort" => "dokter",
                "order" => ($sort == "dokter" && $order == "desc") ? "asc" : (($sort != "dokter") ? "asc" : "desc"),
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

        return view('pasien.JanjiTemu', compact('janji_temu', 'sort_link', "sort_status"));
    }

    public function indexJanjiPerawat(Request $req)
    {
        if ($req->query("order") && !$req->query("sort")) {
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

        $janji_rawat = JanjiRawat::where("ps_id", $user->ps_id)
            ->join('perawat', 'janji_rawat.pr_id', '=', 'perawat.pr_id')
            ->select(['jr_id', 'pr_nama', 'pr_telp', 'jr_tanggal', 'janji_rawat.created_at', 'janji_rawat.updated_at', 'janji_rawat.deleted_at']);

        $janji_rawat = $janji_rawat->orderBy($sort_key[$sort], $order)->get();

        $sort_link = [
            "id" => [
                "sort" => "id",
                "order" => ($sort == "id" && $order == "desc") ? "asc" : (($sort != "id") ? "asc" : "desc"),
            ],
            "perawat" => [
                "sort" => "perawat",
                "order" => ($sort == "perawat" && $order == "desc") ? "asc" : (($sort != "perawat") ? "asc" : "desc"),
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

        return view('pasien.janjitemuperawat', compact('janji_rawat', 'sort_link', "sort_status"));
    }

    public function indexDetailJanji(Request $req)
    {
        # code...
        return view('pasien.detailJanjiTemu');
    }
    public function indexDetailObat(Request $req)
    {
        $obat = Obat::find($req->id);
        return view('pasien.detailObat', compact("obat"));
    }

    public function indexKeranjang(Request $req)
    {
        $keranjang = array();
        $qty = array();
        $total = 0;
        $snapToken = null;
        $user = Pasien::where("ps_email", Session::get("active")["email"])->first();

        if (Session::has("keranjang")) {
            \Midtrans\Config::$serverKey = 'SB-Mid-server-LgeD2CDZdUd7ylEVlREoqyZ5';
            \Midtrans\Config::$isProduction = false;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $item_details = array();
            foreach (Session::get("keranjang") as $key => $value) {
                $new = Obat::find($value["ob_id"]);
                array_push($keranjang, $new);
                array_push($qty, $value["ob_stok"]);
                array_push($item_details, ['id' => $new->ob_id, 'price' => $new->ob_harga, 'quantity' => $qty[$key], 'name' => $new->ob_nama]);
                $total += ($value["ob_stok"] * $new->ob_harga);
            }

            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => $total,
                ),
                'item_details' => $item_details,
                'customer_details' => array(
                    'first_name' => $user->ps_nama,
                    'email' => $user->ps_email,
                    'phone' => $user->ps_telp,
                ),
            );
            $snapToken = \Midtrans\Snap::getSnapToken($params);
        }



        return view('pasien.keranjang', compact('keranjang', 'qty', 'total', 'snapToken'));
    }

    public function indexObat(Request $req)
    {
        $page = $req->page;
        $filter = $req->filter;
        $search = $req->search;
        if ($req->filter == null) {
            $obat = Obat::limit(8)->offset(8 * ($req->page - 1))->get();
            $total = DB::select("select count(*) as ctr from obat ")[0];
        } else {
            if ($req->filter == "alfasc") {
                $fil = "ob_nama";
                $sort = "asc";
            } else if ($req->filter == "alfdesc") {
                $fil = "ob_nama";
                $sort = "desc";
            } else if ($req->filter == "harasc") {
                $fil = "ob_harga";
                $sort = "asc";
            } else if ($req->filter == "hardesc") {
                $fil = "ob_harga";
                $sort = "desc";
            }
            $total = DB::select("select count(*) as ctr from obat where ob_nama like '%" . $req->search . "%'")[0];
            if ($page > ($total->ctr) / 8) {
                $page = 1;
            }
            $obat = Obat::where("ob_nama", 'like', '%' . $req->search . '%')->orderBy($fil, $sort)->limit(8)->offset(8 * ($req->page - 1))->get();
        }
        return view('pasien.obat', compact('obat', 'total', 'page', 'search', 'filter'));
    }

    public function indexKonsultasi(Request $req, String $konsultasi_id = null)
    {
        $user = Pasien::where("ps_email", Session::get("active")["email"])->first();
        $konsultasi = Konsultasi::where("ps_id", $user->ps_id)->get();

        return view('pasien.konsultasi',compact('konsultasi', 'konsultasi_id'));
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

    public function indexBeliObat(Request $req)
    {
        $keranjang = array();
        if (Session::has("keranjang")) {
            $keranjang = Session::get("keranjang");
        }
        $ada = false;
        foreach ($keranjang as $key => $value) {
            if ($value["ob_id"] == $req->id) {
                $ada = true;
                $keranjang[$key]["ob_stok"] += $req->stok;
            }
        }
        if (!$ada) {
            array_push($keranjang, ["ob_id" => $req->id, "ob_stok" => $req->stok]);
        }
        Session::put("keranjang", $keranjang);
        Session::put("msg", "Berhasil Memasukan Ke Keranjang");
        return back();
    }

    public function deleteKeranjang(Request $req)
    {
        $keranjang = Session::get("keranjang");
        unset($keranjang[$req->key]);
        if (count($keranjang)==0) {
           Session::forget("keranjang");
        }else{
            Session::put("keranjang", $keranjang);
        }

        return back();
    }

    public function updateKeranjang(Request $req)
    {
        $keranjang = Session::get("keranjang");
        $keranjang[$req->key]["ob_stok"] = $req->jml;
        Session::put("keranjang", $keranjang);
        return back();
    }

    public function postKeranjang(Request $req)
    {
        $json = json_decode($req->get('json'));
        $user = Pasien::where("ps_email", Session::get("active")["email"])->first();

        $hjual = new HjualObat();
        $hjual->ps_id = $user->ps_id;
        $hjual->ho_status = $json->transaction_status;
        $hjual->ho_orderId = $json->order_id;
        $hjual->ho_grossAmount = $json->gross_amount;
        $hjual->ho_paymentType = $json->payment_type;
        $hjual->ho_paymentCode = isset($json->payment_code) ? $json->payment_code : null;
        $hjual->ho_pdfUrl = isset($json->pdf_url) ? $json->pdf_url : null;
        $hjual->save();

        $hoId = HjualObat::orderBy("ho_id","desc")->first();

        foreach (Session::get("keranjang") as $key => $value) {
            $djual = new DjualObat();
            $djual->do_stok = $value["ob_stok"];
            $djual->ob_id = $value["ob_id"];
            $djual->do_total = (Obat::find($value["ob_id"])->ob_harga * $value["ob_stok"]);
            $djual->ho_id = $hoId->ho_id;
            $djual->save();
        }

        Session::remove("keranjang");
        Session::put("msg", "Transaksi Berhasil Dibuat");

        $transaksi = DjualObat::where("ho_id",$hoId->ho_id)->get();
        Mail::to($user->ps_email)->send(new TransaksiMail($user,$transaksi,$hoId));
        return back();
    }


}
