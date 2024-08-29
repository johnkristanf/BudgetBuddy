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

        User::factory()->create([
            'name'     => 'John Kristan F. Torremocha',
            'email'    => 'johnkristan01@gmail.com',
            'password' => env("SEED_ACCOUNT_PASSWORD")
        ]);
    }
}
