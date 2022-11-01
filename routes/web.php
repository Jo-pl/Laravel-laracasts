<?php

use App\Http\Controllers\PostCommentsController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\RegisterController;

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

Route::get('/',[PostController::class,'index'])->name('home');

Route::get('post/{post:slug}', [PostController::class,'show'])->name('post');
Route::post('posts/{post:slug}/comments', [PostCommentsController::class,'store'])->name('create_comment');
/*->where('post', '[A-z_\-1-9]+');*/

//Retrieves all posts associated with a category
// Route::get('categories/{category:slug}', function (Category $category) {
//     ddd('hi');
//     return view('posts', [
//         'posts' => $category->posts,
//         'currentCategory' => $category,
//         'categories' => Category::all()
//     ]);
// })->name('category');

Route::get('authors/{author:username}', function (User $author) {
    return view('posts.index', [
        'posts' => $author->posts,
    ]);
})->name('authors');

Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('admin');
Route::post('admin/posts', [PostController::class, 'store'])->middleware('admin');