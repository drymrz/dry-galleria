@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-4">
            <div class="col-lg-8">
                <h2>{{ $member->fullName }}</h2>
                <a href="/dashboard/members" class="btn btn-success" style="font-size:12px"><span
                        data-feather="arrow-left"></span> Back to all
                    my
                    posts</a>
                <a href="/dashboard/members/{{ $member->nis }}/edit" class="btn btn-warning" style="font-size:12px"><span
                        data-feather="edit"></span> Edit</a>
                <form action="/dashboard/members/{{ $member->nis }}" class="d-inline" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" style="font-size:12px"
                        onclick="return confirm('Are you sure to delete member ?')"><span data-feather="x-circle"></span>
                        Delete</button>
                </form>
                @if ($member->image)
                    <img class="img-fluid mt-3" src="{{ asset('storage/' . $member->image) }}" class="card-img-top"
                        alt="">
                @else
                    <img class="img-fluid mt-3" src="{{ url('/img/team/team-1.jpg') }}" class="card-img-top" alt="">
                @endif
                <article class="my-3">
                    {{ $member->nis }}
                </article>
            </div>
        </div>
    </div>
@endsection
