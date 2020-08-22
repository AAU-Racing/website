<?php

namespace App\View\Components;

use App\Services\CarouselSlideService;
use Illuminate\View\Component;

class Carousel extends Component
{
    public $slides;

    /**
     * Create a new component instance.
     *
     * @param CarouselSlideService $service
     */
    public function __construct(CarouselSlideService $service)
    {
        $this->slides = $service->getAll();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.carousel');
    }
}
