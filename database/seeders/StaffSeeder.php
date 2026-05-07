<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Staff;

class StaffSeeder extends Seeder
{
    public function run(): void
    {
        Staff::create([
            'name' => 'Michael Johnson',
            'email' => 'michael@example.com',
            'phone' => '514-555-2001',
            'is_available' => true
        ]);

        Staff::create([
            'name' => 'Sarah Wilson',
            'email' => 'sarah@example.com',
            'phone' => '514-555-2002',
            'is_available' => true
        ]);
    }
}
