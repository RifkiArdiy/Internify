<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\ManajemenBimbingan;

class ManajemenBimbinganSeeder extends Seeder
{
    public function run(): void
    {
        $mahasiswas = Mahasiswa::all();

        foreach ($mahasiswas as $mhs) {
            ManajemenBimbingan::create([
                'mahasiswa_id' => $mhs->mahasiswa_id,
                'company' => 'PT Maju Bersama',
                'position' => 'Software Intern',
                'description' => 'Magang selama 6 bulan di divisi IT'
            ]);
        }
    }
}
