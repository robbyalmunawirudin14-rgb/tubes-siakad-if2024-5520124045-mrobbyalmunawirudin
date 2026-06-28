@extends('layouts.app')

@section('content')

<h2>Dashboard Admin</h2>

<div class="row">

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Dosen</h5>
                <h1>{{ $jumlahDosen }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Mahasiswa</h5>
                <h1>{{ $jumlahMahasiswa }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Mata Kuliah</h5>
                <h1>{{ $jumlahMK }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Jadwal</h5>
                <h1>{{ $jumlahJadwal }}</h1>
            </div>
        </div>
    </div>

</div>

@endsection
