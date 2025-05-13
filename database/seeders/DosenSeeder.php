<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dosenData = [
            ['user_id' => 12, 'nip' => '198001012001011001'],
            ['user_id' => 13, 'nip' => '197912022002022002'],
            ['user_id' => 14, 'nip' => '198210112003033003'],
            ['user_id' => 15, 'nip' => '198505152004044004'],
            ['user_id' => 16, 'nip' => '197708172005055005'],
            ['user_id' => 17, 'nip' => '198912252006066006'],
            ['user_id' => 18, 'nip' => '198305302007077007'],
            ['user_id' => 19, 'nip' => '197609182008088008'],
        ];

        foreach ($dosenData as $data) {
            Dosen::create($data);
        }
    }
}
