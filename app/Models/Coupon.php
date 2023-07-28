<?php

namespace App\Models;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = ['code','user_id'];

    public function bookings(){
        return $this->hasMany(Booking::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // public function offer() : BelongsTo {
    //     return $this->belongsTo(Offer::class);
    // }
}
