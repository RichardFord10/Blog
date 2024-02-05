<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Wysiwyg extends Component
{
    public $field;
    public $label;
    public $value;

    /**
     * Create a new component instance.
     *
     * @param string $entityType
     * @param mixed $entity
     */
    public function __construct(string $entityType, $entity)
    {
        // Determine the field based on the entity type
        $this->field = $entityType === 'posts' ? 'content' : 'description';
        
        // Set the label based on the field
        $this->label = $this->field === 'content' ? 'Content:' : 'Description:';
        
        // Retrieve the value from the entity
        $this->value = $entity->{$this->field} ?? '';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.wysiwyg');
    }
}
