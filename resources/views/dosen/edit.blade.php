@extends('layouts.app')
@section('content')
<div class="mb-3">
    <a href="{{ route('dosen.index') }}" class="btn btn-secondary btn-sm">&larr; Kembali</a>
</div>
<div class="card" style="max-width:600px">
    <div class="card-header">Edit Dosen</div>
    <div class="card-body">
        <form action="{{ route('dosen.update',$dosen->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3"><label>NIDN</label><input type="text" name="nidn" value="{{ $dosen->nidn }}" class="form-control"></div>
            <div class="mb-3"><label>Nama</label><input type="text" name="nama" value="{{ $dosen->nama }}" class="form-control"></div>
            <div class="mb-3"><label>Email</label><input type="email" name="email" value="{{ $dosen->email }}" class="form-control"></div>
            <button class="btn btn-primary w-100">Update</button>
        </form>
    </div>
</div>
@endsection
