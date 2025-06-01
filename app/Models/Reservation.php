<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'confirm_number',
        'pickup',
        'dropoff',
        'age',
        'name',
        'number',
        'email',
        'opt_protection',
        'equipment',
        'license_number',
        'issuing_state',
        'exp_date',
        'issue_date',
        'dob',
        'country',
        'state',
        'city',
        'street_address',
        'street_address_2',
        'zip'
    ];
}
