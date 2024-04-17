<?php

use App\Http\Controllers\KeuanganRWController;
use App\Http\Controllers\KeuanganPKKController;
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

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/keuanganRW', [App\Http\Controllers\KeuanganRWController::class, 'index'])->name('keuanganRW');

// Route::group(['prefix' => 'PKK'],function (){
//     Route::get('/',[KeuanganController::class,'index']);
// });
Route::get('/keuanganRW',[KeuanganRWController::class,'index']);
Route::get('/keuanganRW/create',[KeuanganRWController::class,'create']);
Route::get('/keuanganRW/edit',[KeuanganRWController::class,'edit']);
Route::get('/keuanganRW/show',[KeuanganRWController::class,'show']);

Route::get('/keuanganPKK',[KeuanganPKKController::class,'index']);
Route::get('/keuanganPKK/create',[KeuanganPKKController::class,'create']);
Route::get('/keuanganPKK/edit',[KeuanganPKKController::class,'edit']);
Route::get('/keuanganPKK/show',[KeuanganPKKController::class,'show']);