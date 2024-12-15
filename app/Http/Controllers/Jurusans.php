<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class Jurusans extends Controller
{
    public $nama,$id,$deskripsi,$cari;

    public function show()
    {
        if($this->cari != ""){
            $data['jurusan'] = Jurusan::where('nama_jurusan', 'like', '%' . $this->cari . '%')
            ->paginate(5);
        }
        else{
            $data['jurusan'] = Jurusan::paginate(5);
        }

        // Kirim data ke view
        return view('auth.jurusan', $data);
    }

     public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_jurusan' => 'required|string|max:255',
        ]);

        // Menyimpan data jurusan ke database
        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
        ]);

        // Redirect kembali ke halaman jurusan dengan pesan sukses
        return redirect()->route('jurusan')->with('success', 'Jurusan berhasil ditambahkan!');
    }

    public function destroy($id)
{
    $jurusan = Jurusan::findOrFail($id);
    $jurusan->delete();

    return redirect()->route('jurusan')->with('success', 'Jurusan berhasil dihapus!');
}

public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_jurusan' => 'required|string|max:255',
        ]);

        // Temukan data jurusan berdasarkan ID
        $jurusan = Jurusan::findOrFail($id);

        // Update nama jurusan
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('jurusan')->with('success', 'Data jurusan berhasil diupdate.');
    }
}
