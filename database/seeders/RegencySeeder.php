<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;

class RegencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $csv = Reader::createFromPath(database_path('seeders/data/regencies.csv'), 'r');
        $csv->setDelimiter(',');
        $csv->setHeaderOffset(null); // tidak ada header

        foreach ($csv as $row) {
            DB::table('regencies')->insert([
                'id' => $row[0],       // kolom pertama = ID
                'province_id' => $row[1],
                'name' => trim($row[2]),
            ]);
        }
    }
}
