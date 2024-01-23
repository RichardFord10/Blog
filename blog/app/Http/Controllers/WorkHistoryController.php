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
        return view('work_history.create');
    }
    
    public function store(Request $request)
    {
        WorkHistory::create($request->all());

        if (Auth::id() != config('permissions.super_user_id')) {
            return redirect()->route('dashboard')->withErrors('You are not authorized to create posts.');
        }

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
