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
                'api_key' => 'ag1Jg7BGa6yFbAS5epEe3EqPv9MVD5F7NZxDetTX71qPcAQjNr',
            ],
            [
                'name' => 'Farmer Profile Portal',
                'api_key' => '13WEDp0r1u4xb8TRzekyzuhzy712mlPOZAe6w7P5B1vEDPW35Q',
            ],
            [
                'name' => 'Mastercard Consumer App',
                'api_key' => 'krY6G2WM5v4jY7pE4yDE9zdSR5PWLkDW2rlSKSab5J0asPvq88',
            ],
        ];

        foreach ($keys as $key) {
            \App\Models\Api::create($key);
        }
    }
}
