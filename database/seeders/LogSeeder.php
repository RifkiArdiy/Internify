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
            ['mahasiswa_id' => 2, 'dosen_id' => 1, 'company_id' => 1, 'report_title' => 'Laporan 1', 'report_text' => 'Isi Laporan 1', 'file_path' => '-'],
            ['mahasiswa_id' => 3, 'dosen_id' => 2, 'company_id' => 2, 'report_title' => 'Laporan 2', 'report_text' => 'Isi Laporan 2', 'file_path' => '-'],
            ['mahasiswa_id' => 4, 'dosen_id' => 3, 'company_id' => 3, 'report_title' => 'Laporan 3', 'report_text' => 'Isi Laporan 3', 'file_path' => '-'],
            ['mahasiswa_id' => 5, 'dosen_id' => 4, 'company_id' => 4, 'report_title' => 'Laporan 4', 'report_text' => 'Isi Laporan 4', 'file_path' => '-'],
            ['mahasiswa_id' => 6, 'dosen_id' => 5, 'company_id' => 5, 'report_title' => 'Laporan 5', 'report_text' => 'Isi Laporan 5', 'file_path' => '-'],
            ['mahasiswa_id' => 7, 'dosen_id' => 6, 'company_id' => 6, 'report_title' => 'Laporan 6', 'report_text' => 'Isi Laporan 6', 'file_path' => '-'],
            ['mahasiswa_id' => 8, 'dosen_id' => 7, 'company_id' => 7, 'report_title' => 'Laporan 7', 'report_text' => 'Isi Laporan 7', 'file_path' => '-'],
            ['mahasiswa_id' => 9, 'dosen_id' => 8, 'company_id' => 8, 'report_title' => 'Laporan 8', 'report_text' => 'Isi Laporan 8', 'file_path' => '-'],
        ];

        foreach ($logData as $data) {
            Log::create($data);
        }
    }
}
