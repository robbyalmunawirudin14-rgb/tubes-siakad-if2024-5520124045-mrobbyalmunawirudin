<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            DosenSeeder::class,
            MataKuliahSeeder::class
        ]);
         $this->call([
            AdminSeeder::class,
            DosenSeeder::class,
            MataKuliahSeeder::class,
            MahasiswaSeeder::class,
            JadwalSeeder::class, 
        ]);
    }
}
