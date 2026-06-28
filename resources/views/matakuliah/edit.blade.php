@extends('layouts.app')
@section('content')
<div class="mb-3">
    <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary btn-sm">&larr; Kembali</a>
</div>
<div class="card" style="max-width:600px">
    <div class="card-header">Edit Mata Kuliah</div>
    <div class="card-body">
        <form action="{{ route('matakuliah.update',$matakuliah->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3"><label>Kode MK</label><input type="text" name="kode_mk" value="{{ $matakuliah->kode_mk }}" class="form-control"></div>
            <div class="mb-3"><label>Nama Mata Kuliah</label><input type="text" name="nama_mk" value="{{ $matakuliah->nama_mk }}" class="form-control"></div>
            <div class="mb-3"><label>SKS</label><input type="number" name="sks" value="{{ $matakuliah->sks }}" class="form-control" min="1" max="6"></div>
            <button class="btn btn-primary w-100">Update</button>
        </form>
    </div>
</div>
@endsection
