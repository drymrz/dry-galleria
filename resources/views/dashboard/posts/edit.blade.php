@extends('dashboard.layouts.main')

@php
use Illuminate\Support\Facades\Storage;
@endphp

@section('container')
<form class="my-4" id="postForm" action="/dashboard/posts/{{ $post->slug }}" method="post"
    enctype="multipart/form-data">
    @method('put')
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" value="{{ old('title', $post->title) }}" autofocus required>
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 d-none">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                            name="slug" value="{{ old('slug', $post->slug) }}" required>
                        @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select @error('category_id') is-invalid @enderror" name=" category_id">
                            @foreach ($categories as $category)
                            @if (old('category_id', $post->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                            <option value="" hidden></option>
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="body" class="form-label">Caption</label>
                        <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                        <trix-editor id="trix" input="body"></trix-editor>
                        @error('body')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <p class="text-muted text-sm mb-0 mt-4 ms-4">Image {{ $images->count() }} of 6</p>
                @if($images->isNotEmpty())
                <div class="table-responsive mx-3">
                    <table class="table">
                        <tbody>
                            @foreach ($images as $i)
                            <tr>
                                <td style="width:1px">
                                    <button type="button" class="btn-preview-img"
                                        style="background-image:url('/storage/post-images/{{ $i->image_name }}')"
                                        data-bs-toggle="modal" data-bs-target="#default"
                                        data-image="{{ $i->image_name }}"></button>
                                </td>
                                <td class="px-3 font-bold text-sm">
                                    <div>{{ substr($i->image_name, 0, strpos($i->image_name,".")) }}</div>
                                    <div>{{ substr((int)(Storage::size("/post-images/$i->image_name")) /1048576,0,5)}}
                                        MB | .{{ \File::extension($i->image_name); }}
                                    </div>
                                </td>
                                <td style="width:1px">
                                    <form></form>
                                    <form action="/dashboard/post/image/{{ $i->id }}" class="d-inline" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-sm btn-danger icon border-0 show-alert-delete-box" {{
                                            $images->count() == "1" ? 'disabled' : '' }}><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
                <div class="card-body p-0 pb-4 px-3">
                    @if ($images->count() != 6)
                    <div class="mb-3">
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control  @error('image') is-invalid @enderror" name="image[]"
                            accept="image/*" type="file" id="image" data-max-file-size="5MB"
                            data-max-files="{{ 6 - $images->count() }}" multiple>
                        <p class="filepond--warning" id="warning" data-state="hidden">The maximum number of files is {{
                            6 - $images->count() }}
                        </p>
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @endif
                    <div class="mt-4">
                        <button type="button" class="btn btn-warning float-end mx-2" id="uploadBtn"
                            onclick="uploadImages()">Save Changes</button>
                        <a href="{{ url()->previous() }}" class="btn btn-danger float-end">Discard</a>
                        <button type="submit" class="btn btn-primary" id="createBtn" hidden>Create
                            Post</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="modal fade modal-borderless" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Image Preview</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body p-0">
                <img class="modal-image img-fluid" src="" alt="">
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script src="/adminview/js/posts.js"></script>
<script>
    FilePond.setOptions({
        server: {
            url: "/uploadpi",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
        },
    })
    
    function uploadBtnState(){
        if($('#title,#body').val().length > 0 && $('#category').val().length > 0 ){
            $('#uploadBtn').prop('disabled', false);
        }else{
            $('#uploadBtn').prop('disabled', true);
        }
    }

    function uploadImages() {
        pond.processFiles()
        if(pond.status == "0" || pond.status == "4"){
            uploadPost()
        }
    }

    $('.show-alert-delete-box').click(function(event){
        var form = $(this).closest("form");
        event.preventDefault();
        swal({
            title: `Are you sure you want to delete this image?`,
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

    $(".btn-preview-img").click(function (e) { 
        var image = $(this).data("image");
        $(".modal-image").attr("src","/storage/post-images/" + image)
    });
</script>
@endsection
@endsection