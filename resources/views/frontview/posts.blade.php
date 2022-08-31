@extends('frontview.layouts.main')

@section('container')
<p class="fs-2 fw-bold c-stisla-dark mb-4 text-center">{{ $title }}</p>
<div class="row mb-3 justify-content-center">
    <div class="col-md-6">
        <form action="/posts">
            @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group mb-3" style="height: 50px">
                <input name="search" type="text" class="form-control me-3 me-sm-4 px-4" placeholder="Cari Postingan"
                    value="{{ request('search') }}" style="border-radius: 50px">
                <button class="btn btn-danger" type="submit" style="border-radius: 50px; width:60px"><i
                        class="bi bi-search"></i></button>
            </div>
        </form>
    </div>
</div>

@if ($posts->count())
<div class="top-post d-flex flex-column flex-lg-row align-items-center py-5">
    <div class="col-12 col-lg-7 pe-lg-4">
        @if($posts[0]->images->isNotEmpty())
        <a href="/posts/{{ $posts[0]->slug }}">
            <div class="d-flex align-items-center justify-content-center"
                style="max-height: 300px ; overflow:hidden; margin: auto; border-radius:10px">
                <img class="img-fluid" src="{{ asset('storage/post-images/' . $posts[0]->images[0]->image_name) }}"
                    alt="{{ $posts[0]->category->name }}">
            </div>
        </a>
        @else
        <a href="/posts/{{ $posts[0]->slug }}">
            <div class="d-flex align-items-center justify-content-center"
                style="max-height: 300px ; overflow:hidden; margin: auto; border-radius:10px">
                <img class="img-fluid" src="https://source.unsplash.com/1200x600?{{ $posts[0]->category->name }}"
                    alt="{{ $posts[0]->category->name }}">
            </div>
        </a>
        @endif
    </div>
    <div class="d-flex flex-column col-12 col-lg-5 align-items-center align-items-sm-start justify-content-center">
        <div class="text-center text-sm-start">
            <p class="text-uppercase text-muted fw-bold pt-2 pt-lg-0" style="letter-spacing: 1.2px; font-size:17px">
                Postingan
                Teratas</p>
            <a href="/posts/{{ $posts[0]->slug }}">
                <p class="c-stisla-dark fs-4 fw-bold">{{ $posts[0]->title }}</p>
            </a>
            <p class="m-0">{!! $posts[0]->excerpt !!}</p>
        </div>
        <div class="author-container d-flex mt-3 flex-column flex-md-row align-items-center">
            <div class="avatar-author">
                <img src="/img/team/team-1.jpg" class="img-fluid" style="max-width:56px;border-radius:50px" alt="">
            </div>
            <div class="author-info d-flex align-items-md-start ps-md-4">
                <a href="/posts?author={{ $posts[0]->user->username }}">
                    <p class="c-stisla-dark fw-bold m-0">{{ $posts[0]->user->name }}</p>
                </a>
                <p class="m-0">{{ $posts[0]->created_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>
</div>

@if ($posts->count() >1)

<p class="my-5 fs-2 fw-bold text-center text-lg-start c-stisla-dark">Postingan Lainnya</p>

<div class="row">
    @foreach ($posts->skip(1) as $post)
    <div class="col-md-4 d-flex flex-column mb-3">
        @if ($post->images->isNotEmpty())
        <div class="col-12">
            <a href="/posts/{{ $posts[0]->slug }}">
                <div class="d-flex align-items-center justify-content-center post-images"
                    style="overflow:hidden; margin: auto;">
                    <img class="img-fluid" style="border-radius:10px"
                        src="{{ asset('storage/post-images/' . $post->images[0]->image_name) }}"
                        alt="{{ $post->category->name }}">
                </div>
            </a>
        </div>
        @else
        <div class="col-12">
            <a href="/posts/{{ $posts[0]->slug }}">
                <div class="d-flex align-items-center justify-content-center post-images"
                    style="max-height: 15rem ; overflow:hidden; margin: auto;">
                    <img class="img-fluid" style="border-radius:10px"
                        src="https://source.unsplash.com/500x400?{{ $post->category->name }}"
                        alt="{{ $post->category->name }}">
                </div>
            </a>
        </div>
        @endif
        <div class="d-flex flex-column py-3">
            <div class="d-flex justify-content-sm-between justify-content-center h-mb-1">
                <p style="font-weight: 600" class="c-stisla-dark">{{ $post->created_at->format('d M') }} &#x2022; <a
                        class="c-stisla-dark" href="/posts?category={{ $post->category->slug }}"> {{
                        $post->category->name }} </a></p>
            </div>
            <a class=" c-stisla-dark fs-5 fw-bold text-center text-md-start" href="/posts/{{ $posts[0]->slug }}">
                <p>{{ $post->title }}</p>
            </a>
            <p class="text-muted body-text text-center text-md-start">{!! $post->excerpt !!}</p>
        </div>
    </div>
    @endforeach
</div>
@endif
@else
<p class="text-center fs-4">No post found.</p>
@endif
<div class="mb-5 mt-2 d-flex justify-content-center">

    {{ $posts->links() }}
</div>
@endsection