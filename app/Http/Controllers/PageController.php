<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
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
        return $this->buildResponse('guest.about');
    }

    public function services(){
        MetatagHelper::clearAllMeta();
        MetatagHelper::setTitle('YNOTZ IT SOLUTIONS');
        return $this->buildResponse('guest.service');
    }

    public function blogs(){
        MetatagHelper::clearAllMeta();
        MetatagHelper::setTitle('YNOTZ IT SOLUTIONS');
        $blogs=Blog::all();
        return $this->buildResponse('guest.blog', compact('blogs'));
    }

    public function contact(){
        MetatagHelper::clearAllMeta();
        MetatagHelper::setTitle('YNOTZ IT SOLUTIONS');
        return $this->buildResponse('guest.contact');
    }

    public function offer(){
        MetatagHelper::clearAllMeta();
        MetatagHelper::setTitle('YNOTZ IT SOLUTIONS');

        return $this->buildResponse('guest.super-startup-offer');
    }


}
