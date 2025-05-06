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
        ]);

        // Mahasiswa
        User::create([
            'level_id' => 2,
            'name' => 'Citra Lestari',
            'username' => 'citra',
            'email' => 'citra@gmail.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'level_id' => 2,
            'name' => 'Bagus Pratama',
            'username' => 'bagus',
            'email' => 'bagus@gmail.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'level_id' => 2,
            'name' => 'Dewi Anggraini',
            'username' => 'dewi',
            'email' => 'dewi@gmail.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'level_id' => 2,
            'name' => 'Fajar Maulana',
            'username' => 'fajar',
            'email' => 'fajar@gmail.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'level_id' => 2,
            'name' => 'Gita Rahayu',
            'username' => 'gita',
            'email' => 'gita@gmail.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'level_id' => 2,
            'name' => 'Hendra Wijaya',
            'username' => 'hendra',
            'email' => 'hendra@gmail.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'level_id' => 2,
            'name' => 'Intan Permata',
            'username' => 'intan',
            'email' => 'intan@gmail.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'level_id' => 2,
            'name' => 'Joko Susilo',
            'username' => 'joko',
            'email' => 'joko@gmail.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'level_id' => 2,
            'name' => 'Kartika Sari',
            'username' => 'kartika',
            'email' => 'kartika@gmail.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'level_id' => 2,
            'name' => 'Lukman Hakim',
            'username' => 'lukman',
            'email' => 'lukman@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // Dosen
        User::create([
            'level_id' => 3,
            'name' => 'Prof. Dr. Siti Aminah',
            'username' => 'siti',
            'email' => 'siti@gmail.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'level_id' => 3,
            'name' => 'Dr. Bambang Setiawan',
            'username' => 'bambang',
            'email' => 'bambang@gmail.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'level_id' => 3,
            'name' => 'Rina Wijayanti, M.Kom.',
            'username' => 'rina',
            'email' => 'rina@gmail.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'level_id' => 3,
            'name' => 'Agus Salim, S.Si., M.Si.',
            'username' => 'agus',
            'email' => 'agus@gmail.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'level_id' => 3,
            'name' => 'Maya Fitriani, M.Pd.',
            'username' => 'maya',
            'email' => 'maya@gmail.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'level_id' => 3,
            'name' => 'Taufik Hidayat, S.T., M.Eng.',
            'username' => 'taufik',
            'email' => 'taufik@gmail.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'level_id' => 3,
            'name' => 'Elisa Rahmawati, M.Hum.',
            'username' => 'elisa',
            'email' => 'elisa@gmail.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'level_id' => 3,
            'name' => 'Surya Atmaja, S.Sos.',
            'username' => 'surya',
            'email' => 'surya@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
