@extends('layouts.app')

@section('content')
<h4 class="mb-4">Daftar Jadwal Perkuliahan</h4>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mata Kuliah</th>
                        <th>Dosen</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwals as $jadwal)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $jadwal->mataKuliah->nama_mk ?? '-' }}</td>
                        <td>{{ $jadwal->dosen->nama ?? '-' }}</td>
                        <td>{{ $jadwal->hari }}</td>
                        <td>{{ $jadwal->jam }}</td>
                        <td>{{ $jadwal->kelas }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
