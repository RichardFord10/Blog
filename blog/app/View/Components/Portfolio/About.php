<?php

namespace App\View\Components\Portfolio;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class About extends Component
{
    public $portfolio;
    /**
     * Create a new component instance.
     */
    public function __construct($portfolio)
    {
        $this->portfolio = $portfolio;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.Portfolio.about');
    }
}
