<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    protected $table = 'insurances';

    protected $fillable = [
        'insurance_name',
        'notes',
        'insurance_percentage',
        'insurance_code',
        'phone',
        'email',
        'description',
        'status',
    ];
}
