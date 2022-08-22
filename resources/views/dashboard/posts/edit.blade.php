@extends('dashboard.layouts.main')

@section('container')
{{-- <div class="col-lg-8">

    <form class="mb-5" action="/dashboard/posts/{{ $post->slug }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title', $post->title) }}" autofocus>
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                value="{{ old('slug', $post->slug) }}" required>
            @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
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
        <div class="mb-3">
            <label for="formFile" class="form-label">Image</label>
            <input type="hidden" name="oldImage" value="{{ $post->image }}">
            @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
            <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input class="form-control  @error('image') is-invalid @enderror" name="image" type="file" id="image"
                onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
            <trix-editor input="body"></trix-editor>
            @error('body')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div> --}}

<form class="my-4" id="postForm" action="/dashboard/posts/{{ $post->slug }}" method="post"
    enctype="multipart/form-data">
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
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col" width="5%" class="text-center">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col" width="20%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($images as $i)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control  @error('image') is-invalid @enderror" name="image[]"
                            accept="image/*" type="file" id="image" data-max-file-size="3MB" data-max-files="3"
                            multiple>
                        <p class="filepond--warning" id="warning" data-state="hidden">The maximum number of files is 3
                        </p>
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <button type="button" class="btn btn-primary float-end" id="uploadBtn" onclick="uploadImages()"
                            disabled>Upload
                            Post</button>
                        <button type="submit" class="btn btn-primary" id="createBtn" hidden>Create
                            Post</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");

        title.addEventListener("keyup", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
        }
</script>
@endsection