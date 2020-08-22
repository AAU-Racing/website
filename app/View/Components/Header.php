<?php

namespace App\View\Components;

use App\Services\PageService;
use Illuminate\View\Component;

class Header extends Component
{
    public $pages;

    /**
     * Create a new component instance.
     *
     * @param PageService $service
     */
    public function __construct(PageService $service)
    {
        $this->pages = $service->getAll();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.header');
    }
}
