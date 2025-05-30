<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\LowonganMagang;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LowonganMagangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoriNames = ['Teknologi', 'Desain', 'Pemasaran', 'Keuangan', 'Administrasi'];

        foreach ($kategoriNames as $name) {
            Kategori::firstOrCreate(['name' => $name]);
        }

        $provinsi = Province::inRandomOrder()->first();
        $kabupaten = $provinsi->regencies()->inRandomOrder()->first();
        $kecamatan = $kabupaten->districts()->inRandomOrder()->first();
        $kelurahan = $kecamatan->villages()->inRandomOrder()->first();

        // Daftar lowongan
        $lowonganMagangData = [
            [
                'company_id' => 1,
                'period_id' => 1,
                'kategori_id' => 1,
                'title' => 'Junior Developer with Laravel MySQL',
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.',
                'requirements' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.',
            ],
            [
                'company_id' => 2,
                'period_id' => 1,
                'kategori_id' => 2,
                'title' => 'UI UX Desainer Creative Studio',
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.',
                'requirements' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.',
            ],
            [
                'company_id' => 3,
                'period_id' => 1,
                'kategori_id' => 3,
                'title' => 'SEO Specialist',
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.',
                'requirements' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.',
            ],
            [
                'company_id' => 1,
                'period_id' => 1,
                'kategori_id' => 4,
                'title' => 'Accounting Manager',
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.',
                'requirements' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.',
            ],
            [
                'company_id' => 4,
                'period_id' => 1,
                'kategori_id' => 5,
                'title' => 'Lowongan Staf Administrasi Keuangan SDM (Sumber Daya Manusia)',
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.',
                'requirements' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.',
            ],
            [
                'company_id' => 5,
                'period_id' => 1,
                'kategori_id' => 1,
                'title' => 'Internship Data Analyst (SQL, Python)',
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.',
                'requirements' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id repellendus dolor, dignissimos saepe ducimus beatae facilis et, dolorum tenetur officiis consequuntur sed inventore fuga sequi. Tempora ullam quis unde natus.',
            ],
        ];

        foreach ($lowonganMagangData as $data) {
            LowonganMagang::create([
                ...$data,
                'province_id' => $provinsi->id,
                'regency_id' => $kabupaten->id,
                'district_id' => $kecamatan->id,
                'village_id' => $kelurahan->id,
            ]);
        }
    }
}
