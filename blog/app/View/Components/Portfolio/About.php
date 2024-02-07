<?php

namespace App\View\Components\Portfolio;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class About extends Component
{
    public $entity;

    /**
     * Create a new component instance.
     */
    public function __construct($entity)
    {
        $this->entity = new \stdClass();
        $this->entity->first_name = $entity->first()->first_name ?? null;
        $this->entity->last_name = $entity->first()->last_name ?? null;
        $this->entity->description = $entity->first()->description ?? null;

    }
    
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.portfolio.about');
    }
}
