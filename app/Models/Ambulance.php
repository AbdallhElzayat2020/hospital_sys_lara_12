<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    protected $fillable = [
        'driver_name',
        'car_number',
        'car_model',
        'car_year_made',
        'driver_license_number',
        'driver_phone',
        'status',
        'car_type',
        'notes',
    ];

    protected $table = 'ambulances';
}
