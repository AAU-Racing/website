<?php


namespace App\Services;


use App\Competition;
use App\FooterLink;
use App\Http\Requests\CreateCompetitionRequest;
use App\Http\Requests\CreateFooterLinkRequest;
use App\Http\Requests\EditCompetitionRequest;
use App\Http\Requests\EditFooterLinkRequest;

class CompetitionService
{
    function findById($id)
    {
        $competition = Competition::find($id);

        if (!$competition) {
            abort(404);
        }

        return $competition;
    }

    function getAll()
    {
        return Competition::orderBy('year', 'desc')->orderBy('name', 'asc')->get();
    }

    function create(CreateCompetitionRequest $request)
    {
        return Competition::create([
            'name' => $request->input('name'),
            'year' => $request->input('year'),
            'country' => $request->input('country'),
            'link' => $request->input('link')
        ]);
    }

    function update(Competition $competition, EditCompetitionRequest $request)
    {
        $competition->name = $request->input('name');
        $competition->year = $request->input('year');
        $competition->country = $request->input('country');
        $competition->link = $request->input('link');
        $competition->save();
    }
}
