<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function showEditForm($id) {
        // abort(403);

        $user = $this->userService->findById($id);
        return view('admin.profile.edit', ['user' => $user]);
    }

    public function edit(EditUserRequest $request, $id) {
        $user = $this->userService->findById($id);
        // $user->syncRoles($request->input('roles'));

        return redirect()->route('admin::home');
    }
}
