<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PerawatController;
use App\Http\Controllers\DokterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login.indexpasien');
})->name('welcome');

Route::prefix('login')->controller(AuthController::class)->middleware('cek.login:auth')->group(function ()
{
    Route::get('/pasien', 'indexPasien')->name('login.indexpasien');
    Route::post('/pasien', 'loginPasien')->name('login.pasien');
    Route::get('/perawat', 'indexPerawat')->name('login.indexperawat');
    Route::post('/perawat', 'loginPerawat')->name('login.perawat');
    Route::get('/dokter', 'indexDokter')->name('login.indexdokter');
    Route::post('/dokter', 'loginDokter')->name('login.dokter');
    Route::get('/admin', 'indexAdmin')->name('login.indexadmin');
    Route::post('/admin', 'loginAdmin')->name('login.admin');
});

Route::prefix('register')->controller(AuthController::class)->middleware('cek.login:auth')->group(function ()
{
    Route::get('/pasien', 'formPasien')->name('register.indexpasien');
    Route::post('/pasien', 'registerPasien')->name('register.pasien');
    Route::get('/perawat', 'formPerawat')->name('register.indexperawat');
    Route::post('/perawat', 'registerPerawat')->name('register.perawat');
    Route::get('/dokter', 'formDokter')->name('register.indexdokter');
    Route::post('/dokter', 'registerDokter')->name('register.dokter');
});

//pasien
Route::prefix('pasien')->controller(PasienController::class)->middleware('cek.login:pasien')->group(function(){
    Route::get('/', 'indexHome')->name('pasien.home');

    Route::get('/janjitemu', 'indexJanji')->name('pasien.janji');
    Route::post('/janjitemu/{dokter_id}', 'createJanji')->name('pasien.createJanji');
    Route::get('/janjitemu/detail', 'indexDetailJanji')->name('pasien.detailjanji');
    Route::get('/janjirawat','indexJanjiPerawat')->name('pasien.janjiperawat');
    Route::post('/janjirawat/{perawat_id}','createJanjiRawat')->name('pasien.createJanjiRawat');

    Route::get('/obat/detail/{id}', 'indexDetailObat')->name('pasien.detailobat');
    Route::post('/obat/beli/{id}', 'indexBeliObat')->name('pasien.beliobat');
    Route::get('/obat/{page}', 'indexObat')->name('pasien.obat');

    Route::get('/keranjang', 'indexKeranjang')->name('pasien.keranjang');
    Route::post('/keranjang', 'postKeranjang')->name('pasien.postKeranjang');
    Route::get('/keranjang/delete/{key}', 'deleteKeranjang')->name('pasien.deleteKeranjang');
    Route::post('/keranjang/update/{key}', 'updateKeranjang')->name('pasien.updateKeranjang');
    Route::post('/keranjang/bayar', 'updateKeranjang')->name('pasien.updateKeranjang');

    Route::get('/konsultasi/{konsultasi_id?}', 'indexKonsultasi')->name('pasien.konsultasi');
    Route::get('/konsultasi/create/{dokter_id}', 'createKonsultasi')->name('pasien.createKonsultasi');
    Route::get('/konsultasi/{konsultasi_id?}/chat', 'chatKonsultasi')->name('pasien.chat');
    Route::post('/konsultasi/{konsultasi_id}/send', 'sendChatKonsultasi')->name('pasien.send');

    Route::get('/history/janjitemu', 'indexRiwayattemu')->name('pasien.historitemu');
    Route::get('/histori/obat', 'indexRiwayatobat')->name('pasien.historiobat');
    Route::get('/histori/janjitemuperawat', 'indexRiwayatPerawat')->name('pasien.historiperawat');

    Route::get('/konsultasi', 'indexKonsultasi')->name('pasien.dokter');

    Route::get('/perawat','index')->name('pasien.perawat'); //??
});

//perawat
Route::prefix('perawat')->controller(PerawatController::class)->middleware('cek.login:perawat')->group(function(){
    Route::get('/', 'indexHome')->name('perawat.home');

    Route::get('/janji', 'indexJanji')->name('perawat.janji');

    Route::get('/konsultasi', 'indexKonsultasi')->name('perawat.konsultasi');

    Route::get('/janji/{jr_id}/delete', 'deleterawat')->name('perawat.deleterawat');

    Route::get('/riwayat', 'indexRiwayat')->name('perawat.riwayat');
});

