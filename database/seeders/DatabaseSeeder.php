<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use App\Models\Hotel;
use App\Models\Medical;
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

        Medical::create([
            'name' => 'Elfatmi Karima',
            'location' => 'Safi',
            'phone_number' => '+212 678-083724',
            'address' => 'Hopital Mohammed V, Doukkala-Abda, Safi, 46000',
        ]);
    }
}

