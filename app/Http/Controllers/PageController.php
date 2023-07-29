<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Ynotz\SmartPages\Http\Controllers\SmartController;

class PageController extends SmartController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function home(){
        $blogs=Blog::orderBy('id', 'DESC')->get()->take(3);
        return $this->buildResponse('guest.home', compact('blogs'));
    }

    public function about(){

        return $this->buildResponse('guest.about');
    }

    public function services(){
        return $this->buildResponse('guest.service');
    }

    public function blogs(){
        $blogs=Blog::all();
        return $this->buildResponse('guest.blog', compact('blogs'));
    }

    public function contact(){
        return $this->buildResponse('guest.contact');
    }

    public function offer(){
        return $this->buildResponse('guest.super-startup-offer');
    }


}
