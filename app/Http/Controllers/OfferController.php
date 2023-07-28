<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Coupon;
use App\Models\Booking;
use Illuminate\Http\Request;
use Ynotz\SmartPages\Http\Controllers\SmartController;

class OfferController extends SmartController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function find(Request $request){
        $coupon= Coupon::where('code',$request['code'])->get()->first();
        $offer = Offer::where('short_code','SSO')->get()->first();
        if($coupon==null){
            $c = [
                'message'=>"Coupon not found",
            ];
            return response()->json($c);
        }
        else{
            $c = [
                'message'=>"Coupon found",
                'code' => $coupon['code'],
                'price' => $offer['discount'],
            ];
            return response()->json($c);
        }

        // return response()->json($coupon);

    }

    public function book(Request $request){
        $coupon = Coupon::where('code',$request['coupon'])->get()->first();
        $offer = Offer::where('short_code','SSO')->get()->first();
        $commission = ($offer['discount']*$offer['commission'])/100;
        $booking = Booking::create([

            'name'=>$request['name'],
            'company'=>$request['company'],
            'phone'=>$request['phone'],
            'coupon_id'=>$coupon['id'],
            'price' => $request['price'],
            'status'=>'booked',
            'reffered_by'=>$coupon['user_id'],
            'offer'=>'SSO',
            'commission'=>$commission,
            'affiliate_payment'=>'Pending',

        ]);

        return response()->json(array('success'=>true,'message'=>'Your booking was successful'));

    }
}
