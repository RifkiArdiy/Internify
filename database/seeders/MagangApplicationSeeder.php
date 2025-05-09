<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MagangApplication;
class MagangApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $MagangApplicationData = [
            ['mahasiswa_id' => '1', 'lowongan_id' => '3', 'status' => 'pending'],
            ['mahasiswa_id' => '2', 'lowongan_id' => '3', 'status' => 'pending'],
            ['mahasiswa_id' => '3', 'lowongan_id' => '5', 'status' => 'pending'],
        ];

        foreach ($MagangApplicationData as $data) {
            MagangApplication::create($data);
        }
    }
}
