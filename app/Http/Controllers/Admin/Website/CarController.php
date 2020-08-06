<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCarRequest;
use App\Http\Requests\EditCarRequest;
use App\Services\CarService;

class CarController extends Controller
{
    private $service;

    public function __construct(CarService $service)
    {
        $this->service = $service;
    }

    public function home()
    {
        $cars = $this->service->getAll();

        return view('admin.website.cars.home', ['cars' => $cars]);
    }

    public function editForm($id)
    {
        $this->authorize('edit cars');
        $car = $this->service->findById($id);

        return view('admin.website.cars.edit', ['car' => $car]);
    }

    public function edit($id, EditCarRequest $request)
    {
        $this->authorize('edit cars');
        $car = $this->service->findById($id);
        $this->service->update($car, $request);

        return redirect()->route('admin::car::home');
    }

    public function delete($id)
    {
        $this->authorize('delete cars');
        $car = $this->service->findById($id);

        $car->delete();

        return redirect()->route('admin::car::home');
    }

    public function addForm()
    {
        $this->authorize('create cars');
        return view('admin.website.cars.add');
    }

    public function add(CreateCarRequest $request)
    {
        $this->authorize('create cars');
        $car = $this->service->create($request);

        return redirect()->route('admin::car::home');
    }
}
