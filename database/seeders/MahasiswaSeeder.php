<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswaData = [
            ['user_id' => 2, 'prodi_id' => 1, 'nim' => '2510876349'],
            ['user_id' => 3, 'prodi_id' => 2, 'nim' => '1892305716'],
            ['user_id' => 4, 'prodi_id' => 1, 'nim' => '3367912045'],
            ['user_id' => 5, 'prodi_id' => 2, 'nim' => '0945287136'],
            ['user_id' => 6, 'prodi_id' => 1, 'nim' => '4178569203'],
            ['user_id' => 7, 'prodi_id' => 2, 'nim' => '9603148572'],
            ['user_id' => 8, 'prodi_id' => 1, 'nim' => '7259063814'],
            ['user_id' => 9, 'prodi_id' => 2, 'nim' => '5084729163'],
            ['user_id' => 10, 'prodi_id' => 1, 'nim' => '8721694305'],
            ['user_id' => 11, 'prodi_id' => 2, 'nim' => '6439501827'],
        ];

        foreach ($mahasiswaData as $data) {
            Mahasiswa::create($data);
        }
    }
}
