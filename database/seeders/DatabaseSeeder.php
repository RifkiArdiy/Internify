<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Level::factory()->create(['level_nama' => 'admin']);
        \App\Models\Level::factory()->create(['level_nama' => 'mahasiswa']);
        \App\Models\Level::factory()->create(['level_nama' => 'dosen']);

        $this->call([
            UserSeeder::class,
            ProgramStudiSeeder::class,
            MahasiswaSeeder::class,
            DosenSeeder::class,
            // CompanySeeder::class,
            // PeriodeMagangSeeder::class,
            // LowonganMagangSeeder::class,
            // MagangApplicationSeeder::class,
            // LogSeeder::class,
        ]);
    }
}
