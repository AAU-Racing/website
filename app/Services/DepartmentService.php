<?php


namespace App\Services;


use App\Department;
use App\Http\Requests\CreateDepartmentRequest;
use App\Http\Requests\CreateFooterLinkRequest;
use App\Http\Requests\EditDepartmentRequest;
use App\Http\Requests\EditFooterLinkRequest;

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
        return Department::all();
    }

    function setNewOrder(array $data)
    {
        Department::setNewOrder($data);
    }

    function create(CreateDepartmentRequest $request)
    {
        return Department::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
    }

    function update(Department $department, EditDepartmentRequest $request)
    {
        $department->name = $request->input('name');
        $department->description = $request->input('description');
        $department->save();
    }
}
