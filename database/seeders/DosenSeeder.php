<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    public function run(): void
    {
        Dosen::insert([
            ['nidn' => '111111', 'nama' => 'Dr. Budi Santoso, M.Kom', 'email' => 'budi@gmail.com'],
            ['nidn' => '222222', 'nama' => 'Dr. Andi Wijaya, M.T', 'email' => 'andi@gmail.com'],
            ['nidn' => '333333', 'nama' => 'Prof. Siti Rahayu, Ph.D', 'email' => 'siti@gmail.com'],
            ['nidn' => '444444', 'nama' => 'Dr. Rudi Hermawan, M.Cs', 'email' => 'rudi@gmail.com'],
            ['nidn' => '555555', 'nama' => 'Ir. Dewi Kusuma, M.T', 'email' => 'dewi@gmail.com'],
            ['nidn' => '666666', 'nama' => 'Dr. Hendra Gunawan, M.Kom', 'email' => 'hendra@gmail.com'],
            ['nidn' => '777777', 'nama' => 'Prof. Rina Marlina, Ph.D', 'email' => 'rina@gmail.com'],
            ['nidn' => '888888', 'nama' => 'Dr. Agus Salim, M.Si', 'email' => 'agus@gmail.com'],
            ['nidn' => '999999', 'nama' => 'Dr. Fajar Nugroho, M.Kom', 'email' => 'fajar@gmail.com'],
            ['nidn' => '101010', 'nama' => 'Prof. Lina Wati, Ph.D', 'email' => 'lina@gmail.com'],
            ['nidn' => '121212', 'nama' => 'Dr. Bambang Setiawan, M.T', 'email' => 'bambang@gmail.com'],
            ['nidn' => '131313', 'nama' => 'Ir. Yuni Astuti, M.Cs', 'email' => 'yuni@gmail.com'],
            ['nidn' => '141414', 'nama' => 'Dr. Dian Permana, M.Kom', 'email' => 'dian@gmail.com'],
            ['nidn' => '151515', 'nama' => 'Prof. Wahyu Hidayat, Ph.D', 'email' => 'wahyu@gmail.com'],
            ['nidn' => '161616', 'nama' => 'Dr. Nani Suryani, M.Si', 'email' => 'nani@gmail.com'],
        ]);
    }
}
