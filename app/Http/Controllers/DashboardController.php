<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Jadwal;
use App\Models\Krs;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->role == 'admin')
        {
            return view('dashboard.admin', [
                'jumlahDosen' => Dosen::count(),
                'jumlahMahasiswa' => Mahasiswa::count(),
                'jumlahMK' => MataKuliah::count(),
                'jumlahJadwal' => Jadwal::count(),
            ]);
        }

        $mahasiswa = Mahasiswa::where('user_id', auth()->id())->first();

        $jumlahKrs = 0;
        $totalSks = 0;
        $krs = collect();

        if($mahasiswa) {
            $krs = Krs::with(['jadwal.mataKuliah', 'jadwal.dosen'])
                ->where('mahasiswa_id', $mahasiswa->id)
                ->get();

            $jumlahKrs = $krs->count();
            $totalSks = $krs->sum(fn($k) => $k->jadwal->mataKuliah->sks ?? 0);
        }

        return view('dashboard.mahasiswa', compact(
            'mahasiswa',
            'krs',
            'jumlahKrs',
            'totalSks'
        ));
    }
}
