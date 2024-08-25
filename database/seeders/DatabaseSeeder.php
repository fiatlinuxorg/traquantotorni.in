<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Trip;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*
        User::factory()->create([
            'name' => 'Etanolo',
            'email' => 'etanolo@fiatlinux.it',
            'password' => bcrypt('Abebebubu123'),
        ]);*/

        $trip = Trip::create([
            'title' => 'Viaggio in Italia',
            'description' => 'Un viaggio in Italia',
            'start_date' => '2024-08-23 16:28:41',
            'end_date' => '2024-08-24 16:28:41',
            'start_location' => 'Roma',
            'end_location' => 'Milano',
            'vehicle' => 'Auto',
            'emoji' => '🚗',
            'user_id' => 1,
        ]);
    }
}
