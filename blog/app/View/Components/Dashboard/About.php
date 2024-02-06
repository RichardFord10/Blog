<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Http\Controllers\PortfolioController;
use App\Models\Portfolio;

class About extends Component
{
    public $entity;

    /**
     * Create a new component instance.
     */
    public function __construct($entity)
    {
        $this->entity = $entity;
    }
    

    public function render()
    {
        return view('components.dashboard.about');
    }
}
