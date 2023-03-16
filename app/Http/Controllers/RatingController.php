<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Rating;

class RatingController extends Controller
{
    public function rate(Request $request, Post $post) {
        $validated = ['post_id' => $post->id, 'rating' => $request->rating];
        $request->user()->ratings()->create($validated);
        return redirect(route('post.show', $post));
    }
}
