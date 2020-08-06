<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditAvatarRequest;
use App\Services\AvatarService;

class AvatarController extends Controller
{
    private $service;

    public function __construct(AvatarService $service)
    {
        $this->service = $service;
    }

    public function home()
    {
        $avatars = $this->service->getAll();

        return view('admin.website.avatars.home', ['avatars' => $avatars]);
    }

    public function editForm($id)
    {
        $this->authorize('edit avatars');
        $avatar = $this->service->findById($id);

        return view('admin.website.avatars.edit', ['avatar' => $avatar]);
    }

    public function edit($id, EditAvatarRequest $request)
    {
        $this->authorize('edit avatars');
        $avatar = $this->service->findById($id);
        $this->service->update($avatar, $request);

        return redirect()->route('admin::avatar::home');
    }

    public function delete($id)
    {
        $this->authorize('delete avatars');
        $avatar = $this->service->findById($id);

        $avatar->clearMediaCollection('avatar');

        return redirect()->route('admin::avatar::home');
    }
}
