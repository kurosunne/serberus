<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\RumahSakit;
use App\Models\Perawat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function home(){
        return view('admin.homeadmin');
    }
    public function perawat()
    {
        $perawat = Perawat::all();
        $perawat = Perawat::withTrashed()->get();

        return view('admin.listperawat', compact('perawat'));
    }
    public function pasien(){
        $pasien = Pasien::all();
        $pasien = Pasien::withTrashed()->get();

        return view('admin.listpasien', compact('pasien'));
    }
    public function rumahsakit(){
        $rumahsakit = RumahSakit::all();
        $rumahsakit = RumahSakit::withTrashed()->get();

        return view('admin.listrumahsakit', compact('rumahsakit'));
    }
    public function dokter(){
        $dokter = Dokter::all();
        $dokter = Dokter::withTrashed()->get();

        return view('admin.listdokter', compact('dokter'));
    }
    public function obat(){
        $obat = Obat::all();
        $obat = Obat::withTrashed()->get();

        return view('admin.listobat', compact('obat'));
    }

    //SEARCH FUNCTION


    //ADD FUNCTION
    public function addpasien(Request $req)
    {
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
        $rs = new RumahSakit;
        $rs->rs_nama = $req->createnamarumahsakit;
        $rs->rs_telp = $req->createteleponrumahsakit;
        $rs->rs_alamat = $req->createalamatrumahsakit;
        $rs->save();

        return redirect()->route('admin.rumahsakit');
    }

    public function adddokter(Request $req)
    {
        $dk = new Dokter;
        $dk->dk_nama = $req->createnamadokter;
        $dk->dk_telp = $req->createtelepondokter;
        $dk->dk_email = $req->createemaildokter;
        $dk->dk_password=Hash::make($req->createpassworddokter);
        //TAK KASIK 1 DULU BUAT TESTING DULU
        $dk->rs_id='1';
        $dk->sp_id= $req->createspesialisdokter;
        $dk->save();

        return redirect()->route('admin.dokter');
    }

    public function addperawat(Request $req)
    {
        $pr = new Perawat;
        $pr->pr_nama = $req->createnamaperawat;
        $pr->pr_telp = $req->createteleponperawat;
        $pr->pr_email = $req->createemailperawat;
        $pr->pr_password= Hash::make($req->createpasswordperawat);
        $pr->rs_id='1';
        $pr->save();

        return redirect()->route('admin.perawat');
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
            $res=$dokter->restore();
        }
        else{
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

}
