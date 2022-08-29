<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $title = '';

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' di ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' oleh ' . $author->name;
        }

        return view('frontview.posts', [
            "title" => 'Semua Postingan' . $title,
            "active" => 'posts',
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('frontview.post', [
            "title" => 'Post',
            "active" => 'posts',
            "post" => $post,
            "rec" => Post::whereNotIn('id', [$post->id])->inRandomOrder()->limit(5)->get()
        ]);
    }
}
