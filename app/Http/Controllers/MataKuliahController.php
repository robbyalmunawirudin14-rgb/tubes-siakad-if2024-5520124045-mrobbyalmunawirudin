<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $matakuliahs = MataKuliah::all();

        return view('matakuliah.index', compact('matakuliahs'));
    }

    public function create()
    {
        return view('matakuliah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|unique:mata_kuliahs',
            'nama_mk' => 'required',
            'sks' => 'required|numeric|min:1|max:6'
        ]);

        MataKuliah::create([
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
            'sks' => $request->sks
        ]);

        return redirect()
            ->route('matakuliah.index')
            ->with('success', 'Mata kuliah berhasil ditambahkan');
    }

    public function edit(MataKuliah $matakuliah)
    {
        return view('matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, MataKuliah $matakuliah)
{
    $request->validate([
        'kode_mk' => 'required|unique:mata_kuliahs,kode_mk,'.$matakuliah->id,
        'nama_mk' => 'required',
        'sks'     => 'required|numeric|min:1|max:6',
        ]);
        $matakuliah->update([
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
            'sks' => $request->sks
        ]);

        return redirect()
            ->route('matakuliah.index')
            ->with('success', 'Mata kuliah berhasil diupdate');
    }

    public function destroy(MataKuliah $matakuliah)
    {
        $matakuliah->delete();

        return redirect()
            ->route('matakuliah.index')
            ->with('success', 'Mata kuliah berhasil dihapus');
    }
}
