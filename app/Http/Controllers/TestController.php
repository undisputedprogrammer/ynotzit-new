<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ynotz\SmartPages\Http\Controllers\SmartController;

class TestController extends SmartController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    public function page()
    {
        $view = 'welcome';
        info($this->request->path());
        switch($this->request->path()) {
            case 'page-one':
                $view = 'test.page_one';
                break;
            case 'page-two':
                $view = 'test.page_two';
                break;
            case 'page-three':
                $view = 'test.page_three';
                break;
        }

        return $this->buildResponse($view);
    }
}
