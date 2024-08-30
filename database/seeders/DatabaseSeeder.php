<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test2@example.com',
        ]);
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'is_admin' => true
        ]);
        \App\Models\Intention::factory(10)->create([
            'by_user_id' => 1
        ]);
        \App\Models\Intention::factory(10)->create([
            'by_user_id' => 2
        ]);
        \App\Models\Intention::factory(10)->create([
            'by_user_id' => 3
        ]);
    }
}
