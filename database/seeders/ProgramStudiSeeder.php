<?php

namespace Database\Seeders;

use App\Models\ProgramStudi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ProgramStudi::create(['name' => 'Teknik Informatika']);
        ProgramStudi::create(['name' => 'Teknik Mesin']);
        ProgramStudi::create(['name' => 'Sistem Informasi']);
        ProgramStudi::create(['name' => 'Sistem Komputer']);
        ProgramStudi::create(['name' => 'Manajemen']);
    }
}
