<?php

namespace App\Http\Controllers;

use App\Services\CarService;
use App\Services\PageService;
use App\Services\PressPostService;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    private $pageService;
    private $carService;
    private $pressPostService;

    public function __construct(PageService $pageService, CarService $carService, PressPostService $pressPostService)
    {
        $this->pageService = $pageService;
        $this->carService = $carService;
        $this->pressPostService = $pressPostService;
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

    public function press() {
        $press_posts = $this->pressPostService->getActive();
        $page = $this->pageService->findByName('press');

        return view('press', ['page' => $page, 'press_posts' => $press_posts]);
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
