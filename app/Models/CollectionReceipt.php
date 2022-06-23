<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionReceipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'pen_id',
        'ins_id',
        'loan_id',
        'user_id'
    ];
}
