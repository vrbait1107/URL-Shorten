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
        if (User::count() == 0) {
            User::create([
                'name' => "Admin",
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
                'remember_token' => \Illuminate\Support\Str::random(10),
            ]);
        }
    }
}
