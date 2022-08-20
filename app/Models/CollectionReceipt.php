<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionReceipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'saving_id',
        'loan_id',
        'user_id'
    ];

    public function loan() {
        return $this->belongsTo(Loan::class,'loan_id');
        
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id');
        
    }

    // public function saving() {
    //     return $this->belongsTo(Saving::class,'saving_id');
        
    // }
}