//dokter
Route::prefix('dokter')->controller(DokterController::class)->middleware('cek.login:dokter')->group(function(){
    Route::get('/', 'indexHome')->name('dokter.home');

    Route::get('/janji', 'indexJanji')->name('dokter.janji');

    Route::get('/konsultasi/{konsultasi_id?}', 'indexKonsultasi')->name('dokter.konsultasi');
    Route::get('/konsultasi/{konsultasi_id?}/chat', 'chatKonsultasi')->name('dokter.chat');
    Route::post('/konsultasi/{konsultasi_id}/send', 'sendChatKonsultasi')->name('dokter.send');
    Route::post('/konsultasi/{konsultasi_id}/resep', 'buatResepObatKonsultasi')->name('dokter.resep');
    Route::get("/konsultasi/{konsultasi_id}/resep/list", "getListResepObat")->name('dokter.listresep');
    Route::get("/konsultasi/{konsultasi_id}/resep/status", "getStatusResepObat")->name('dokter.statusresep');
    Route::get("/konsultasi/{konsultasi_id}/delete", "deleteKonsultasi")->name('dokter.delete');

    Route::get('/obat', 'getObat')->name('dokter.obat');
    Route::get('/resep/{konsultasi_id}', 'detailResep')->name('dokter.detailResep');

    Route::get('/janji/{jt_id}/delete', 'deletejanji')->name('dokter.deleteJanji');
    Route::get('/riwayat', 'indexRiwayat')->name('dokter.riwayat');
});

//admin
Route::prefix('admin')->controller(AdminController::class)->middleware('cek.login:admin')->group(function(){
    Route::get('/', 'home')->name('admin.home');
    Route::get('/pasien/{editId?}', 'pasien')->name('admin.pasien');
    Route::get('/rumahsakit/{editId?}', 'rumahsakit')->name('admin.rumahsakit');
    Route::get('/dokter/{editId?}', 'dokter')->name('admin.dokter');
    Route::get('/obat/{editId?}', 'obat')->name('admin.obat');
    Route::get('/perawat/{editId?}','perawat')->name('admin.perawat');

    //ROUTE CREATE
    Route::post('/pasien','addpasien')->name('admin.addpasien');
    Route::post('/perawat','addperawat')->name('admin.addperawat');
    Route::post('/rumahsakit','addrumahsakit')->name('admin.addrumahsakit');
    Route::post('/dokter', 'adddokter')->name('admin.adddokter');
    Route::post('/obat', 'addobat')->name('admin.addobat');

    //ROUTE DELETE
    Route::get('/pasien/{ps_id}/delete','deletepasien')->name('admin.deletepasien');
    Route::get('/rumahsakit/{rs_id}/delete','deleterumahsakit')->name('admin.deleterumahsakit');
    Route::get('/dokter/{dk_id}/delete','deletedokter')->name('admin.deletedokter');
    Route::get('/perawat/{pr_id}/delete','deleteperawat')->name('admin.deleteperawat');
    Route::get('/obat/{ob_id}/delete','deleteobat')->name('admin.deleteobat');

    //ROUTE EDIT
    Route::post('/rumahsakit/edit', 'editrumahsakit')->name('admin.editrumahsakit');
    Route::post('/pasien/edit', 'editpasien')->name('admin.editpasien');
    Route::post('/perawat/edit', 'editperawat')->name('admin.editperawat');
    Route::post('/dokter/edit', 'editdokter')->name('admin.editdokter');
    Route::post('/obat/edit', 'editobat')->name('admin.editobat');

    Route::get('/getsip/{id}', 'getsip')->name('admin.getsip');
});


Route::get('logout', function () {
    Session::remove('active');
    Session::remove('keranjang');
    Auth::guard('pasien')->logout();
    Auth::guard('dokter')->logout();
    Auth::guard('perawat')->logout();
    Auth::guard('admin')->logout();
    return redirect()->route('welcome');
})->name('logout');


