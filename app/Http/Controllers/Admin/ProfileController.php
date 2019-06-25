<?php

namespace App\Http\Controllers\Admin;

use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index() {
        $this->authorize('view all profiles');

        $users = $this->userService->all();
        return view('admin.profile.home', ['users' => $users]);
    }

    public function showEditForm(Request $request, $id) {
        $request->session()->put('before-form', URL::previous());

        // We can fetch a user that is not the currently logged in user (e.g. an admin editing a profile)
        $user = $this->userService->findById($id);
        $this->authorize('edit profile', $user);

        // Fetch contact persons as a map
        $contactPersons = $user->contactPersons()->select('id', 'name', 'phone_number')->get()->toArray();

        // Fetch the id of the current primary contact.
        $primary = $user->contactPersons()->where('primary', true)->first()->id;

        return view('admin.profile.edit', ['user' => $user, 'contactPersons' => $contactPersons, 'primary' => $primary]);
    }

    public function edit(EditUserRequest $request, $id) {
        $user = $this->userService->findById($id);
        $this->authorize('edit profile', $user);

        $request->merge(array('date_of_birth' => date('Y-m-d', strtotime($request->input('date_of_birth')))));
        $this->userService->update($user, $request);

        $previous = $request->session()->get('before-form');
        $request->session()->forget('before-form');

        if ($previous) {
            return redirect($previous);
        }
        else {
            return redirect()->route('admin::home');
        }
    }
}
