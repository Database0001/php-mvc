<?php

namespace App\Http\Controllers\Home;

class HomeController
{
    public function get()
    {
        return view('modules.test.index', ['selam' => "<button>button</button>"]);
    }

    public function post()
    {
        return "Post page";
    }
}
