<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CarouselSlidesController extends Controller
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
