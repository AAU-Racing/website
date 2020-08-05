<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFooterLinkRequest;
use App\Http\Requests\EditFooterLinkRequest;
use App\Services\FooterLinkService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CompetitionController extends Controller
{
    private $service;

    public function __construct(FooterLinkService $service)
    {
        $this->service = $service;
    }

    public function home()
    {
        $this->authorize('view disabled footer links');
        $footer_links = $this->service->getAll();

        return view('admin.website.footer_links.home', ['footer_links' => $footer_links]);
    }

    public function editOrder(Request $request)
    {
        $this->authorize('edit footer links');
        $data = json_decode($request->input('footer_link_order'), true);
        Log::info("Reorder footer links", ['order' => $data]);

        $rules = [
            '*' => 'exists:footer_links,id'
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->passes()) {
            Log::info("Setting new order");
            $this->service->setNewOrder($data);
        }

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
