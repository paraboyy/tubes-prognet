<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Agama;
use App\Models\Mahasiswas;
use App\Models\MataKuliah;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function datamahasiswa()
    {
        $mahasiswa = Mahasiswa::all();

        return view('admin.datamahasiswa', ['mahasiswas' => $mahasiswa]);
    }

    public function datamatkul()
    {
        $matkul = MataKuliah::all();

        return view('admin.datamatkul', ['matkul' => $matkul]);
    }

    public function sort(Request $request)
    {
        // Mendapatkan parameter dari request
        $column = $request->input('column');
        $order = $request->input('order');

        // Validasi arah pengurutan
        if (!in_array($order, ['asc', 'desc'])) {
            // Nilai arah pengurutan tidak valid
            return response()->json(['error' => 'Invalid order direction'], 400);
        }

        // Proses pengurutan data di sisi server
        $sortedMatkul = MataKuliah::orderBy($column, $order)
            ->get();

        // Mengembalikan tampilan tabel setelah diurutkan
        return view('admin.datamatkul', ['matkul' => $sortedMatkul]);
    }

    
}
