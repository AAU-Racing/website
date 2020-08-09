<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSponsorRequest;
use App\Http\Requests\EditSponsorRequest;
use App\Services\SponsorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SponsorController extends Controller
{
    private $service;

    public function __construct(SponsorService $service)
    {
        $this->service = $service;
    }

    public function home()
    {
        if (Auth::user()->can('view disabled sponsors')) {
            $sponsors = $this->service->getAll();
        }
        else {
            $sponsors = $this->service->getActive();
        }

        return view('admin.website.sponsors.home', ['sponsors' => $sponsors]);
    }

    public function editOrder(Request $request)
    {
        $this->authorize('edit sponsors');
        $data = json_decode($request->input('sponsor_order'), true);
        Log::info("Reorder sponsors", ['order' => $data]);

        $rules = [
            '*' => 'exists:sponsors,id'
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->passes()) {
            Log::info("Setting new order");
            $this->service->setNewOrder($data);
        }

        return redirect()->route('admin::sponsor::home');
    }

    public function editForm($id)
    {
        $this->authorize('edit sponsors');
        $sponsor = $this->service->findById($id);

        return view('admin.website.sponsors.edit', ['sponsor' => $sponsor]);
    }

    public function edit($id, EditSponsorRequest $request)
    {
        $this->authorize('edit sponsors');
        $footer_link = $this->service->findById($id);
        $this->service->update($footer_link, $request);

        return redirect()->route('admin::sponsor::home');
    }

    public function delete($id)
    {
        $this->authorize('delete sponsors');
        $footer_link = $this->service->findById($id);

        $footer_link->delete();

        return redirect()->route('admin::sponsor::home');
    }

    public function addForm()
    {
        $this->authorize('create sponsors');
        return view('admin.website.sponsors.add');
    }

    public function add(CreateSponsorRequest $request)
    {
        Log::info($request);
        $this->authorize('create sponsors');
        $this->service->create($request);

        return redirect()->route('admin::sponsor::home');
    }
}
