<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePressPostRequest;
use App\Http\Requests\EditPressPostRequest;
use App\Services\PressPostService;
use Illuminate\Http\Request;
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
        if ($this->authorize('view disabled press posts')) {
            $press_posts = $this->service->getActive();
        }
        else {
            $press_posts = $this->service->getAll();
        }

        return view('admin.website.press.home', ['press_posts' => $press_posts]);
    }

    public function editOrder(Request $request)
    {
        $this->authorize('edit press posts');
        $data = json_decode($request->input('press_post_order'), true);
        Log::info("Reorder press posts", ['order' => $data]);

        $rules = [
            '*' => 'exists:press_posts,id'
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->passes()) {
            Log::info("Setting new order");
            $this->service->setNewOrder($data);
        }

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

        return redirect()->route('admin::press::editForm', ['id' => $press_post->id]);
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
