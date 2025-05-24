<?php

namespace Database\Seeders;

use App\Models\ProfilAkademik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilAkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProfilAkademik::create([
            'user_id' => 3,
            'bidang_keahlian' => 'Backend developer',
            'sertifikasi' => 'Google Associate Cloud Engineer',
            'lokasi' => 'Malang',
            'pengalaman' => 'Coding 12 jam nonstop',
            'etika' => 'Sopan santun',
            'ipk' => 3.6
        ]);
        ProfilAkademik::create([
            'user_id' => 2,
            'bidang_keahlian' => 'Frontend developer',
            'sertifikasi' => 'Coursera - Front-End Web Development with React',
            'lokasi' => 'Bogor',
            'pengalaman' => 'Desain web Menkominfo',
            'etika' => 'Ramah',
            'ipk' => 3.5
        ]);
    }
}
