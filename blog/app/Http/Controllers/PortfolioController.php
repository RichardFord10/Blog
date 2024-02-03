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
            'image' => 'nullable|image',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
        ]);
    
        $validated_data['active'] = $request->has('active');
    
        $validated_data['author_id'] = Auth::id();
    
        $about = Portfolio::create($validated_data);
    
        return redirect()->route('dashboard.index')->with('success', 'About info added successfully.');
    }

    public function index()
    {
        $work_history = WorkHistory::all();
        $projects = Projects::all();
        $socials = Socials::all();
        $portfolio = Portfolio::where('active', true)->orderBy('updated_at', 'desc')->first();
        
        return view('portfolio.index', compact('work_history', 'projects', 'socials', 'portfolio'));
    }

    public function create()
    {
        return view('portfolio.create');
    }


    public function edit(string $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('portfolio.edit', compact('portfolio'));
        
    }


    public function update(Request $request, string $id)
    {
        $validated_data = $request->validate([
            'about' => 'required|max:5000',
            'active' => 'sometimes',
            'image' => 'nullable|image',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
        ]);
        
        if ($request->hasFile('image')) {
            $validated_data['image'] = $request->file('image')->store('images/portfolio', 'public');
        }
        
        $validated_data['active'] = $request->has('active');
    
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->update($validated_data);
    
        return redirect()->route('dashboard.index')->with('success', 'About updated successfully.');
    }
    
    


    public function destroy(string $id)
    {
        $about = Portfolio::findOrFail($id);

        $about->delete();

        return redirect()->route('dashboard.index')->with('success', 'Social deleted successfully');
    }
    
}   