<?php

namespace App\Http\Controllers;

use App\Services\CarService;
use App\Services\PageService;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    private $pageService;
    private $carService;

    public function __construct(PageService $pageService, CarService $carService)
    {
        $this->pageService = $pageService;
        $this->carService = $carService;
    }

    public function home()
    {
        return view('home');
    }

    public function cars() {
        $cars = $this->carService->getAll();
        $page = $this->pageService->findByName('cars');
        return view('cars', ['page' => $page, 'cars' => $cars]);
    }

    public function page(string $name)
    {
        $page = $this->pageService->findByName($name);

        Log::info("Getting page", ['page' => $page]);

        if ($page->special) {
            abort(404);
        }

        return view('page', ['page' => $page]);
    }
}
