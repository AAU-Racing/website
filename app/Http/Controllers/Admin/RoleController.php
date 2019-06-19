<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AlterRoleRequest;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $this->authorize('view roles');

        $users = $this->userService->getAllUsers();
        return view('admin.role.home', ['users' => $users]);
    }

    public function showAlterForm($id) {
        $this->authorize('alter roles');

        $user = $this->userService->findById($id);
        $roles = Role::all();
        return view('admin.role.alter', ['user' => $user, 'roles' => $roles]);
    }

    public function alter(AlterRoleRequest $request, $id) {
        $this->authorize('alter roles');

        $user = $this->userService->findById($id);
        $user->syncRoles($request->input('roles'));

        return redirect()->route('admin::role::home');
    }
}
