<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientAccount extends Model
{
    protected $table = 'patient_accounts';
    protected $fillable = [
        'date',
        'patient_id',
        'single_invoice_id',
        'debit',
        'credit',
    ];
}
