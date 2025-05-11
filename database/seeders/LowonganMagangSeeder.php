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
            ['company_id' => '1', 'period_id' => '1', 'title' => 'MSIB BATCH 1', 'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.', 'requirements' => 'fsafsad', 'location' => 'Malang'],
            ['company_id' => '2', 'period_id' => '1', 'title' => 'MSIB BATCH 2', 'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.', 'requirements' => 'fsafsad', 'location' => 'Malang'],
            ['company_id' => '3', 'period_id' => '1', 'title' => 'MSIB BATCH 3', 'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.', 'requirements' => 'fsafsad', 'location' => 'Malang'],
            ['company_id' => '1', 'period_id' => '1', 'title' => 'MSIB BATCH 4', 'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.', 'requirements' => 'fsafsad', 'location' => 'Malang'],
            ['company_id' => '4', 'period_id' => '1', 'title' => 'MSIB BATCH 5', 'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.', 'requirements' => 'fsafsad', 'location' => 'Malang'],
        ];

        foreach ($LowonganMagangData as $data) {
            LowonganMagang::create($data);
        }
    }
}
