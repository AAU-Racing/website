<?php

namespace App\View\Components;

use App\Services\SponsorService;
use Illuminate\View\Component;

class Sponsors extends Component
{
    public $sponsors;

    /**
     * Create a new component instance.
     *
     * @param SponsorService $service
     */
    public function __construct(SponsorService $service)
    {
        $this->sponsors = $service->getActive();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sponsors');
    }
}
