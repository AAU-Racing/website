<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCarRequest;
use App\Http\Requests\EditCarRequest;
use App\Services\CarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    public function __construct(CarService $service) {
        $this->service = $service;
    }

    public function home() {
        $cars = $this->service->getAll();

        return view('admin.website.cars.home', ['cars' => $cars]);
    }

    public function editForm($id) {
        $this->authorize('edit cars');
        $car = $this->service->findById($id);

        return view('admin.website.cars.edit', ['id' => $car->id]);
    }

    public function edit($id, EditCarRequest $request) {
        $this->authorize('edit cars');
        $car = $this->service->findById($id);
        $this->service->update($car, $request);

        return redirect()->route('admin::car::editForm', ['id' => $car->id]);
    }

    public function delete($id) {
        $this->authorize('delete cars');
        $page = $this->service->findById($id);

        if ($page->special) {
            abort(400);
        }

        $page->delete();

        return redirect()->route('admin::car::home');
    }

    public function addForm() {
        $this->authorize('create cars');
        return view('admin.website.cars.add');
    }

    public function add(CreateCarRequest $request) {
        $this->authorize('create cars');
        $this->service->createNewPage($request);

        return redirect()->route('admin::car::editForm');
    }
}
