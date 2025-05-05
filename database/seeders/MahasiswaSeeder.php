<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Mahasiswa::create([
        //     'user_id' => 2,
        //     'prodi_id' => 1,
        //     'nim' => 'NIM001',
        //     'no_telp' => '089543217512',
        //     'alamat' => 'Indonesia'
        // ]);

        // Mahasiswa::create([
        //     'user_id' => 3,
        //     'prodi_id' => 2,
        //     'nim' => 'NIM002',
        //     'no_telp' => '081253782912',
        //     'alamat' => 'Indonesia'
        // ]);

        $mahasiswaData = [
            ['user_id' => 2, 'prodi_id' => 1, 'nim' => 'NIM001', 'no_telp' => '081234567891', 'alamat' => 'Jakarta'],
            ['user_id' => 3, 'prodi_id' => 2, 'nim' => 'NIM002', 'no_telp' => '081234567892', 'alamat' => 'Bandung'],
            ['user_id' => 4, 'prodi_id' => 1, 'nim' => 'NIM003', 'no_telp' => '081234567893', 'alamat' => 'Surabaya'],
            ['user_id' => 5, 'prodi_id' => 2, 'nim' => 'NIM004', 'no_telp' => '081234567894', 'alamat' => 'Yogyakarta'],
            ['user_id' => 6, 'prodi_id' => 1, 'nim' => 'NIM005', 'no_telp' => '081234567895', 'alamat' => 'Medan'],
            ['user_id' => 7, 'prodi_id' => 2, 'nim' => 'NIM006', 'no_telp' => '081234567896', 'alamat' => 'Depok'],
            ['user_id' => 8, 'prodi_id' => 1, 'nim' => 'NIM007', 'no_telp' => '081234567897', 'alamat' => 'Semarang'],
            ['user_id' => 9, 'prodi_id' => 2, 'nim' => 'NIM008', 'no_telp' => '081234567898', 'alamat' => 'Palembang'],
            ['user_id' => 10, 'prodi_id' => 1, 'nim' => 'NIM009', 'no_telp' => '081234567899', 'alamat' => 'Bogor'],
            ['user_id' => 11, 'prodi_id' => 2, 'nim' => 'NIM010', 'no_telp' => '081234567800', 'alamat' => 'Malang'],
        ];

        foreach ($mahasiswaData as $data) {
            Mahasiswa::create($data);
        }
    }
}
