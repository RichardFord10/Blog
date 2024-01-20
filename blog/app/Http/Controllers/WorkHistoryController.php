<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkHistory;

class WorkHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        return view('work_history.create');
    }
    
    public function store(Request $request)
    {
        WorkHistory::create($request->all());
        return redirect()->route('portfolio')->with('success', 'Work history added successfully.');
    }
    
    public function index()
    {
        $workHistories = WorkHistory::all();
        return view('portfolio', compact('workHistories'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
