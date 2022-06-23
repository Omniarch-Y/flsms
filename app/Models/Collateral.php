<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collateral extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_of_collateral',
        'value',
        'loan_id',
        'user_id'
    ];
}
