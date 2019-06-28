<?php

namespace App\Http\Controllers;

use App\Page;

class PageController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('home');
    }

    public function page($page_name) {
        $page = Page::where('name', $page_name)->get();

        if (!$page) {
            abort(404);
        }

        return view('page', ['page' => $page]);
    }
}
