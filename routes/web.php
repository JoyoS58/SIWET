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
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SPKController;
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
Route::get('/RW', function () {
    return view('RW.dasboardRW');
});
Route::get('/PKK', function () {
    return view('PKK.dasboardPKK');
});
Route::get('pengajuan/show/{id}', [SPKController::class, 'show']);


//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/sesi', [SessionController::class, 'index'])->name('sesi.get');
Route::post('/proses_login', [SessionController::class, 'login'])->name('sesi.post');
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');

Route::get('welcome', function () {
    return view('welcome'); // Atau arahkan ke controller lain sesuai kebutuhan
})->middleware('auth')->name('welcome');





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
Route::group(['prefix' => 'keuanganPKK'], function(){
    Route::get('/', [KeuanganPKKController::class, 'index']);
    Route::post('/list', [KeuanganPKKController::class, 'list']);
    Route::get('/create', [KeuanganPKKController::class, 'create']);
    Route::post('/', [KeuanganPKKController::class, 'store']);
    Route::get('/show/{id}', [KeuanganPKKController::class, 'show']);
    Route::get('/edit/{id}', [KeuanganPKKController::class, 'edit']);
    Route::put('/{id}', [KeuanganPKKController::class, 'update']);
    Route::delete('/delete/{id}', [KeuanganPKKController::class, 'destroy']);    
});

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
Route::group(['prefix' => 'AnggotaPKK'], function(){
    Route::get('/',[AnggotaPKKController::class,'index']);
    Route::get('/create',[AnggotaPKKController::class,'create']);
    Route::post('/', [AnggotaPKKController::class, 'store']);
    Route::get('/edit/{id}', [AnggotaPKKController::class, 'edit']);
    Route::put('/{id}', [AnggotaPKKController::class, 'update']);
    Route::get('/show/{id}', [AnggotaPKKController::class, 'show']);
    Route::delete('/delete/{id}', [AnggotaPKKController::class, 'destroy']);
});

// Route::get('/anggotaPKK',[AnggotaPKKController::class,'index']);
// Route::get('/anggotaPKK/create',[AnggotaPKKController::class,'create']);
// Route::get('/anggotaPKK/edit',[AnggotaPKKController::class,'edit']);
// Route::get('/anggotaPKK/show',[AnggotaPKKController::class,'show']);
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
Route::group(['prefix' => 'kegiatanPKK'], function(){
    Route::get('/', [KegiatanPKKController::class, 'index']);
    Route::post('/list', [KegiatanPKKController::class, 'list']);
    Route::get('/create', [KegiatanPKKController::class, 'create']);
    Route::post('/', [KegiatanPKKController::class, 'store']);
    Route::get('/show/{id}', [KegiatanPKKController::class, 'show']);
    Route::get('/edit/{id}', [KegiatanPKKController::class, 'edit']);
    Route::put('/{id}', [KegiatanPKKController::class, 'update']);
    Route::delete('/delete/{id}', [KegiatanPKKController::class, 'destroy']);    
});
// Route::get('/kegiatanPKK',[KegiatanPKKController::class,'index']);
// Route::get('/kegiatanPKK/create',[KegiatanPKKController::class,'create']);
// Route::get('/kegiatanPKK/edit',[KegiatanPKKController::class,'edit']);
// Route::get('/kegiatanPKK/show',[KegiatanPKKController::class,'show']);

Route::group(['middleware' => ['auth']], function(){

    Route::group(['middleware' => ['cek_login:adminRW']], function(){
        Route::resource('adminRW',AdminRWController::class);
    });
});

Route::get('/spk',[SPKController::class,'index']);