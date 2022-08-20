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

    public function loan() {
        return $this->belongsTo(Loan::class,'loan_id');
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }
}
