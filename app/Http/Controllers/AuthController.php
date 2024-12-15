<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan form login
    public function render()
    {
        return view('auth.login');
    }

    // Proses login
    public function proses(Request $request)
    {
        // Validasi input dari pengguna
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:255'
        ], [
            'email.required' => 'Tolong isi Email Anda!',
            'email.email' => 'Format Email tidak valid!',
            'password.required' => 'Tolong isi Passwordnya!',
            'password.min' => 'Password minimal 6 karakter!',
            'password.max' => 'Password maksimal 255 karakter!',
        ]);

        // Cek apakah login berhasil dengan Auth::attempt
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Perbarui session
            return redirect()->route('dashboard'); // Arahkan ke halaman home
        }

        // Jika login gagal, beri pesan error
        session()->flash('error', 'Autentikasi Gagal.');
        sleep(1); // Delay sederhana untuk keamanan
        return back(); // Kembalikan ke halaman login
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
