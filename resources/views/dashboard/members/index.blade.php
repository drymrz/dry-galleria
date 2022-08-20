@extends('dashboard.layouts.main')

@section('container')
@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="row justify-content-center">
    <div class="card col-lg-10">
        <div class="table-responsive mt-3">
            <div class="d-flex justify-content-end">
                <a href="/dashboard/members/create" class="btn btn-primary icon mb-2"><i class="bi bi-plus-lg"></i></a>
            </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="5%" class="text-center">#</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Julukan</th>
                        <th scope="col" width="20%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $member->nis }}</td>
                        <td>{{ $member->fullName }}</td>
                        <td>{{ $member->words }}</td>
                        <td class="text-center">
                            <a href="/dashboard/members/{{ $member->nis }}" class="btn btn-info icon"><i
                                    class="bi bi-eye"></i></a>
                            <a href="/dashboard/members/{{ $member->nis }}/edit" class="btn icon btn-warning"><i
                                    class="bi bi-pencil-square"></i></a>
                            <form action="/dashboard/members/{{ $member->nis }}" class="d-inline" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger icon border-0"
                                    onclick="return confirm('Are you sure to delete post ?')"><i
                                        class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2 d-flex justify-content-center">
                {{ $members->links() }}
            </div>
        </div>
    </div>
</div>
@endsection