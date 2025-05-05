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

        User::create([
            'level_id' => 2,
            'name' => 'Mahasiswa Satu',
            'username' => 'mahasiswa1',
            'email' => 'mahasiswa1@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'level_id' => 2,
            'name' => 'Mahasiswa Dua',
            'username' => 'mahasiswa2',
            'email' => 'mahasiswa2@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'level_id' => 3,
            'name' => 'Dosen Satu',
            'username' => 'dosen1',
            'email' => 'dosen1@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
