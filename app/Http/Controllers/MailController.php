<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Ynotz\SmartPages\Http\Controllers\SmartController;

class MailController extends SmartController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function connect(Request $request){
        $details=$request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email'],

            'phone'=>['required','min:10'],
            'company'=>['required'],
            'message'=>['required','min:5'],

        ]);

        $data=[
            'subject'=>'Message from '.$details['name'],
            'name'=>$details['name'],
            'email'=>$details['email'],
            'country'=>$request['country'],
            'phone'=>$details['phone'],
            'company'=>$details['company'],
            'message'=>$details['message'],
        ];

        Mail::to(config('credentials.to_address'))->send(new ContactMail($data));

        return response()->json(array('success'=>true, 'message'=>'Mail has been sent successfully. We will contact your as soon as possible'));


    }
}
