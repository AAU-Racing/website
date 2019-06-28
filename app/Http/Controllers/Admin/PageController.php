<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    function home() {
        $this->authorize('view pages');
        $pages = Page::ordered()->get();

        return view('admin.website.pages', ['pages' => $pages]);
    }

    function editOrder(Request $request) {
        $this->authorize('edit pages');
        $data = json_decode($request->input('page_order'), true);
        $rules = [
            '*' => 'exists:pages,id'
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->passes()) {
            Page::setNewOrder($data);

            return redirect()->route('admin::page::home');
        } else {
            return redirect()->route('admin::page::home');
        }
    }

    function editForm($id) {
        $this->authorize('edit pages');
        $page = Page::find($id);

        if (!$page) {
            abort(404);
        }

        return view('admin.website.edit_page', ['page' => $page]);
    }

    function edit($id) {
        $this->authorize('edit pages');
        return redirect()->route('admin::page::home');
    }
}
