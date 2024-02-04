<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Http\Controllers\PortfolioController;
use App\Models\Portfolio;

class About extends Component
{
    public $portfolio;

    public function __construct($portfolio)
    {
        $this->portfolio = $portfolio;
    }

    public function render()
    {
        return view('components.dashboard.about');
    }
}
