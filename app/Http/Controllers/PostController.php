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

        if (request('category') === "deleted") {
            $title = ' Kategori Uncategorized';
        } else if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' Kategori ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' oleh ' . $author->name;
        }

        if (request('search')) {
            $title = 'search';
        }

        return view('frontview.posts', [
            "title" => 'Semua Postingan' . $title,
            "active" => 'posts',
            "posts" => Post::filter(request(['search', 'category', 'author']))->where('status', '0')->orderBy('moment_date', 'desc')->paginate(7)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('frontview.post', [
            "title" => 'Post',
            "active" => 'posts',
            "post" => $post,
            "rec" => Post::whereNotIn('id', [$post->id])->inRandomOrder()->limit(4)->get()
        ]);
    }
}
