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
                    <h1>DATA MATA KULIAH</h1>
                </div>
            </div>
            <div style="margin-right: 20px;">
                <button class="btn btn-dark" data-toggle="modal" onclick="location.href='/admin/tambahdatamatkul'">Tambah Data</button>
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

            <div class="container mt-4">
                <div class="table-responsive shadow p-3 mb-5 bg-white rounded">
                    <table class="table table-bordered table-striped" id="matkulTable">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Kode Mata Kuliah</th>
                                <th scope="col">Nama Mata Kuliah</th>
                                <th scope="col">SKS</th>
                                <th scope="col">Semester</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($matkul as $matkuls)
                                <tr>
                                    <td>{{ $matkuls->kode }}</td>
                                    <td>{{ $matkuls->namamatakuliah }}</td>
                                    <td>{{ $matkuls->sks }}</td>
                                    <td>{{ $matkuls->semester }}</td>
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
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.6/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Inisialisasi DataTable
            var table = $('#matkulTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '/admin/matkuls/sort',
                    type: 'GET',
                },
                columns: [
                    { data: 'kode', name: 'kode' },
                    { data: 'namamatakuliah', name: 'namamatakuliah' },
                    { data: 'sks', name: 'sks' },
                    { data: 'semester', name: 'semester' },
                    // Sesuaikan dengan kolom-kolom yang Anda punya
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ],
            });

            // Fungsi untuk meng-handle filter
            $('.filter').click(function () {
                var column = $(this).data('column');
                var order = $(this).data('order');

                table.order([[column, order]]).draw();
            });
        });
    </script>
@endsection
