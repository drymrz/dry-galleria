@php
use App\Models\Post;
@endphp

@extends('frontview.layouts.main')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($categories as $category)
        <div class="col-md-4">
            <div class="post featured-post-md mb-2">
                <div class="details clearfix">
                    <h4 class="post-title"><a href="/posts?category={{ $category->slug }}">{{ $category->name }}</a>
                    </h4>
                </div>
                @php
                $post = Post::firstWhere('category_id', $category->id)
                @endphp
                <a href="/posts?category={{ $category->slug }}">
                    <div class="thumb rounded">
                        <div class="inner data-bg-image"
                            data-bg-image="{{ asset('storage/post-images/' . $post->images[0]->image_name) }}"
                            style="background-image: url({{ asset('storage/post-images/' . $post->images[0]->image_name) }});">
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
        @if(count(Post::where('category_id', 0)->get()) > 0)
        <div class="col-md-4">
            <div class="post featured-post-md mb-2">
                <div class="details clearfix">
                    <h4 class="post-title"><a href="/posts?category=deleted">Uncategorized</a>
                    </h4>
                </div>
                <a href="/posts?category=deleted">
                    <div class="thumb rounded">
                        <div class="inner data-bg-image" data-bg-image="https://source.unsplash.com/500x500?delete"
                            style="background-image: url(https://source.unsplash.com/500x500?delete);">
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection