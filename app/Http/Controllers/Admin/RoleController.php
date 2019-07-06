<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditRolesRequest;
use App\Services\UserService;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    private $service;

    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    public function index()
    {
        $this->authorize('view roles');

        $users = $this->service->getAllUsers();
        return view('admin.role.home', ['users' => $users]);
    }

    public function showEditForm($id)
    {
        $this->authorize('alter roles');

        $user = $this->service->findById($id);

        if (!$user) {
            abort(404);
        }

        $roles = Role::all();
        return view('admin.role.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function edit(EditRolesRequest $request, $id)
    {
        $this->authorize('alter roles');

        $user = $this->service->findById($id);

        if (!$user) {
            abort(404);
        }

        $user->syncRoles($request->input('roles'));

        return redirect()->route('admin::role::home');
    }
}
