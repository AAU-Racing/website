<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Contact
    // Recruitment
    // Sponsor
    // About
    public function __construct()
    {
    }

    public function index()
    {
        return view('home');
    }
}
