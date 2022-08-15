@extends('layouts.main')

@section('container')
    <div class="row mb-3 justify-content-center">
        <div class="col-md-6">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input name="search" type="text" class="form-control" placeholder="Search.."
                        value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-3">
            @if ($posts[0]->image)
                <div style="max-height: 400px ; overflow:hidden">
                    <img class="img-fluid" src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top"
                        alt="{{ $posts[0]->category->name }}">
                </div>
            @else
                <img class="img-fluid" src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}"
                    class="card-img-top" alt="{{ $posts[0]->category->name }}">
            @endif
            <div class="card-body text-center">
                <h3 class="card-title"><a class="text-decoration-none text-dark"
                        href="/posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a></h3>
                <p class="card-text"><small class="text-muted"> By. <a class="text-decoration-none"
                            href="/posts?author={{ $posts[0]->user->username }}">{{ $posts[0]->user->name }}</a>
                        in <a class="text-decoration-none"
                            href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>
                        {{ $posts[0]->created_at->diffForHumans() }}.</small>
                </p>
                <p class="card-text">{!! $posts[0]->excerpt !!}</p>
                <a class="text-decoration-none btn btn-primary btn-sm" href="/posts/{{ $posts[0]->slug }}">Read More</a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <p class="position-absolute text-white px-3 py-2" style="background-color: rgba(0,0,0,0.7)"><a
                                    href="/posts?category={{ $post->category->slug }}"
                                    class="text-decoration-none text-white">
                                    {{ $post->category->name }}</a></p>
                            @if ($post->image)
                                <div style="max-height: 400px ; overflow:hidden">
                                    <img class="img-fluid" src="{{ asset('storage/' . $post->image) }}"
                                        class="card-img-top" alt="{{ $post->category->name }}">
                                </div>
                            @else
                                <img class="img-fluid"
                                    src="https://source.unsplash.com/500x400?{{ $post->category->name }}"
                                    class="card-img-top" alt="{{ $post->category->name }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title"><a class="text-decoration-none text-dark"
                                        href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h5>
                                <p class="card-text"><small class="text-muted"> By. <a class="text-decoration-none"
                                            href="/posts?author={{ $post->user->username }}">{{ $post->user->name }}
                                        </a>
                                        {{ $post->created_at->diffForHumans() }}.</small>
                                </p>
                                <p class="card-text text-truncate">{!! $post->excerpt !!}.</p>
                                <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No post found.</p>
    @endif
    <div class="mb-5 mt-2 d-flex justify-content-center">

        {{ $posts->links() }}
    </div>
@endsection
