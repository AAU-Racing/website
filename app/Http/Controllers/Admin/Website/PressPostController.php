<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePressPostRequest;
use App\Http\Requests\EditPressPostRequest;
use App\Http\Requests\OrderPressPostsRequest;
use App\Services\PressPostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PressPostController extends Controller
{
    private $service;

    public function __construct(PressPostService $service)
    {
        $this->service = $service;
    }

    public function home()
    {
        if (Auth::user()->can('view disabled press posts')) {
            $press_posts = $this->service->getAll();
        }
        else if (Auth::user()->can('view press posts')) {
            $press_posts = $this->service->getActive();
        }
        else {
            abort(403);
        }

        return view('admin.website.press.home', ['press_posts' => $press_posts]);
    }

    public function editOrder(OrderPressPostsRequest $request)
    {
        $this->authorize('edit press posts');
        $this->service->setNewOrder($request);

        return redirect()->route('admin::press::home');
    }

    public function editForm($id)
    {
        $this->authorize('edit press posts');
        $press_post = $this->service->findById($id);

        return view('admin.website.press.edit', ['press_post' => $press_post]);
    }

    public function edit($id, EditPressPostRequest $request)
    {
        $this->authorize('edit press posts');
        $press_post = $this->service->findById($id);
        $this->service->update($press_post, $request);

        return redirect()->route('admin::press::home');
    }

    public function delete($id)
    {
        $this->authorize('delete press posts');
        $press_post = $this->service->findById($id);

        $press_post->delete();

        return redirect()->route('admin::press::home');
    }

    public function addForm()
    {
        $this->authorize('create press posts');
        return view('admin.website.press.add');
    }

    public function add(CreatePressPostRequest $request)
    {
        $this->authorize('create press posts');
        $this->service->create($request);

        return redirect()->route('admin::press::home');
    }
}
