<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = [
        'notes',
        'status',
        'name',
        'total_with_tax',
        'tax_rate',
        'total_after_discount',
        'discount_value',
        'total_before_discount',
    ];
}
