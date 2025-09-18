<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function(){
    Route::get('/', 'index');
    Route::post('/login-walas', 'loginWalas');
    Route::post('/login-siswa', 'loginSiswa');
    Route::get('/dashboard', 'dashboard');
    Route::get('/logout', 'logout');
});

Route::middleware('CheckUserRole:Walas')->group(function(){
    Route::controller(NilaiController::class)-> prefix('nilai-raport')->group(function(){
        Route::get('/index', 'index');
        Route::get('/create', 'create');
        Route::post('/store', 'store');
        Route::get('/edit/{nilai}', 'edit');
        Route::put('/update/{nilai}', 'update');
        Route::delete('/destroy/{nilai}', 'destroy');
        Route::get('/show/{id}', 'showNilai');
        Route::get('/show', 'show');

    });
});

Route::middleware('CheckUserRole:Murid')->group(function(){
    Route::get('/siswa/show/{id}', [SiswaController::class, 'showNilai'])->name('siswa.showNilai');

});

