@extends('layouts.app')
@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
    <h4 class="mb-0">Data Mahasiswa</h4>
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary btn-sm">+ Tambah Mahasiswa</a>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered datatable">
                <thead>
                    <tr><th>No</th><th>NPM</th><th>Nama</th><th>Prodi</th><th>Email</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                @foreach($mahasiswas as $mhs)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mhs->npm }}</td>
                        <td>{{ $mhs->nama }}</td>
                        <td>{{ $mhs->prodi }}</td>
                        <td>{{ $mhs->user->email }}</td>
                        <td>
                            <a href="{{ route('mahasiswa.edit',$mhs->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('mahasiswa.destroy',$mhs->id) }}" method="POST" style="display:inline">
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
