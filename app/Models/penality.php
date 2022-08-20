<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penality extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'user_id',
        'reciept_id',
        'late_by'
    ];
}