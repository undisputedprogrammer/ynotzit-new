<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketer extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','name','email','phone','place','gender','age'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function coupons(){
        return $this->hasMany(Coupon::class,'user_id','user_id');
    }
}
