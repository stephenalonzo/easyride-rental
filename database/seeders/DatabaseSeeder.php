<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\VehicleEquipment;
use App\Models\VehicleModel;
use App\Models\VehicleProtectionProduct;
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
            'model' => '2023 Volkswagen Microbus',
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

        VehicleProtectionProduct::factory()->create([
            'title' => 'Damage Waiver',
            'price' => '$18.95',
            'description' => 'Collision Damage Waiver (CDW) is not insurance. The purchase of CDW is optional for Economy to Full size and mandatory for Premium and above. You may purchase CDW for an additional fee. If you purchase CDW, we agree, subject to the actions listed on the rental agreement that invalidate CDW, to contractually waive your responsibility for all or part of the cost of damage to, or loss of the vehicle. A deductible of $1000 USD applies. If CDW is declined, renter is responsible for the full value of damage to the vehicle.'
        ]);
        VehicleProtectionProduct::factory()->create([
            'title' => 'Personal Accident Insurance',
            'price' => '$10.95',
            'description' => 'The purchase of Personal Accident Insurance is optional and not required to rent a vehicle. Personal Accident Insurance covers ambulance service, doctors, hospitalization and nurses for each passenger in the vehicle, with a maximum limit of $6,900 USD (200,00 DOP) for each passenger in the vehicle including the driver, up to maximum passenger allowed in the vehicle. Coverage also includes Accidental Death coverage of $17,250 USD (500,00 DOP).'
        ]);
        VehicleProtectionProduct::factory()->create([
            'title' => 'Zero Deductible Coverage',
            'price' => '$26.95',
            'description' => "Zero Deductible Coverage is not insurance. The purchase of ZDC is optional for the customer. The customer may purchase ZDC for an additional fee. If you purchase ZDC, we agree, subject to the actions listed on the rental agreement that invalidate the ZDC, to contractually waiver your responsibility for all costs of damage that may occur to the rental vehicle. When purchased with Collision Damage Waiver or Third Party Liability, this coverage reduces the customer's deductible to 0.00 USD."
        ]);

        VehicleEquipment::factory()->create([
            'title' => 'Baby Seat',
            'price' => '$6.00',
            'description' => 'Our baby seats conform to government standards. These baby seats are for newborn babies up to 13kg/28lbs (0 - 15 months). They are compatible with a 3-point seat belt, belt base or Isofix base.'
        ]);
        VehicleEquipment::factory()->create([
            'title' => 'Child/Toddler Seat',
            'price' => '$6.00',
            'description' => 'Our child seats conform to government standards. These child seats are for children between 9kg/20lbs to 18kg/40lbs (9 months to 4 years). They are compatible with a 3-point seat belt, belt base, or Isofix base with a multi-position reclination.'
        ]);
        VehicleEquipment::factory()->create([
            'title' => 'Booster Seat',
            'price' => '$6.00',
            'description' => 'Our booster seats conform to government standards. These booster seats are highly versatile for children ranging from 15kg/33lbs to 36kg/80lbs (4 - 12 years). They are compatible with a 3-point seat belt, belt base, or Isofix base.'
        ]);
    }
}
