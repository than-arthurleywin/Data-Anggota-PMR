<?php

namespace App\Http\Controllers;

use App\Models\Angkatans;
use Illuminate\Http\Request;

class Angkatan extends Controller
{
    public $nama,$id,$cari;

    public function show()
    {
        if($this->cari != ""){
            $data['angkatan'] = Angkatans::where('angkatan', 'like', '%' . $this->cari . '%')
            ->paginate(5);
        }
        else{
            $data['angkatan'] = Angkatans::paginate(5);
        }

        // Kirim data ke view
        return view('auth.angkatan', $data);
    }

     public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'angkatan' => 'required|string|max:255',
            'status' => 'required|in:anggota,alumni',
        ]);

        // Menyimpan data jurusan ke database
        Angkatans::create([
            'angkatan' => $request->angkatan,
            'status' => $request->status
        ]);

        // Redirect kembali ke halaman jurusan dengan pesan sukses
        return redirect()->route('angkatan')->with('success', 'Angkatan berhasil ditambahkan!');
    }

    public function destroy($id)
{
    $angkatan = Angkatans::findOrFail($id);
    $angkatan->delete();

    return redirect()->route('angkatan')->with('success', 'Angkatan berhasil dihapus!');
}

public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'angkatan' => 'required|string|max:255',
            'status' => 'required|in:anggota,alumni'

        ]);

        // Temukan data jurusan berdasarkan ID
$angkatan = Angkatans::findOrFail($id);
    $angkatan->update([
        'angkatan' => $request->angkatan,
        'status' => $request->status,
    ]);
        $angkatan->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('angkatan')->with('success', 'Data angkatan berhasil diupdate.');
    }
}
