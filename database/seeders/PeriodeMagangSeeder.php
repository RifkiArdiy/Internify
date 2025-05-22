<?php

namespace Database\Seeders;

use App\Models\PeriodeMagang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodeMagangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $PeriodeMagangData = [
            ['name' => 'Gelombang I', 'start_date' => '2025-03-27', 'end_date' => '2025-04-30'],
        ];

        foreach ($PeriodeMagangData as $data) {
            PeriodeMagang::create($data);
        }
    }
}
