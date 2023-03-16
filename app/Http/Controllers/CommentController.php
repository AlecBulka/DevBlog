<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class CommentController extends Controller
{
    public function comment(Request $request, Post $post) {
        $validated = $request->validate([
            'comment' => 'required|string|max:255'
        ]);
        $validated['post_id'] = $post->id;
        $request->user()->comments()->create($validated);
        return redirect(route('post.show', $post));
    }
}
