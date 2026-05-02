<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            ['first_name' => 'Ava', 'last_name' => 'Johnson', 'email' => 'ava.johnson@example.com', 'phone' => '514-555-2001'],
            ['first_name' => 'Noah', 'last_name' => 'Smith', 'email' => 'noah.smith@example.com', 'phone' => '514-555-2002'],
            ['first_name' => 'Emma', 'last_name' => 'Brown', 'email' => 'emma.brown@example.com', 'phone' => '514-555-2003'],
            ['first_name' => 'Liam', 'last_name' => 'Taylor', 'email' => 'liam.taylor@example.com', 'phone' => '514-555-2004'],
            ['first_name' => 'Sophia', 'last_name' => 'Anderson', 'email' => 'sophia.anderson@example.com', 'phone' => '514-555-2005'],
            ['first_name' => 'Mason', 'last_name' => 'Thomas', 'email' => 'mason.thomas@example.com', 'phone' => '514-555-2006'],
            ['first_name' => 'Isabella', 'last_name' => 'Jackson', 'email' => 'isabella.jackson@example.com', 'phone' => '514-555-2007'],
            ['first_name' => 'Lucas', 'last_name' => 'White', 'email' => 'lucas.white@example.com', 'phone' => '514-555-2008'],
            ['first_name' => 'Mia', 'last_name' => 'Harris', 'email' => 'mia.harris@example.com', 'phone' => '514-555-2009'],
            ['first_name' => 'Ethan', 'last_name' => 'Martin', 'email' => 'ethan.martin@example.com', 'phone' => '514-555-2010'],
            ['first_name' => 'Charlotte', 'last_name' => 'Thompson', 'email' => 'charlotte.thompson@example.com', 'phone' => '514-555-2011'],
            ['first_name' => 'James', 'last_name' => 'Garcia', 'email' => 'james.garcia@example.com', 'phone' => '514-555-2012'],
            ['first_name' => 'Amelia', 'last_name' => 'Martinez', 'email' => 'amelia.martinez@example.com', 'phone' => '514-555-2013'],
            ['first_name' => 'Benjamin', 'last_name' => 'Robinson', 'email' => 'benjamin.robinson@example.com', 'phone' => '514-555-2014'],
            ['first_name' => 'Harper', 'last_name' => 'Clark', 'email' => 'harper.clark@example.com', 'phone' => '514-555-2015'],
            ['first_name' => 'Henry', 'last_name' => 'Rodriguez', 'email' => 'henry.rodriguez@example.com', 'phone' => '514-555-2016'],
            ['first_name' => 'Evelyn', 'last_name' => 'Lewis', 'email' => 'evelyn.lewis@example.com', 'phone' => '514-555-2017'],
            ['first_name' => 'Alexander', 'last_name' => 'Lee', 'email' => 'alexander.lee@example.com', 'phone' => '514-555-2018'],
            ['first_name' => 'Ella', 'last_name' => 'Walker', 'email' => 'ella.walker@example.com', 'phone' => '514-555-2019'],
            ['first_name' => 'Daniel', 'last_name' => 'Hall', 'email' => 'daniel.hall@example.com', 'phone' => '514-555-2020'],
            ['first_name' => 'Scarlett', 'last_name' => 'Allen', 'email' => 'scarlett.allen@example.com', 'phone' => '514-555-2021'],
            ['first_name' => 'Matthew', 'last_name' => 'Young', 'email' => 'matthew.young@example.com', 'phone' => '514-555-2022'],
            ['first_name' => 'Aria', 'last_name' => 'Hernandez', 'email' => 'aria.hernandez@example.com', 'phone' => '514-555-2023'],
            ['first_name' => 'Jack', 'last_name' => 'King', 'email' => 'jack.king@example.com', 'phone' => '514-555-2024'],
            ['first_name' => 'Grace', 'last_name' => 'Wright', 'email' => 'grace.wright@example.com', 'phone' => '514-555-2025'],
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
