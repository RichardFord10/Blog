<?php

namespace App\View\Components\Portfolio;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public $entity;
    /**
     * Create a new component instance.
     */
    public function __construct($entity)
    {
        $this->entity = $entity;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.portfolio.footer');
    }
}
