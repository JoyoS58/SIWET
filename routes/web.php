<?php

use App\Http\Controllers\AdminRWController;
use App\Http\Controllers\AnggotaPKKController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\KegiatanRWController;
use App\Http\Controllers\KegiatanPKKController;
use App\Http\Controllers\KeuanganRWController;
use App\Http\Controllers\KeuanganPKKController;
use App\Http\Controllers\LoginController as ControllersLoginController;
use App\Http\Controllers\MahasiswaKosController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/keuanganRW', [App\Http\Controllers\KeuanganRWController::class, 'index'])->name('keuanganRW');

// Route::group(['prefix' => 'PKK'],function (){
//     Route::get('/',[KeuanganController::class,'index']);
// });
Route::get('/keuanganRW',[KeuanganRWController::class,'index']);
Route::get('/keuanganRW/create',[KeuanganRWController::class,'create']);
Route::get('/keuanganRW/edit',[KeuanganRWController::class,'edit']);
Route::get('/keuanganRW/show',[KeuanganRWController::class,'show']);
Route::get('/warga',[WargaController::class,'index']);
Route::get('/warga/create',[WargaController::class,'create']);
Route::get('/warga/edit',[WargaController::class,'edit']);
Route::get('/warga/show',[WargaController::class,'show']);
Route::get('/mahasiswaKos',[MahasiswaKosController::class,'index']);
Route::get('/mahasiswaKos/create',[MahasiswaKosController::class,'create']);
Route::get('/mahasiswaKos/edit',[MahasiswaKosController::class,'edit']);
Route::get('/mahasiswaKos/show',[MahasiswaKosController::class,'show']);
Route::get('/keuanganPKK',[KeuanganPKKController::class,'index']);
Route::get('/keuanganPKK/create',[KeuanganPKKController::class,'create']);
Route::get('/keuanganPKK/edit',[KeuanganPKKController::class,'edit']);
Route::get('/keuanganPKK/show',[KeuanganPKKController::class,'show']);
Route::get('/anggotaPKK',[AnggotaPKKController::class,'index']);
Route::get('/anggotaPKK/create',[AnggotaPKKController::class,'create']);
Route::get('/anggotaPKK/edit',[AnggotaPKKController::class,'edit']);
Route::get('/anggotaPKK/show',[AnggotaPKKController::class,'show']);
Route::get('/kegiatanRW',[KegiatanRWController::class,'index']);
Route::get('/kegiatanRW/create',[KegiatanRWController::class,'create']);
Route::get('/kegiatanRW/edit',[KegiatanRWController::class,'edit']);
Route::get('/kegiatanRW/show',[KegiatanRWController::class,'show']);
Route::get('/kegiatanPKK',[KegiatanPKKController::class,'index']);
Route::get('/kegiatanPKK/create',[KegiatanPKKController::class,'create']);
Route::get('/kegiatanPKK/edit',[KegiatanPKKController::class,'edit']);
Route::get('/kegiatanPKK/show',[KegiatanPKKController::class,'show']);
Route::get('/login',[ControllersLoginController::class,'index'])->name('login');
Route::post('/proses_login',[ControllersLoginController::class,'login'])->name('proses_login');
Route::post('/cek_login',[ControllersLoginController::class,'login'])->name('cek_login');


Route::group(['middleware' => ['auth']], function(){

    Route::group(['middleware' => ['cek_login:adminRW']], function(){
        Route::resource('adminRW',AdminRWController::class);
    });
});