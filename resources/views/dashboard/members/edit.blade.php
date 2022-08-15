@extends('dashboard.layouts.main')

@section('container')
    <style>
        trix-toolbar .trix-button-group[data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Member</h1>
    </div>

    <div class="col-lg-8">

        <form class="mb-5" action="/dashboard/members/{{ $member->nis }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis"
                    value="{{ old('nis', $member->nis) }}" autofocus required>
                @error('nis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fullName" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error('fullName') is-invalid @enderror" id="fullName"
                    name="fullName" value="{{ old('fullName', $member->fullName) }}" required>
                @error('fullName')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="words" class="form-label">Julukan</label>
                <input type="text" class="form-control @error('words') is-invalid @enderror" id="words"
                    name="words" value="{{ old('words', $member->words) }}" required>
                @error('words')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Photo</label>
                <input type="hidden" name="oldImage" value="{{ $member->image }}">
                @if ($member->image)
                    <img src="{{ asset('storage/' . $member->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <input class="form-control  @error('image') is-invalid @enderror" name="image" type="file"
                    id="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <hr>
                <p class="text-center">Optional</p>
                <hr>
            </div>
            <div class="mb-3">
                <label for="ig_link" class="form-label">Username Instagram</label>
                <input type="text" class="form-control @error('ig_link') is-invalid @enderror" id="ig_link"
                    name="ig_link" value="{{ old('ig_link', $member->ig_link) }}">
                @error('ig_link')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="web_link" class="form-label">Website</label>
                <input type="text" class="form-control @error('web_link') is-invalid @enderror" id="web_link"
                    name="web_link" value="{{ old('web_link', $member->web_link) }}">
                @error('web_link')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="li_link" class="form-label">LinkedIn Account Link</label>
                <input type="text" class="form-control @error('li_link') is-invalid @enderror" id="li_link"
                    name="li_link" value="{{ old('li_link', $member->li_link) }}">
                @error('li_link')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Add New Member</button>
        </form>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
        }
    </script>
@endsection
