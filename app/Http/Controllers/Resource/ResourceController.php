<?php

namespace App\Http\Controllers\Resource;

class ResourceController
{
    public function index()
    {
        return "index";
    }

    public function create()
    {
        return "s2ş";
    }

    public function store()
    {
        return "store";
    }

    public function show($id)
    {
        return "show $id";
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
