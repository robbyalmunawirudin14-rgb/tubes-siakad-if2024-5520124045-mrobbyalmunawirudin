@extends('layouts.app')
@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
    <h4 class="mb-0">Data Jadwal</h4>
    <a href="{{ route('jadwal.create') }}" class="btn btn-primary btn-sm">+ Tambah Jadwal</a>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered datatable">
                <thead>
                    <tr><th>No</th><th>Mata Kuliah</th><th>Dosen</th><th>Hari</th><th>Jam</th><th>Kelas</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                @foreach($jadwals as $jadwal)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $jadwal->mataKuliah->nama_mk }}</td>
                        <td>{{ $jadwal->dosen->nama }}</td>
                        <td>{{ $jadwal->hari }}</td>
                        <td>{{ $jadwal->jam }}</td>
                        <td>{{ $jadwal->kelas }}</td>
                        <td>
                            <a href="{{ route('jadwal.edit',$jadwal->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('jadwal.destroy',$jadwal->id) }}" method="POST" style="display:inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
