<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Members::factory()->create([
            'first_name' => 'Raymark',
            'last_name' => 'Dela Cruz',
            'user_name' => 'Red',
            'email' => 'red@email.com',
            'password' => 'pass1234',
        ]);
        \App\Models\Members::factory(1)->create();
        \App\Models\Employees::factory(44)->create();

    }
}
