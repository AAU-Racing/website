<?php


namespace App\Services;

use App\CarouselSlide;
use App\Http\Requests\CreateCarouselSlideRequest;
use App\Http\Requests\EditCarouselSlideRequest;
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
        return CarouselSlide::all();
    }

    function setNewOrder(array $data)
    {
        CarouselSlide::setNewOrder($data);
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