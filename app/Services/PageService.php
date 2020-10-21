<?php


namespace App\Services;

use App\Http\Requests\CreatePageRequest;
use App\Http\Requests\EditPageRequest;
use App\Page;
use Mews\Purifier\Facades\Purifier;

class PageService
{
    function findById($id)
    {
        $page = Page::find($id);

        if (!$page) {
            abort(404);
        }

        return $page;
    }

    function findByName(string $name)
    {
        $page = Page::where('name', $name)->first();

        if (!$page) {
            abort(404);
        }

        return $page;
    }

    function getAll()
    {
        return Page::ordered()->get();
    }

    function getAllInHeader()
    {
        return Page::ordered()->where('in_title', true);
    }

    function setNewOrder(array $data)
    {
        Page::setNewOrder($data);
    }

    function create(CreatePageRequest $request)
    {
        return Page::create([
            'name' => strtolower($request->input('name')),
            'title' => $request->input('title'),
            'content' => Purifier::clean($request->input('content'))
        ]);
    }

    function update(Page $page, EditPageRequest $request)
    {
        $page->title = $request->input('title');
        $page->content = Purifier::clean($request->input('content'));
        $page->save();
    }
}
