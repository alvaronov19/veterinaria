<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pet;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear el USUARIO Administrador (Solo datos de persona)
        User::factory()->create([
            'name' => 'Admin Alvaro', // Tu nombre personalizado
            'email' => 'admin@veterinaria.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);

        // 2. Crear un USUARIO Staff (Veterinario)
        User::factory()->create([
            'name' => 'Dr. Alvaro',
            'email' => 'staff@veterinaria.com',
            'role' => 'staff',
            'password' => bcrypt('password'),
        ]);

        // 3. Crear 10 Clientes. 
        // Aquí usamos la MAGIA de Laravel para crearle mascotas a cada uno.
        // NO ponemos los datos de la mascota aquí, el factory se encarga.
        User::factory(10)
            ->has(Pet::factory()->count(2)) 
            ->create([
                'role' => 'client', 
            ]);
    }
}