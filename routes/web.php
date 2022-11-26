<?php

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
Route::prefix('admin')->group(function(){
    Route::geT('/', function(){
        return view('admin.homeadmin');
    });
    Route::get('listpasien', function(){
        return view('admin.listpasien');
    });
    Route::get('listrumahsakit', function(){
        return view('admin.listrumahsakit');
    });
    Route::get('listdokter', function(){
        return view('admin.listdokter');
    });
    Route::get('listobat', function(){
        return view('admin.listobat');
    });
});
