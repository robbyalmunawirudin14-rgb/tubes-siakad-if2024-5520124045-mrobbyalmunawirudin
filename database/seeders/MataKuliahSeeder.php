<?php

namespace Database\Seeders;

use App\Models\MataKuliah;
use Illuminate\Database\Seeder;

class MataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        MataKuliah::insert([
            ['kode_mk' => 'IF101', 'nama_mk' => 'Pemrograman Web', 'sks' => 3],
            ['kode_mk' => 'IF102', 'nama_mk' => 'Basis Data', 'sks' => 3],
            ['kode_mk' => 'IF103', 'nama_mk' => 'Algoritma & Pemrograman', 'sks' => 3],
            ['kode_mk' => 'IF104', 'nama_mk' => 'Jaringan Komputer', 'sks' => 2],
            ['kode_mk' => 'IF105', 'nama_mk' => 'Rekayasa Perangkat Lunak', 'sks' => 3],
            ['kode_mk' => 'IF106', 'nama_mk' => 'Kecerdasan Buatan', 'sks' => 3],
            ['kode_mk' => 'IF107', 'nama_mk' => 'Sistem Operasi', 'sks' => 2],
            ['kode_mk' => 'IF108', 'nama_mk' => 'Pemrograman Mobile', 'sks' => 3],
            ['kode_mk' => 'IF109', 'nama_mk' => 'IT Governance', 'sks' => 2],
            ['kode_mk' => 'IF110', 'nama_mk' => 'Keamanan Jaringan', 'sks' => 2],
            ['kode_mk' => 'SI201', 'nama_mk' => 'Sistem Informasi', 'sks' => 3],
            ['kode_mk' => 'SI202', 'nama_mk' => 'Analisis & Desain Sistem', 'sks' => 3],
            ['kode_mk' => 'SI203', 'nama_mk' => 'Manajemen Proyek TI', 'sks' => 2],
            ['kode_mk' => 'SI204', 'nama_mk' => 'Audit Sistem Informasi', 'sks' => 2],
            ['kode_mk' => 'SI205', 'nama_mk' => 'E-Commerce', 'sks' => 3],
        ]);
    }
}
