@extends('layouts.app')
@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
    <h4 class="mb-0">Data Dosen</h4>
    <a href="{{ route('dosen.create') }}" class="btn btn-primary btn-sm">+ Tambah Dosen</a>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered datatable">
                <thead>
                    <tr><th>No</th><th>NIDN</th><th>Nama</th><th>Email</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                @foreach($dosens as $dosen)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dosen->nidn }}</td>
                        <td>{{ $dosen->nama }}</td>
                        <td>{{ $dosen->email }}</td>
                        <td>
                            <a href="{{ route('dosen.edit',$dosen->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('dosen.destroy',$dosen->id) }}" method="POST" style="display:inline">
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
