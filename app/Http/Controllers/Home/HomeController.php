<?php

namespace App\Http\Controllers\Home;

class HomeController
{
    public function get()
    {
        return view('modules.test.index', ['selam' => "<button>sa</button>"]);
    }

    public function post()
    {
        return "Post page";
    }
}
