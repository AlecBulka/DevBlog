<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use App\Models\Role;
use App\Models\Comment;

class AdminController extends Controller
{
    public function usersView() {
        return view('admin.users', [
            'users' => User::get()
        ]);
    }

    public function postsView() {
        return view('admin.posts', [
            'posts' => Post::with('user')->latest()->get()
        ]);
    }

    public function userEdit(User $user) {
        return view('admin.editUser', [
            'user' => $user,
            'roles' => Role::get()
        ]);
    }

    public function postEdit(Post $post) {
        return view('admin.editPost', [
            'post' => $post,
            'tags' => Tag::get()
        ]);
    }

    public function userUpdate(Request $request, User $user) {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role_id' => ['required']
        ]);
        $user->update($validated);
        return redirect(route('admin.users'));
    }

    public function postUpdate(Request $request, Post $post) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short' => 'required|string|max:255',
            'content' => 'required'
        ]);
        $post->update($validated);
        $post->tags()->sync($request->tags);
        return redirect(route('admin.posts'));
    }
}
