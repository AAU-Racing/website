<?php


namespace App\Services;


use App\Http\Requests\CreatePressPostRequest;
use App\Http\Requests\EditPressPostRequest;
use App\PressPost;
use Mews\Purifier\Facades\Purifier;

class PressPostService
{
    function findById($id)
    {
        $press_post = PressPost::find($id);

        if (!$press_post) {
            abort(404);
        }

        return $press_post;
    }

    function getAll()
    {
        return PressPost::ordered()->get();
    }

    function getActive()
    {
        return PressPost::ordered()->where('active', true)->get();
    }

    function setNewOrder(array $data)
    {
        PressPost::setNewOrder($data);
    }

    function create(CreatePressPostRequest $request)
    {
        return PressPost::create([
            'title' => $request->input('title'),
            'content' => Purifier::clean($request->input('content')),
            'active' => $request->input('active', 'off') == 'on'
        ]);
    }

    function update(PressPost $press_post, EditPressPostRequest $request)
    {
        $press_post->title = $request->input('title');
        $press_post->content = Purifier::clean($request->input('content'));
        $press_post->active = $request->input('active', 'off') == 'on';
        $press_post->save();
    }
}
