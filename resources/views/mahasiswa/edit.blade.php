@extends('layouts.app')
@section('content')
<div class="mb-3">
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary btn-sm">&larr; Kembali</a>
</div>
<div class="card" style="max-width:600px">
    <div class="card-header">Edit Mahasiswa</div>
    <div class="card-body">
        <form action="{{ route('mahasiswa.update',$mahasiswa->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3"><label>NPM</label><input type="text" name="npm" value="{{ $mahasiswa->npm }}" class="form-control"></div>
            <div class="mb-3"><label>Nama</label><input type="text" name="nama" value="{{ $mahasiswa->nama }}" class="form-control"></div>
            <div class="mb-3">
                <label>Prodi</label>
                <select name="prodi" class="form-control">
                    <option value="">-- Pilih Prodi --</option>
                    @foreach(['Informatika','Sistem Informasi','Teknik Elektro','Teknik Sipil'] as $p)
                    <option value="{{ $p }}" {{ $mahasiswa->prodi == $p ? 'selected' : '' }}>{{ $p }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3"><label>Email</label><input type="email" name="email" value="{{ $mahasiswa->user->email ?? '' }}" class="form-control"></div>
            <button class="btn btn-primary w-100">Update</button>
        </form>
    </div>
</div>
@endsection
