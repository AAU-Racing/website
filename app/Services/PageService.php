<?php


namespace App\Services;

use App\Http\Requests\CreatePageRequest;
use App\Page;
use Mews\Purifier\Facades\Purifier;

class PageService {
    function findById($id) {
        $page = Page::find($id);

        if (!$page) {
            abort(404);
        }

        return $page;
    }

    function findByName(string $name) {
        $page = Page::where('name', $name)->first();

        if (!$page) {
            abort(404);
        }

        return $page;
    }

    function getAllPages() {
        return Page::ordered()->get();
    }

    function setNewOrder(array $data) {
        Page::setNewOrder($data);
    }

    function createNewPage(CreatePageRequest $request) {
        return Page::create([
            'name' => strtolower($request->input('name')),
            'title' => $request->input('title'),
            'content' => Purifier::clean($request->input('content'))
        ]);
    }

    function updatePage($page, $request) {
        $page->title = $request->input('title');
        $page->content = Purifier::clean($request->input('content'));
        $page->save();
    }
}