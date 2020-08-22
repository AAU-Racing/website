<?php

namespace App\View\Components;

use App\Services\FooterLinkService;
use Illuminate\View\Component;

class Footer extends Component
{
    public $footer_links;

    /**
     * Create a new component instance.
     *
     * @param FooterLinkService $service
     */
    public function __construct(FooterLinkService $service)
    {
        $this->footer_links = $service->getActive();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.footer');
    }
}
