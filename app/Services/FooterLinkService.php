<?php


namespace App\Services;


use App\FooterLink;
use App\Http\Requests\CreateFooterLinkRequest;
use App\Http\Requests\EditFooterLinkRequest;

class FooterLinkService
{
    function findById($id)
    {
        $footer_link = FooterLink::find($id);

        if (!$footer_link) {
            abort(404);
        }

        return $footer_link;
    }

    function getAll()
    {
        return FooterLink::ordered()->get();
    }

    function getActive()
    {
        return FooterLink::ordered()->where('active', true)->get();
    }

    function setNewOrder(array $data)
    {
        FooterLink::setNewOrder($data);
    }

    function create(CreateFooterLinkRequest $request)
    {
        return FooterLink::create([
            'name' => $request->input('name'),
            'path' => $request->input('path'),
            'target' => $request->input('target'),
            'active' => $request->input('active', 'off') == 'on'
        ]);
    }

    function update(FooterLink $footer_link, EditFooterLinkRequest $request)
    {
        $footer_link->name = $request->input('name');
        $footer_link->path = $request->input('path');
        $footer_link->target = $request->input('target');
        $footer_link->active = $request->input('active', 'off') == 'on';
        $footer_link->save();
    }
}
