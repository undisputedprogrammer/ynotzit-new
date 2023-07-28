<?php

namespace App\Models;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['name','company','phone','coupon_id','price','status','reffered_by','offer','commission','affiliate_payment'];

    public function coupon(){
        return $this->belongsTo(Coupon::class);
    }

    public function reffered(){
        return $this->belongsTo(User::class,'reffered_by','id');
    }

    public function offers(){
        return $this->belongsTo(Offer::class, 'offer','short_code');
    }
}
