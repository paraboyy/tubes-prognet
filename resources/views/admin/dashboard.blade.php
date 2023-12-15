<!-- resources/views/admin.blade.php -->

@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="w3-sidebar w3-teal w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large"onclick="w3_close()">Close &times;</button>
        <a href="dashboard" class="w3-bar-item w3-button">Dashboard</a>
        <a href="datamahasiswa" class="w3-bar-item w3-button">Data Mahasiswa</a>
        <a href="datamatkul" class="w3-bar-item w3-button">Data Mata Kuliah</a>
    </div>

    <div id="main">

        <div class="w3-teal">
            <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
            <div class="w3-container">
                <h1>Dashboard</h1>
            </div>
        </div>

        <div class="container mt-4">
            <div class="table-responsive shadow p-3 mb-5 bg-white rounded" style="display: flex;">
                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
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

        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('myChart').getContext('2d');
            var barColors = ["CadetBlue", "DarkOliveGreen","LightSeaGreen","MediumSeaGreen"];
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! $data->pluck('semester') !!},
                    datasets: [{
                        label: 'Total Matakuliah Semester',
                        data: {!! $data->pluck('total_matakuliah') !!},
                        backgroundColor: barColors,
                        borderWidth: 5,
                    }],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('myChart2').getContext('2d');
            var barColors = ["CadetBlue", "DarkOliveGreen","LightSeaGreen","MediumSeaGreen"];
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! $datamahasiswa->pluck('alamat') !!},
                    datasets: [{
                        label: 'Data Mahasiswa Tiap Kota/Kabupaten',
                        data: {!! $datamahasiswa->pluck('total_mahasiswa') !!},
                        backgroundColor: barColors,
                        borderWidth: 5,
                    }],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });
        });
    </script>
@endsection
