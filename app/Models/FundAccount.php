<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundAccount extends Model
{
    protected $table = 'fund_accounts';
    protected $fillable = [
        'date',
        'single_invoice_id',
        'debit',
        'credit',
    ];
}
