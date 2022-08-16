@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-4">
        <div class="col-lg-8">
            <h2>{{ $post->title }}</h2>
            <a href="{{ url()->previous() }}" class="btn btn-success" style="font-size:12px"><span
                    data-feather="arrow-left"></span> Back</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning" style="font-size:12px"><span
                    data-feather="edit"></span> Edit</a>
            <form action="/dashboard/posts/{{ $post->slug }}" class="d-inline" method="post">
                @method('delete')
                @csrf
                <button class="btn btn-danger" style="font-size:12px"
                    onclick="return confirm('Are you sure to delete post ?')"><span data-feather="x-circle"></span>
                    Delete</button>
            </form>
            @foreach ($images as $i)
            <img class="img-fluid mt-3" src="{{ asset('storage/post-images/' . $i->image_name) }}" class="card-img-top">
            @endforeach
            <article class="my-3">
                {!! $post->body !!}
            </article>
        </div>
    </div>
</div>
@endsection