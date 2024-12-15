<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggotans; // Pastikan model Anggota sudah ada dan sesuai

class Anggota extends Controller
{
    public function show()
{
    // Ambil data anggota dengan paginasi
    $anggota = Anggotans::paginate(10); // Menampilkan 10 data per halaman

    // Kirim data ke view
    return view('auth.anggota', compact('anggota'));
}

}
