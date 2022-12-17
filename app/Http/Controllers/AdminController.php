<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\RumahSakit;
use App\Models\Perawat;
use App\Models\Spesialis;
use App\Models\TipeObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function home(){
        return view('admin.homeadmin');
    }
    public function perawat(Request $req)
    {
        $perawat = Perawat::withTrashed()->get();
        $perawatEdit = null;
        $rumahSakit = RumahSakit::all();

        if ($req->searchperawat!=null){
            $perawat = Perawat::withTrashed()->where("pr_nama","like","%".$req->searchperawat."%")->get();
        }

        if ($req->editId==null){
            $editId = -1;
        }else{
            $editId = $req->editId;
            $perawatEdit = Perawat::withTrashed()->find($editId);
        }

        return view('admin.listperawat', compact('perawat','editId','perawatEdit','rumahSakit'));
    }

    public function pasien(Request $req){
        $pasien = Pasien::withTrashed()->get();
        $pasienEdit = null;

        if ($req->searchpasien!=null){
            $pasien = Pasien::withTrashed()->where("ps_nama","like","%".$req->searchpasien."%")->get();
        }

        if ($req->editId==null){
            $editId = -1;
        }else{
            $editId = $req->editId;
            $pasienEdit = Pasien::withTrashed()->find($editId);
        }

        return view('admin.listpasien', compact('pasien','editId','pasienEdit'));
    }
    public function rumahsakit(Request $req){
        $rumahsakit = RumahSakit::withTrashed()->get();
        $rumahSakitEdit = null;

        if ($req->searchrumahsakit!=null){
            $rumahsakit = RumahSakit::withTrashed()->where("rs_nama","like","%".$req->searchrumahsakit."%")->get();
        }

        if ($req->editId==null){
            $editId = -1;
        }else{
            $editId = $req->editId;
            $rumahSakitEdit = RumahSakit::withTrashed()->find($editId);
        }

        return view('admin.listrumahsakit', compact('rumahsakit','editId','rumahSakitEdit'));
    }
    public function dokter(Request $req){
        $dokter = Dokter::withTrashed()->get();
        $dokterEdit = null;
        $rumahSakit = RumahSakit::all();
        $spesialis = Spesialis::all();

        if ($req->searchdokter!=null){
            $dokter = Dokter::withTrashed()->where("dk_nama","like","%".$req->searchdokter."%")->get();
        }

        if ($req->editId==null){
            $editId = -1;
        }else{
            $editId = $req->editId;
            $dokterEdit = Dokter::withTrashed()->find($editId);
        }

        return view('admin.listdokter', compact('dokter','editId','dokterEdit','rumahSakit','spesialis'));
    }
    public function obat(Request $req){
        $obat = Obat::withTrashed()->get();
        $obatEdit = null;
        $tipeObat = TipeObat::all();

        if($req->searchobat!=null){
            $obat = Obat::withTrashed()->where("ob_nama","like","%".$req->searchobat."%")->get();
        }

        if($req->editId==null){
            $editId = -1;
        }
        else{
            $editId = $req->editId;
            $obatEdit = Obat::withTrashed()->find($editId);
        }

        return view('admin.listobat', compact('obat', 'editId', 'obatEdit', 'tipeObat'));
    }


    //ADD FUNCTION
    public function addpasien(Request $req)
    {
        $req->validate([
            'createnamapasien' => ['required'],
            'createemailpasien' => ['required','email','unique:pasien,ps_email'],
            'createalamatpasien' => ['required'],
            'createteleponpasien' => ['required','digits_between :10,15','numeric','unique:pasien,ps_telp'],
            'createpasswordpasien' => ['required'],
        ],[

        ],[
            'createnamapasien' => "Nama",
            'createteleponpasien' => "Telepon",
            'createalamatpasien' => "Alamat",
            'createpasswordpasien' => "Password",
            'createemailpasien' => 'Email'
        ]);

        $pasien = new Pasien;
        $pasien->ps_nama = $req->createnamapasien;
        $pasien->ps_alamat = $req->createalamatpasien;
        $pasien->ps_telp = $req->createteleponpasien;
        $pasien->ps_email=$req->createemailpasien;
        $pasien->ps_password=Hash::make($req->createpasswordpasien);
        $pasien->save();

        return redirect()->route('admin.pasien');
    }

    public function addrumahsakit(Request $req)
    {
        $req->validate([
            'createnamarumahsakit' => ['required'],
            'createteleponrumahsakit' => ['required','digits_between :10,15','numeric','unique:rumah_sakit,rs_telp'],
            'createalamatrumahsakit' => ['required'],
        ],[

        ],[
            'createnamarumahsakit' => "Nama",
            'createteleponrumahsakit' => "Telepon",
            'createalamatrumahsakit' => "Alamat",
        ]);

        $rs = new RumahSakit;
        $rs->rs_nama = $req->createnamarumahsakit;
        $rs->rs_telp = $req->createteleponrumahsakit;
        $rs->rs_alamat = $req->createalamatrumahsakit;
        $rs->save();

        return redirect()->route('admin.rumahsakit');
    }

    public function adddokter(Request $req)
    {
        $req->validate([
            'createnamadokter' => ['required'],
            'createemaildokter' => ['required','email','unique:dokter,dk_email'],
            'createtelepondokter' => ['required','digits_between :10,15','numeric','unique:dokter,dk_telp'],
            'createpasswordokter' => ['required'],
            'createsipdokter' => ['required','mimes:png,jpg,jpeg','max:2048']
        ],[

        ],[
            'createnamadokter' => "Nama",
            'createtelepondokter' => "Telepon",
            'createpassworddokter' => "Password",
            'createemaildokter' => 'Email',
            'createsipdokter' => 'Surat Ijin Praktek'
        ]);


        $dk = new Dokter;
        $dk->dk_nama = $req->createnamadokter;
        $dk->dk_telp = $req->createtelepondokter;
        $dk->dk_email = $req->createemaildokter;
        $dk->dk_password=Hash::make($req->createpasswordokter);
        $dk->rs_id=$req->createrumahsakitdokter;
        $dk->sp_id= $req->createspesialisdokter;
        $dk->dk_status = 1;
        $dk->save();

        $dkId = Dokter::where("dk_email",$req->createemaildokter)->first()->dk_id;

        $req->file("createsipdokter")->storeAs("sip",$dkId.".png",'local');

        return redirect()->route('admin.dokter');
    }

    public function addperawat(Request $req)
    {

        $req->validate([
            'createnamaperawat' => ['required'],
            'createemailperawat' => ['required','email','unique:perawat,pr_email'],
            'createteleponperawat' => ['required','digits_between :10,15','numeric','unique:perawat,pr_telp'],
            'createpasswordperawat' => ['required'],
        ],[

        ],[
            'createnamaperawat' => "Nama",
            'createteleponperawat' => "Telepon",
            'createpasswordperawat' => "Password",
            'createemailperawat' => 'Email'
        ]);

        $pr = new Perawat;
        $pr->pr_nama = $req->createnamaperawat;
        $pr->pr_telp = $req->createteleponperawat;
        $pr->pr_email = $req->createemailperawat;
        $pr->pr_password= Hash::make($req->createpasswordperawat);
        $pr->rs_id= $req->createrumahsakitperawat;
        $pr->save();

        return redirect()->route('admin.perawat');
    }

    public function addobat(Request $req)
    {
        $req->validate([
            'createnamaobat' => ['required'],
            'createhargaobat' => ['required','numeric'],
            'createstokobat' => ['required','numeric'],
            'createjumlahobat' => ['numeric','nullable'],
            'creategambarobat' => ['required','mimes:png,jpg,jpeg','max:2048'],
            'createdeskripsiobat' => ['required'],
            'createsatuanobat' =>['nullable']
        ],[

        ],[
            'createnamaobat' => "Nama",
            'createhargaobat' => "Harga",
            'createjumlahobat' => "Jumlah",
            'createstokobat' => "Stok",
            'creategambarobat' => "Gambar",
            'createdeskripsiobat' => "Deskripsi",
            'createsatuanobat' => "Satuan"
        ]);

        $obat = new Obat;
        $obat->ob_nama = $req->createnamaobat;
        $obat->ob_harga = $req->createhargaobat;
        $obat->ob_kandunganVal = $req->createjumlahobat;
        $obat->ob_stok = $req->createstokobat;
        $obat->ob_deskripsi = $req->createdeskripsiobat;
        $obat->ob_kandunganSatuan = $req->createsatuanobat;
        $obat->to_id = $req->createtipeobat;
        $obat->save();

        $obatId = Obat::limit(1)->latest('ob_id')->first()->ob_id;
        $req->file("creategambarobat")->storeAs("obat",$obatId.".png",'public');

        return redirect()->route('admin.obat');
    }

    //SOFTDELETE FUNCTION
    public function deletepasien(Request $req)
    {
        $pasien=Pasien::withTrashed()->find($req->ps_id);

        if($pasien->trashed()){
            $res=$pasien->restore();
        }
        else{
            $res=$pasien->delete();
        }

        if($res){
            return redirect()->route('admin.pasien')->with('pesanSukses', 'Data telah dihapus!');
        }
        else{
            return redirect()->route('admin.pasien')->with('pesanGagal', 'Data gagal dihapus!');
        }
    }

    public function deleterumahsakit(Request $req)
    {
        $rumahsakit=RumahSakit::withTrashed()->find($req->rs_id);

        if($rumahsakit->trashed()){
            $res=$rumahsakit->restore();
        }
        else{
            $res=$rumahsakit->delete();
        }

        if($res){
            return redirect()->route('admin.rumahsakit')->with('pesanSukses', 'Data telah dihapus!');
        }
        else{
            return redirect()->route('admin.rumahsakit')->with('pesanGagal', 'Data gagal dihapus!');
        }
    }

    public function deletedokter(Request $req)
    {
        $dokter = Dokter::withTrashed()->find($req->dk_id);

        if($dokter->trashed()){
            $dokter->dk_status = 1;
            $dokter->save();
            $res=$dokter->restore();
        }
        else{
            $dokter->dk_status = 2;
            $dokter->save();
            $res=$dokter->delete();
        }

        if($res){
            return redirect()->route('admin.dokter')->with('pesanSukses', 'Data telah dihapus!');
        }
        else{
            return redirect()->route('admin.dokter')->with('pesanGagal', 'Data gagal dihapus!');
        }
    }

    public function deleteperawat(Request $req)
    {
        $perawat = Perawat::withTrashed()->find($req->pr_id);

        if($perawat->trashed()){
            $res=$perawat->restore();
        }
        else{
            $res=$perawat->delete();
        }

        if($res){
            return redirect()->route('admin.perawat')->with('pesanSukses', 'Data telah dihapus!');
        }
        else{
            return redirect()->route('admin.perawat')->with('pesanGagal', 'Data gagal dihapus!');
        }
    }

    public function deleteobat(Request $req)
    {
        $obat = Obat::withTrashed()->find($req->ob_id);

        if($obat->trashed()){
            $res=$obat->restore();
        }
        else{
            $res=$obat->delete();
        }

        if($res){
            return redirect()->route('admin.obat')->with('pesanSukses', 'Data telah dihapus!');
        }
        else{
            return redirect()->route('admin.obat')->with('pesanGagal', 'Data gagal dihapus!');
        }
    }

    //EDIT FUNCTION
    public function editrumahsakit(Request $req)
    {
        $req->validate([
            'createnamarumahsakit' => ['required'],
            'createteleponrumahsakit' => ['required','digits_between :10,15','numeric','unique:rumah_sakit,rs_telp,'.$req->editId.',rs_id'],
            'createalamatrumahsakit' => ['required'],
        ],[

        ],[
            'createnamarumahsakit' => "Nama",
            'createteleponrumahsakit' => "Telepon",
            'createalamatrumahsakit' => "Alamat",
        ]);

        $rs = RumahSakit::find($req->editId);
        $rs->rs_nama = $req->createnamarumahsakit;
        $rs->rs_telp = $req->createteleponrumahsakit;
        $rs->rs_alamat = $req->createalamatrumahsakit;
        $rs->save();

        return redirect()->route('admin.rumahsakit');
    }

    public function editpasien(Request $req)
    {
        $req->validate([
            'createnamapasien' => ['required'],
            'createemailpasien' => ['required','email'],
            'createalamatpasien' => ['required'],
            'createteleponpasien' => ['required','digits_between :10,15','numeric','unique:pasien,ps_telp,'.$req->editId.',ps_id'],
        ],[

        ],[
            'createnamapasien' => "Nama",
            'createteleponpasien' => "Telepon",
            'createalamatpasien' => "Alamat",
            'createpasswordpasien' => "Password",
            'createemailpasien' => 'Email'
        ]);

        $pasien = Pasien::find($req->editId);
        $pasien->ps_nama = $req->createnamapasien;
        $pasien->ps_alamat = $req->createalamatpasien;
        $pasien->ps_telp = $req->createteleponpasien;
        $pasien->ps_email=$req->createemailpasien;
        $pasien->save();

        return redirect()->route('admin.pasien');
    }

    public function editperawat(Request $req)
    {
        $req->validate([
            'createnamaperawat' => ['required'],
            'createemailperawat' => ['required','email','unique:perawat,pr_email,'.$req->editId.',pr_id'],
            'createteleponperawat' => ['required','digits_between :10,15','numeric','unique:perawat,pr_telp,'.$req->editId.',pr_id'],
        ],[

        ],[
            'createnamaperawat' => "Nama",
            'createteleponperawat' => "Telepon",
            'createemailperawat' => 'Email'
        ]);

        $pr = Perawat::find($req->editId);
        $pr->pr_nama = $req->createnamaperawat;
        $pr->pr_telp = $req->createteleponperawat;
        $pr->pr_email = $req->createemailperawat;
        $pr->rs_id= $req->createrumahsakitperawat;
        $pr->save();

        return redirect()->route('admin.perawat');
    }

    public function editdokter(Request $req)
    {
        $req->validate([
            'createnamadokter' => ['required'],
            'createemaildokter' => ['required','email','unique:dokter,dk_email,'.$req->editId.',dk_id'],
            'createtelepondokter' => ['required','digits_between :10,15','numeric','unique:dokter,dk_telp,'.$req->editId.',dk_id'],
        ],[

        ],[
            'createnamadokter' => "Nama",
            'createtelepondokter' => "Telepon",
            'createemaildokter' => 'Email',
        ]);


        $dk = Dokter::find($req->editId);
        $dk->dk_nama = $req->createnamadokter;
        $dk->dk_telp = $req->createtelepondokter;
        $dk->dk_email = $req->createemaildokter;
        $dk->rs_id=$req->createrumahsakitdokter;
        $dk->sp_id= $req->createspesialisdokter;
        $dk->dk_status = $req->createstatusdokter;
        $dk->save();

        return redirect()->route('admin.dokter');
    }

    public function editobat(Request $req)
    {
        $req->validate([
            'createnamaobat' => ['required'],
            'createhargaobat' => ['required','numeric'],
            'createstokobat' => ['required','numeric'],
            'createjumlahobat' => ['nullable','numeric'],
            'createdeskripsiobat' => ['required'],
            'createsatuanobat' =>['nullable']
        ],[

        ],[
            'createnamaobat' => "Nama",
            'createhargaobat' => "Harga",
            'createjumlahobat' => "Jumlah",
            'createstokobat' => "Stok",
            'createdeskripsiobat' => "Deskripsi",
            'createsatuanobat' => "Satuan"
        ]);

        $obat = Obat::find($req->editId);
        $obat->ob_nama = $req->createnamaobat;
        $obat->ob_harga = $req->createhargaobat;
        $obat->ob_kandunganVal = $req->createjumlahobat;
        $obat->ob_stok = $req->createstokobat;
        $obat->ob_deskripsi = $req->createdeskripsiobat;
        $obat->ob_kandunganSatuan = $req->createsatuanobat;
        $obat->to_id = $req->createtipeobat;
        $obat->save();

        $req->file("creategambarobat")->storeAs("obat",$req->editId.".png",'public');

        return redirect()->route('admin.obat');
    }

    public function getsip(Request $req)
    {
        return Storage::disk("local")->download("sip/".$req->id.".png");
    }
}
