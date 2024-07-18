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
        \App\Models\User::factory()->create([
            'name' => 'Joshua Jayrous',
            'email' => 'joshuajayrous@gmail.com',
            'phone' => '+255 754 219 539',
            'city' => 'Mwanza',
            'state' => 'Mwanza City',
            'street' => 'Nyasaka',
            'role' => 'Company IT',
            'nationality' => 'Tanzania',
            'password' => bcrypt('password'),
        ]);
        \App\Models\User::factory(4)->create();
        \App\Models\Permission::factory()->create(['name' => 'View Any']);
        \App\Models\Role::factory()->create(['name' => 'Company IT']);
        \App\Models\Role::factory()->create(['name' => 'Manager']);
        \App\Models\Role::factory()->create(['name' => 'Technician']);
        \App\Models\Permission::factory()->create(['name' => 'Edit About']);
        \App\Models\Permission::factory()->create(['name' => 'Delete Any']);
        \App\Models\Permission::factory()->create(['name' => 'Restore']);
        \App\Models\Permission::factory()->create(['name' => 'Manager']);
        \App\Models\Permission::factory()->create(['name' => 'Technician Permission']);
        \App\Models\Permission::factory()->create(['name' => 'IT Permission']);
        \App\Models\ClientCategory::factory()->create(['category' => 'Un Categorized']);
        \App\Models\ClientCategory::factory()->create(['category' => 'Bi-weekly service']);
        \App\Models\ClientCategory::factory()->create(['category' => 'Weekly service']);
        \App\Models\ClientCategory::factory()->create(['category' => 'Monthly service']);
        \App\Models\Client::factory(20)->create();
    }
}
