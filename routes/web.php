<?php

use App\Http\Controllers\AdminRWController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\AnggotaPKKController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\KegiatanRWController;
use App\Http\Controllers\KegiatanPKKController;
use App\Http\Controllers\KeuanganRWController;
use App\Http\Controllers\KeuanganPKKController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LoginController as ControllersLoginController;
use App\Http\Controllers\MahasiswaKosController;
use App\Http\Controllers\RTController;
use App\Http\Controllers\SAWController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SPKController;
use App\Http\Controllers\TopsisController;
use App\Http\Controllers\WargaController;
use App\Models\MahasiswaKos;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataKriteriaController;



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
Route::middleware(['auth'])->group(function () {
    // Rute-rute yang memerlukan autentikasi
    Route::get('/RW', function () {
        return view('RW.dasboardRW');
    });

    Route::get('/PKK', function () {
        return view('PKK.dasboardPKK');
    });

    Route::get('pengajuan/show/{id}', [SPKController::class, 'show']);

});

Route::get('/', function () {
    return view('welcome');
});


//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/sesi', [SessionController::class, 'index'])->name('sesi.get');
Route::post('/proses_login', [SessionController::class, 'login'])->name('sesi.post');
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');




Route::group(['prefix' => 'KeuanganRW','middleware' => ['auth']], function(){
    Route::get('/', [KeuanganRWController::class, 'index']);
    Route::post('/list', [KeuanganRWController::class, 'list']);
    Route::get('/create', [KeuanganRWController::class, 'create']);
    Route::post('/', [KeuanganRWController::class, 'store']);
    Route::get('/show/{id}', [KeuanganRWController::class, 'show']);
    Route::get('/edit/{id}', [KeuanganRWController::class, 'edit']);
    Route::put('/{id}', [KeuanganRWController::class, 'update']);
    Route::delete('/delete/{id}', [KeuanganRWController::class, 'destroy']);    
});
Route::group(['prefix' => 'KeuanganPKK','middleware' => ['auth']], function(){
    Route::get('/', [KeuanganPKKController::class, 'index']);
    Route::post('/list', [KeuanganPKKController::class, 'list']);
    Route::get('/create', [KeuanganPKKController::class, 'create']);
    Route::post('/', [KeuanganPKKController::class, 'store']);
    Route::get('/show/{id}', [KeuanganPKKController::class, 'show']);
    Route::get('/edit/{id}', [KeuanganPKKController::class, 'edit']);
    Route::put('/{id}', [KeuanganPKKController::class, 'update']);
    Route::delete('/delete/{id}', [KeuanganPKKController::class, 'destroy']);    
});

Route::group(['prefix' => 'RT','middleware' => ['auth']], function(){
    Route::get('/',[RTController::class,'index']);
    Route::get('/create',[RTController::class,'create']);
    Route::post('/', [RTController::class, 'store']);
    Route::get('/edit/{id}', [RTController::class, 'edit']);
    Route::put('/{id}', [RTController::class, 'update']);
    Route::get('/show/{id}', [RTController::class, 'show']);
    Route::delete('/delete/{id}', [RTController::class, 'destroy']);
});
Route::group(['prefix' => 'Warga','middleware' => ['auth']], function(){
    Route::get('/',[WargaController::class,'index']);
    Route::get('/create',[WargaController::class,'create']);
    Route::post('/', [WargaController::class, 'store']);
    Route::get('/edit/{id}', [WargaController::class, 'edit']);
    Route::put('/{id}', [WargaController::class, 'update']);
    Route::get('/show/{id}', [WargaController::class, 'show']);
    Route::delete('/delete/{id}', [WargaController::class, 'destroy']);
});
Route::group(['prefix' => 'MahasiswaKos','middleware' => ['auth']], function(){
    Route::get('/',[MahasiswaKosController::class,'index']);
    Route::get('/create',[MahasiswaKosController::class,'create']);
    Route::post('/', [MahasiswaKosController::class, 'store']);
    Route::get('/edit/{id}', [MahasiswaKosController::class, 'edit']);
    Route::put('/{id}', [MahasiswaKosController::class, 'update']);
    Route::get('/show/{id}', [MahasiswaKosController::class, 'show']);
    Route::delete('/delete/{id}', [MahasiswaKosController::class, 'destroy']);
});
Route::group(['prefix' => 'AnggotaPKK','middleware' => ['auth']], function(){
    Route::get('/',[AnggotaPKKController::class,'index']);
    Route::get('/create',[AnggotaPKKController::class,'create']);
    Route::post('/', [AnggotaPKKController::class, 'store']);
    Route::get('/edit/{id}', [AnggotaPKKController::class, 'edit']);
    Route::put('/{id}', [AnggotaPKKController::class, 'update']);
    Route::get('/show/{id}', [AnggotaPKKController::class, 'show']);
    Route::delete('/delete/{id}', [AnggotaPKKController::class, 'destroy']);
});
Route::group(['prefix' => 'KegiatanRW', 'middleware' => ['auth']], function(){
    Route::get('/', [KegiatanRWController::class, 'index']);
    Route::post('/list', [KegiatanRWController::class, 'list']);
    Route::get('/create', [KegiatanRWController::class, 'create']);
    Route::post('/', [KegiatanRWController::class, 'store']);
    Route::get('/show/{id}', [KegiatanRWController::class, 'show']);
    Route::get('/edit/{id}', [KegiatanRWController::class, 'edit']);
    Route::put('/{id}', [KegiatanRWController::class, 'update']);
    Route::delete('/delete/{id}', [KegiatanRWController::class, 'destroy']);    
});
Route::group(['prefix' => 'KegiatanPKK','middleware' => ['auth']], function(){
    Route::get('/', [KegiatanPKKController::class, 'index']);
    Route::post('/list', [KegiatanPKKController::class, 'list']);
    Route::get('/create', [KegiatanPKKController::class, 'create']);
    Route::post('/', [KegiatanPKKController::class, 'store']);
    Route::get('/show/{id}', [KegiatanPKKController::class, 'show']);
    Route::get('/edit/{id}', [KegiatanPKKController::class, 'edit']);
    Route::put('/{id}', [KegiatanPKKController::class, 'update']);
    Route::delete('/delete/{id}', [KegiatanPKKController::class, 'destroy']);
});
Route::group(['prefix' => 'spk','middleware' => ['auth']], function(){
    Route::get('/', [SpkController::class, 'index']);

});

Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => ['cek_login:adminRW']], function(){
    Route::resource('adminRW',AdminRWController::class);
    });
});


