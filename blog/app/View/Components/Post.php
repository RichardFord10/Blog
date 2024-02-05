<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Post extends Component
{
    public $entity;
    public $entityType;
    public $entityName;
    /**
     * Create a new component instance.
     */
    public function __construct($entity, $entityType, $entityName)
    {
        $this->entity = $entity;
        $this->entityType = $entityType;
        $this->entityName = $entityName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post');
    }
}
