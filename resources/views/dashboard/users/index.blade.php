@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Registered Users</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="row justify-content-center">
    <div class="table-responsive col-lg-10">
        <a href="/dashboard/users/create" class="btn btn-primary btn-sm mb-2">Add New User</a>
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
                        <a href="/dashboard/users/{{ $user->username }}" class="badge bg-info"><span
                                data-feather="eye"></span></a>
                        <a href="/dashboard/users/{{ $user->username }}/edit" class="badge bg-warning"><span
                                data-feather="edit"></span></a>
                        <form action="/dashboard/users/{{ $user->username }}" class="d-inline" method="post">
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
</div>
@endsection