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
        $entityType = "posts";
        $entityName = "post";
        $entity = Post::orderBy('created_at', 'desc')->get();

        return view('posts.index', compact('entity', 'entityName', 'entityType'));
    }

    public function create()
    {
        $entityType = "posts";
        $entityName = "post";
        $entity = "new";
        return view('form', compact('entity', 'entityType', 'entityName'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        if (Auth::id() != config('permissions.super_user_id')) {
            return redirect()->route('dashboard.index')->withErrors('You are not authorized to create posts.');
        }

        $request->session()->put('post_preview', $request->only('title', 'content'));
        return redirect()->route('posts.review');

        // $post->save();

        // return redirect()->route('posts.index')->with('success','Post created successfully.');
    }

    public function edit($id)
    {
        $entityType = 'posts';
        $entityName = "Post";
        $entity = Post::findOrFail($id);
        return view('form', compact('entity', 'entityType', 'entityName'));
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

        return redirect()->route('dashboard.index')->with('success', 'Post deleted successfully');
    }


    public function show($slug)
    {
        $entityType = 'posts';
        $entityName = "Post";
        $entity = Post::with('author')->where('slug', $slug)->firstOrFail();

        if (!$entity) {
            // Handle the case where the post is not found
            return redirect()->route('posts.index')->withErrors('Post not found.');
        }

        return view('posts.post', compact('entity', 'entityName', 'entityType'));
    }

    public function review(Request $request)
    {
        $entityType = 'posts';
        $entityName = "Post";
        $entity = (object) $request->session()->get('post_preview');

        if (!$entity) {
            return redirect()->route('form')->withErrors('No post data found.');
        }

        return view('posts.review', compact('entity', 'entityType', 'entityName'));
    }

    public function confirm(Request $request)
    {
        $entityType = 'posts';
        $entityName = "Post";

        $data = $request->session()->get('post_preview');
        $request->session()->forget('post_preview');

        if (!$data) {
            return redirect()->route('form')->withErrors('No post data to confirm.');
        }

        // Generate the slug from the title
        $slug_text = \strip_tags($data['title']);
        $slug = Str::slug($slug_text, '-');

        // Create the post
        $entity = new Post([
            'title' => $data['title'],
            'content' => $data['content'],
            'slug' => $slug,
            'author_id' => Auth::id(),
        ]);

        $entity->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }
}
