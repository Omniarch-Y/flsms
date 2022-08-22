<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saving extends Model
{
    use HasFactory;

    protected $fillable = [
        'payed_amount',
        'insurance_deposit',
        'repayment_date',
        'monthly_payment',
        'remaining_balance'
    ];
}