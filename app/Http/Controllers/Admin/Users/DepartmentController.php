<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignDepartmentRequest;
use App\Http\Requests\CreateDepartmentRequest;
use App\Http\Requests\EditDepartmentRequest;
use App\Http\Requests\OrderDepartmentsRequest;
use App\Services\DepartmentService;
use App\Services\UserService;

class DepartmentController extends Controller
{
    private $service;
    private $userService;

    public function __construct(DepartmentService $service, UserService $userService)
    {
        $this->service = $service;
        $this->userService = $userService;
    }

    public function home()
    {
        $this->authorize('view departments');
        $departments = $this->service->getAll();

        return view('admin.users.departments.home', ['departments' => $departments]);
    }

    public function editOrder(OrderDepartmentsRequest $request)
    {
        $this->authorize('edit departments');
        $this->service->setNewOrder($request);

        return redirect()->route('admin::department::home');
    }

    public function editForm($id)
    {
        $this->authorize('edit departments');
        $department = $this->service->findById($id);

        return view('admin.users.departments.edit', ['department' => $department]);
    }

    public function edit($id, EditDepartmentRequest $request)
    {
        $this->authorize('edit departments');
        $department = $this->service->findById($id);
        $this->service->update($department, $request);

        return redirect()->route('admin::department::home');
    }

    public function assignForm()
    {
        $this->authorize('assign departments');
        $departments = $this->service->getAll();
        $users = $this->userService->getAllUsers();

        return view('admin.users.departments.assign', ['departments' => $departments, 'users' => $users]);
    }

    public function assign(AssignDepartmentRequest $request)
    {
        $this->authorize('assign departments');
        $this->service->assign($request);

        return redirect()->route('admin::department::home');
    }

    public function delete($id)
    {
        $this->authorize('delete departments');
        $department = $this->service->findById($id);

        $department->delete();

        return redirect()->route('admin::department::home');
    }

    public function addForm()
    {
        $this->authorize('create departments');
        return view('admin.users.departments.add');
    }

    public function add(CreateDepartmentRequest $request)
    {
        $this->authorize('create departments');
        $this->service->create($request);

        return redirect()->route('admin::department::home');
    }
}
