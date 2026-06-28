<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Dosen;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::with([
            'dosen',
            'mataKuliah'
        ])->get();

        return view('jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $dosens = Dosen::all();
        $matakuliahs = MataKuliah::all();

        return view('jadwal.create', compact(
            'dosens',
            'matakuliahs'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dosen_id' => 'required',
            'mata_kuliah_id' => 'required',
            'hari' => 'required',
            'jam' => 'required',
            'kelas' => 'required'
        ]);

        Jadwal::create([
            'dosen_id' => $request->dosen_id,
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'hari' => $request->hari,
            'jam' => $request->jam,
            'kelas' => $request->kelas
        ]);

        return redirect()
            ->route('jadwal.index')
            ->with('success','Jadwal berhasil ditambahkan');
    }

    public function edit(Jadwal $jadwal)
    {
        $dosens = Dosen::all();
        $matakuliahs = MataKuliah::all();

        return view('jadwal.edit', compact(
            'jadwal',
            'dosens',
            'matakuliahs'
        ));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'dosen_id' => 'required',
            'mata_kuliah_id' => 'required',
            'hari' => 'required',
            'jam' => 'required',
            'kelas' => 'required'
        ]);

        $jadwal->update([
            'dosen_id' => $request->dosen_id,
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'hari' => $request->hari,
            'jam' => $request->jam,
            'kelas' => $request->kelas
        ]);

        return redirect()
            ->route('jadwal.index')
            ->with('success','Jadwal berhasil diupdate');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()
            ->route('jadwal.index')
            ->with('success','Jadwal berhasil dihapus');
    }
    public function jadwalMahasiswa()
{
    $jadwals = Jadwal::with([
        'dosen',
        'mataKuliah'
    ])->get();

    return view('jadwal.mahasiswa', compact('jadwals'));
}
}
