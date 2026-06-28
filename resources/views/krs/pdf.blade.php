<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>KRS - {{ $mahasiswa->nama }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 13px; }
        h2, h4 { text-align: center; margin: 5px 0; }
        .info { margin: 15px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #000; padding: 6px 8px; }
        th { background-color: #f0f0f0; text-align: center; }
        td { text-align: center; }
        td:nth-child(2), td:nth-child(3) { text-align: left; }
        .total { text-align: right; font-weight: bold; }
        .footer { margin-top: 40px; text-align: right; }
    </style>
</head>
<body>

<h2>UNIVERSITAS SURYAKANCANA</h2>
<h4>KARTU RENCANA STUDI (KRS)</h4>
<h4>Semester Genap 2024/2025</h4>

<hr>

<table class="info" style="border: none;">
    <tr>
        <td style="border: none; width: 150px;">Nama</td>
        <td style="border: none;">: {{ $mahasiswa->nama }}</td>
    </tr>
    <tr>
        <td style="border: none;">NPM</td>
        <td style="border: none;">: {{ $mahasiswa->npm }}</td>
    </tr>
    <tr>
        <td style="border: none;">Program Studi</td>
        <td style="border: none;">: {{ $mahasiswa->prodi }}</td>
    </tr>
</table>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Mata Kuliah</th>
            <th>Dosen</th>
            <th>Hari</th>
            <th>Jam</th>
            <th>Kelas</th>
            <th>SKS</th>
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
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6" class="total">Total SKS</td>
            <td style="text-align:center; font-weight:bold;">
                {{ $krs->sum(fn($k) => $k->jadwal->mataKuliah->sks ?? 0) }}
            </td>
        </tr>
    </tfoot>
</table>

<div class="footer">
    <p>Cianjur, {{ now()->translatedFormat('d F Y') }}</p>
    <br><br><br>
    <p>( _________________________ )</p>
    <p>Pembimbing Akademik</p>
</div>

</body>
</html>
