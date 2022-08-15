<?php

use App\Http\Controllers\DashboardController;
use App\Models\Post;
use App\Models\User;

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use App\Models\Member;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home', [
        "title" => 'Home',
        "active" => 'home',
        "members" => Member::orderBy('fullName', 'asc')->get()
    ]);
});


Route::get('/about', function () {
    return view('about', [
        "title" => 'About',
        "active" => 'about',
    ]);
});

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Categories',
        "active" => 'categories',
        'categories' => Category::all()
    ]);
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');


Route::get('/dashboard/postadmin', [DashboardPostController::class, 'admin'])->middleware('admin');


Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::get('/dashboard/su/posts', function () {
    return view('dashboard.posts.admin', [
        'posts' => Post::latest()->paginate(10)->withQueryString()
    ]);
});

Route::resource('/dashboard/members', MemberController::class)->middleware('auth');
Route::resource('/dashboard/su/users', UserController::class)->middleware('auth');
