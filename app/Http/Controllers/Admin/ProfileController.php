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
        $user = $this->userService->findById($id);
        $this->authorize('edit profile', $user);

        return view('admin.profile.edit', ['user' => $user]);
    }

    public function edit(EditUserRequest $request, $id) {
        $user = $this->userService->findById($id);
        $this->authorize('edit profile', $user);

        return redirect()->route('admin::home');
    }
}
