<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

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
        User::factory()->createMany([
        [

            'name' => 'Tony stark',
            'av_userName' => 'ironMan',
            'email' => 'ironman@avengers.com',
            'password' => bcrypt('123'),
            'role' => 'user'

        ],
        [
            'name' => 'Steve Rogers',
            'av_userName' => 'captainAmerica',
            'email' => 'captainAmerica@avengers.com',
            'password' => bcrypt('Peggy1945'),
            'role' => 'user'
        ],
        [
            'name' => 'Jarvis',
            'av_userName' => 'jarvisAdmin',
            'email' => 'jarvis@avengers.com',
            'password' => bcrypt('123'),
            'role' => 'admin'
        ]
    ]);


    }
}
