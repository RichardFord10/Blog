<?php

namespace App\View\Components\Portfolio;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WorkHistories extends Component
{
    public $workHistories;
    /**
     * Create a new component instance.
     */
    public function __construct($workHistories)
    {
        $this->workHistories = $workHistories;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.portfolio.work-histories');
    }
}
