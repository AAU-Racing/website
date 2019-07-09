<?php


namespace App\Services;

use App\Car;
use App\Http\Requests\CreateCarRequest;
use App\Http\Requests\EditCarRequest;
use Illuminate\Support\Facades\DB;
use Mews\Purifier\Facades\Purifier;

class CarService
{
    function findById($id)
    {
        $car = Car::find($id);

        if (!$car) {
            abort(404);
        }

        return $car;
    }

    function getAll()
    {
        return Car::all();
    }

    function create(CreateCarRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $car = Car::create([
                'name' => $request->input('name'),
                'first_year' => $request->input('first_year'),
                'last_year' => $request->input('last_year'),
                'specifications' => Purifier::clean($request->input('specifications'))
            ]);

            $car->addMediaFromRequest('photo')->toMediaCollection('photos');

            return $car;
        });
    }

    function update(Car $car, EditCarRequest $request)
    {
        $car->name = $request->input('name');
        $car->first_year = $request->input('first_year');
        $car->last_year = $request->input('last_year');
        $car->specifications = Purifier::clean($request->input('specifications'));

        if ($request->hasFile('photo')) {
            $car->clearMediaCollection('photos');
            $car->addMediaFromRequest('photo')->toMediaCollection('photos');
        }

        $car->save();
    }
}