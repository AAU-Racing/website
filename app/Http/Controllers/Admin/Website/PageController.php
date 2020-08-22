<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePageRequest;
use App\Http\Requests\EditPageRequest;
use App\Http\Requests\OrderPagesRequest;
use App\Services\PageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    private $service;

    public function __construct(PageService $service)
    {
        $this->service = $service;
    }

    public function home()
    {
        $this->authorize('view pages');
        $pages = $this->service->getAll();

        return view('admin.website.pages.home', ['pages' => $pages]);
    }

    public function editOrder(OrderPagesRequest $request)
    {
        $this->authorize('edit pages');
        $this->service->setNewOrder($request);

        return redirect()->route('admin::page::home');
    }

    public function editForm($id)
    {
        $this->authorize('edit pages');
        $page = $this->service->findById($id);

        return view('admin.website.pages.edit', ['page' => $page]);
    }

    public function edit($id, EditPageRequest $request)
    {
        $this->authorize('edit pages');
        $page = $this->service->findById($id);
        $this->service->update($page, $request);

        return redirect()->route('admin::page::home');
    }

    public function delete($id)
    {
        $this->authorize('edit pages');
        $page = $this->service->findById($id);

        if ($page->special) {
            abort(400);
        }

        $page->delete();

        return redirect()->route('admin::page::home');
    }

    public function addForm()
    {
        $this->authorize('edit pages');
        return view('admin.website.pages.add');
    }

    public function add(CreatePageRequest $request)
    {
        $this->authorize('edit pages');
        $this->service->create($request);

        return redirect()->route('admin::page::home');
    }
}
