<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'PT. Farrel Caesarian',
            'industry' => 'Teknologi',
            'address' => 'Mbetek',
            'contact' => '082132570837',
        ]);

        Company::create([
            'name' => 'PT. ABC',
            'industry' => 'Ekonomi',
            'address' => 'Malang',
            'contact' => '021-12345678',
        ]);

        Company::create([
            'name' => 'Akademi Ulti Nolan',
            'industry' => 'Finansial',
            'address' => 'Jakarta',
            'contact' => '1233213232',
        ]);

        Company::create([
            'name' => 'PT. Kopi Skena',
            'industry' => 'FnB',
            'address' => 'Malang',
            'contact' => '1242103012',
        ]);

        Company::create([
            'name' => 'PT. Fukasaki',
            'industry' => 'Teknologi Ai',
            'address' => 'Jakarta',
            'contact' => '08213288207',
        ]);

        Company::create([
            'name' => 'PT. Omura',
            'industry' => 'Pakan Ternak',
            'address' => 'Blitar',
            'contact' => '021123345658',
        ]);

        Company::create([
            'name' => 'Akademi Nankatsu',
            'industry' => 'Football',
            'address' => 'Jepang',
            'contact' => '1298223232',
        ]);
    }
}
