<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            "posts" => Post::latest()->where('user_id', auth()->user()->id)->paginate(10),
            "active" => "My Posts"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            "categories" => Category::all(),
            "active" => "Create New Post"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'body' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 150);
        $newPost = Post::create($validatedData);

        if ($request->has('image')) {
            foreach ($request->image as $image) {
                $imageName = $validatedData['slug'] . '-image-' . rand(1, 2000) . '.jpg';
                Storage::move('/post-images/' . $image, '/post-images/' . $imageName);
                PostImage::create([
                    'post_id' => $newPost->id,
                    'image_name' => $imageName
                ]);
            }
        }
        toast('Success add New Post', 'success');
        return redirect('/dashboard/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if (auth()->user()->isRole != "2" and $post->user->id !== auth()->user()->id) {
            abort(403);
        }
        return view('dashboard.posts.show', [
            'post' => $post,
            'images' => $post->images,
            'active' => "Post Overview"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (auth()->user()->isRole != "2" and $post->user->id !== auth()->user()->id) {
            abort(403);
        }

        return view('dashboard.posts.edit', [
            "post" => $post,
            'images' => $post->images,
            "categories" => Category::all(),
            "active" => "Edit Post"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::where('id', $post->id)
            ->update($validatedData);

        if ($request->has('image')) {
            foreach ($request->image as $image) {
                $imageName = $request['slug'] . '-image-' . rand(1, 2000) . '.jpg';
                Storage::move('/post-images/' . $image, '/post-images/' . $imageName);
                PostImage::create([
                    'post_id' => $post->id,
                    'image_name' => $imageName
                ]);
            }
        }
        toast('Post has been changed', 'success');
        return redirect('/dashboard/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $images = PostImage::where("post_id", $post->id)->get();
        if ($images) {
            foreach ($images as $i) {
                Storage::delete("/post-images/" . $i->image_name);
                PostImage::destroy($i->id);
            }
        }
        Post::destroy($post->id);
        toast('Post has been deleted !', 'success');
        return redirect('/dashboard/posts');
    }
}
