<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'cust_id',
        'cascade',
        'collateral',
        'interest_rate',
        'service_charge',
        'amount',
        'net_amount',
        'status',
        'starting_date',
        'ending_date' ,
        'user_id'
    ];
}
