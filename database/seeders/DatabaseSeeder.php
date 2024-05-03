<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin@admin.com'),
            'role' => 'admin',
        ]);

       
        for ($i = 1; $i <= 3; $i++) {
            User::create([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@user.com',
                'password' => Hash::make('user' . $i . '@user.com'),
                'role' => 'user',
            ]);
        }
   

        $this->call(PostsTableSeeder::class);

    }
}
