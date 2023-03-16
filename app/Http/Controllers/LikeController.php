<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;

class LikeController extends Controller
{
    public function index()
    {
        return view('post.liked', [
            'posts' => Post::get()
        ]);
    }

    public function like(Request $request, Post $post) {
        $validated = ['post_id' => $post->id];
        $request->user()->likes()->create($validated);
        return redirect(route('post.show', $post));
    }

    public function removeLike(Request $request, Post $post) {
        $validated = ['post_id' => $post->id];
        $request->user()->likes()->where('post_id', $post->id)->delete();
        return redirect(route('post.show', $post));
    }
}
