<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriWisata;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PemetaanController;
use App\Http\Controllers\ProfileController;
use App\Models\WisataCategory;

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

Route::get('/',[HomeController::class,'index'])->name('home')->middleware('is_login');
Route::get('/auth',[AuthController::class,'index'])->name('auth')->middleware('is_login');
Route::post('/auth',[AuthController::class,'store'])->name('login');
Route::get('logout',[AuthController::class,'destroy'])->name('logout');
Route::get('/detail-wisata/{id}',[PemetaanController::class,'show'])->name("detail.wisata");
Route::get('/tentang-kami',[HomeController::class,'about'])->name("about");
Route::get('/api-peta',[PemetaanController::class,'rest_peta'])->middleware('cors');
Route::get('/api-peta/{lat}/position/{lon}',[PemetaanController::class,'rest_petaByLatAndLot'])->middleware('cors');
Route::get('/wisata/{id}',[HomeController::class,'show'])->name("bycategori");

Route::middleware('auth')->group(function(){
    Route::get('/data-pemetaan',[PemetaanController::class,'index'])->name('pemetaan');
    Route::post('/data-pemetaan',[PemetaanController::class,'store']);
    Route::delete('/data-pemetaan/{id}',[PemetaanController::class,'destroy'])->name('hapus_pemetaan');
    Route::get('/edit-pemetaan/{id}',[PemetaanController::class,'edit'])->name('edit_pemetaan');
    Route::get('/tambah-pemetaan',[PemetaanController::class,'create'])->name('tambah_peta');
    Route::put('/data-pemetaan/{id}',[PemetaanController::class,'update'])->name('update_pemetaan');
    
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/profile',[ProfileController::class,'index'])->name('profile');

    Route::get('/wisata-kategori',[CategoriWisata::class,"index"])->name("kategori");
    Route::get('/wisata-kategori/{id}',[CategoriWisata::class,"edit"])->name("kategori.edit");
    Route::put('/wisata-kategori/{id}',[CategoriWisata::class,"update"])->name("kategori.update");
    Route::delete('/wisata-kategori/{id}',[CategoriWisata::class,"delete"])->name("kategori.delete");
    Route::get('/tambah-kategori',[CategoriWisata::class,"create"])->name("kategori.tambah");
    Route::post('/wisata-kategori',[CategoriWisata::class,"store"])->name("kategori.store");
    
});