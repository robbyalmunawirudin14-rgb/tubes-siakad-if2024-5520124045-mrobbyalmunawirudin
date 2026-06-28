<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class KrsController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::where(
            'user_id',
            auth()->id()
        )->first();

        $jadwals = Jadwal::with([
            'dosen',
            'mataKuliah'
        ])->get();

        $krs = Krs::with([
            'jadwal.mataKuliah',
            'jadwal.dosen'
        ])
        ->where(
            'mahasiswa_id',
            $mahasiswa->id
        )
        ->get();

        return view(
            'krs.index',
            compact(
                'jadwals',
                'krs'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'jadwal_id' => 'required'
        ]);

        $mahasiswa = Mahasiswa::where(
            'user_id',
            auth()->id()
        )->first();

        $cek = Krs::where(
            'mahasiswa_id',
            $mahasiswa->id
        )
        ->where(
            'jadwal_id',
            $request->jadwal_id
        )
        ->first();

        if($cek)
        {
            return back()
                ->with(
                    'success',
                    'Mata kuliah sudah diambil'
                );
        }

        Krs::create([
            'mahasiswa_id' => $mahasiswa->id,
            'jadwal_id' => $request->jadwal_id
        ]);

        return back()
            ->with(
                'success',
                'KRS berhasil ditambahkan'
            );
    }

    public function destroy($id)
    {
        Krs::findOrFail($id)
            ->delete();

        return back()
            ->with(
                'success',
                'KRS berhasil dihapus'
            );
    }

    public function adminIndex()
    {
        $krs = Krs::with([
            'mahasiswa',
            'jadwal.mataKuliah',
            'jadwal.dosen'
        ])->get();

        return view(
            'krs.admin',
            compact('krs')
        );
    }
    public function export()
    {
        $mahasiswa = Mahasiswa::where('user_id', auth()->id())->first();

        $krs = Krs::with([
            'jadwal.mataKuliah',
            'jadwal.dosen'
        ])
        ->where('mahasiswa_id', $mahasiswa->id)
        ->get();

        $pdf = Pdf::loadView('krs.pdf', compact('mahasiswa', 'krs'));

        return $pdf->download('KRS-'.$mahasiswa->npm.'.pdf');
    }
}
