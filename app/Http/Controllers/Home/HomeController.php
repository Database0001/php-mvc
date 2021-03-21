<?php

namespace App\Http\Controllers\Home;

use App\Models\Users;

class HomeController
{
    public function index()
    {
        $model = new Users();
        $users = $model->getAll();
        $selam = null;
        return view('modules.home.index', ['users' => $users]);
    }

    public function test()
    {
        print_r(request());

        return "Post page";
    }
}
