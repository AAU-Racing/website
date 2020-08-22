<?php


namespace App\Services;

use App\Http\Requests\CreateSponsorRequest;
use App\Http\Requests\EditSponsorRequest;
use App\Http\Requests\OrderSponsorsRequest;
use App\Sponsor;
use Illuminate\Support\Facades\DB;

class SponsorService
{
    function findById($id)
    {
        $sponsor = Sponsor::find($id);

        if (!$sponsor) {
            abort(404);
        }

        return $sponsor;
    }

    function getAll()
    {
        return Sponsor::ordered()->get();
    }

    function getActive()
    {
        return Sponsor::ordered()->where('active', true)->get();
    }

    function setNewOrder(OrderSponsorsRequest $request)
    {
        Sponsor::setNewOrder($request->input('sponsor_order'));
    }

    function create(CreateSponsorRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $sponsor = Sponsor::create([
                'name' => $request->input('name'),
                'link' => $request->input('link'),
                'active' => $request->input('active', 'off') == 'on'
            ]);

            $sponsor->addMediaFromRequest('logo')->toMediaCollection('logo');

            return $sponsor;
        });
    }

    function update(Sponsor $sponsor, EditSponsorRequest $request)
    {
        $sponsor->name = $request->input('name');
        $sponsor->link = $request->input('link');
        $sponsor->active = $request->input('active', 'off') == 'on';

        if ($request->hasFile('logo')) {
            $sponsor->clearMediaCollection('logo');
            $sponsor->addMediaFromRequest('logo')->toMediaCollection('logo');
        }

        $sponsor->save();
    }
}
