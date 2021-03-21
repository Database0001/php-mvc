<?php

namespace App\Http\Controllers\Resource;

class ResourceController
{
    public function index()
    {

        print_r(request());

        return " ";
    }

    public function create()
    {
        return "create";
    }

    public function store()
    {
        return "store";
    }

    public function show($id)
    {
        return view('modules.test.index', compact('id'));
    }

    public function edit($id)
    {
        return "edit $id";
    }

    public function update($id)
    {
        return "update $id";
    }

    public function destroy($id)
    {
        return "destroy $id";
    }
}
