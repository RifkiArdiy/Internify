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
        //
        // Dosen::create([
        //     'user_id' => 4,
        //     'nip' => 'NIDN1234',
        //     'no_telp' => '089543217512',
        //     'alamat' => 'Indonesia'
        // ]);
        $dosenData = [
            ['user_id' => 12, 'nip' => '198001012001011001', 'no_telp' => '081211223344', 'alamat' => 'Jakarta'],
            ['user_id' => 13, 'nip' => '197912022002022002', 'no_telp' => '081211223345', 'alamat' => 'Bandung'],
            ['user_id' => 14, 'nip' => '198210112003033003', 'no_telp' => '081211223346', 'alamat' => 'Surabaya'],
            ['user_id' => 15, 'nip' => '198505152004044004', 'no_telp' => '081211223347', 'alamat' => 'Yogyakarta'],
            ['user_id' => 16, 'nip' => '197708172005055005', 'no_telp' => '081211223348', 'alamat' => 'Depok'],
            ['user_id' => 17, 'nip' => '198912252006066006', 'no_telp' => '081211223349', 'alamat' => 'Medan'],
            ['user_id' => 18, 'nip' => '198305302007077007', 'no_telp' => '081211223350', 'alamat' => 'Bekasi'],
            ['user_id' => 19, 'nip' => '197609182008088008', 'no_telp' => '081211223351', 'alamat' => 'Palembang'],
        ];

        foreach ($dosenData as $data) {
            Dosen::create($data);
        }
    }
}
