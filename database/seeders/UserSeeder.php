<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'password' => bcrypt('password'),
        ]);

        User::create([
            'level_id' => 2,
            'name' => 'Student One',
            'username' => 'student1',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'level_id' => 2,
            'name' => 'Student Two',
            'username' => 'student2',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'level_id' => 3,
            'name' => 'Lecturer One',
            'username' => 'lecturer1',
            'password' => bcrypt('password'),
        ]);
    }
}
