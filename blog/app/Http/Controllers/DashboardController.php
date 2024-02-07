<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PortfolioController;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        // Access the currently authenticated user
        $user = Auth::user();
        $portfolio = new PortfolioController();
        $entity = $portfolio->getEntity();

        // Pass the data to the view
        return view('dashboard.index', compact('entity'));
    }
}
