<?php

namespace App\View\Components\Portfolio;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    public $projects;
    public $workHistories;
    public $socials;
    public $portfolio;

    /**
     * Create a new component instance.
     */
    public function __construct($projects, $workHistories, $socials, $portfolio)
    {
        $this->projects = $projects;
        $this->workHistories= $workHistories;
        $this->socials = $socials;
        $this->portfolio = $portfolio;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.Portfolio.layout');
    }
}
