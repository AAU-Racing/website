<?php


namespace App\Services;


use App\Car;
use App\Http\Requests\CreateCarRequest;

class CarService
{
    function findById($id) {
        $car = Car::find($id);

        if (!$car) {
            abort(404);
        }

        return $car;
    }

    function getAll() {
        return Car::all();
    }

    function create(CreateCarRequest $request) {
        return Car::create([
            'name' => $request->input('name'),
            'first_year' => $request->input('first_year'),
            'last_year' => $request->input('last_year')
        ]);
    }

    function update($car, $request) {
        $car->name = $request->input('name');
        $car->first_year = $request->input('first_year');
        $car->last_year = $request->input('last_year');
        $car->save();
    }
}