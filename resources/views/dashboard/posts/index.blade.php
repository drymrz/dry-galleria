@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="row justify-content-center">
    <div class="table-responsive col-lg-10">
        <a href="/dashboard/posts/create" class="btn btn-primary btn-sm mb-2">Create new post</a>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col" width="5%" class="text-center">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Cateogry</th>
                    <th scope="col" width="20%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td class="text-center">{{ $posts->firstItem() + $loop->iteration -1 }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td class="text-center">
                        <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span
                                data-feather="eye"></span></a>
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span
                                data-feather="edit"></span></a>
                        <form action="/dashboard/posts/{{ $post->slug }}" class="d-inline" method="post">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0"
                                onclick="return confirm('Are you sure to delete post ?')"><span
                                    data-feather="x-circle"></span></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mb-5 mt-2 d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection