@extends('layouts.app')

@section('content')
<h4 class="mb-4">Dashboard Mahasiswa</h4>

{{-- Info Mahasiswa --}}
<div class="card mb-4">
    <div class="card-body">
        <h6 class="card-title fw-bold">Informasi Mahasiswa</h6>
        <table class="table table-borderless mb-0">
            <tr>
                <td width="150">Nama</td>
                <td>: {{ $mahasiswa->nama ?? '-' }}</td>
            </tr>
            <tr>
                <td>NPM</td>
                <td>: {{ $mahasiswa->npm ?? '-' }}</td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td>: {{ $mahasiswa->prodi ?? '-' }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: {{ auth()->user()->email }}</td>
            </tr>
        </table>
    </div>
</div>

{{-- Statistik KRS --}}
<div class="row g-3 mb-4">
    <div class="col-md-6">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h6 class="card-title">Mata Kuliah Diambil</h6>
                <p class="fs-3 fw-bold mb-0">{{ $jumlahKrs }} MK</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h6 class="card-title">Total SKS</h6>
                <p class="fs-3 fw-bold mb-0">{{ $totalSks }} SKS</p>
            </div>
        </div>
    </div>
</div>

{{-- KRS Diambil --}}
<div class="card">
    <div class="card-body">
        <h6 class="fw-bold mb-3">KRS yang Diambil</h6>
        @if($krs->isEmpty())
            <p class="text-muted">Belum ada mata kuliah yang diambil.</p>
        @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>Dosen</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Kelas</th>
                    <th>SKS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($krs as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->jadwal->mataKuliah->nama_mk ?? '-' }}</td>
                    <td>{{ $item->jadwal->dosen->nama ?? '-' }}</td>
                    <td>{{ $item->jadwal->hari ?? '-' }}</td>
                    <td>{{ $item->jadwal->jam ?? '-' }}</td>
                    <td>{{ $item->jadwal->kelas ?? '-' }}</td>
                    <td>{{ $item->jadwal->mataKuliah->sks ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection
