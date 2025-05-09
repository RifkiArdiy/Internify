<?php

namespace Database\Seeders;

use App\Models\LowonganMagang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LowonganMagangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $LowonganMagangData = [
            ['company_id' => '1', 'period_id' => '1', 'title' => 'MSIB BATCH 1','description' => 'assdno', 'requirements' => 'fsafsad','location' => 'Malang'],
        ];

        foreach ($LowonganMagangData as $data) {
            LowonganMagang::create($data);
        }
    }
}
