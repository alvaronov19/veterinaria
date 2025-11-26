<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Alvaro',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        // Staff
        User::create([
            'name' => 'Staff Veterinaria',
            'email' => 'staff@example.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'is_active' => true,
        ]);

        // Clients
        User::create([
            'name' => 'Cliente Alvaro',
            'email' => 'client1@example.com',
            'password' => Hash::make('password'),
            'role' => 'client',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Client Two',
            'email' => 'client2@example.com',
            'password' => Hash::make('password'),
            'role' => 'client',
            'is_active' => true,
        ]);
    }
}
