<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Joshua Jayrous',
            'email' => 'joshuajayrous@gmail.com',
            'phone' => '+255 754 219 539',
            'city' => 'Mwanza',
            'state' => 'Mwanza City',
            'street' => 'Nyasaka',
            'role' => 'Manager',
            'nationality' => 'Tanzania',
            'password' => bcrypt('password'),
        ]);
    }
}
