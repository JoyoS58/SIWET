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
use App\Http\Controllers\RTController;
use App\Http\Controllers\WargaController;
use App\Models\MahasiswaKos;
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
Route::group(['prefix' => 'keuanganRW'], function(){
    Route::get('/', [KeuanganRWController::class, 'index']);
    Route::post('/list', [KeuanganRWController::class, 'list']);
    Route::get('/create', [KeuanganRWController::class, 'create']);
    Route::post('/', [KeuanganRWController::class, 'store']);
    Route::get('/show/{id}', [KeuanganRWController::class, 'show']);
    Route::get('/edit/{id}', [KeuanganRWController::class, 'edit']);
    Route::put('/{id}', [KeuanganRWController::class, 'update']);
    Route::delete('/delete/{id}', [KeuanganRWController::class, 'destroy']);    
});

// Route::get('/keuanganRW',[KeuanganRWController::class,'index']);
// Route::get('/keuanganRW/create',[KeuanganRWController::class,'create']);
// Route::get('/keuanganRW/edit',[KeuanganRWController::class,'edit']);
// Route::get('/keuanganRW/show',[KeuanganRWController::class,'show']);

Route::group(['prefix' => 'RT'], function(){
    Route::get('/',[RTController::class,'index']);
    Route::get('/create',[RTController::class,'create']);
    Route::post('/', [RTController::class, 'store']);
    Route::get('/edit/{id}', [RTController::class, 'edit']);
    Route::put('/{id}', [RTController::class, 'update']);
    Route::get('/show/{id}', [RTController::class, 'show']);
    Route::delete('/delete/{id}', [RTController::class, 'destroy']);
});
Route::group(['prefix' => 'Warga'], function(){
    Route::get('/',[WargaController::class,'index']);
    Route::get('/create',[WargaController::class,'create']);
    Route::post('/', [WargaController::class, 'store']);
    Route::get('/edit/{id}', [WargaController::class, 'edit']);
    Route::put('/{id}', [WargaController::class, 'update']);
    Route::get('/show/{id}', [WargaController::class, 'show']);
    Route::delete('/delete/{id}', [WargaController::class, 'destroy']);
});
Route::group(['prefix' => 'MahasiswaKos'], function(){
    Route::get('/',[MahasiswaKosController::class,'index']);
    Route::get('/create',[MahasiswaKosController::class,'create']);
    Route::post('/', [MahasiswaKosController::class, 'store']);
    Route::get('/edit/{id}', [MahasiswaKosController::class, 'edit']);
    Route::put('/{id}', [MahasiswaKosController::class, 'update']);
    Route::get('/show/{id}', [MahasiswaKosController::class, 'show']);
    Route::delete('/delete/{id}', [MahasiswaKosController::class, 'destroy']);
});
// Route::get('/keuanganRW',[KeuanganRWController::class,'index']);
// Route::get('/keuanganRW/create',[KeuanganRWController::class,'create']);
// Route::get('/keuanganRW/edit',[KeuanganRWController::class,'edit']);
// Route::get('/keuanganRW/show',[KeuanganRWController::class,'show']);
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
Route::group(['prefix' => 'kegiatanRW'], function(){
    Route::get('/', [KegiatanRWController::class, 'index']);
    Route::post('/list', [KegiatanRWController::class, 'list']);
    Route::get('/create', [KegiatanRWController::class, 'create']);
    Route::post('/', [KegiatanRWController::class, 'store']);
    Route::get('/show/{id}', [KegiatanRWController::class, 'show']);
    Route::get('/edit/{id}', [KegiatanRWController::class, 'edit']);
    Route::put('/{id}', [KegiatanRWController::class, 'update']);
    Route::delete('/delete/{id}', [KegiatanRWController::class, 'destroy']);    
});
// Route::get('/kegiatanRW',[KegiatanRWController::class,'index']);
// Route::get('/kegiatanRW/create',[KegiatanRWController::class,'create']);
// Route::get('/kegiatanRW/edit',[KegiatanRWController::class,'edit']);
// Route::get('/kegiatanRW/show',[KegiatanRWController::class,'show']);
Route::get('/kegiatanPKK',[KegiatanPKKController::class,'index']);
Route::get('/kegiatanPKK/create',[KegiatanPKKController::class,'create']);
Route::get('/kegiatanPKK/edit',[KegiatanPKKController::class,'edit']);
Route::get('/kegiatanPKK/show',[KegiatanPKKController::class,'show']);
Route::get('/login',[ControllersLoginController::class,'index'])->name('login');
Route::post('/proses_login',[ControllersLoginController::class,'login'])->name('proses_login');

Route::group(['middleware' => ['auth']], function(){

    Route::group(['middleware' => ['cek_login:adminRW']], function(){
        Route::resource('adminRW',AdminRWController::class);
    });
});