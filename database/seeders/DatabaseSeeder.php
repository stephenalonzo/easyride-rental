<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\VehicleModel;
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
            'vehicle' => 'Pick-up Truck',
            'model_type' => 'Toyota Tacoma or similar',
            'description' => 'Choose from a variety of rental cars in this category including economy, full-size or luxury sedans. Whether you are looking for fuel-efficiency, space, or comfort and style you are sure to find the perfect rental car no matter whether you are going on a quick family visit or an adventurous road trip.'
        ]);
        \App\Models\Vehicle::factory()->create([
            'vehicle' => 'Compact Car',
            'model_type' => 'Nissan Sentra or similar',
            'description' => 'Whether you’re hauling large items for a DIY project or packing up for a weekend retreat, our pickup trucks have the space, power and durability ideal for your needs. EasyRide Rental locations do not allow a hitch to be attached or towing of any kind with the rental vehicle.'
        ]);
        \App\Models\Vehicle::factory()->create([
            'vehicle' => 'Luxury Car',
            'model_type' => 'BMW 7 Series or similar',
            'description' => 'Rent a luxury car from EasyRide Rental. Choose from our range of premium cars and SUVs to rent, including convertibles, coupes, hybrids and more.'
        ]);
        \App\Models\Vehicle::factory()->create([
            'vehicle' => 'Standard SUV',
            'model_type' => 'Mitsubishi Outlander or similar',
            'description' => 'Our SUVs offer plenty of flexibility with seating capacity, power, and luggage room. Whether you are going on a weekend family trip or exploring the countryside we are sure to have the ideal SUV for your needs.'
        ]);
        \App\Models\Vehicle::factory()->create([
            'vehicle' => 'Mini Van',
            'model_type' => 'Toyota Sienna or similar',
            'description' => 'Need extra room for people, luggage, or cargo or both? Our minivans and passenger vans can seat up to 7 and 15 passengers respectively and are great for family vacations or accommodating large groups. Cargo vans are ideal for transporting bulky items that may not fit in your personal vehicle.'
        ]);

        VehicleModel::factory()->create([
            'model' => '2024 Mitsubishi Outlander',
            'capacity' => '7 People',
            'transmission' => 'Automatic',
            'bags' => '4',
            'features' => ['AM/FM Stereo Radio', 'Cruise Control', '2 Wheel Drive', 'Bluetooth', 'Gasoline Vehicle', 'Air-Conditioning'],
            'vehicle_id' => 4
        ]);

        VehicleModel::factory()->create([
            'model' => '2024 Hyundai Tuscon',
            'capacity' => '5 People',
            'transmission' => 'Automatic',
            'bags' => '4',
            'features' => ['AM/FM Stereo Radio', 'Cruise Control', '2 Wheel Drive', 'Bluetooth', 'Gasoline Vehicle', 'Air-Conditioning'],
            'vehicle_id' => 4
        ]);
        VehicleModel::factory()->create([
            'model' => '2024 Honda CR-V',
            'capacity' => '5 People',
            'transmission' => 'Automatic',
            'bags' => '4',
            'features' => ['AM/FM Stereo Radio', 'Cruise Control', '2 Wheel Drive', 'Bluetooth', 'Gasoline Vehicle', 'Air-Conditioning'],
            'vehicle_id' => 4
        ]);
        VehicleModel::factory()->create([
            'model' => '2023 Toyota Rav 4',
            'capacity' => '5 People',
            'transmission' => 'Automatic',
            'bags' => '4',
            'features' => ['AM/FM Stereo Radio', 'Cruise Control', '2 Wheel Drive', 'Bluetooth', 'Gasoline Vehicle', 'Air-Conditioning'],
            'vehicle_id' => 4
        ]);
        VehicleModel::factory()->create([
            'model' => '2020 Mazda CX-5',
            'capacity' => '5 People',
            'transmission' => 'Automatic',
            'bags' => '4',
            'features' => ['AM/FM Stereo Radio', 'Cruise Control', '2 Wheel Drive', 'Bluetooth', 'Gasoline Vehicle', 'Air-Conditioning'],
            'vehicle_id' => 4
        ]);

        VehicleModel::factory()->create([
            'model' => '2024 Toyota Sienna Hybrid',
            'capacity' => '7 People',
            'transmission' => 'Automatic',
            'bags' => '5',
            'features' => ['AM/FM Stereo Radio', 'Cruise Control', '2 Wheel Drive', 'Bluetooth', 'Gasoline Vehicle', 'Air-Conditioning'],
            'vehicle_id' => 5
        ]);
        VehicleModel::factory()->create([
            'model' => '2024 Honda Odyssey',
            'capacity' => '8 People',
            'transmission' => 'Automatic',
            'bags' => '5',
            'features' => ['AM/FM Stereo Radio', 'Cruise Control', '2 Wheel Drive', 'Bluetooth', 'Gasoline Vehicle', 'Air-Conditioning'],
            'vehicle_id' => 5
        ]);
        VehicleModel::factory()->create([
            'model' => '2024 Chrysler Pacifica',
            'capacity' => '7 People',
            'transmission' => 'Automatic',
            'bags' => '5',
            'features' => ['AM/FM Stereo Radio', 'Cruise Control', '2 Wheel Drive', 'Bluetooth', 'Gasoline Vehicle', 'Air-Conditioning'],
            'vehicle_id' => 5
        ]);
        VehicleModel::factory()->create([
            'model' => '2023 Volkswagen ID.Buzz Microbus',
            'capacity' => '7 People',
            'transmission' => 'Automatic',
            'bags' => '5',
            'features' => ['AM/FM Stereo Radio', 'Cruise Control', '2 Wheel Drive', 'Bluetooth', 'Gasoline Vehicle', 'Air-Conditioning'],
            'vehicle_id' => 5
        ]);

        VehicleModel::factory()->create([
            'model' => 'BMW 7 Series',
            'capacity' => '5 People',
            'transmission' => 'Automatic',
            'bags' => '4',
            'features' => ['AM/FM Stereo Radio', 'Cruise Control', '2 Wheel Drive or 4 Wheel Drive', 'Bluetooth', 'Gasoline Vehicle', 'Air-Conditioning'],
            'vehicle_id' => 3
        ]);
        VehicleModel::factory()->create([
            'model' => 'Audi A8',
            'capacity' => '5 People',
            'transmission' => 'Automatic',
            'bags' => '4',
            'features' => ['AM/FM Stereo Radio', 'Cruise Control', '2 Wheel Drive or 4 Wheel Drive', 'Bluetooth', 'Gasoline Vehicle', 'Air-Conditioning'],
            'vehicle_id' => 3
        ]);
        VehicleModel::factory()->create([
            'model' => 'Mercedes-Benz S-Class',
            'capacity' => '5 People',
            'transmission' => 'Automatic',
            'bags' => '4',
            'features' => ['AM/FM Stereo Radio', 'Cruise Control', '2 Wheel Drive or 4 Wheel Drive', 'Bluetooth', 'Gasoline Vehicle', 'Air-Conditioning'],
            'vehicle_id' => 3
        ]);

        VehicleModel::factory()->create([
            'model' => '2024 Toyota Corolla',
            'capacity' => '4 People',
            'transmission' => 'Automatic',
            'bags' => '3',
            'features' => ['AM/FM Stereo Radio', 'Cruise Control', '2 Wheel Drive', 'Bluetooth', 'Gasoline Vehicle', 'Air-Conditioning'],
            'vehicle_id' => 2
        ]);
        VehicleModel::factory()->create([
            'model' => '2024 Nissan Sentra',
            'capacity' => '4 People',
            'transmission' => 'Automatic',
            'bags' => '3',
            'features' => ['AM/FM Stereo Radio', 'Cruise Control', '2 Wheel Drive', 'Bluetooth', 'Gasoline Vehicle', 'Air-Conditioning'],
            'vehicle_id' => 2
        ]);
        VehicleModel::factory()->create([
            'model' => '2024 Honda Civic',
            'capacity' => '5 People',
            'transmission' => 'Automatic',
            'bags' => '3',
            'features' => ['AM/FM Stereo Radio', 'Cruise Control', '2 Wheel Drive', 'Bluetooth', 'Gasoline Vehicle', 'Air-Conditioning'],
            'vehicle_id' => 2
        ]);
        
        VehicleModel::factory()->create([
            'model' => '2022 Nissan Frontier',
            'capacity' => '4 People',
            'transmission' => 'Automatic',
            'bags' => '3',
            'features' => ['AM/FM Stereo Radio', 'Cruise Control', '2 Wheel Drive', 'Bluetooth', 'Gasoline Vehicle', 'Air-Conditioning'],
            'vehicle_id' => 1
        ]);
        VehicleModel::factory()->create([
            'model' => '2022 Toyota Tacoma',
            'capacity' => '4 People',
            'transmission' => 'Automatic',
            'bags' => '3',
            'features' => ['AM/FM Stereo Radio', 'Cruise Control', '2 Wheel Drive', 'Bluetooth', 'Gasoline Vehicle', 'Air-Conditioning'],
            'vehicle_id' => 1
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
