@extends('layouts.app')
@section('content')
<div class="mb-3">
    <a href="{{ route('dosen.index') }}" class="btn btn-secondary btn-sm">&larr; Kembali</a>
</div>
<div class="card" style="max-width:600px">
    <div class="card-header">Tambah Dosen</div>
    <div class="card-body">
        <form action="{{ route('dosen.store') }}" method="POST">
            @csrf
            <div class="mb-3"><label>NIDN</label><input type="text" name="nidn" class="form-control"></div>
            <div class="mb-3"><label>Nama</label><input type="text" name="nama" class="form-control"></div>
            <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control"></div>
            <button class="btn btn-success w-100">Simpan</button>
        </form>
    </div>
</div>
@endsection
