<?php

use App\Http\Controllers\Angkatan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Home;
use App\Http\Controllers\Jurusans;

Route::get('/login', [AuthController::class, 'render'])->name('login');
Route::post('/login', [AuthController::class, 'proses']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Route untuk dashboard, menggunakan DashboardController
Route::get('/dashboard', [Dashboard::class, 'show'])->middleware('auth')->name('dashboard');
Route::get('/home', [Home::class, 'show'])->middleware('auth')->name('home');


// Route untuk menampilkan daftar jurusan
Route::get('/jurusan', [Jurusans::class, 'show'])->name('jurusan');

// Route untuk menyimpan jurusan
Route::post('/jurusan/tambah', [Jurusans::class, 'store'])->name('jurusan.store');

// Menghapus jurusan
Route::delete('/jurusan/{jurusan}', [Jurusans::class, 'destroy'])->name('jurusan.destroy');

Route::put('/jurusan/{id}', [Jurusans::class, 'update'])->name('jurusan.update');

// Route untuk menampilkan daftar jurusan
Route::get('/angkatan', [Angkatan::class, 'show'])->name('angkatan');

// Route untuk menyimpan jurusan
Route::post('/angkatan/tambah', [Angkatan::class, 'store'])->name('angkatan.store');

// Menghapus jurusan
Route::delete('/angkatan/{angkatan}', [Angkatan::class, 'destroy'])->name('angkatan.destroy');

Route::put('/angkatan/{id}', [Angkatan::class, 'update'])->name('angkatan.update');

