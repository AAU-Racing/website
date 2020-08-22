<?php


namespace App\Services;


use App\Department;
use App\Http\Requests\AssignDepartmentRequest;
use App\Http\Requests\CreateDepartmentRequest;
use App\Http\Requests\EditDepartmentRequest;
use App\Http\Requests\OrderDepartmentsRequest;
use Mews\Purifier\Facades\Purifier;

class DepartmentService
{
    function findById($id)
    {
        $department = Department::find($id);

        if (!$department) {
            abort(404);
        }

        return $department;
    }

    function getAll()
    {
        return Department::ordered()->get();
    }

    function setNewOrder(OrderDepartmentsRequest $request)
    {
        Department::setNewOrder($request->get('department_order'));
    }

    function create(CreateDepartmentRequest $request)
    {
        return Department::create([
            'name' => $request->input('name'),
            'description' => Purifier::clean($request->input('description')),
        ]);
    }

    function update(Department $department, EditDepartmentRequest $request)
    {
        $department->name = $request->input('name');
        $department->description = Purifier::clean($request->input('description'));
        $department->save();
    }

    function assign(Department $department, AssignDepartmentRequest $request)
    {

    }
}
