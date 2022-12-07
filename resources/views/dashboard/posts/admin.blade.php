@extends('dashboard.layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="card col-lg-10">
        <div class="table-responsive mt-3">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="5%" class="text-center">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Author</th>
                        <th scope="col" width="20%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td class="text-center">{{ $posts->firstItem()+$loop->iteration -1 }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category == null ? "Deleted Category" : $post->category->name }}</td>
                        <td>{{ $post->user == null ? "Deleted User" : $post->user->name }}</td>
                        <td class="text-center">
                            <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-sm btn-info icon"><i
                                    class="bi bi-eye"></i></a>
                            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-sm icon btn-warning"><i
                                    class="bi bi-pencil-square"></i></a>
                            <form action="/dashboard/posts/{{ $post->slug }}" class="d-inline" method="post">
                                @method('delete')
                                @csrf
                                <button data-title="{{ $post->title }}"
                                    class="btn btn-sm btn-danger icon border-0 show-alert-delete-box"><i
                                        class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
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