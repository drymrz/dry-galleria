@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-8">
                <h2>{{ $post->title }}</h2>
                <p>By. <a class="text-decoration-none"
                        href="/posts?author={{ $post->user->username }}">{{ $post->user->name }}</a>
                    in <a class="text-decoration-none"
                        href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
                @if ($post->image)
                    <div style="max-height: 400px ; overflow:hidden">
                        <img class="img-fluid mt-3" src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                            alt="{{ $post->category->name }}">
                    </div>
                @else
                    <img class="img-fluid mt-3" src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                        class="card-img-top" alt="{{ $post->category->name }}">
                @endif
                <article class="my-3">
                    {!! $post->body !!}
                </article>
                <a class="text-decoration-none d-block mt-2" href="/posts">Back to Posts..</a>
            </div>
        </div>
    </div>
@endsection
