@extends('layouts.app')
@section('content')
<div class="mb-3">
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary btn-sm">&larr; Kembali</a>
</div>
<div class="card" style="max-width:600px">
    <div class="card-header">Tambah Mahasiswa</div>
    <div class="card-body">
        <form action="{{ route('mahasiswa.store') }}" method="POST">
            @csrf
            <div class="mb-3"><label>NPM</label><input type="text" name="npm" class="form-control"></div>
            <div class="mb-3"><label>Nama</label><input type="text" name="nama" class="form-control"></div>
            <div class="mb-3">
                <label>Prodi</label>
                <select name="prodi" class="form-control">
                    <option value="">-- Pilih Prodi --</option>
                    <option value="Informatika">Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Teknik Elektro">Teknik Elektro</option>
                    <option value="Teknik Sipil">Teknik Sipil</option>
                </select>
            </div>
            <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control"></div>
            <button class="btn btn-success w-100">Simpan</button>
        </form>
    </div>
</div>
@endsection