// Route::prefix('/spk')->group(function(){
//     Route::prefix('alternatif')->group(function(){
//         Route::get('/', [SPKController::class, 'indexAlternatif']);
//         Route::post('/list', [SPKController::class, 'list']);
//         Route::get('/create', [SPKController::class, 'create']);
//         Route::post('/', [SPKController::class, 'store']);
//         Route::get('/show/{id}', [SPKController::class, 'show']);
//         Route::get('/edit/{id}', [SPKController::class, 'edit']);
//         Route::put('/{id}', [SPKController::class, 'update']);
//         Route::delete('/delete/{id}', [SPKController::class, 'destroy']);   
//     });
//     Route::prefix('kriteria')->group(function(){
//         Route::get('/', [SPKController::class, 'indexKriteria']);
//         Route::post('/list', [SPKController::class, 'list']);
//         Route::get('/create', [SPKController::class, 'create']);
//         Route::post('/', [SPKController::class, 'store']);
//         Route::get('/show/{id}', [SPKController::class, 'show']);
//         Route::get('/edit/{id}', [SPKController::class, 'edit']);
//         Route::put('/{id}', [SPKController::class, 'update']);
//         Route::delete('/delete/{id}', [SPKController::class, 'destroy']);   
//     });
//     Route::prefix('pemilihan')->group(function(){
//         Route::get('/', [SPKController::class, 'indexPerhitungan']);
//         Route::post('/list', [SPKController::class, 'list']);
//         Route::get('/create', [SPKController::class, 'create']);
//         Route::post('/', [SPKController::class, 'store']);
//         Route::get('/show/{id}', [SPKController::class, 'show']);
//         Route::get('/edit/{id}', [SPKController::class, 'edit']);
//         Route::put('/{id}', [SPKController::class, 'update']);
//         Route::delete('/delete/{id}', [SPKController::class, 'destroy']);
//     });
// });

Route::get('/kriteria', [KriteriaController::class, 'index'])->name('kriteria.index');
Route::post('/kriteria', [KriteriaController::class, 'store'])->name('kriteria.store');
Route::get('/kriteria/{id}/edit', [KriteriaController::class, 'edit'])->name('kriteria.edit');
Route::put('/kriteria/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
//Route::post('/kriteria/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
Route::delete('/kriteria/{id}', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');

Route::get('/dataKriteria', [DataKriteriaController::class, 'index'])->name('dataKriteria.index');
Route::get('/dataKriteria/create', [DataKriteriaController::class, 'create'])->name('dataKriteria.create');
Route::post('/dataKriteria', [DataKriteriaController::class, 'store'])->name('dataKriteria.store');
Route::get('/dataKriteria/{id}/edit', [DataKriteriaController::class, 'edit'])->name('dataKriteria.edit');
Route::put('/dataKriteria/{id}', [DataKriteriaController::class, 'update'])->name('dataKriteria.update');
Route::delete('/dataKriteria/{id}', [DataKriteriaController::class, 'destroy'])->name('dataKriteria.destroy');

// Route::get('/saw', [SAWController::class, 'calculate']);
Route::get('/nilai/create', [SAWController::class, 'create'])->name('nilai.create');
Route::post('/nilai/store', [SAWController::class, 'store'])->name('nilai.store');
Route::get('/saw/calculate', [SAWController::class, 'calculate'])->name('saw.calculate');
Route::get('/saw/confirm_edit/{ID_alternatif}', [SAWController::class, 'confirmEdit'])->name('saw.confirm_edit');
Route::get('/saw/edit/{ID_alternatif}', [SAWController::class, 'edit'])->name('saw.edit');
Route::put('/saw/update/{ID_alternatif}', [SAWController::class, 'update'])->name('saw.update');
Route::get('/nilai/check/{ID_alternatif}', [SAWController::class, 'checkNilai'])->name('nilai.check');



Route::get('/topsis',[TopsisController::class, 'index']);

Route::get('/alternatif', [AlternatifController::class, 'index'])->name('alternatif.index');
Route::post('/alternatif', [AlternatifController::class, 'store'])->name('alternatif.store');
Route::get('/alternatif/{id}/edit', [AlternatifController::class, 'edit'])->name('alternatif.edit');
Route::put('/alternatif/{id}', [AlternatifController::class, 'update'])->name('alternatif.update');
Route::delete('/alternatif/{id}', [AlternatifController::class, 'destroy'])->name('alternatif.destroy');
