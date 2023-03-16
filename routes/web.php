<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RatingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [PostController::class, 'home'])->name('home');

Route::resource('post', PostController::class)
->only(['index', 'store', 'create', 'edit', 'update', 'destroy'])
->middleware(['auth', 'loader', 'verified']);

Route::resource('post', PostController::class)
->only(['show'])
->middleware(['auth', 'verified']);

Route::get('likedposts', [LikeController::class, 'index'])
->middleware(['auth', 'verified'])->name('like.index');

Route::post('like/{post}', [LikeController::class, 'like'])
->middleware(['auth', 'verified'])->name('like.like');

Route::delete('like/{post}', [LikeController::class, 'removeLike'])
->middleware(['auth', 'verified'])->name('like.removeLike');

Route::post('comment/{post}', [CommentController::class, 'comment'])
->middleware(['auth', 'verified'])->name('comment.comment');

Route::post('rate/{post}', [RatingController::class, 'rate'])
->middleware(['auth', 'verified'])->name('rate.rate');

Route::get('/admin/users', [AdminController::class, 'usersView'])->middleware(['auth', 'admin', 'verified'])->name('admin.users');

Route::get('/admin/posts', [AdminController::class, 'postsView'])->middleware(['auth', 'admin', 'verified'])->name('admin.posts');

Route::get('/admin/users/edit/{user}', [AdminController::class, 'userEdit'])->middleware(['auth', 'admin', 'verified'])->name('admin.editUser');

Route::get('/admin/posts/edit/{post}', [AdminController::class, 'postEdit'])->middleware(['auth', 'admin', 'verified'])->name('admin.editPost');

Route::patch('/admin/users/{user}', [AdminController::class, 'userUpdate'])->middleware(['auth', 'admin', 'verified'])->name('admin.updateUser');

Route::patch('/admin/posts/{post}', [AdminController::class, 'postUpdate'])->middleware(['auth', 'admin', 'verified'])->name('admin.updatePost');

require __DIR__.'/auth.php';
