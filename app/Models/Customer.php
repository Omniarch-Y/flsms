<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'dob',
        'phone_number',
        'picture',
        'address_id',
        'nationality',
        'type_of_business',
        'group_id',
        'password',
        'user_id',
    ];
}
