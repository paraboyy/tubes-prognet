<!-- resources/views/admin.blade.php -->

@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="w3-sidebar w3-teal w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
        <a href="dashboard" class="w3-bar-item w3-button">Dashboard</a>
        <a href="datamahasiswa" class="w3-bar-item w3-button">Data Mahasiswa</a>
        <a href="datamatkul" class="w3-bar-item w3-button">Data Mata Kuliah</a>
    </div>

    <div id="main">
        <div class="w3-teal d-flex justify-content-between align-items-center">
            <div>
                <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
                <div class="w3-container">
                    <h1>DATA MAHASISWA</h1>
                </div>
            </div>
            <div style="margin-right: 20px;">
                <button class="btn btn-dark" data-toggle="modal" onclick="location.href='/admin/tambahdatamahasiswa'">Tambah Data</button>
            </div>
        </div>

        <div class="container mt-4">
            <div class="d-flex justify-content-between mb-3 placeholder col-6 mx-auto p-2">
                <div class="input-group px-4">
                    <input type="text" class="form-control" placeholder="Cari...">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">Cari</button>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="filterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter
                    </button>
                    <div class="dropdown-menu" aria-labelledby="filterDropdown">
                        <a class="dropdown-item filter" data-column="kode" data-order="asc">Kode Mata Kuliah (Ascending)</a>
                        <a class="dropdown-item filter" data-column="kode" data-order="desc">Kode Mata Kuliah (Descending)</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item filter" data-column="semester" data-order="asc">Semester (Ascending)</a>
                        <a class="dropdown-item filter" data-column="semester" data-order="desc">Semester (Descending)</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item filter" data-column="sks" data-order="asc">SKS (Ascending)</a>
                        <a class="dropdown-item filter" data-column="sks" data-order="desc">SKS (Descending)</a>
                    </div>
                </div>
            </div>

            <div class="table-responsive shadow p-3 mb-5 bg-white rounded">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Lahir</th>
                            <th scope="col">Agama</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mahasiswas as $mahasiswa)
                            <tr>
                                <td>{{ $mahasiswa->nim }}</td>
                                <td>{{ $mahasiswa->nama }}</td>
                                <td>{{ $mahasiswa->alamat }}</td>
                                <td>{{ $mahasiswa->lahir }}</td>
                                <td>{{ $mahasiswa->agama->nama_agama }}</td>
                                <td>
                                    <button class="w3-button w3-round-large w3-teal">Edit</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function w3_open() {
            document.getElementById("main").style.marginLeft = "25%";
            document.getElementById("mySidebar").style.width = "25%";
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("openNav").style.display = 'none';
        }
        function w3_close() {
            document.getElementById("main").style.marginLeft = "0%";
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("openNav").style.display = "inline-block";
        }

        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });
    </script>
@endsection
