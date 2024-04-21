<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skills;
use Illuminate\Support\Facades\Auth;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $entity = 'new';
        $entityType = 'skills';
        $entityName = 'Skill';

        return view('form', compact('entityType', 'entityName', 'entity'));
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'title' => 'required|max:255',
            'link' => 'required',
            'image' => 'nullable|image',
        ]);

        $validated_data['author_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $validated_data['image'] = $request->file('image')->store('images/skills', 'public');
        }

        $skills = skills::create($validated_data);

        return redirect()->route('dashboard.index')->with('success', 'Skill added successfully.');
    }

    public function index()
    {
        $skills = skills::orderBy('created_at', 'desc')->get();
        return view('dashboard.index', compact('skills'));
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
        $entityType = 'skills';
        $entityName = 'Skill';
        $entity = skills::findOrFail($id);
        return view('form', compact('entity', 'entityType', 'entityName'));
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
            $validated_data['image'] = $request->file('image')->store('images/skills', 'public');
        }

        $skills = skills::findOrFail($id);
        $skills->update($validated_data);

        return redirect()->route('dashboard.index')->with('success', 'Skill updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skills = skills::findOrFail($id);

        $skills->delete();

        return redirect()->route('dashboard.index')->with('success', 'Skill deleted successfully');
    }
}
