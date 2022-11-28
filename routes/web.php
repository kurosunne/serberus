<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//admin
Route::prefix('admin')->controller(AdminController::class)->group(function(){
    Route::get('/', 'home')->name('admin.home');
    Route::get('/pasien', 'pasien')->name('admin.pasien');
    Route::get('/rumahsakit', 'rumahsakit')->name('admin.rumahsakit');
    Route::get('/dokter', 'dokter')->name('admin.dokter');
    Route::get('/obat', 'obat')->name('admin.obat');
});
