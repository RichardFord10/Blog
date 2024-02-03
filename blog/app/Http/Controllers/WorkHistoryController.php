<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkHistory;
use Illuminate\Support\Facades\Auth;

class WorkHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        return view('work_history.form');
    }
    
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'company' => 'required',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'image' => 'nullable|image',
        ]);
    
        $validated_data['author_id'] = Auth::id(); 
    
        if ($request->hasFile('image')) {
            $validated_data['image'] = $request->file('image')->store('images/work_history', 'public');
        }
    
        $work_history = WorkHistory::create($validated_data);
    
        return redirect()->route('dashboard.index')->with('success', 'Work history added successfully.');
    }
    
    public function index()
    {
        return view('dashboard.index');
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
        $work_history = WorkHistory::findOrFail($id);
        return view('work_history.form', compact('work_history'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'company' => 'required',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'image' => 'nullable|image',
        ]);
    
        $work_history = WorkHistory::findOrFail($id);
        $update_data = $request->all();
    
        if ($request->hasFile('image')) {
            $update_data['image'] = $request->file('image')->store('images/work_history', 'public');
        }
    
        $work_history->update($update_data);
    
        return redirect()->route('dashboard.index')->with('success', 'Work history updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $work_history = WorkHistory::findOrFail($id);

        $work_history->delete();

        return redirect()->route('dashboard.index')->with('success', 'Work History deleted successfully');
    }
}
