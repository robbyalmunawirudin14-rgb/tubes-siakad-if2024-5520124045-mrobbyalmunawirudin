<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::all();

        return view('dosen.index', compact('dosens'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:dosens',
            'nama' => 'required|min:3',
            'email' => 'required|email'
        ]);

        Dosen::create([
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'email' => $request->email
        ]);

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil ditambahkan');
    }

    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
{
    $request->validate([
        'nidn'  => 'required|unique:dosens,nidn,'.$dosen->id,
        'nama'  => 'required|min:3',
        'email' => 'required|email|unique:dosens,email,'.$dosen->id,
        ]);
        $dosen->update([
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'email' => $request->email
        ]);

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil diupdate');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil dihapus');
    }
}
