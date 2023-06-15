<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 
        $keys = [
            [
                'name' => 'Farmer Profile App',
                'api_key' => 'kj@5$BT3B5f*QHMK979w9BgErvL',
            ],
            [
                'name' => 'Farmer Profile Portal',
                'api_key' => '2$!kW5Ur3SORFu!^b4jhQ%SJEtY',
            ],
        ];

        foreach ($keys as $key) {
            \App\Models\Api::create($key);
        }
    }
}
