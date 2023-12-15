<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class TambahDataMahasiswaController extends Controller
{
    public function create()
    {
        return view('admin.tambahdatamahasiswa');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'id' => 'required|string|max:15',
            'nim' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'lahir' => 'required|string|ma:255',
            'agama_id' => 'required|unsignedBigInteger|ma:20',
        ]);

        // Simpan data ke database
        Mahasiswa::create([
            'nim' => $request->input('nim'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('angkatan'),
            'lahir' => $request->input('lahir'),
            'agama_id' => $request->input('agama_id'),
        ]);

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('admin.datamahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan');
    }
}
