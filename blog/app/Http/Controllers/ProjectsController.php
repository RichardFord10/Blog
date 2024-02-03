<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 


class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        return view('projects.form');
    }
    
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'link' => 'required',
            'image' => 'nullable|image',
        ]);

        $validated_data['author_id'] = Auth::id(); 

        if ($request->hasFile('image')) {
            $validated_data['image'] = $request->file('image')->store('images/projects', 'public');
        }

        $project = Projects::create($validated_data);

        return redirect()->route('portfolio')->with('success', 'Project added successfully.');
    }
    
    public function index()
    {
        $projects = Projects::orderBy('created_at', 'desc')->get();
        return view('portfolio', compact('projects'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Projects::findOrFail($id);
        return view('projects.form', compact('project'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated_data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'link' => 'required',
            'image' => 'nullable|image',
        ]);
    
        if ($request->hasFile('image')) {
            $validated_data['image'] = $request->file('image')->store('images/projects', 'public');
        }
    
        $project = Projects::findOrFail($id);
        $project->update($validated_data);
    
        return redirect()->route('dashboard.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Projects::findOrFail($id);

        $project->delete();

        return redirect()->route('dashboard.index')->with('success', 'Project deleted successfully');
    }
}
