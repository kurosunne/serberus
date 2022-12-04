<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasienController;
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
    Route::get('/pasien', 'indexPasien')->name('login.indexpasien');
    Route::post('/pasien', 'loginPasien')->name('login.pasien');

    Route::get('/perawat', 'indexPerawat')->name('login.indexperawat');
    Route::post('/perawat', 'loginPerawat')->name('login.perawat');

    Route::get('/dokter', 'indexDokter')->name('login.indexdokter');
    Route::post('/dokter', 'loginDokter')->name('login.dokter');
});

Route::prefix('register')->controller(AuthController::class)->group(function ()
{
    Route::get('/pasien', 'formPasien')->name('register.indexpasien');
    Route::post('/pasien', 'registerPasien')->name('register.pasien');

    Route::get('/perawat', 'formPerawat')->name('register.indexperawat');
    Route::post('/perawat', 'registerPerawat')->name('register.perawat');

    Route::get('/dokter', 'formDokter')->name('register.indexdokter');
    Route::post('/dokter', 'registerDokter')->name('register.dokter');
});

//pasien
Route::prefix('pasien')->controller(PasienController::class)->group(function(){
    Route::get('/', 'indexHome')->name('pasien.home');
    Route::get('/janji', 'indexJanji')->name('pasien.janji');
    Route::get('/detailjanji', 'indexDetailJanji')->name('pasien.detailjanji');
    Route::get('/historitemu', 'indexRiwayattemu')->name('pasien.historitemu');
    Route::get('/historiobat', 'indexRiwayatobat')->name('pasien.historiobat');
    Route::get('/konsultasi', 'indexKonsultasi')->name('pasien.dokter');
    Route::get('/obat', 'indexObat')->name('pasien.obat');
    Route::get('/perawat','index')->name('pasien.perawat');
});

//admin
Route::prefix('admin')->controller(AdminController::class)->group(function(){
    Route::get('/', 'home')->name('admin.home');
    Route::get('/pasien', 'pasien')->name('admin.pasien');
    Route::get('/rumahsakit', 'rumahsakit')->name('admin.rumahsakit');
    Route::get('/dokter', 'dokter')->name('admin.dokter');
    Route::get('/obat', 'obat')->name('admin.obat');
    Route::get('/perawat','perawat')->name('admin.perawat');

    //ROUTE CREATE
    Route::post('/addpasien','addpasien')->name('admin.addpasien');
    Route::post('/addperawat','addperawat')->name('admin.addperawat');
    Route::post('/addrumahsakit','addrumahsakit')->name('admin.addrumahsakit');
    Route::post('/adddokter', 'adddokter')->name('admin.adddokter');

    //ROUTE DELETE
    Route::get('/deletepasien/{ps_id}','deletepasien')->name('admin.deletepasien');
    Route::get('/deleterumahsakit/{rs_id}','deleterumahsakit')->name('admin.deleterumahsakit');
    Route::get('/deletedokter/{dk_id}','deletedokter')->name('admin.deletedokter');
    Route::get('/deleteperawat/{pr_id}','deleteperawat')->name('admin.deleteperawat');
    Route::get('/deleteobat/{ob_id}','deleteobat')->name('admin.deleteobat');
});


Route::get('logout', function () {
    Session::remove('active');
    return redirect()->route('welcome');
})->name('logout');


