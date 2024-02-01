<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\WorkHistory;
use App\Models\Socials;
use App\Models\Projects;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'about' => 'required|max:5000',
            'active' => 'sometimes',
        ]);
    
        $validated_data['active'] = $request->has('active');
    
        $validated_data['author_id'] = Auth::id();
    
        $about = Portfolio::create($validated_data);
    
        return redirect()->route('portfolio')->with('success', 'About info added successfully.');
    }

    public function index()
    {
        $work_history = WorkHistory::all();
        $projects = Projects::all();
        $socials = Socials::all();
        $about = Portfolio::where('active', true)->orderBy('updated_at', 'desc')->value('about');
                
        return view('portfolio.index', compact('work_history', 'projects', 'socials', 'about'));
    }

    public function create()
    {
        return view('portfolio.create');
    }


    public function edit(string $id)
    {
        $about = Portfolio::findOrFail($id);
        return view('portfolio.edit', compact('about'));
        
    }


    public function update(Request $request, string $id)
    {
        $validated_data = $request->validate([
            'about' => 'required|max:5000',
            'active' => 'sometimes',
        ]);
        
        $validated_data['active'] = $request->has('active');
    
        $about = Portfolio::findOrFail($id);
        $about->update($validated_data);
    
        return redirect()->route('dashboard')->with('success', 'About updated successfully.');
    }
    


    public function destroy(string $id)
    {
        $about = Portfolio::findOrFail($id);

        $about->delete();

        return redirect()->route('dashboard')->with('success', 'Social deleted successfully');
    }
    
}   