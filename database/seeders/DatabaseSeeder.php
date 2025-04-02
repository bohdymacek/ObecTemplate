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
        \App\Models\Setting::factory(1)->create();
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.cz',
            'password' => bcrypt('KW9U4HdLm5!0'),
            'role_id' => 1,
        ]);

    }
}
