<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFooterLinkRequest;
use App\Http\Requests\EditFooterLinkRequest;
use App\Http\Requests\OrderFooterLinksRequest;
use App\Services\FooterLinkService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FooterLinkController  extends Controller
{
    private $service;

    public function __construct(FooterLinkService $service)
    {
        $this->service = $service;
    }

    public function home()
    {
        if (Auth::user()->can('view disabled footer links')) {
            $footer_links = $this->service->getAll();
        }
        else if (Auth::user()->can('view footer links')) {
            $footer_links = $this->service->getActive();
        }
        else {
            abort(403);
        }

        return view('admin.website.footer_links.home', ['footer_links' => $footer_links]);
    }

    public function editOrder(OrderFooterLinksRequest $request)
    {
        $this->authorize('edit footer links');
        $this->service->setNewOrder($request);

        return redirect()->route('admin::footer_link::home');
    }

    public function editForm($id)
    {
        $this->authorize('edit footer links');
        $footer_link = $this->service->findById($id);

        return view('admin.website.footer_links.edit', ['footer_link' => $footer_link]);
    }

    public function edit($id, EditFooterLinkRequest $request)
    {
        $this->authorize('edit footer links');
        $footer_link = $this->service->findById($id);
        $this->service->update($footer_link, $request);

        return redirect()->route('admin::footer_link::home');
    }

    public function delete($id)
    {
        $this->authorize('delete footer links');
        $footer_link = $this->service->findById($id);

        $footer_link->delete();

        return redirect()->route('admin::footer_link::home');
    }

    public function addForm()
    {
        $this->authorize('create footer links');
        return view('admin.website.footer_links.add');
    }

    public function add(CreateFooterLinkRequest $request)
    {
        $this->authorize('create footer links');
        $this->service->create($request);

        return redirect()->route('admin::footer_link::home');
    }
}
