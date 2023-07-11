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
                'api_key' => 'RgrgFd2muVBB107J5qZIpj3KX81HMutEaiPAi0qqdd4jjwPjsjRNNIbmioL81KzT',
            ],
            [
                'name' => 'Farmer Profile Portal',
                'api_key' => 'HPCsebVEEpJ5JkrRsnqOEkgJKC9MrLP0IWrNxY016nxbJEBZr75JHjGip9XUQVXu',
            ],
            [
                'name' => 'Mastercard Consumer App',
                'api_key' => 'Baco7zr99CQkcYFMwyWoKkJWjh2ioiyGNQ6jYUGjH005vVTrb2qsTbRKHg26edCt',
            ],
        ];

        foreach ($keys as $key) {
            \App\Models\Api::create($key);
        }
    }
}
