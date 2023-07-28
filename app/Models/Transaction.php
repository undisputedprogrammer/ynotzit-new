<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id','amount','transaction_ID'];

    public function booking(){
        return $this->belongsTo(Booking::class);
    }
}
