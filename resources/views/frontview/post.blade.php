@extends('frontview.layouts.main')

@section('container')
<div class="row mb-5 justify-content-center">
    <div style="max-width: 730px" class="pb-5">
        <div class="post-content">
            <div class="d-flex align-content-center py-2">
                <div class="me-3 me-lg-4">
                    <a href="/posts?category={{ $post->category->slug }}"
                        class="badge bg-stisla rounded-pill py-2 px-3">{{
                        $post->category->name
                        }}</a>
                </div>
                <p class="post-heading m-0 me-3 me-lg-4 pt-1 c-stisla-dark">{{ $post->created_at->format('M d, Y') }}
                </p>
                <a href="/posts?author={{ $post->user->username }}" class="post-heading pt-1 c-stisla-dark">{{
                    $post->user->name
                    }}</a>
            </div>
            <div class="post-title mt-2">
                <h1 class="fs-1 fw-bold c-stisla-dark">{{ $post->title }}</h1>
            </div>

            @if ($post->images->isNotEmpty())
            <div>
                <img class="img-fluid mt-3" style="border-radius: 10px"
                    src="{{ asset('storage/post-images/' . $post->images[0]->image_name) }}" class="card-img-top"
                    alt="{{ $post->category->name }}">
            </div>

            @if(count($post->images) > 1)
            @foreach ($post->images->skip(1) as $i)
            <div>
                <img class="img-fluid mt-3" src="{{ asset('storage/post-images/' . $i->image_name) }}"
                    style="border-radius: 10px" alt="{{ $post->category->name }}">
            </div>
            @endforeach
            @endif

            @else
            <img class="img-fluid mt-3" src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                alt="{{ $post->category->name }}">
            @endif
            <article class="my-5">
                {!! $post->body !!}
            </article>
        </div>
        <div class="post-author"
            style="background-color: #FAFBFF; border-radius:20px; padding:50px; font-family:'Poppins'">
            <div class="d-flex flex-column flex-sm-row ms-0 justify-content-center justify-content-sm-start">
                <div class="author-avatar">
                    <img src="/img/team/team-1.jpg" style="max-width: 96px; border-radius:50px" alt="">
                </div>
                <div class="author-info align-items-sm-start ps-sm-4">
                    <p class="author fw-bold c-stisla-dark m-0">PENULIS</p>
                    <p class="author-name text-center text-md-start fw-bold m-0 c-stisla-dark">{{ $post->user->name }}
                    </p>
                </div>
            </div>
            <div class="author-description mt-3">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit sunt
                    distinctio ipsa vitae,
                    fugiat in dolorem molestiae, sint suscipit eligendi voluptatem beatae natus corrupti autem.
                    Consequuntur ratione voluptatem deserunt omnis fugiat doloremque eveniet, modi reprehenderit,
                    provident aliquid, perspiciatis iste cupiditate saepe voluptatibus odit dignissimos quam qui commodi
                    inventore quia aperiam?</p>
            </div>
            <div class="author-link mt-5 text-center text-sm-start">
                <a href="/posts?author={{ $post->user->username }}" class="c-stisla-dark fw-bold">Postingan
                    lain dari {{
                    $post->user->name }}</a>
            </div>
        </div>
    </div>
    <div class="post-recommendation col-10 mt-3 pt-5">
        <p class="fs-2 fw-bolder c-stisla-dark pb-2 text-center text-sm-start">Rekomendasi Postingan</p>
        <div class="row">
            @foreach($rec as $r)
            <a href="/posts/{{ $r->slug }}" class="c-stisla-dark mt-5">
                <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-sm-between">
                    <p class="fw-bold fs-4 text-center text-sm-start">{{ $r->title }}</p>
                    <div class="d-flex align-items-center justify-content-center pb-3">
                        <span class="badge bg-stisla rounded-pill py-2 px-3">{{
                            $post->category->name
                            }}</span>
                    </div>
                </div>
                <p class="text-center text-sm-start">{!! $r->excerpt !!} </p>
                <div class="d-flex fw-bold justify-content-center justify-content-sm-start fs-6 text-center">
                    <p class="pe-3">{{ $r->created_at->format('M d, Y') }}</p>
                    <div class="d-flex">
                        <span class="dot pe-1">&#x2022;</span>
                        <p>Oleh {{ $r->user->name }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection