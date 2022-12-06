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

Route::prefix('login')->controller(AuthController::class)->group(function ()
{
    Route::get('/pasien', 'indexPasien')->name('login.indexpasien')->middleware('cek.login:auth');
    Route::post('/pasien', 'loginPasien')->name('login.pasien')->middleware('cek.login:auth');

    Route::get('/perawat', 'indexPerawat')->name('login.indexperawat')->middleware('cek.login:auth');
    Route::post('/perawat', 'loginPerawat')->name('login.perawat')->middleware('cek.login:auth');

    Route::get('/dokter', 'indexDokter')->name('login.indexdokter')->middleware('cek.login:auth');
    Route::post('/dokter', 'loginDokter')->name('login.dokter')->middleware('cek.login:auth');

    Route::get('/admin', 'indexAdmin')->name('login.indexadmin')->middleware('cek.login:auth');
    Route::post('/admin', 'loginAdmin')->name('login.admin')->middleware('cek.login:auth');
});

Route::prefix('register')->controller(AuthController::class)->group(function ()
{
    Route::get('/pasien', 'formPasien')->name('register.indexpasien')->middleware('cek.login:auth');
    Route::post('/pasien', 'registerPasien')->name('register.pasien')->middleware('cek.login:auth');

    Route::get('/perawat', 'formPerawat')->name('register.indexperawat')->middleware('cek.login:auth');
    Route::post('/perawat', 'registerPerawat')->name('register.perawat')->middleware('cek.login:auth');

    Route::get('/dokter', 'formDokter')->name('register.indexdokter')->middleware('cek.login:auth');
    Route::post('/dokter', 'registerDokter')->name('register.dokter')->middleware('cek.login:auth');
});

//pasien
Route::prefix('pasien')->controller(PasienController::class)->group(function(){
    Route::get('/', 'indexHome')->name('pasien.home')->middleware('cek.login:pasien');

    Route::get('/janji', 'indexJanji')->name('pasien.janji')->middleware('cek.login:pasien');

    Route::get('/detailjanji', 'indexDetailJanji')->name('pasien.detailjanji')->middleware('cek.login:pasien');

    Route::get('/detailobat', 'indexDetailObat')->name('pasien.detailobat')->middleware('cek.login:pasien');

    Route::get('/keranjang', 'indexKeranjang')->name('pasien.keranjang')->middleware('cek.login:pasien');

    Route::get('/historitemu', 'indexRiwayattemu')->name('pasien.historitemu')->middleware('cek.login:pasien');

    Route::get('/historiobat', 'indexRiwayatobat')->name('pasien.historiobat')->middleware('cek.login:pasien');

    Route::get('/konsultasi', 'indexKonsultasi')->name('pasien.dokter')->middleware('cek.login:pasien');

    Route::get('/obat/{page}', 'indexObat')->name('pasien.obat')->middleware('cek.login:pasien');

    Route::get('/perawat','index')->name('pasien.perawat')->middleware('cek.login:pasien');
});

//perawat
Route::prefix('perawat')->controller(PerawatController::class)->group(function(){
    Route::get('/', 'indexHome')->name('perawat.home')->middleware('cek.login:perawat');

    Route::get('/janji', 'indexJanji')->name('perawat.janji')->middleware('cek.login:perawat');

    Route::get('/konsultasi', 'indexKonsultasi')->name('perawat.konsultasi')->middleware('cek.login:perawat');

    Route::get('/riwayat', 'indexRiwayat')->name('perawat.riwayat')->middleware('cek.login:perawat');
});

//dokter
Route::prefix('dokter')->controller(DokterController::class)->group(function(){
    Route::get('/', 'indexHome')->name('dokter.home');

    Route::get('/janji', 'indexJanji')->name('dokter.janji');

    Route::get('/konsultasi', 'indexKonsultasi')->name('dokter.konsultasi');

    Route::get('/riwayat', 'indexRiwayat')->name('dokter.riwayat');
});

//admin
Route::prefix('admin')->controller(AdminController::class)->group(function(){
    Route::get('/', 'home')->name('admin.home')->middleware('cek.login:admin');
    Route::get('/pasien', 'pasien')->name('admin.pasien')->middleware('cek.login:admin');
    Route::get('/rumahsakit', 'rumahsakit')->name('admin.rumahsakit')->middleware('cek.login:admin');
    Route::get('/dokter', 'dokter')->name('admin.dokter')->middleware('cek.login:admin');
    Route::get('/obat', 'obat')->name('admin.obat')->middleware('cek.login:admin');
    Route::get('/perawat','perawat')->name('admin.perawat')->middleware('cek.login:admin');

    //ROUTE CREATE
    Route::post('/addpasien','addpasien')->name('admin.addpasien')->middleware('cek.login:admin');
    Route::post('/addperawat','addperawat')->name('admin.addperawat')->middleware('cek.login:admin');
    Route::post('/addrumahsakit','addrumahsakit')->name('admin.addrumahsakit')->middleware('cek.login:admin');
    Route::post('/adddokter', 'adddokter')->name('admin.adddokter')->middleware('cek.login:admin');

    //ROUTE DELETE
    Route::get('/deletepasien/{ps_id}','deletepasien')->name('admin.deletepasien')->middleware('cek.login:admin');
    Route::get('/deleterumahsakit/{rs_id}','deleterumahsakit')->name('admin.deleterumahsakit')->middleware('cek.login:admin');
    Route::get('/deletedokter/{dk_id}','deletedokter')->name('admin.deletedokter')->middleware('cek.login:admin');
    Route::get('/deleteperawat/{pr_id}','deleteperawat')->name('admin.deleteperawat')->middleware('cek.login:admin');
    Route::get('/deleteobat/{ob_id}','deleteobat')->name('admin.deleteobat')->middleware('cek.login:admin');
});


Route::get('logout', function () {
    Session::remove('active');
    Auth::guard('pasien')->logout();
    Auth::guard('dokter')->logout();
    Auth::guard('perawat')->logout();
    Auth::guard('admin')->logout();
    return redirect()->route('welcome');
})->name('logout');


