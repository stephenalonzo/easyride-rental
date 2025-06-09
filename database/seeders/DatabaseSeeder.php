<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Country;
use App\Models\User;
use App\Models\Status;
use App\Models\Vehicle;
use App\Models\Reservation;
use App\Models\VehicleModel;
use Illuminate\Database\Seeder;
use App\Models\VehicleEquipment;
use App\Models\VehicleProtectionProduct;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password')
        ]);

        $adminRole = Role::create([
            'name' => 'admin'
        ]);

        $adminPermission = Permission::create([
            'name' => 'close reservations'
        ]);

        $adminRole->givePermissionTo($adminPermission);
        
        $admin->assignRole($adminRole);
        
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@email.com',
            'password' => bcrypt('password')
        ]);
        
        $userRole = Role::create([
            'name' => 'user'
        ]);
        
        $perms = [
            [
                'name' => 'create reservations'
            ],
            [
                'name' => 'edit reservations'
            ],
            [
                'name' => 'delete reservations'
            ]
        ];
            
        foreach ($perms as $perm) {
            $userPermission = Permission::create($perm);
                
            $userRole->givePermissionTo($userPermission);

            $user->assignRole($userRole);
        }

        $countries = [
            ['name' => 'United States'],
			['name' => 'Canada'],
			['name' => 'Afghanistan'],
			['name' => 'Albania'],
			['name' => 'Algeria'],
			['name' => 'American Samoa'],
			['name' => 'Andorra'],
			['name' => 'Angola'],
			['name' => 'Anguilla'],
			['name' => 'Antarctica'],
			['name' => 'Antigua and/or Barbuda'],
			['name' => 'Argentina'],
			['name' => 'Armenia'],
			['name' => 'Aruba'],
			['name' => 'Australia'],
			['name' => 'Austria'],
			['name' => 'Azerbaijan'],
			['name' => 'Bahamas'],
			['name' => 'Bahrain'],
			['name' => 'Bangladesh'],
			['name' => 'Barbados'],
			['name' => 'Belarus'],
			['name' => 'Belgium'],
			['name' => 'Belize'],
			['name' => 'Benin'],
			['name' => 'Bermuda'],
			['name' => 'Bhutan'],
			['name' => 'Bolivia'],
			['name' => 'Bosnia and Herzegovina'],
			['name' => 'Botswana'],
			['name' => 'Bouvet Island'],
			['name' => 'Brazil'],
			['name' => 'British lndian Ocean Territory'],
			['name' => 'Brunei Darussalam'],
			['name' => 'Bulgaria'],
			['name' => 'Burkina Faso'],
			['name' => 'Burundi'],
			['name' => 'Cambodia'],
			['name' => 'Cameroon'],
			['name' => 'Cape Verde'],
			['name' => 'Cayman Islands'],
			['name' => 'Central African Republic'],
			['name' => 'Chad'],
			['name' => 'Chile'],
			['name' => 'China'],
			['name' => 'Christmas Island'],
			['name' => 'Cocos (Keeling Islands'],
			['name' => 'Colombia'],
			['name' => 'Comoros'],
			['name' => 'Congo'],
			['name' => 'Cook Islands'],
			['name' => 'Costa Rica'],
			['name' => 'Croatia (Hrvatska'],
			['name' => 'Cuba'],
			['name' => 'Cyprus'],
			['name' => 'Czech Republic'],
			['name' => 'Democratic Republic of Congo'],
			['name' => 'Denmark'],
			['name' => 'Djibouti'],
			['name' => 'Dominica'],
			['name' => 'Dominican Republic'],
			['name' => 'East Timor'],
			['name' => 'Ecudaor'],
			['name' => 'Egypt'],
			['name' => 'El Salvador'],
			['name' => 'Equatorial Guinea'],
			['name' => 'Eritrea'],
			['name' => 'Estonia'],
			['name' => 'Ethiopia'],
			['name' => 'Falkland Islands (Malvinas'],
			['name' => 'Faroe Islands'],
			['name' => 'Fiji'],
			['name' => 'Finland'],
			['name' => 'France'],
			['name' => 'France], Metropolitan'],
			['name' => 'French Guiana'],
			['name' => 'French Polynesia'],
			['name' => 'French Southern Territories'],
			['name' => 'Gabon'],
			['name' => 'Gambia'],
			['name' => 'Georgia'],
			['name' => 'Germany'],
			['name' => 'Ghana'],
			['name' => 'Gibraltar'],
			['name' => 'Greece'],
			['name' => 'Greenland'],
			['name' => 'Grenada'],
			['name' => 'Guadeloupe'],
			['name' => 'Guam'],
			['name' => 'Guatemala'],
			['name' => 'Guinea'],
			['name' => 'Guinea-Bissau'],
			['name' => 'Guyana'],
			['name' => 'Haiti'],
			['name' => 'Heard and Mc Donald Islands'],
			['name' => 'Honduras'],
			['name' => 'Hong Kong'],
			['name' => 'Hungary'],
			['name' => 'Iceland'],
			['name' => 'India'],
			['name' => 'Indonesia'],
			['name' => 'Iran (Islamic Republic of'],
			['name' => 'Iraq'],
			['name' => 'Ireland'],
			['name' => 'Israel'],
			['name' => 'Italy'],
			['name' => 'Ivory Coast'],
			['name' => 'Jamaica'],
			['name' => 'Japan'],
			['name' => 'Jordan'],
			['name' => 'Kazakhstan'],
			['name' => 'Kenya'],
			['name' => 'Kiribati'],
			['name' => 'Korea], Democratic People\'s Republic of'],
			['name' => 'Korea], Republic of'],
			['name' => 'Kuwait'],
			['name' => 'Kyrgyzstan'],
			['name' => 'Lao People\'s Democratic Republic'],
			['name' => 'Latvia'],
			['name' => 'Lebanon'],
			['name' => 'Lesotho'],
			['name' => 'Liberia'],
			['name' => 'Libyan Arab Jamahiriya'],
			['name' => 'Liechtenstein'],
			['name' => 'Lithuania'],
			['name' => 'Luxembourg'],
			['name' => 'Macau'],
			['name' => 'Macedonia'],
			['name' => 'Madagascar'],
			['name' => 'Malawi'],
			['name' => 'Malaysia'],
			['name' => 'Maldives'],
			['name' => 'Mali'],
			['name' => 'Malta'],
			['name' => 'Marshall Islands'],
			['name' => 'Martinique'],
			['name' => 'Mauritania'],
			['name' => 'Mauritius'],
			['name' => 'Mayotte'],
			['name' => 'Mexico'],
			['name' => 'Micronesia], Federated States of'],
			['name' => 'Moldova], Republic of'],
			['name' => 'Monaco'],
			['name' => 'Mongolia'],
			['name' => 'Montserrat'],
			['name' => 'Morocco'],
			['name' => 'Mozambique'],
			['name' => 'Myanmar'],
			['name' => 'Namibia'],
			['name' => 'Nauru'],
			['name' => 'Nepal'],
			['name' => 'Netherlands'],
			['name' => 'Netherlands Antilles'],
			['name' => 'New Caledonia'],
			['name' => 'New Zealand'],
			['name' => 'Nicaragua'],
			['name' => 'Niger'],
			['name' => 'Nigeria'],
			['name' => 'Niue'],
			['name' => 'Norfork Island'],
			['name' => 'Northern Mariana Islands'],
			['name' => 'Norway'],
			['name' => 'Oman'],
			['name' => 'Pakistan'],
			['name' => 'Palau'],
			['name' => 'Panama'],
			['name' => 'Papua New Guinea'],
			['name' => 'Paraguay'],
			['name' => 'Peru'],
			['name' => 'Philippines'],
			['name' => 'Pitcairn'],
			['name' => 'Poland'],
			['name' => 'Portugal'],
			['name' => 'Puerto Rico'],
			['name' => 'Qatar'],
			['name' => 'Republic of South Sudan'],
			['name' => 'Reunion'],
			['name' => 'Romania'],
			['name' => 'Russian Federation'],
			['name' => 'Rwanda'],
			['name' => 'Saint Kitts and Nevis'],
			['name' => 'Saint Lucia'],
			['name' => 'Saint Vincent and the Grenadines'],
			['name' => 'Samoa'],
			['name' => 'San Marino'],
			['name' => 'Sao Tome and Principe'],
			['name' => 'Saudi Arabia'],
			['name' => 'Senegal'],
			['name' => 'Serbia'],
			['name' => 'Seychelles'],
			['name' => 'Sierra Leone'],
			['name' => 'Singapore'],
			['name' => 'Slovakia'],
			['name' => 'Slovenia'],
			['name' => 'Solomon Islands'],
			['name' => 'Somalia'],
			['name' => 'South Africa'],
			['name' => 'South Georgia South Sandwich Islands'],
			['name' => 'Spain'],
			['name' => 'Sri Lanka'],
			['name' => 'St. Helena'],
			['name' => 'St. Pierre and Miquelon'],
			['name' => 'Sudan'],
			['name' => 'Suriname'],
			['name' => 'Svalbarn and Jan Mayen Islands'],
			['name' => 'Swaziland'],
			['name' => 'Sweden'],
			['name' => 'Switzerland'],
			['name' => 'Syrian Arab Republic'],
			['name' => 'Taiwan'],
			['name' => 'Tajikistan'],
			['name' => 'Tanzania], United Republic of'],
			['name' => 'Thailand'],
			['name' => 'Togo'],
			['name' => 'Tokelau'],
			['name' => 'Tonga'],
			['name' => 'Trinidad and Tobago'],
			['name' => 'Tunisia'],
			['name' => 'Turkey'],
			['name' => 'Turkmenistan'],
			['name' => 'Turks and Caicos Islands'],
			['name' => 'Tuvalu'],
			['name' => 'Uganda'],
			['name' => 'Ukraine'],
			['name' => 'United Arab Emirates'],
			['name' => 'United Kingdom'],
			['name' => 'United States minor outlying islands'],
			['name' => 'Uruguay'],
			['name' => 'Uzbekistan'],
			['name' => 'Vanuatu'],
			['name' => 'Vatican City State'],
			['name' => 'Venezuela'],
			['name' => 'Vietnam'],
			['name' => 'Virgin Islands (British'],
			['name' => 'Virgin Islands (U.S.'],
			['name' => 'Wallis and Futuna Islands'],
			['name' => 'Western Sahara'],
			['name' => 'Yemen'],
			['name' => 'Yugoslavia'],
			['name' => 'Zaire'],
			['name' => 'Zambia'],
			['name' => 'Zimbabwe']
        ];

        foreach ($countries as $country) {
            Country::factory()->create($country);
        }

        $vehicle = Vehicle::factory()->create([
            'vehicle' => 'Pick-up Truck',
            'model_type' => 'Toyota Tacoma or similar',
            'description' => 'Choose from a variety of rental cars in this category including economy, full-size or luxury sedans. Whether you are looking for fuel-efficiency, space, or comfort and style you are sure to find the perfect rental car no matter whether you are going on a quick family visit or an adventurous road trip.'
        ]);
        Vehicle::factory()->create([
            'vehicle' => 'Compact Car',
            'model_type' => 'Nissan Sentra or similar',
            'description' => 'Whether you’re hauling large items for a DIY project or packing up for a weekend retreat, our pickup trucks have the space, power and durability ideal for your needs. EasyRide Rental locations do not allow a hitch to be attached or towing of any kind with the rental vehicle.'
        ]);
        Vehicle::factory()->create([
            'vehicle' => 'Luxury Car',
            'model_type' => 'BMW 7 Series or similar',
            'description' => 'Rent a luxury car from EasyRide Rental. Choose from our range of premium cars and SUVs to rent, including convertibles, coupes, hybrids and more.'
        ]);
        Vehicle::factory()->create([
            'vehicle' => 'Standard SUV',
            'model_type' => 'Mitsubishi Outlander or similar',
            'description' => 'Our SUVs offer plenty of flexibility with seating capacity, power, and luggage room. Whether you are going on a weekend family trip or exploring the countryside we are sure to have the ideal SUV for your needs.'
        ]);
        Vehicle::factory()->create([
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
            'model' => '2025 Volkswagen Microbus',
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

        Status::factory()->create([
            'status' => 'Pending'
        ]);
        Status::factory()->create([
            'status' => 'Received'
        ]);
        Status::factory()->create([
            'status' => 'Expired'
        ]);

        Reservation::factory()->create([
            'confirm_number' => '23432y234ysd',
            'user_id' => $user->id,
            'vehicle_id' => $vehicle->id,
            'pickup' => date('Y/m/d H:i', strtotime(now())),
            'dropoff' => date('Y/m/d H:i', strtotime(now())),
            'age' => 25,
            'status' => 1,
            'name' => 'John Doe',
            'number' => '670-123-4567',
            'email' => 'john@email.com',
            'license_number' => '2468013',
            'issuing_state' => 'Northern Mariana Islands',
            'exp_date' => date('Y/m/d', strtotime(now())),
            'issue_date' => date('Y/m/d', strtotime(now())),
            'dob' => date('Y/m/d', strtotime(now())),
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
