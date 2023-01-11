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
        \App\Models\User::factory()->create([
            'name' => 'Thomas Miller',
            'email' => 'thomas.miller@marvelous.digital',
        ]);

        \App\Models\User::factory(20)->create();
        \App\Models\Therapist::factory(10)->create();
        \App\Models\Room::factory(5)->create();
        \App\Models\Session::factory(10)->create();

    }
}
