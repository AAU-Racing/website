<?php

namespace App\Http\Controllers;

use App\Services\PageService;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    public function __construct(PageService $service) {
        $this->service = $service;
    }

    public function index() {
        return view('home');
    }

    public function page(string $name) {
        $page = $this->service->findByName($name);

        Log::info("Getting page", ['page' => $page]);

        if ($page->special) {
            abort(404);
        }

        return view('page', ['page' => $page]);
    }
}
