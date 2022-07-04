<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'cust_id',
        'collateral',
        'interest_rate',
        'insurance',
        'service_charge',
        'amount',
        'net_amount',
        'penalty_rate',
        'status',
        'starting_date',
        'ending_date',
        'user_id'
    ];
}
