@php
use App\Models\Category;
use Carbon\Carbon;
@endphp
@extends('frontview.layouts.main')

@section('container')
<section class="main-content mt-1">
    <div class="container-xl">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../">Beranda</a></li>
                @if($post->category != null)
                <li class="breadcrumb-item"><a href="/posts?category={{ $post->category->slug }}">{{
                        $post->category->name }}</a></li>
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
            </ol>
        </nav>

        <div class="row gy-4">

            <div class="col-lg-8">
                <!-- post single -->
                <div class="post post-single">
                    <!-- post header -->
                    <div class="post-header">
                        <h1 class="title mt-0 mb-3">{{ $post->title }}</h1>
                        <ul class="meta list-inline mb-0">
                            <li class="list-inline-item"><a href="{{ $post->user == null ? " #" : "/posts?author=" .
                                    $post->user->username}}"><img src="/img/team/team-1.jpg"
                                        style="max-width:30px;border-radius:50px" class="author" alt="author">{{
                                    $post->user == null ? "Deleted User" :
                                    $post->user->name }}</a></li>
                            @if($post->category != null)
                            <li class="list-inline-item"><a href="/posts?category={{ $post->category->slug }}">{{
                                    $post->category->name }}</a></li>
                            @endif
                            <li class="list-inline-item">{{ $post->created_at->format('d M Y') }}</li>
                        </ul>
                    </div>
                    <!-- featured image -->
                    <div class="featured-image">
                        @if ($post->images->isNotEmpty())
                        <div class="align-items-center d-flex justify-content-center">
                            <img class="img-fluid mt-3" style="border-radius: 10px"
                                src="{{ asset('storage/post-images/' . $post->images[0]->image_name) }}"
                                class="card-img-top" alt="{{ $post->title }}">
                        </div>

                        @if(count($post->images) > 1)
                        @foreach ($post->images->skip(1) as $i)
                        <div class="align-items-center d-flex justify-content-center">
                            <img class="img-fluid mt-3" src="{{ asset('storage/post-images/' . $i->image_name) }}"
                                style="border-radius: 10px" alt="{{ $post->title }}">
                        </div>
                        @endforeach
                        @endif

                        @else
                        <img class="img-fluid mt-3"
                            src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                            alt="{{ $post->category->name }}">
                        @endif
                    </div>
                    <!-- post content -->
                    {!! $post->body !!}
                </div>
            </div>

            <div class="col-lg-4">

                <!-- sidebar -->
                <div class="sidebar">
                    <div class="inner-wrapper-sticky" style="position: relative;">
                        <!-- widget about -->
                        <div class="widget rounded">
                            <div class="widget-about data-bg-image text-center"
                                data-bg-image="{{ url('/frontview/katen/map-bg.png') }}"
                                style="background-image: url({{ url('/frontview/katen/map-bg.png') }});">
                                <h3 class="widget-title">Caption</h3>
                                <img src="{{ url('/frontview/katen/wave.svg') }}" class="wave" alt="wave">
                                {!! $post->body !!}
                            </div>
                        </div>

                        <!-- widget popular posts -->
                        @if ($rec->count() >! 1)
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Postingan Lainnya</h3>
                                <img src="{{ url('/frontview/katen/wave.svg') }}" class="wave" alt="wave">
                            </div>
                            <div class="widget-content">
                                <!-- post -->
                                @foreach($rec as $r)
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <span class="number">{{ $loop->iteration }}</span>
                                        <a href="{{ $r->slug }}">
                                            <div class="d-flex justify-content-center align-items-center inner"
                                                style="max-height: 60px">
                                                @if($r->images->isNotEmpty())
                                                <img class="img-fluid"
                                                    src="{{ asset('storage/post-images/' . $r->images[0]->image_name) }}"
                                                    alt="post-title">
                                                @else
                                                <img class="img-fluid"
                                                    src="https://source.unsplash.com/400x400?{{ $r->category->name }}"
                                                    alt="post-title">
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{ $r->slug }}">{{ $r->title }}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">{{ Carbon::parse($r->moment_date)->format('d M
                                                Y')}}</li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- widget categories -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Kategori Postingan</h3>
                                <img src="{{ url('/frontview/katen/wave.svg') }}" class="wave" alt="wave">
                            </div>
                            <div class="widget-content">
                                <ul class="list">
                                    @foreach(Category::all() as $category)
                                    <li><a href="/posts?category={{ $category->slug }}">{{ $category->name
                                            }}</a><span>({{ $category->posts->count()
                                            }})</span></li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
</section>
<div class="spacer" data-height="75" style="height: 75px;"></div>
@endsection