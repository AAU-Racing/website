<?php


namespace App\Services;

use App\Http\Requests\EditAvatarRequest;
use App\User;

class AvatarService
{
    function findById($id)
    {
        $user = User::find($id);

        if (!$user) {
            abort(404);
        }

        return $user;
    }

    function getAll()
    {
        return User::all();
    }

    function update(User $user, EditAvatarRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $user->clearMediaCollection('avatar');
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }

        $user->save();
    }
}
