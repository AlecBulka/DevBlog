<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Rating;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('post.posts', [
            'posts' => Post::with(['user'])->where('user_id', auth()->id())->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create', [
            'tags' => Tag::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short' => 'required|string|max:255',
            'content' => 'required'
        ]);
        $post = $request->user()->posts()->create($validated);
        $post->tags()->sync($request->tags);
        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.post', [
            'post' => $post,
            'comments' => Comment::with(['user'])->where('post_id', $post->id)->latest()->get(),
            'liked' => Like::where('post_id', $post->id)->where('user_id', auth()->id())->get(),
            'rated' => Rating::where('post_id', $post->id)->where('user_id', auth()->id())->get(),
            'avg' => Rating::avg($post)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('post.edit', [
            'post' => $post,
            'tags' => Tag::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short' => 'required|string|max:255',
            'content' => 'required'
        ]);
        $post->update($validated);
        $post->tags()->sync($request->tags);
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect(route('post.index'));
    }

    public function home() {
        return view('home', [
            'posts' => Post::with('user')->latest()->get()
        ]);
    }
}
