@php
use Carbon\Carbon;
use App\Models\Post;
@endphp
@extends('frontview.layouts.main')
@if(request('category') === "deleted")
@php
$posts = Post::where("category_id" , 0)->paginate(7)->withQueryString()
@endphp
@endif

@section('container')

@if ($posts->count())
<section id="hero">
    <div class="container-xl">
        <div class="row gy-4">
            @if ($posts[0]->images->isNotEmpty())
            <div class="col-lg-10" style="margin: auto">
                <!-- featured post large -->
                <div class="post featured-post-lg">
                    <div class="details clearfix">
                        @if ($posts[0]->category != null)
                        <a href="/posts?category={{ $posts[0]->category->slug }}" class="category-badge">{{
                            $posts[0]->category->name }}</a>
                        @endif
                        <h2 class="post-title"><a href="/posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a></h2>
                        <ul class="meta list-inline mb-0">
                            <li class="list-inline-item"><a href="{{ $posts[0]->user == null ? " #" : "/posts?author=" .
                                    $posts[0]->user->username}}">{{ $posts[0]->user == null ? "Deleted User" :
                                    $posts[0]->user->name }}</a>
                            </li>
                            <li class="list-inline-item">{{ Carbon::parse($posts[0]->moment_date)->format('d M Y')
                                }}
                            </li>
                            <li class="list-inline-item">Posted {{ $posts[0]->created_at->diffForHumans() }} </li>
                        </ul>
                    </div>
                    <a href="/posts/{{ $posts[0]->slug }}">
                        <div class="thumb rounded">
                            <div class="inner data-bg-image"
                                data-bg-image="{{ asset('storage/post-images/' . $posts[0]->images[0]->image_name) }}"
                                style="background-image: url({{ asset('storage/post-images/' . $posts[0]->images[0]->image_name) }});">
                            </div>
                        </div>
                    </a>
                </div>
                @else
                <div class="col-lg-10" style="margin: auto">
                    <!-- featured post large -->
                    <div class="post featured-post-lg">
                        <div class="details clearfix">
                            @if ($posts[0]->category != null)
                            <a href="/posts?category={{ $posts[0]->category->slug }}" class="category-badge">{{
                                $posts[0]->category->name }}</a>
                            @endif
                            <h2 class="post-title"><a href="/posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a>
                            </h2>
                            <ul class="meta list-inline mb-0">
                                <li class="list-inline-item"><a href="{{ $posts[0]->user == null ? " #"
                                        : "/posts?author=" . $posts[0]->user->username}}">{{ $posts[0]->user == null ?
                                        "Deleted User" :
                                        $posts[0]->user->name }}</a>
                                </li>
                                <li class="list-inline-item">{{ $posts[0]->created_at->diffForHumans() }} </li>
                            </ul>
                        </div>
                        <a href="/posts/{{ $posts[0]->slug }}">
                            <div class="thumb rounded">
                                <div class="inner data-bg-image"
                                    data-bg-image="https://source.unsplash.com/1200x600?{{ $posts[0]->category->name }}"
                                    style="background-image: url(https://source.unsplash.com/1200x600?{{ $posts[0]->category->name }});">
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
</section>
@if ($posts->count() > 1)
<section class="main-content">
    <div class="container-xl">
        <div class="row gy-4">
            <div class="col-lg-12">
                <div class="section-header">
                    <h3 class="section-title">Postingan Terbaru</h3>
                    <img src="{{ url('/frontview/katen/wave.svg') }}" class="wave" alt="wave">
                </div>
                <div class="row gy-4">
                    @foreach ($posts->skip(1) as $post)
                    <div class="col-sm-6">
                        <!-- post -->
                        <div class="post post-grid rounded bordered"
                            style="box-shadow: -2px 4px 5px 0px rgb(0 0 0 / 5%);">
                            <div class="thumb top-rounded">
                                @if ($post->category != null)
                                <a href="/posts?category={{ $post->category->slug }}"
                                    class="category-badge position-absolute">{{
                                    $post->category->name }}</a>
                                @endif
                                <a href="/posts/{{ $post->slug }}">
                                    @if ($post->images->isNotEmpty())
                                    <div class="inner d-flex justify-content-center align-items-center"
                                        style="overflow: hidden; max-height: 350px">
                                        <img class="img-fluid"
                                            src="{{ asset('storage/post-images/' . $post->images[0]->image_name) }}"
                                            alt="post-image">
                                    </div>
                                    @else
                                    <div class="inner d-flex justify-content-center align-items-center"
                                        style="overflow: hidden; max-height: 350px">
                                        <img class="img-fluid"
                                            src="https://source.unsplash.com/700x500?{{ $post->category->name }}"
                                            alt="post-image">
                                    </div>
                                    @endif
                                </a>
                            </div>
                            <div class="details">
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item"><a href="{{ $post->user == null ? " #"
                                            : "/posts?author=" . $post->user->username}}"><img
                                                style="max-width:30px;border-radius:50px"
                                                src="{{ $post->user->image ? asset('storage/profile-photos/' . $post->user->image) : '/img/team/team-1.jpg'}}"
                                                class="author" alt="author">{{ $post->user == null ? "Deleted User" :
                                            $post->user->name }}</a></li>
                                    <li class="list-inline-item">{{ Carbon::parse($post->moment_date)->format('d M
                                        Y')}}</li>
                                    <li class="list-inline-item">Posted on {{ $post->created_at->format('d M Y')}}</li>
                                </ul>
                                <h5 class="post-title mb-3 mt-3"><a href="/posts/{{ $post->slug }}">{{
                                        $post->title
                                        }}</a>
                                </h5>
                                <p class="excerpt mb-0">{{ $post->excerpt }}
                                </p>
                            </div>
                            <div class="post-bottom clearfix d-flex align-items-center">
                                <div class="social-share me-auto">
                                    <button class="toggle-button icon-share" data-slug="{{ $post->slug }}"></button>
                                    <ul class="icons list-unstyled list-inline mb-0">
                                        <li class="list-inline-item">Link copied</li>
                                    </ul>
                                </div>
                                <div class="more-button float-end">
                                    <a href="/posts/{{ $post->slug }}"><span class="icon-options"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@else
<p class="text-center fs-4 my-4">Tidak ada postingan yang ditemukan.</p>
@endif
<div class="mb-5 mt-2 d-flex justify-content-center">
    {{ $posts->links() }}
</div>
@section('scripts')
<script>
    $(".icon-share").click(function (e) {
        var $temp = $("<input>");
        var $link = location.hostname + "/posts/" + $(this).data("slug");
        $("body").append($temp);
        $temp.val($link).select();
        document.execCommand("copy");
        $temp.remove();
        });
</script>
@endsection
@endsection