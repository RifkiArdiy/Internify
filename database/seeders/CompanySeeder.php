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
            'about_company' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.',
        ]);

        Company::create([
            'user_id' => 21,
            'about_company' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.',
        ]);

        Company::create([
            'user_id' => 22,
            'about_company' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.',
        ]);

        Company::create([
            'user_id' =>  '23',
            'about_company' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.',
        ]);

        Company::create([
            'user_id' => 24,
            'about_company' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.',
        ]);

        Company::create([
            'user_id' => 25,
            'about_company' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.',
        ]);

        Company::create([
            'user_id' => 26,
            'about_company' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.',
        ]);

        Company::create([
            'user_id' => 27,
            'about_company' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.',

        ]);
    }
}
