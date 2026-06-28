@extends('layouts.app')

@section('content')
<h4 class="mb-4">Dashboard Admin</h4>

<div class="row g-3">

    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h6 class="card-title">Total Dosen</h6>
                <p class="fs-3 fw-bold mb-0">{{ $jumlahDosen }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h6 class="card-title">Total Mahasiswa</h6>
                <p class="fs-3 fw-bold mb-0">{{ $jumlahMahasiswa }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h6 class="card-title">Total Mata Kuliah</h6>
                <p class="fs-3 fw-bold mb-0">{{ $jumlahMK }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <h6 class="card-title">Total Jadwal</h6>
                <p class="fs-3 fw-bold mb-0">{{ $jumlahJadwal }}</p>
            </div>
        </div>
    </div>

</div>
@endsection
