<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Maurice Kamugisha',
                'email' => 'mkamugisha@innovationvillage.co.ug',
                'password' => bcrypt('password'),
                'phone_number' => '256781456492',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Saul Weikama',
                'email' => 'sweikama@innovationvillage.co.ug',
                'password' => bcrypt('password'),
                'phone_number' => '256700000000',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($users as $user) {
            $user['photo'] = 'https://ui-avatars.com/api/?name=' . urlencode($user['name']) . '&size=128';
            \App\Models\User::create($user);
        }

    }
}
