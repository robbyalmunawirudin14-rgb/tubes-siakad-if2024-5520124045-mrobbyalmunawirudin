@extends('layouts.app')
@section('content')
<div class="mb-3">
    <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary btn-sm">&larr; Kembali</a>
</div>
<div class="card" style="max-width:600px">
    <div class="card-header">Tambah Mata Kuliah</div>
    <div class="card-body">
        <form action="{{ route('matakuliah.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Jurusan</label>
                <select id="jurusan" class="form-control">
                    <option value="">-- Pilih Jurusan --</option>
                    <option value="IF">Informatika</option>
                    <option value="SI">Sistem Informasi</option>
                    <option value="TE">Teknik Elektro</option>
                    <option value="TS">Teknik Sipil</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Nama Mata Kuliah</label>
                <select id="nama_mk" name="nama_mk" class="form-control" disabled>
                    <option value="">-- Pilih Jurusan dulu --</option>
                </select>
            </div>
            <div class="mb-3"><label>Kode MK</label><input type="text" name="kode_mk" id="kode_mk" class="form-control" readonly></div>
            <div class="mb-3"><label>SKS</label><input type="number" name="sks" class="form-control" min="1" max="6"></div>
            <button class="btn btn-success w-100">Simpan</button>
        </form>
    </div>
</div>
<script>
const mataKuliahData = {
    'IF': ['Pemrograman Web','Basis Data','Algoritma & Pemrograman','Jaringan Komputer','Rekayasa Perangkat Lunak'],
    'SI': ['Sistem Informasi','Analisis & Desain Sistem','Manajemen Proyek TI','Audit Sistem Informasi'],
    'TE': ['Elektronika Dasar','Rangkaian Listrik','Sistem Kendali','Microcontroller'],
    'TS': ['Mekanika Tanah','Struktur Bangunan','Hidrolika','Manajemen Konstruksi'],
};
const kodePrefixData = {
    'IF': { prefix: 'IF', start: 101 }, 'SI': { prefix: 'SI', start: 201 },
    'TE': { prefix: 'TE', start: 301 }, 'TS': { prefix: 'TS', start: 401 },
};
document.getElementById('jurusan').addEventListener('change', function() {
    const jurusan = this.value;
    const namaMkSelect = document.getElementById('nama_mk');
    const kodeMkInput = document.getElementById('kode_mk');
    namaMkSelect.innerHTML = '<option value="">-- Pilih Mata Kuliah --</option>';
    kodeMkInput.value = '';
    if (jurusan) {
        namaMkSelect.disabled = false;
        mataKuliahData[jurusan].forEach(function(mk, index) {
            const option = document.createElement('option');
            option.value = mk; option.text = mk;
            option.dataset.kode = kodePrefixData[jurusan].prefix + (kodePrefixData[jurusan].start + index);
            namaMkSelect.appendChild(option);
        });
    } else { namaMkSelect.disabled = true; }
});
document.getElementById('nama_mk').addEventListener('change', function() {
    const selected = this.options[this.selectedIndex];
    document.getElementById('kode_mk').value = selected.dataset.kode || '';
});
</script>
@endsection
