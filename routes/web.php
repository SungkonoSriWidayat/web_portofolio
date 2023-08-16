<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaftarKelas;
use App\Http\Controllers\DataMahasiswa;
use App\Http\Controllers\UserControl;
use App\Http\Controllers\UserController;
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

Route::middleware(['guest'])->group(function(){
    Route::view('/','halaman_awal/index');
    Route::get('/sesi',[AuthController::class,'index'])->name('auth');
    Route::post('/sesi',[AuthController::class,'login']);
    Route::get('/reg',[AuthController::class,'create'])->name('registrasi');
    Route::post('/reg',[AuthController::class,'register']);
    Route::get('/verify/{verify_key}',[AuthController::class, 'verify']);
});

Route::middleware(['auth'])->group(function(){
    Route::redirect('/home','/user');
    Route::get('/admin',[AdminController::class,'index'])->name('admin')->middleware('userAkses:admin');
    Route::get('/user',[UserController::class,'index'])->name('user')->middleware('userAkses:user');

    Route::get('/datamahasiswa',[DataMahasiswa::class,'index'])->name('datamahasiswa');
    Route::get('/datatambah',[DataMahasiswa::class, 'tambah']);
    Route::get('/dataedit/{id}',[DataMahasiswa::class, 'edit']);
    Route::post('/datahapus/{id}',[DataMahasiswa::class, 'hapus']);
    Route::post('/datatambah', [DataMahasiswa::class, 'create']);
    Route::post('/dataedit', [DataMahasiswa::class, 'change']);

    Route::get('/UserControl',[UserControl::class,'index'])->name('UserControl');
    Route::get('/tambahuc', [UserControl::class, 'tambah']);
    Route::get('/edituc/{id}', [UserControl::class, 'edit']);
    Route::post('/hapusuc/{id}', [UserControl::class, 'hapus']);
    Route::post('/tambahuc', [UserControl::class, 'create']);
    Route::post('/edituc', [UserControl::class, 'change']);

    Route::get('/daftarkelas',[DaftarKelas::class, 'index'])->name('daftarkelas');
    Route::get('/tambahkelas', [DaftarKelas::class, 'tambahkelas']);
    Route::post('/tambahkelas', [DaftarKelas::class, 'buatkelas']);

    Route::get('/upload/{id}', [DaftarKelas::class, 'edit']);
    Route::post('/upload', [DaftarKelas::class, 'change']);

    Route::get('/uploadtugas/{id}', [DaftarKelas::class, 'edittugas']);
    Route::post('/uploadtugas', [DaftarKelas::class, 'changetugas']);

    Route::get('/uploadujian/{id}', [DaftarKelas::class, 'editujian']);
    Route::post('/uploadujian', [DaftarKelas::class, 'changeujian']);
    



    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    
    Route::post('/uprole/{id}', [UproleController::class, 'index']);

});
