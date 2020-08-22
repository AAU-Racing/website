<?php


namespace App\Services;

use App\CarouselSlide;
use App\Http\Requests\CreateCarouselSlideRequest;
use App\Http\Requests\EditCarouselSlideRequest;
use App\Http\Requests\OrderCarouselSlidesRequest;
use Illuminate\Support\Facades\DB;

class CarouselSlideService
{
    function findById($id)
    {
        $slide = CarouselSlide::find($id);

        if (!$slide) {
            abort(404);
        }

        return $slide;
    }

    function getAll()
    {
        return CarouselSlide::ordered()->get();
    }

    function setNewOrder(OrderCarouselSlidesRequest $request)
    {
        CarouselSlide::setNewOrder($request->input('carousel_slides_order'));
    }

    function create(CreateCarouselSlideRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $slide = CarouselSlide::create([
                'label' => $request->input('label'),
            ]);

            $slide->addMediaFromRequest('photo')->toMediaCollection('photos');

            return $slide;
        });
    }

    function update(CarouselSlide $slide, EditCarouselSlideRequest $request)
    {
        $slide->label = $request->input('label');

        if ($request->hasFile('photo')) {
            $slide->clearMediaCollection('photos');
            $slide->addMediaFromRequest('photo')->toMediaCollection('photos');
        }

        $slide->save();
    }
}
