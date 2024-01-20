<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
    
        $post = new Post([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'author_id' => Auth::id(), // Set the author ID to the current user's ID
        ]);
    
        $post->save();
    
        return redirect()->route('posts.index')->with('success','Post created successfully.');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id);
        
        $post->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Post deleted successfully');
    }


    public function show($id)
    {
        $post = Post::with('author')->findOrFail($id);
    
        if (!$post) {
            // Handle the case where the post is not found
            return redirect()->route('some.route.name')->withErrors('Post not found.');
        }
    
        return view('posts.single_post', compact('post'));
    }
}
