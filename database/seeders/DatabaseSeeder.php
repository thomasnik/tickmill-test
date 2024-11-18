<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Transaction;
use App\Models\Client;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Thomas Nikidiotis',
        //     'email' => 'admin@admin.com',
        //     'password' => 'password',
        //     'type' => 'admin'
        // ]);

        // Client::factory(5)->create();
        // Transaction::factory(200)->create();
    }
}
