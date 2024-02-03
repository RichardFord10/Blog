<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Socials;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        return view('socials.create');
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
            $validated_data['image'] = $request->file('image')->store('images/socials', 'public');
        }

        $socials = Socials::create($validated_data);

        return redirect()->route('portfolio')->with('success', 'Project added successfully.');
    }
    
    public function index()
    {
        $socials = Socials::orderBy('created_at', 'desc')->get();
        return view('portfolio', compact('socials'));
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
        $socials = Socials::findOrFail($id);
        return view('socials.edit', compact('socials'));
        
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
            $validated_data['image'] = $request->file('image')->store('images/socials', 'public');
        }
    
        $socials = Socials::findOrFail($id);
        $socials->update($validated_data);
    
        return redirect()->route('dashboard.index')->with('success', 'Social updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $socials = Socials::findOrFail($id);

        $socials->delete();

        return redirect()->route('dashboard.index')->with('success', 'Social deleted successfully');
    }
}
