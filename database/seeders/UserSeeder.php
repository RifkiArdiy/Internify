<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Admin user
        User::create([
            'level_id' => 1,
            'name' => 'Admin Internify',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'no_telp' => '081234567890',
            'alamat' => 'Malang'
        ]);

        // Mahasiswa
        User::create([
            'level_id' => 2,
            'name' => 'Citra Lestari',
            'username' => 'citra',
            'email' => 'citra@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '081234567891',
            'alamat' => 'Bandung'
        ]);
        User::create([
            'level_id' => 2,
            'name' => 'Bagus Pratama',
            'username' => 'bagus',
            'email' => 'bagus@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '081234567892',
            'alamat' => 'Jakarta'
        ]);
        User::create([
            'level_id' => 2,
            'name' => 'Dewi Anggraini',
            'username' => 'dewi',
            'email' => 'dewi@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '081234567893',
            'alamat' => 'Surabaya'
        ]);
        User::create([
            'level_id' => 2,
            'name' => 'Fajar Maulana',
            'username' => 'fajar',
            'email' => 'fajar@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '081234567894',
            'alamat' => 'Yogyakarta'
        ]);
        User::create([
            'level_id' => 2,
            'name' => 'Gita Rahayu',
            'username' => 'gita',
            'email' => 'gita@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '081234567895',
            'alamat' => 'Medan'
        ]);
        User::create([
            'level_id' => 2,
            'name' => 'Hendra Wijaya',
            'username' => 'hendra',
            'email' => 'hendra@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '081234567896',
            'alamat' => 'Depok'
        ]);
        User::create([
            'level_id' => 2,
            'name' => 'Intan Permata',
            'username' => 'intan',
            'email' => 'intan@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '081234567897',
            'alamat' => 'Semarang'
        ]);
        User::create([
            'level_id' => 2,
            'name' => 'Joko Susilo',
            'username' => 'joko',
            'email' => 'joko@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '081234567898',
            'alamat' => 'Palembang'
        ]);
        User::create([
            'level_id' => 2,
            'name' => 'Kartika Sari',
            'username' => 'kartika',
            'email' => 'kartika@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '081234567899',
            'alamat' => 'Bogor'
        ]);
        User::create([
            'level_id' => 2,
            'name' => 'Lukman Hakim',
            'username' => 'lukman',
            'email' => 'lukman@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '081234567800',
            'alamat' => 'Malang'
        ]);

        // // Dosen
        User::create([
            'level_id' => 3,
            'name' => 'Prof. Dr. Siti Aminah',
            'username' => 'siti',
            'email' => 'siti@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '081211223344',
            'alamat' => 'Jakarta'
        ]);
        User::create([
            'level_id' => 3,
            'name' => 'Dr. Bambang Setiawan',
            'username' => 'bambang',
            'email' => 'bambang@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '081211223345',
            'alamat' => 'Bandung'
        ]);
        User::create([
            'level_id' => 3,
            'name' => 'Rina Wijayanti, M.Kom.',
            'username' => 'rina',
            'email' => 'rina@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '081211223346',
            'alamat' => 'Surabaya',
        ]);
        User::create([
            'level_id' => 3,
            'name' => 'Agus Salim, S.Si., M.Si.',
            'username' => 'agus',
            'email' => 'agus@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '081211223347',
            'alamat' => 'Yogyakarta',
        ]);
        User::create([
            'level_id' => 3,
            'name' => 'Maya Fitriani, M.Pd.',
            'username' => 'maya',
            'email' => 'maya@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '081211223348',
            'alamat' => 'Depok',
        ]);
        User::create([
            'level_id' => 3,
            'name' => 'Taufik Hidayat, S.T., M.Eng.',
            'username' => 'taufik',
            'email' => 'taufik@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '081211223349',
            'alamat' => 'Medan',
        ]);
        User::create([
            'level_id' => 3,
            'name' => 'Elisa Rahmawati, M.Hum.',
            'username' => 'elisa',
            'email' => 'elisa@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '081211223350',
            'alamat' => 'Bekasi',
        ]);
        User::create([
            'level_id' => 3,
            'name' => 'Surya Atmaja, S.Sos.',
            'username' => 'surya',
            'email' => 'surya@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '081211223351',
            'alamat' => 'Palembang',
        ]);

        //Company
        User::create([
            'level_id' => 4, //Company
            'name' => 'PT. Farrel Caesarian',
            'username' => 'ptfarel',
            'email' => 'ptfarel@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '082132570837',
            'alamat' => 'Mbetek',
        ]);

        User::create([
            'level_id' => 4, //Company
            'name' => 'PT. ABC',
            'username' => 'ptabc',
            'email' => 'ptabc@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '021-12345678',
            'alamat' => 'Malang',
        ]);

        User::create([
            'level_id' => 4, //Company
            'name' => 'Akademi Holland',
            'username' => 'akmi.holland',
            'email' => 'holland@gmail..com',
            'password' => Hash::make('password'),
            'no_telp' => '1233213232',
            'alamat' => 'Jakarta',
        ]);

        User::create([
            'level_id' => 4, //Company
            'name' => 'PT. Kopi Skena',
            'username' => 'kopi.skena',
            'email' => 'kopiskena@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '1242103012',
            'alamat' => 'Malang',
        ]);

        User::create([
            'level_id' => 4, //Company
            'name' => 'PT. Fukasaki',
            'username' => 'fukasaki',
            'email' => 'fukasaki@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '08213288207',
            'alamat' => 'Jakarta',
        ]);

        User::create([
            'level_id' => 4, //Company
            'name' => 'PT. Omura',
            'username' => 'omuraa',
            'email' => 'omura@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '021123345658',
            'alamat' => 'Blitar',
        ]);

        User::create([
            'level_id' => 4, //Company
            'name' => 'Akademi Nankatsu',
            'username' => 'nankasu',
            'email' => 'nankatsu@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '1298223232',
            'alamat' => 'Jepang',
        ]);

        User::create([
            'level_id' => 4, //Company
            'name' =>  'Caesarian',
            'username' => 'cae.rian',
            'email' => 'cae@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '082132570837',
            'alamat' => 'Mbetek',
        ]);
    }
}
