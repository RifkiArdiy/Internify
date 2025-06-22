<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('kriterias')->insert([
            [
                'kode' => 'C1',
                'nama' => 'Lokasi',
                'jenis' => 'cost',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'C2',
                'nama' => 'Fasilitas & Benefit',
                'jenis' => 'benefit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'C3',
                'nama' => 'Kategori Lowongan',
                'jenis' => 'benefit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'C4',
                'nama' => 'Periode Magang',
                'jenis' => 'cost',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'C5',
                'nama' => 'Tipe Lowongan',
                'jenis' => 'benefit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        $data = [
            // C1 - Lokasi (cost)
            ['kriteria_id' => 1, 'parameter' => 'Sangat Dekat', 'nilai' => 1],
            ['kriteria_id' => 1, 'parameter' => 'Dekat', 'nilai' => 2],
            ['kriteria_id' => 1, 'parameter' => 'Sedang', 'nilai' => 3],
            ['kriteria_id' => 1, 'parameter' => 'Jauh', 'nilai' => 4],
            ['kriteria_id' => 1, 'parameter' => 'Sangat Jauh', 'nilai' => 5],

            // C2 - Benefit (benefit)
            ['kriteria_id' => 2, 'parameter' => 'Tidak Ada', 'nilai' => 1],
            ['kriteria_id' => 2, 'parameter' => 'Sedikit', 'nilai' => 2],
            ['kriteria_id' => 2, 'parameter' => 'Cukup', 'nilai' => 3],
            ['kriteria_id' => 2, 'parameter' => 'Lengkap', 'nilai' => 4],
            ['kriteria_id' => 2, 'parameter' => 'Sangat Lengkap', 'nilai' => 5],

            // C3 - Kategori (benefit)
            ['kriteria_id' => 3, 'parameter' => 'Kurang Relevan', 'nilai' => 1],
            ['kriteria_id' => 3, 'parameter' => 'Cukup Relevan', 'nilai' => 3],
            ['kriteria_id' => 3, 'parameter' => 'Sangat Relevan', 'nilai' => 5],

            // C4 - Periode Magang (cost)
            ['kriteria_id' => 4, 'parameter' => '6 Bulan', 'nilai' => 5],
            ['kriteria_id' => 4, 'parameter' => '5 Bulan', 'nilai' => 4],
            ['kriteria_id' => 4, 'parameter' => '4 Bulan', 'nilai' => 3],
            ['kriteria_id' => 4, 'parameter' => '3 Bulan', 'nilai' => 2],
            ['kriteria_id' => 4, 'parameter' => '2 Bulan', 'nilai' => 1],

            // C5 - Tipe Lowongan (benefit)
            ['kriteria_id' => 5, 'parameter' => 'Remote', 'nilai' => 5],
            ['kriteria_id' => 5, 'parameter' => 'Paruh Waktu', 'nilai' => 3],
            ['kriteria_id' => 5, 'parameter' => 'Full Time', 'nilai' => 1],

        ];

        DB::table('skor_kriteria')->insert($data);
    }
}
