<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserAccounts extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); // Create a Faker instance

        // seeding admin
        $admin = User::create([
            'name' => $faker->name(),
            'email' => 'admin@sample.com',
            'email_verified_at' => '2024-02-02 12:42:50',
            'password' => Hash::make('12345'),
            'role' => 'admin',
        ]);

        // seeding user
        $editor = User::create([
            'name' => $faker->name(),
            'email' => 'user@sample.com',
            'email_verified_at' => '2024-02-02 12:42:50',
            'password' => Hash::make('12345'),
            'role' => 'consumer',
        ]);
    }
}
