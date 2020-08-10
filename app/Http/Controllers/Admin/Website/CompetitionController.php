<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCompetitionRequest;
use App\Http\Requests\EditCompetitionRequest;
use App\Services\CompetitionService;

class CompetitionController extends Controller
{
    private $service;

    public function __construct(CompetitionService $service)
    {
        $this->service = $service;
    }

    public function home()
    {
        $this->authorize('view competitions');
        $competitions = $this->service->getAll();

        return view('admin.website.competitions.home', ['competitions' => $competitions]);
    }

    public function editForm($id)
    {
        $this->authorize('edit competitions');
        $competition = $this->service->findById($id);

        return view('admin.website.competitions.edit', ['competition' => $competition]);
    }

    public function edit($id, EditCompetitionRequest $request)
    {
        $this->authorize('edit competitions');
        $competition = $this->service->findById($id);
        $this->service->update($competition, $request);

        return redirect()->route('admin::competition::home');
    }

    public function delete($id)
    {
        $this->authorize('delete competitions');
        $competition = $this->service->findById($id);

        $competition->delete();

        return redirect()->route('admin::competition::home');
    }

    public function addForm()
    {
        $this->authorize('create competitions');
        return view('admin.website.competitions.add');
    }

    public function add(CreateCompetitionRequest $request)
    {
        $this->authorize('create competitions');
        $this->service->create($request);

        return redirect()->route('admin::competition::home');
    }
}
