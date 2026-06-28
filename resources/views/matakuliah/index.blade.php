@extends('layouts.app')
@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
    <h4 class="mb-0">Data Mata Kuliah</h4>
    <a href="{{ route('matakuliah.create') }}" class="btn btn-primary btn-sm">+ Tambah Mata Kuliah</a>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered datatable">
                <thead>
                    <tr><th>No</th><th>Kode MK</th><th>Nama Mata Kuliah</th><th>SKS</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                @foreach($matakuliahs as $mk)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mk->kode_mk }}</td>
                        <td>{{ $mk->nama_mk }}</td>
                        <td>{{ $mk->sks }}</td>
                        <td>
                            <a href="{{ route('matakuliah.edit',$mk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('matakuliah.destroy',$mk->id) }}" method="POST" style="display:inline">
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
