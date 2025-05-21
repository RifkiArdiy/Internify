<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $csv = Reader::createFromPath(database_path('seeders/data/provinces.csv'), 'r');
        $csv->setDelimiter(',');
        $csv->setHeaderOffset(null); // tidak ada header

        foreach ($csv as $row) {
            DB::table('provinces')->insert([
                'id' => $row[0],       // kolom pertama = ID
                'name' => $row[1],
            ]);
        }
    }
}
