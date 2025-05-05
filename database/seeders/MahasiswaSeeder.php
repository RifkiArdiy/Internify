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
        //
        Mahasiswa::create([
            'user_id' => 2,
            'prodi_id' => 1,
            'nim' => 'NIM001',
            'no_telp' => '089543217512',
            'alamat' => 'Indonesia'
        ]);

        Mahasiswa::create([
            'user_id' => 3,
            'prodi_id' => 2,
            'nim' => 'NIM002',
            'no_telp' => '081253782912',
            'alamat' => 'Indonesia'
        ]);
    }
}
