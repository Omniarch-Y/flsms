<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'cust_id',
        'coll_id',
        'loan_type',
        'int_id',
        'total_debt',
        'saving_id',
        'service_charge',
        'amount',
        'contract',
        'net_amount',
        'penalty_rate',
        'status',
        'starting_date',
        'ending_date',
        'interest_date',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function customer() {
        return $this->belongsTo(Customer::class,'cust_id');

    }
    public function collateral() {
        return $this->belongsTo(Collateral::class,'coll_id');

    }
    public function insurance() {
        return $this->belongsTo(Insurance::class,'insu_id');

    }
    public function interest() {
        return $this->belongsTo(Interest::class,'int_id');

    }
}
