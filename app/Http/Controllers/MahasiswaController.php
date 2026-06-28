<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with('user')->get();

        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required|unique:mahasiswas',
            'nama' => 'required|min:3',
            'prodi' => 'required',
            'email' => 'required|email|unique:users'
        ]);

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
            'role' => 'mahasiswa'
        ]);

        Mahasiswa::create([
            'npm' => $request->npm,
            'nama' => $request->nama,
            'prodi' => $request->prodi,
            'user_id' => $user->id
        ]);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success','Mahasiswa berhasil ditambahkan');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
{
    $request->validate([
        'npm'   => 'required',
        'nama'  => 'required|min:3',
        'prodi' => 'required',
        'email' => 'required|email|unique:users,email,'.$mahasiswa->user_id,
    ]);

    $mahasiswa->update([
        'npm'   => $request->npm,
        'nama'  => $request->nama,
        'prodi' => $request->prodi,
    ]);

    $mahasiswa->user->update([
        'name'  => $request->nama,
        'email' => $request->email,
    ]);

    return redirect()
        ->route('mahasiswa.index')
        ->with('success', 'Mahasiswa berhasil diupdate');
}

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()
            ->route('mahasiswa.index')
            ->with('success','Mahasiswa berhasil dihapus');
    }
}
