<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function getChartData()
    {
        $data = Matakuliah::semesterTotal()->get();
        $datamahasiswa = Mahasiswa::alamatTotal()->get();

        return view('admin.dashboard', compact('data', 'datamahasiswa'));
    }
}