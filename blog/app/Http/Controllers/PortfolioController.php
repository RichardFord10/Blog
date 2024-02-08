<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\WorkHistory;
use App\Models\Socials;
use App\Models\Projects;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class PortfolioController extends Controller
{
    public $projects;
    public $workHistories;
    public $socials;
    public $portfolio;
    public $entity;

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'description' => 'required|max:5000',
            'active' => 'sometimes',
            'image' => 'nullable|image',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
        ]);
    
        $validated_data['active'] = $request->has('active');
    
        $validated_data['author_id'] = Auth::id();
    
        $portfolio = Portfolio::create($validated_data);
    
        return redirect()->route('dashboard.index')->with('success', 'Portfolio info added successfully.');
    }

    public function index()
    {

        $entity = $this->getEntity();
        
        return view('portfolio.index', compact('entity'));
    }

    public function create()
    {
        return view('portfolio.create');
    }


    public function edit(string $id)
    {
        $entity = Portfolio::findOrFail($id);
        $entityType = 'portfolio';
        $entityName = 'Portfolio';

        return view('portfolio.edit', compact('entity', 'entityType', 'entityName'));
        
    }


    public function update(Request $request, string $id)
    {

        $validated_data = $request->validate([
            'description' => 'required|max:5000',
            'active' => 'sometimes',
            'image' => 'nullable|image',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
        ]);
        
        if ($request->hasFile('image')) {
            $validated_data['image'] = $request->file('image')->store('images/portfolio', 'public');
        }
        
        $validated_data['active'] = $request->input('active') == '1';
    
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->update($validated_data);
    
        return redirect()->route('dashboard.index')->with('success', 'Portfolio updated successfully.');
    }
    
    


    public function destroy(string $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $portfolio->delete();

        return redirect()->route('dashboard.index')->with('success', 'Social deleted successfully');
    }

    public function getEntity()
    {
        //TODO Get only Active
        $workHistories = WorkHistory::all();
        $projects = Projects::all();
        $socials = Socials::all();
        $portfolio = Portfolio::all();
        $posts = Post::all();

        $this->entity = new \stdClass();
        $this->projects = $projects;
        $this->workHistories= $workHistories;
        $this->socials = $socials;
        $this->portfolio = $portfolio;
        $this->entity->projects = (object) ['data' => $projects, 'type' => 'projects', 'name' => 'projects'];
        $this->entity->workHistories = (object) ['data' => $workHistories, 'type' => 'workHistories', 'name' => 'Work History'];
        $this->entity->socials = (object) ['data' => $socials, 'type' => 'socials', 'name' => 'Socials'];
        $this->entity->portfolio = (object) ['data' => $portfolio, 'type' => 'portfolio', 'name' => 'Portfolio'];
        $this->entity->posts = (object) ['data' => $posts, 'type' => 'posts', 'name' => 'Blog'];

        $entity = $this->entity;

        return $entity;
    }
    
}   