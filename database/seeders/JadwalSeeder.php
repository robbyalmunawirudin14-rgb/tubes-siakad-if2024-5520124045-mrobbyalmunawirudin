<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    public function run(): void
    {
        Jadwal::insert([
            ['mata_kuliah_id' => 1, 'dosen_id' => 1, 'hari' => 'Senin',  'jam' => '07:00 - 08:20', 'kelas' => 'IF-A'],
            ['mata_kuliah_id' => 1, 'dosen_id' => 2, 'hari' => 'Selasa', 'jam' => '08:00 - 09:20', 'kelas' => 'IF-B'],
            ['mata_kuliah_id' => 2, 'dosen_id' => 3, 'hari' => 'Rabu',   'jam' => '09:00 - 10:20', 'kelas' => 'IF-A'],
            ['mata_kuliah_id' => 2, 'dosen_id' => 4, 'hari' => 'Kamis',  'jam' => '10:00 - 11:20', 'kelas' => 'IF-B'],
            ['mata_kuliah_id' => 3, 'dosen_id' => 5, 'hari' => 'Jumat',  'jam' => '07:00 - 08:20', 'kelas' => 'IF-A'],
            ['mata_kuliah_id' => 3, 'dosen_id' => 6, 'hari' => 'Senin',  'jam' => '13:00 - 14:20', 'kelas' => 'IF-B'],
            ['mata_kuliah_id' => 4, 'dosen_id' => 7, 'hari' => 'Selasa', 'jam' => '10:00 - 11:20', 'kelas' => 'IF-A'],
            ['mata_kuliah_id' => 4, 'dosen_id' => 8, 'hari' => 'Rabu',   'jam' => '13:00 - 14:20', 'kelas' => 'IF-B'],
            ['mata_kuliah_id' => 5, 'dosen_id' => 9, 'hari' => 'Kamis',  'jam' => '08:00 - 09:20', 'kelas' => 'IF-A'],
            ['mata_kuliah_id' => 5, 'dosen_id' => 10,'hari' => 'Jumat',  'jam' => '09:00 - 10:20', 'kelas' => 'IF-B'],
            ['mata_kuliah_id' => 6, 'dosen_id' => 11,'hari' => 'Senin',  'jam' => '10:00 - 11:20', 'kelas' => 'IF-A'],
            ['mata_kuliah_id' => 6, 'dosen_id' => 12,'hari' => 'Selasa', 'jam' => '13:00 - 14:20', 'kelas' => 'IF-B'],
            ['mata_kuliah_id' => 7, 'dosen_id' => 13,'hari' => 'Rabu',   'jam' => '07:00 - 08:20', 'kelas' => 'IF-A'],
            ['mata_kuliah_id' => 7, 'dosen_id' => 14,'hari' => 'Kamis',  'jam' => '13:00 - 14:20', 'kelas' => 'IF-B'],
            ['mata_kuliah_id' => 8, 'dosen_id' => 15,'hari' => 'Jumat',  'jam' => '10:00 - 11:20', 'kelas' => 'IF-A'],
            ['mata_kuliah_id' => 9, 'dosen_id' => 1, 'hari' => 'Senin',  'jam' => '08:00 - 09:20', 'kelas' => 'IF-A'],
            ['mata_kuliah_id' => 10,'dosen_id' => 2, 'hari' => 'Selasa', 'jam' => '07:00 - 08:20', 'kelas' => 'IF-A'],
            ['mata_kuliah_id' => 11,'dosen_id' => 3, 'hari' => 'Rabu',   'jam' => '10:00 - 11:20', 'kelas' => 'SI-A'],
            ['mata_kuliah_id' => 12,'dosen_id' => 4, 'hari' => 'Kamis',  'jam' => '08:00 - 09:20', 'kelas' => 'SI-A'],
            ['mata_kuliah_id' => 13,'dosen_id' => 5, 'hari' => 'Jumat',  'jam' => '13:00 - 14:20', 'kelas' => 'SI-A'],
        ]);
       
    }
}
