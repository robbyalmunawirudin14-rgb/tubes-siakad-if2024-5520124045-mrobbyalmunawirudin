@extends('layouts.app')
@section('content')
<div class="mb-3">
    <a href="{{ route('jadwal.index') }}" class="btn btn-secondary btn-sm">&larr; Kembali</a>
</div>
<div class="card" style="max-width:600px">
    <div class="card-header">Tambah Jadwal</div>
    <div class="card-body">
        <form action="{{ route('jadwal.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Mata Kuliah</label>
                <select name="mata_kuliah_id" id="mata_kuliah_id" class="form-control">
                    <option value="">-- Pilih Mata Kuliah --</option>
                    @foreach($matakuliahs as $mk)
                    <option value="{{ $mk->id }}" data-sks="{{ $mk->sks }}">{{ $mk->kode_mk }} - {{ $mk->nama_mk }} ({{ $mk->sks }} SKS)</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Dosen</label>
                <select name="dosen_id" class="form-control">
                    @foreach($dosens as $dosen)
                    <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Hari</label>
                <select name="hari" class="form-control">
                    @foreach(['Senin','Selasa','Rabu','Kamis','Jumat'] as $h)
                    <option>{{ $h }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Jam Mulai</label>
                <select name="jam" id="jam" class="form-control" disabled>
                    <option value="">-- Pilih Mata Kuliah dulu --</option>
                </select>
                <small class="text-muted" id="info_durasi"></small>
            </div>
            <div class="mb-3">
                <label>Kelas</label>
                <select name="kelas" class="form-control">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach(['IF-A','IF-B','IF-C','SI-A','SI-B'] as $k)
                    <option>{{ $k }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-success w-100">Simpan</button>
        </form>
    </div>
</div>
<script>
const jamMulaiList = ['07:00','08:00','09:00','10:00','11:00','13:00','14:00','15:00','16:00'];
function addMinutes(time, minutes) {
    const [h, m] = time.split(':').map(Number);
    const total = h * 60 + m + minutes;
    return `${String(Math.floor(total/60)).padStart(2,'0')}:${String(total%60).padStart(2,'0')}`;
}
document.getElementById('mata_kuliah_id').addEventListener('change', function() {
    const sks = parseInt(this.options[this.selectedIndex].dataset.sks) || 0;
    const durasi = sks * 40;
    const jamSelect = document.getElementById('jam');
    jamSelect.innerHTML = '<option value="">-- Pilih Jam Mulai --</option>';
    if (sks > 0) {
        jamSelect.disabled = false;
        document.getElementById('info_durasi').textContent = `Durasi: ${sks} SKS × 40 menit = ${durasi} menit`;
        jamMulaiList.forEach(jam => {
            const opt = document.createElement('option');
            opt.value = opt.text = `${jam} - ${addMinutes(jam, durasi)}`;
            jamSelect.appendChild(opt);
        });
    } else { jamSelect.disabled = true; document.getElementById('info_durasi').textContent = ''; }
});
</script>
@endsection
