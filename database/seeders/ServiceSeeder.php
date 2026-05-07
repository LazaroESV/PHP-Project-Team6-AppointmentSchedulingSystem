<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::create([
            'name' => 'Consultation',
            'duration' => 30,
            'price' => 50
        ]);

        Service::create([
            'name' => 'Surgery',
            'duration' => 60,
            'price' => 120
        ]);

        Service::create([
            'name' => 'Routine Check-up',
            'duration' => 45,
            'price' => 80
        ]);
    }
}
