<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Ynotz\Metatags\Helpers\MetatagHelper;
use Ynotz\SmartPages\Http\Controllers\SmartController;

class PageController extends SmartController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function home(){
        $blogs=Blog::orderBy('id', 'DESC')->get()->take(3);
        MetatagHelper::clearAllMeta();
        MetatagHelper::setTitle('YNOTZ IT SOLUTIONS');
        MetatagHelper::addMetatags(['description'=> 'YNOTZ IT Solutions is one of the fastest growing IT Company based in India. Our services include Web development, Mobile Application Development, Custom Business Solutions, Graphics Designing and Digital Marketing']);


        return $this->buildResponse('guest.home', compact('blogs'));
    }

    public function about(){
        MetatagHelper::clearAllMeta();
        MetatagHelper::setTitle('About - YNOTZ IT SOLUTIONS');
        MetatagHelper::addMetatags(['description'=> 'We are a team of logical, innovative and creative minds dedicated to provide best quality digital products. We focus on quality and innovation. Leave all your software and graphical needs to us.']);
        return $this->buildResponse('guest.about');
    }

    public function services(){
        MetatagHelper::clearAllMeta();
        MetatagHelper::setTitle('Services - YNOTZ IT SOLUTIONS');
        MetatagHelper::addMetatags(['description'=> 'We offer services including Website and Web application Development, Mobile Application Development, Digital Marketing, Graphics or Video Creatives and Outsourced Development. We strive for quality and we thrive on customer satisfaction']);
        return $this->buildResponse('guest.service');
    }

    public function blogs(){
        MetatagHelper::clearAllMeta();
        MetatagHelper::setTitle('Blog - YNOTZ IT SOLUTIONS');
        $blogs=Blog::all();
        return $this->buildResponse('guest.blog', compact('blogs'));
    }

    public function contact(){
        MetatagHelper::clearAllMeta();
        MetatagHelper::setTitle('Contact - YNOTZ IT SOLUTIONS');
        MetatagHelper::addMetatags(['description'=> 'Lets discuss about what we can build together. Feel free to contact us or book an appointment. We are here to assist you.']);
        return $this->buildResponse('guest.contact');
    }

    public function offer(){
        MetatagHelper::clearAllMeta();
        MetatagHelper::setTitle('Offers - YNOTZ IT SOLUTIONS');

        return $this->buildResponse('guest.super-startup-offer');
    }

    public function emp(Request $request){
        if (! Gate::allows('is-employee')) {
            return response()->json(['message'=>"Unauthorized access"], 401);
        }

        return $this->buildResponse('employee.index');
    }

    public function privacypolicy(){
        return $this->buildResponse('guest.privacy-policy');
    }

}
