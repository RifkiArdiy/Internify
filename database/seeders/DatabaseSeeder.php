<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Benefit;
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

        \App\Models\Level::factory()->create(['level_nama' => 'Administrator']);
        \App\Models\Level::factory()->create(['level_nama' => 'Mahasiswa']);
        \App\Models\Level::factory()->create(['level_nama' => 'Dosen']);
        \App\Models\Level::factory()->create(['level_nama' => 'Company']);
        $this->call([
            UserSeeder::class,
            ProgramStudiSeeder::class,
            MahasiswaSeeder::class,
            DosenSeeder::class,
            CompanySeeder::class,
            PeriodeMagangSeeder::class,
            ProvinceSeeder::class,
            RegencySeeder::class,
            DistrictSeeder::class,
            VillageSeeder::class,
            LowonganMagangSeeder::class,
            BenefitSeeder::class,
            MagangApplicationSeeder::class,
            KriteriaSeeder::class,
            LogSeeder::class
        ]);
    }
}
