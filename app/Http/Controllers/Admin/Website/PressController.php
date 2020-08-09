<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;

class PressController extends Controller
{
    function home()
    {
        return view('admin.website.home');
    }

    function editForm($page)
    {
        return view('admin.website.edit');
    }

    function edit($page)
    {
        return view('admin.website.edit');
    }
}
