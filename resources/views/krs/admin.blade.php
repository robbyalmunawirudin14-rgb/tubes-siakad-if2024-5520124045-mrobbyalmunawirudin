@extends('layouts.app')

@section('content')
<h4 class="mb-4">Data KRS Mahasiswa</h4>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mahasiswa</th>
                        <th>Mata Kuliah</th>
                        <th>Dosen</th>
                        <th>Hari</th>
                        <th>Jam</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($krs as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->mahasiswa->nama ?? '-' }}</td>
                        <td>{{ $item->jadwal->mataKuliah->nama_mk ?? '-' }}</td>
                        <td>{{ $item->jadwal->dosen->nama ?? '-' }}</td>
                        <td>{{ $item->jadwal->hari ?? '-' }}</td>
                        <td>{{ $item->jadwal->jam ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
