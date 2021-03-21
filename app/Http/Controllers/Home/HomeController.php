<?php

namespace App\Http\Controllers\Home;

class HomeController
{
    public function get()
    {
        return view('modules.home.index');
    }

    public function post()
    {

        //print_r($_POST);
        
        print_r(request());

        return "Post page";
    }
}
