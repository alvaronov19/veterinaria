<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pet;
use App\Models\User;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client1 = User::where('email', 'client1@example.com')->first();
        $client2 = User::where('email', 'client2@example.com')->first();

        if ($client1) {
            Pet::create([
                'name' => 'Firulais',
                'species' => 'Perro',
                'breed' => 'Labrador',
                'age' => 3,
                'user_id' => $client1->id,
            ]);

            Pet::create([
                'name' => 'Michi',
                'species' => 'Gato',
                'breed' => 'Siames',
                'age' => 2,
                'user_id' => $client1->id,
            ]);
        }

        if ($client2) {
            Pet::create([
                'name' => 'Rex',
                'species' => 'Perro',
                'breed' => 'Pastor Aleman',
                'age' => 5,
                'user_id' => $client2->id,
            ]);
        }
    }
}
