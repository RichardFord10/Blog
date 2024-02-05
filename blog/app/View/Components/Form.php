<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public $entity;
    public $entityType;
    /**
     * Create a new component instance.
     */
    public function __construct($entity, $entityType)
    {
        $this->entity = $entity;
        $this->entityType = $entityType;
    }
    
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form');
    }
}
