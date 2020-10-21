<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCarouselSlideRequest;
use App\Http\Requests\EditCarouselSlideRequest;
use App\Http\Requests\OrderCarouselSlidesRequest;
use App\Services\CarouselSlideService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CarouselSlideController extends Controller
{
    private $service;

    public function __construct(CarouselSlideService $service)
    {
        $this->service = $service;
    }

    public function home()
    {
        $this->authorize('view carousel slides');

        $slides = $this->service->getAll();

        return view('admin.website.slides.home', ['slides' => $slides]);
    }

    public function editOrder(OrderCarouselSlidesRequest $request)
    {
        $this->authorize('edit carousel slides');
        $this->service->setNewOrder($request);

        return redirect()->route('admin::carousel::home');
    }

    public function editForm($id)
    {
        $this->authorize('edit carousel slides');
        $slide = $this->service->findById($id);

        return view('admin.website.slides.edit', ['slide' => $slide]);
    }

    public function edit($id, EditCarouselSlideRequest $request)
    {
        $this->authorize('edit carousel slides');
        $slide = $this->service->findById($id);
        $this->service->update($slide, $request);

        return redirect()->route('admin::carousel::editForm', ['id' => $slide->id]);
    }

    public function delete($id)
    {
        $this->authorize('delete carousel slides');
        $slide = $this->service->findById($id);

        $slide->delete();

        return redirect()->route('admin::carousel::home');
    }

    public function addForm()
    {
        $this->authorize('create carousel slides');
        return view('admin.website.slides.add');
    }

    public function add(CreateCarouselSlideRequest $request)
    {
        $this->authorize('create carousel slides');
        $this->service->create($request);

        return redirect()->route('admin::carousel::home');
    }
}
