<?php

namespace App\Http\Controllers\Home;

use App\Models\Users;

class HomeController
{
    public function index()
    {
        $model = new Users();
        return view('modules.home.index', ['users' => $model->getAll()]);
    }

    public function test()
    {

        //print_r($_POST);

        print_r(request());

        return "Post page";
    }
}
