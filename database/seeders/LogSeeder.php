<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Log;
class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $logData = [
            ['mahasiswa_id' => 2, 'dosen_id' => 1,'report_text' => 'Laporan ', 'file_path' => '-'],
            ['mahasiswa_id' => 3, 'dosen_id' => 2,'report_text' => 'Laporan 2', 'file_path' => '-'],
            ['mahasiswa_id' => 4, 'dosen_id' => 3,'report_text' => 'Laporan 3', 'file_path' => '-'],
            ['mahasiswa_id' => 5, 'dosen_id' => 4,'report_text' => 'Laporan 4', 'file_path' => '-'],
            ['mahasiswa_id' => 6, 'dosen_id' => 5,'report_text' => 'Laporan 5', 'file_path' => '-'],
            ['mahasiswa_id' => 7, 'dosen_id' => 6,'report_text' => 'Laporan 6', 'file_path' => '-'],
            ['mahasiswa_id' => 8, 'dosen_id' => 7,'report_text' => 'Laporan 7', 'file_path' => '-'],
            ['mahasiswa_id' => 9, 'dosen_id' => 8,'report_text' => 'Laporan 8', 'file_path' => '-'],
        ];

        foreach ($logData as $data) {
            Log::create($data);
        }
    }
}
