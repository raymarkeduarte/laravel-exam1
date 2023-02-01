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
            'firstName' => 'Raymark',
            'lastName' => 'Dela Cruz',
            'username' => 'Red',
            'email' => 'red@email.com',
            'password' => bcrypt('123456'),
        ]);
        \App\Models\Members::factory(2)->create();
        \App\Models\Employees::factory(44)->create();

    }
}
