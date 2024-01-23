<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
        
        $request->session()->put('post_preview', $request->only('title', 'content'));
        return redirect()->route('posts.review');

        // $post->save();
    
        // return redirect()->route('posts.index')->with('success','Post created successfully.');
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


    public function show($slug)
    {
        $post = Post::with('author')->where('slug', $slug)->firstOrFail();
    
        if (!$post) {
            // Handle the case where the post is not found
            return redirect()->route('posts.index')->withErrors('Post not found.');
        }
    
        return view('posts.single_post', compact('post'));
    }

    public function review(Request $request)
    {
        $post = (object) $request->session()->get('post_preview');
        if (!$post) {
            return redirect()->route('posts.create')->withErrors('No post data found.');
        }

        return view('posts.review', compact('post'));
    }

    public function confirm(Request $request)
    {
        $data = $request->session()->get('post_preview');
        $request->session()->forget('post_preview');
    
        if (!$data) {
            return redirect()->route('posts.create')->withErrors('No post data to confirm.');
        }
    
        // Generate the slug from the title
        $slug_text = \strip_tags($data['title']);
        $slug = Str::slug($slug_text, '-');
    
        // Create the post
        $post = new Post([
            'title' => $data['title'],
            'content' => $data['content'],
            'slug' => $slug,
            'author_id' => Auth::id(),
        ]);
    
        $post->save();
    
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

}