<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePageRequest;
use App\Http\Requests\EditPageRequest;
use App\Page;
use App\Services\PageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function __construct(PageService $service) {
        $this->service = $service;
    }

    public function home() {
        $this->authorize('view pages');
        $pages = $this->service->getAllPages();

        return view('admin.website.pages', ['pages' => $pages]);
    }

    public function editOrder(Request $request) {
        $this->authorize('edit pages');
        $data = json_decode($request->input('page_order'), true);
        $rules = [
            '*' => 'exists:pages,id'
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->passes()) {
            $this->service->setNewOrder($data);

            return redirect()->route('admin::page::home');
        } else {
            return redirect()->route('admin::page::home');
        }
    }

    public function editForm($id) {
        $this->authorize('edit pages');
        $page = $this->service->findById($id);

        return view('admin.website.edit_page', ['page' => $page]);
    }

    public function edit($id, EditPageRequest $request) {
        $this->authorize('edit pages');
        $page = $this->service->findById($id);
        $this->service->updatePage($page, $request);

        return redirect()->route('admin::page::editForm', ['page' => $page]);
    }

    public function delete($id) {
        $this->authorize('edit pages');
        $page = $this->service->findById($id);

        if ($page->special) {
            abort(400);
        }

        $page->delete();

        return redirect()->route('admin::page::home');
    }

    public function addForm() {
        $this->authorize('edit pages');
        return view('admin.website.new_page');
    }

    public function add(CreatePageRequest $request) {
        $this->authorize('edit pages');
        $this->service->createNewPage($request);

        return redirect()->route('admin::page::editForm');
    }
}
