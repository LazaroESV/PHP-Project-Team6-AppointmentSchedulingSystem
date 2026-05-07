<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        Customer::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'phone' => '514-555-1001'
        ]);

        Customer::create([
            'first_name' => 'Emma',
            'last_name' => 'Smith',
            'email' => 'emma@example.com',
            'phone' => '514-555-1002'
        ]);

        Customer::create([
            'first_name' => 'Lucas',
            'last_name' => 'Brown',
            'email' => 'lucas@example.com',
            'phone' => '514-555-1003'
        ]);
    }
}