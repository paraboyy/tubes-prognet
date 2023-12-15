<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TambahDataMatkulController extends Controller
{
    public function create()
    {
        return view('admin.tambahdatamatkul');
    }
}
