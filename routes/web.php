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
    Route::get('/janji', 'indexHome')->name('pasien.janji');
    Route::get('/histori', 'indexHome')->name('pasien.rumahsakit');
    Route::get('/konsultasi', 'indexHome')->name('pasien.dokter');
    Route::get('/obat', 'indexHome')->name('pasien.obat');
    Route::get('/perawat','indexHome')->name('pasien.perawat');
});

//admin
Route::prefix('admin')->controller(AdminController::class)->group(function(){
    Route::get('/', 'home')->name('admin.home');
    Route::get('/pasien', 'pasien')->name('admin.pasien');
    Route::get('/rumahsakit', 'rumahsakit')->name('admin.rumahsakit');
    Route::get('/dokter', 'dokter')->name('admin.dokter');
    Route::get('/obat', 'obat')->name('admin.obat');
    Route::get('/perawat','perawat')->name('admin.perawat');
});


Route::get('logout', function () {
    Session::remove('active');
    return redirect()->route('welcome');
})->name('logout');


