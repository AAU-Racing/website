<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    function home() {
        return view('admin.page.home');
    }

    function editForm($page) {
        return view('admin.page.edit');
    }

    function edit($page) {
        return view('admin.page.edit');
    }
}
