<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        $vehicle = \App\Models\Vehicle::factory()->create([
            'vehicle' => 'Pick-up Truck (Nissan Frontier or similar)'
        ]);
        \App\Models\Vehicle::factory()->create([
            'vehicle' => 'Compact Car (Nissan Versa or similar)'
        ]);
        \App\Models\Vehicle::factory()->create([
            'vehicle' => 'Luxury Car (BMW 3 Series or similar)'
        ]);
        \App\Models\Vehicle::factory()->create([
            'vehicle' => 'Standard SUV (Mitsubishi Outlander or similar)'
        ]);
        \App\Models\Vehicle::factory()->create([
            'vehicle' => 'Mini Van (Toyota Sienna or similar)'
        ]);

        \App\Models\Reservation::factory()->create([
            'confirm_number' => '23432y234ysd',
            'vehicle_id' => $vehicle->id,
            'pickup' => now(),
            'dropoff' => now(),
            'age' => 25,
            'name' => 'John Doe',
            'number' => '670-123-4567',
            'email' => 'john@email.com',
            'license_number' => '2468013',
            'issuing_state' => 'Saipan',
            'exp_date' => now(),
            'issue_date' => now(),
            'dob' => now(),
            'country' => 'United States',
            'state' => 'California',
            'city' => 'San Jose',
            'street_address' => '1234 Some St',
            'zip' => '95123'
        ]);
    }
}
