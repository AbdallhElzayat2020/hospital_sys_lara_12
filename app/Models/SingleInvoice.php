<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SingleInvoice extends Model
{
    protected $fillable = [
        'invoice_date',
        'patient_id',
        'doctor_id',
        'section_id',
        'service_id',
        'invoice_number',
        'price',
        'discount_value',
        'tax_rate',
        'tax_value',
        'total_with_tax',
        'status',
        'notes',
    ];

    protected $table = 'single_invoices';


    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
