<?php

namespace App\Http\Controllers\Home;

class HomeController
{
    public function index()
    {
        return view('modules.home.index');
    }

    public function test()
    {

        //print_r($_POST);
        
        print_r(request());

        return "Post page";
    }
}
