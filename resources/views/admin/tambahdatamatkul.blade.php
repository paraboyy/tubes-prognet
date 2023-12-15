<!-- resources/views/mahasiswa/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="margin-top:60px;">
                    <div class="card-header w3-teal text-white">
                        <h2 class="mb-0">Tambah Data Matkul</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.tambahdatamatkul') }}">
                            @csrf
                            <div class="form-group">
                                <label for="NIM">Kode Mata Kuliah:</label>
                                <input type="text" name="nim" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Mata Kuliah:</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="Lahir">SKS:</label>
                                <input name="Lahir" class="form-control" required></input>
                            </div>
                            <div class="form-group">
                                <label for="agama_id">Semester:</label>
                                <input name="agama_id" class="form-control" required></input>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="w3-btn w3-round-xlarge w3-teal">Simpan</button>
                                <a href="{{ route('admin.datamatkul') }}" class="w3-btn w3-round-xlarge w3-red">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
