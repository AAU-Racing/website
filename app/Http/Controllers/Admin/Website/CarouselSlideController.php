<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCarouselSlideRequest;
use App\Http\Requests\EditCarouselSlideRequest;
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

    public function editOrder(Request $request)
    {
        $this->authorize('edit carousel slides');
        $data = json_decode($request->input('carousel_slides_order'), true);
        Log::info("Reorder slides", ['order' => $data]);

        $rules = [
            '*' => 'exists:carousel_slides,id'
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->passes()) {
            Log::info("Setting new order");
            $this->service->setNewOrder($data);
        }

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
