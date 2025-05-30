<?php

namespace Database\Seeders;

use App\Models\Benefit;
use App\Models\LowonganMagang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $benefitNames = ['Asuransi', 'Uang Makan', 'Transport', 'Laptop Kerja', 'Jam Kerja Fleksibel', 'Cuti Tahunan'];

        foreach ($benefitNames as $name) {
            Benefit::firstOrCreate(['name' => $name]);
        }
        $benefitIds = Benefit::pluck('benefit_id')->toArray();
        // Step 3: Loop lowongan 1–5 dan acak relasinya
        foreach (range(1, 5) as $lowonganId) {
            $lowongan = LowonganMagang::find($lowonganId);

            if ($lowongan) {
                // Ambil 2–4 benefit random
                $randomBenefits = collect($benefitIds)->shuffle()->take(rand(2, 4))->values()->toArray();

                $lowongan->benefits()->sync($randomBenefits);
            }
        }
    }
}
