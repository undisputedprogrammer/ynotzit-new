<?php

namespace App\Http\Controllers;

use App\Models\User;
use Monolog\Registry;
use App\Models\Marketer;
use App\Mail\ApprovalMail;
use App\Models\Booking;
use App\Models\Coupon;
use App\Models\Registration;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Services\AdminServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Ynotz\SmartPages\Http\Controllers\SmartController;

class AdministrationController extends SmartController
{



    private $adminService;

    public function __construct(AdminServices $service, Request $request)
    {
        parent::__construct($request);
        $this->adminService = $service;
    }



    public function index(Request $request){
        if (! Gate::allows('is-admin')) {
            abort(403);
        }
        return $this->buildResponse('admin.admin-index');
    }

    public function approveIndex(Request $request){

        if (! Gate::allows('is-admin')) {
            abort(403);
        }


        if($request['action']=='approve'){
            $status = $this->approve($request);
            if($status==true){
                $registrations = Registration::all();
                $message = array('mode'=>'success','message'=>'Affiliate Approved');
                return $this->buildResponse('admin.admin-approve-affiliates', compact('registrations','message'));
            }
        }

        if($request['action']=='reject'){
            $status = $this->reject($request);
            if($status==true){
                $registrations = Registration::all();
                $message = array('mode'=>'warning','message'=>'Affiliate Rejected');
                return $this->buildResponse('admin.admin-approve-affiliates', compact('registrations','message'));
            }
        }

        $r = $request;
        $message = array();
        $registrations = Registration::all();
        return $this->buildResponse('admin.admin-approve-affiliates', compact('registrations','message'));
    }

    public function approve(Request $request){

        if (! Gate::allows('is-admin')) {
            abort(403);
        }
        // dd($request['rid']);


        // $user = User::create([
        //     'name'=>
        // ]);


        $registration=Registration::find($request['rid']);

        $cred = $this->adminService->generateCredentials($registration['name']);

        $user = $this->adminService->createUser($registration, $cred);

        $user->assignRole('marketer');

        $marketer = Marketer::create([
            'user_id'=>$user->id,
            'name'=>$registration['name'],
            'email'=>$registration['email'],
            'phone'=>$registration['phone'],
            'place'=>$registration['place'],
            'gender'=>$registration['gender'],
            'age'=>$registration['age'],
        ]);



        // dd($marketer);

        $data=[
            'subject'=>'Welcome Affiliate Marketer',
            'name' => $marketer['name'],
            'email' => $marketer['email'],

            'password' => $cred['password']
        ];
        Mail::mailer('smtp2')->to($marketer['email'])->send(new ApprovalMail($data));

        $registration->delete();

        // return back()->with(['message'=>'Affiliate approved']);
        return true;
    }

    public function logout(Request $request){

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function addCoupon(Request $request){
        $coupons = Coupon::where('user_id','!=',null)->with('user')->get();
        return $this->buildResponse('admin.admin-manage-coupons', compact('coupons'));
    }

    public function createCoupon(Request $request){
        $request->validate([
            'code'=>['required','min:6']
        ]);
        $code = strtoupper($request['code']);
        $c = Coupon::where('code',$code)->get()->first();
        $usercoupons = Coupon::where('user_id',$request->user()->id)->get();
        if($c!=null){
            return response()->json(array('success'=>false,'message'=>'Coupon already exists'), 422);
            return back()->withInput()->withErrors(['code'=>"Coupon already exists"])->onlyInput('code');
        }
        elseif(count($usercoupons)>7){
            return response()->json(array('success'=>false,'message'=>'You have already reached your Coupon limit'), 422);
            return back()->withErrors(['code'=>"You have already reached your Coupon limit"])->onlyInput('code');
        }
        else{
            // $offer = Offer::find($request['offer']);

            $coupon = Coupon::create([

                'code'=>$code,
                // 'price'=>$offer['discount'],
                'user_id'=>$request->user()->id,
                // 'offer_id'=>$request['offer']
            ]);

            return response()->json(array('success'=>true,'message'=>'New coupon added'));
        }
    }

    public function bookings(){
        if (! Gate::allows('is-admin')) {
            abort(403);
        }


        $bookings = Booking::where('id','>',0)->with('reffered')->with('coupon')->get();
        $message = array();
        return $this->buildResponse('admin.admin-manage-bookings', compact('bookings','message'));
    }


    public function updateStatus(Request $request){
        if (! Gate::allows('is-admin')) {
            abort(403);
        }
        $booking = Booking::find($request['bid']);
        $booking['status']=$request['status'];
        if($request['status']=='closed'){
            $booking['affiliate_payment']='Pending';
            $message = array('mode'=>'success','message'=>'Booking status changed');
        }
        $booking->save();

        $bookings = Booking::where('id','>',0)->with('reffered')->with('coupon')->get();
        if($request['status']=='cancelled'){
            $message = array('mode'=>'warning','message'=>'Booking cancelled');
        }

        return $this->buildResponse('admin.admin-manage-bookings', compact('bookings','message'));
    }

    public function reject(Request $request){
        if (! Gate::allows('is-admin')) {
            abort(403);
        }

        $registration = Registration::find($request['rid']);

        $registration->delete();

        return true;
    }

    public function getDetails(Request $request){
        $marketers = Marketer::where('user_id','!=',null)->with('user')->withCount('coupons')->get();
        foreach($marketers as $marketer){
            $marketer['leads'] =count(Booking::where('reffered_by',$marketer->user->id)->get());
            $marketer['closed'] = count(Booking::where('reffered_by',$marketer->user->id)->where('status','closed')->get());
            $marketer['pending_payments'] = count(Booking::where('reffered_by',$marketer->user->id)->where('affiliate_payment','Initiated')->get());
        }
        return $this->buildResponse('admin.admin-manage-affiliates', compact('marketers'));
    }

    public function affiliatePayments(Request $request){
        $marketer = Marketer::where('id',$request['mid'])->with('user')->get()->first();
        // dd($marketer);
        $bookings =Booking::where('reffered_by',$marketer->user->id)->with(['coupon','offers'])->get();
        // dd($bookings);
        // return view('admin.admin-manage-affiliate-payments', compact('marketer','bookings'));
        return $this->buildResponse('admin.admin-manage-affiliate-payments', compact('marketer','bookings'));
    }

    public function markPayment(Request $request){

        $booking=Booking::where('id',$request['booking_id'])->get()->first();
        $booking['affiliate_payment']='Credited';
        $booking->save();
        $transaction = Transaction::create([
            'booking_id'=>$request['booking_id'],
            'amount'=>$request['amount'],
            'transaction_ID'=>$request['transaction_id']
        ]);


        return response()->json(array('success'=>true,'message'=>'Payment marked'));
    }
}


