@extends('layouts.app')

@section('content')

<h2 class="mb-4">Pengisian KRS</h2>

<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('krs.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Pilih Mata Kuliah</label>
                <select name="jadwal_id" class="form-control">
                    @foreach($jadwals as $jadwal)
                    <option value="{{ $jadwal->id }}">
                        {{ $jadwal->mataKuliah->nama_mk }}
                        | {{ $jadwal->dosen->nama }}
                        | {{ $jadwal->hari }}
                        | {{ $jadwal->jam }}
                        | {{ $jadwal->kelas }}
                    </option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-success w-100 w-sm-auto">Ambil Mata Kuliah</button>
        </form>
    </div>
</div>

<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
    <h5 class="mb-0">KRS Saya</h5>
    <a href="{{ route('krs.export') }}" class="btn btn-danger btn-sm">
        <i class="bi bi-file-earmark-pdf me-1"></i> Export PDF
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mata Kuliah</th>
                        <th>Dosen</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Kelas</th>
                        <th>SKS</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($krs as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->jadwal->mataKuliah->nama_mk }}</td>
                        <td>{{ $item->jadwal->dosen->nama }}</td>
                        <td>{{ $item->jadwal->hari }}</td>
                        <td>{{ $item->jadwal->jam }}</td>
                        <td>{{ $item->jadwal->kelas }}</td>
                        <td>{{ $item->jadwal->mataKuliah->sks }}</td>
                        <td>
                            <form action="{{ route('krs.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Drop</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6" class="text-end fw-bold">Total SKS</td>
                        <td colspan="2" class="fw-bold">
                            {{ $krs->sum(fn($k) => $k->jadwal->mataKuliah->sks ?? 0) }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection
