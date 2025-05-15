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
            'user_id' => 20,
            'industry' => 'Football',
        ]);

        Company::create([
            'user_id' => 21,
            'industry' => 'Ekonomi',
        ]);

        Company::create([
            'user_id' => 22,
            'industry' => 'Finansial',
        ]);

        Company::create([
            'user_id' =>  '23',
            'industry' => 'FnB',
        ]);

        Company::create([
            'user_id' => 24,
            'industry' => 'Teknologi Ai',
        ]);

        Company::create([
            'user_id' => 25,
            'industry' => 'Pakan Ternak',
        ]);

        Company::create([
            'user_id' => 26,
            'industry' => 'Football',
        ]);

        Company::create([
            'user_id' => 27,
            'industry' => 'Football',

        ]);
    }
}
