<?php

use App\Http\Controllers\Anggota;
use App\Http\Controllers\Angkatan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Home;
use App\Http\Controllers\Jurusans;


Route::get('/login', [AuthController::class, 'render'])->middleware('auth')->name('login');
Route::post('/login', [AuthController::class, 'proses']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Route untuk dashboard, menggunakan DashboardController
Route::get('/', [Home::class, 'show'])->middleware('auth')->name('/');


// Route untuk menampilkan daftar anggota
Route::get('/anggota', [Anggota::class, 'show'])->middleware('auth')->name('anggota');

// Route untuk menampilkan daftar jurusan
Route::get('/jurusan', [Jurusans::class, 'show'])->middleware('auth')->name('jurusan');

// Route untuk menyimpan jurusan
Route::post('/jurusan/tambah', [Jurusans::class, 'store'])->name('jurusan.store');

// Menghapus jurusan
Route::delete('/jurusan/{jurusan}', [Jurusans::class, 'destroy'])->name('jurusan.destroy');

Route::put('/jurusan/{id}', [Jurusans::class, 'update'])->name('jurusan.update');

// Route untuk menampilkan daftar angkatan
Route::get('/angkatan', [Angkatan::class, 'show'])->middleware('auth')->name('angkatan');

Route::get('/angkatans', [Angkatan::class, 'shows'])->middleware('auth')->name('angkatans');

// Route untuk menyimpan angkatan
Route::post('/angkatan/tambah', [Angkatan::class, 'store'])->name('angkatan.store');

// Menghapus angkan
Route::delete('/angkatan/{angkatan}', [Angkatan::class, 'destroy'])->name('angkatan.destroy');

Route::put('/angkatan/{id}', [Angkatan::class, 'update'])->name('angkatan.update');

