@extends('dashboard.layouts.main')

@section('container')

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
@php
use App\Models\User;
@endphp
<div class="row justify-content-center">
    <div class="card col-lg-10">
        <div class="d-flex justify-content-end justify-content-md-between align-items-center mt-3 mb-2">
            <p class="d-none d-md-inline-block text-muted text-sm mb-0 ms-1">Showing total {{ User::get()->count() }}
                entries</p>
            <a href="/dashboard/users/create" class="btn btn-primary icon mb-2">Add New User <i
                    class="bi bi-plus-lg"></i></a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="5%" class="text-center">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col" width="20%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">
                            <a href="/dashboard/users/{{ $user->username }}" class="btn btn-sm btn-info icon"><i
                                    class="bi bi-eye"></i></a>
                            <a href="/dashboard/users/{{ $user->username }}/edit" class="btn btn-sm icon btn-warning"><i
                                    class="bi bi-pencil-square"></i></a>
                            <form action="/dashboard/users/{{ $user->username }}" class="d-inline" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-sm btn-danger icon border-0"
                                    onclick="return confirm('Are you sure to delete post ?')"><i
                                        class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2 d-flex justify-content-center">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection