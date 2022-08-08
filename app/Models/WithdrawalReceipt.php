<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawalReceipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'loan_id',
    ];
}
