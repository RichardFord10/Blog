<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Access the currently authenticated user
        $user = Auth::user();

        // Retrieve data related to the user
        $posts = $user->posts;
        $projects = $user->projects;
        $work_histories = $user->work_histories;
        $socials = $user->socials;
        $portfolio = $user->portfolio;

        // Pass the data to the view
        return view('dashboard.index', compact('posts', 'projects', 'work_histories', 'socials', 'portfolio'));
    }
}
