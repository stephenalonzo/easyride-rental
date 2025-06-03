<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'model',
        'capacity',
        'transmission',
        'bags',
        'features'
    ];

    protected $casts = [
        'features' => 'array'
    ];
    
    public function vehicles() {
        return $this->belongsTo(Vehicle::class);
    }
}
