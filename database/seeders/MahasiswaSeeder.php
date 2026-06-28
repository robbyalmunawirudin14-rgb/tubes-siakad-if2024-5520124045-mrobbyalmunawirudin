<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $mahasiswas = [
            ['npm' => '5520124001', 'nama' => 'Andi Pratama',       'prodi' => 'Informatika',     'email' => 'andi.pratama@gmail.com'],
            ['npm' => '5520124002', 'nama' => 'Budi Santoso',       'prodi' => 'Informatika',     'email' => 'budi.santoso@gmail.com'],
            ['npm' => '5520124003', 'nama' => 'Citra Dewi',         'prodi' => 'Informatika',     'email' => 'citra.dewi@gmail.com'],
            ['npm' => '5520124004', 'nama' => 'Dian Putri',         'prodi' => 'Sistem Informasi','email' => 'dian.putri@gmail.com'],
            ['npm' => '5520124005', 'nama' => 'Eko Wijaya',         'prodi' => 'Sistem Informasi','email' => 'eko.wijaya@gmail.com'],
            ['npm' => '5520124006', 'nama' => 'Fajar Ramadhan',     'prodi' => 'Informatika',     'email' => 'fajar.ramadhan@gmail.com'],
            ['npm' => '5520124007', 'nama' => 'Gita Lestari',       'prodi' => 'Informatika',     'email' => 'gita.lestari@gmail.com'],
            ['npm' => '5520124008', 'nama' => 'Hani Safitri',       'prodi' => 'Sistem Informasi','email' => 'hani.safitri@gmail.com'],
            ['npm' => '5520124009', 'nama' => 'Irfan Maulana',      'prodi' => 'Informatika',     'email' => 'irfan.maulana@gmail.com'],
            ['npm' => '5520124010', 'nama' => 'Julia Rahayu',       'prodi' => 'Sistem Informasi','email' => 'julia.rahayu@gmail.com'],
            ['npm' => '5520124011', 'nama' => 'Kevin Pratama',      'prodi' => 'Informatika',     'email' => 'kevin.pratama@gmail.com'],
            ['npm' => '5520124012', 'nama' => 'Lina Marlina',       'prodi' => 'Informatika',     'email' => 'lina.marlina@gmail.com'],
            ['npm' => '5520124013', 'nama' => 'Muhammad Rizki',     'prodi' => 'Informatika',     'email' => 'rizki.muhammad@gmail.com'],
            ['npm' => '5520124014', 'nama' => 'Nadia Anggraeni',    'prodi' => 'Sistem Informasi','email' => 'nadia.anggraeni@gmail.com'],
            ['npm' => '5520124015', 'nama' => 'Oscar Firmansyah',   'prodi' => 'Informatika',     'email' => 'oscar.firmansyah@gmail.com'],
            ['npm' => '5520124016', 'nama' => 'Putri Handayani',    'prodi' => 'Sistem Informasi','email' => 'putri.handayani@gmail.com'],
            ['npm' => '5520124017', 'nama' => 'Rangga Saputra',     'prodi' => 'Informatika',     'email' => 'rangga.saputra@gmail.com'],
            ['npm' => '5520124018', 'nama' => 'Sari Indah',         'prodi' => 'Sistem Informasi','email' => 'sari.indah@gmail.com'],
            ['npm' => '5520124019', 'nama' => 'Taufik Hidayat',     'prodi' => 'Informatika',     'email' => 'taufik.hidayat@gmail.com'],
            ['npm' => '5520124020', 'nama' => 'Ulfah Nurjanah',     'prodi' => 'Sistem Informasi','email' => 'ulfah.nurjanah@gmail.com'],
        ];

        foreach($mahasiswas as $data) {
            $user = User::create([
                'name'     => $data['nama'],
                'email'    => $data['email'],
                'password' => Hash::make('12345678'),
                'role'     => 'mahasiswa'
            ]);

            Mahasiswa::create([
                'npm'     => $data['npm'],
                'nama'    => $data['nama'],
                'prodi'   => $data['prodi'],
                'user_id' => $user->id
            ]);
        }
    }
}
