@extends('dashboard.layouts.main')

@section('container')
<form class="mb-5" action="/dashboard/su/categories" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-center">

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" autofocus required placeholder="Personal">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="name" class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                            name="slug" value="{{ old('slug') }}" required placeholder="John Doe" readonly>
                        @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary float-end" id="createBtn">Add
                        Categories</button>
                </div>
            </div>
        </div>
    </div>
</form>

@section('scripts')
<script>
    const name = document.querySelector("#name");
    const slug = document.querySelector("#slug");
    name.addEventListener("keyup", function () {
    let preslug = name.value;
    preslug = preslug.replace(/ /g, "-");
    slug.value = preslug.toLowerCase();
    });
</script>
@endsection
@endsection