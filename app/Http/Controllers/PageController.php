<?php

namespace App\Http\Controllers;

use App\Services\CarService;
use App\Services\PageService;
use App\Services\PressPostService;
use Facebook\Facebook;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    private $pageService;
    private $carService;
    private $pressPostService;
    private $facebook;

    public function __construct(PageService $pageService, CarService $carService, PressPostService $pressPostService, Facebook $facebook)
    {
        $this->pageService = $pageService;
        $this->carService = $carService;
        $this->pressPostService = $pressPostService;
        $this->facebook = $facebook;
    }

    public function home()
    {
//        if (Cache::has('facebook_page')) {
//            $page = Cache::get('facebook_page');
//        }
//        else {
//            Log::info('Access token', ['token' => $this->facebook->getDefaultAccessToken()]);
//            $url = config('facebook.page');
//            $response = $this->facebook->get('/oembed_page?url=' . $url);
//            $page = $response->getDecodedBody();
//
//            $store_in_seconds = 60;
//            Cache::put('facebook_page', $page, $store_in_seconds);
//        }
        $page = ['html' => 'AAU Racing is the FSAE team at Aalborg University'];

        return view('home', ['page' => $page]);
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
