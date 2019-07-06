<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showEditForm()
    {
        return view('auth.passwords.change_password');
    }

    public function edit(ChangePasswordRequest $request)
    {
        $user = Auth::user();
        $user->password = Hash::make($request->input('new-password'));
        $user->save();
        return redirect()->back()->with("success", "Password changed successfully !");
    }
}
