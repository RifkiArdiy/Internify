<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $csv = Reader::createFromPath(database_path('seeders/data/villages.csv'), 'r');
        $csv->setDelimiter(',');
        $csv->setHeaderOffset(null); // tidak ada header

        foreach ($csv as $row) {
            if (!isset($row[0], $row[1], $row[2])) {
                continue; // skip baris tidak valid
            }
            DB::table('villages')->insert([
                'id' => $row[0],       // kolom pertama = ID
                'district_id' => $row[1],
                'name' => trim($row[2]),
            ]);
        }
    }
}
