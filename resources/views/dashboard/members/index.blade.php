@extends('dashboard.layouts.main')

@section('container')
@php
use App\Models\Member;
@endphp

<div class="row justify-content-center">
    <div class="card col-lg-10">
        @if($members->isNotEmpty())
        <div class="d-flex justify-content-end justify-content-md-between align-items-center mt-3 mb-2">
            <p class="d-none d-md-inline-block text-muted text-sm mb-0 ms-1">Showing total {{ Member::get()->count() }}
                entries</p>
            <a href="/dashboard/members/create" class="btn btn-primary icon mb-2">Add Member <i
                    class="bi bi-plus-lg icon-inside"></i></a>
        </div>
        <div class="table-responsive">
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
                            {{-- <a href="/dashboard/members/{{ $member->nis }}" class="btn btn-sm btn-info icon"><i
                                    class="bi bi-eye"></i></a> --}}
                            <a href="/dashboard/members/{{ $member->nis }}/edit" class="btn btn-sm icon btn-warning"><i
                                    class="bi bi-pencil-square"></i></a>
                            <form action="/dashboard/members/{{ $member->nis }}" class="d-inline" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-sm btn-danger icon border-0 show-alert-delete-box"
                                    data-title="{{ $member->fullName }}"><i class="bi bi-trash"></i></button>
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
        @else
        <div class="d-flex flex-column align-items-center justify-content-center p-5">
            <div class="empty-image pt-4">
                <img style="width: 200px" src="https://gw.alipayobjects.com/zos/antfincdn/ZHrcdLPrvN/empty.svg"
                    alt="empty">
            </div>
            <div class="empty-desc mt-3">
                <p>There's no Member found</p>
            </div>
            <div class="empty-act mt-3">
                <a href="/dashboard/members/create" class="btn btn-primary icon mb-2">Add Member</a>
            </div>
        </div>
        @endif
    </div>
</div>
@section('scripts')
<script type="text/javascript">
    $('.show-alert-delete-box').click(function(event){
        var form =  $(this).closest("form");
        var title = $(this).data("title");
        event.preventDefault();
        swal({
            title: `Are you sure you want to delete ${title}?`,
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            type: "warning",
            buttons: ["Cancel","Yes!"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>
@endsection
@endsection