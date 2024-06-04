<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\AuthController;

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
Route::middleware(['auth.check'])->group(function(){
    Route::get('/',[HomeController::class,'index'])->name('home');
    // siswa
    Route::get('/siswa',[SiswaController::class,'siswa'])->name('siswa');
    Route::get('/siswa/tambah',[SiswaController::class,'tambah'])->name('siswa_tambah');
    Route::post('/siswa/aksi_tambah',[SiswaController::class,'aksi_tambah'])->name('aksi_tambah_siswa');
    // kelas
    Route::get('/kelas',[KelasController::class,'index'])->name('kelas');
    Route::get('/kelas/tambah',[KelasController::class,'tambah'])
    ->name('tambah_kelas');
    Route::post('kelas/aksi_tambah',[KelasController::class,'aksi_tambah'])
    ->name('aksi_tambah')
    ;
    Route::get('kelas/edit/{id}',[KelasController::class,'edit'])
    ->name('edit')
    ;
    Route::post('kelas/hapus/{id}',[KelasController::class,'hapus'])
    ->name('hapus')
    ;
    Route::post('kelas/aksi_edit/{id}',[KelasController::class,'aksi_edit'])
    ->name('aksi_edit');

    //halaman nilai
    Route::get('nilai',[NilaiController::class,'index'])
    ->name('nilai');

    Route::get('nilai/tambah',[NilaiController::class,'tambah'])
    ->name('nilai_tambah');

    Route::post('nilai/aksi_tambah_nilai',[NilaiController::class,'aksi_tambah'])
    ->name('aksi_tambah_nilai');
    Route::post('nilai/hapus/{id}',[NilaiController::class,'hapus'])
    ->name('hapus_nilai');
    Route::get('nilai/edit/{id}',[NilaiController::class,'edit'])
    ->name('nilai_edit')
    ;
    Route::post('nilai/edit_nilai/{id}',[NilaiController::class,'edit_nilai'])
    ->name('edit_nilai');

});

//Register
Route::get('/register',[AuthController::class,'register'])
->name('register');
Route::post('/register',[AuthController::class,'aksi_register'])
->name('aksi_register');

//login
Route::get('/login',[AuthController::class,'login'])
->name('login');
Route::post('/login',[AuthController::class,'aksi_login'])
->name('aksi_login');

