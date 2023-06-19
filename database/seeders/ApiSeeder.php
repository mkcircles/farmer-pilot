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
                'api_key' => 'Hax2jJFkWf3eL4W7w85IC6Gd',
            ],
            [
                'name' => 'Farmer Profile Portal',
                'api_key' => 'o0k39QuFPf4BM4mTNN9l874u',
            ],
        ];

        foreach ($keys as $key) {
            \App\Models\Api::create($key);
        }
    }
}
