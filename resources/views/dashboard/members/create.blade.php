@extends('dashboard.layouts.main')

@section('container')
<style>
    .filepond--root {
        width: 170px !important;
        height: 170px !important
    }
</style>
<form class="mb-5" action="/dashboard/members" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-center">

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <span class="fw-bold">Data Diri</span>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis"
                            value="{{ old('nis') }}" autofocus required placeholder="134100000">
                        @error('nis')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="fullName" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('fullName') is-invalid @enderror" id="fullName"
                            name="fullName" value="{{ old('fullName') }}" required placeholder="John Doe">
                        @error('fullName')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="words" class="form-label">Julukan</label>
                        <input type="text" class="form-control @error('words') is-invalid @enderror" id="words"
                            name="words" value="{{ old('words') }}" required placeholder="Cool">
                        @error('words')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <span class="fw-bold">Photo</span>
                </div>
                <div class="card-body" style="margin:auto">
                    <div class="mb-4">
                        <input class="form-control  @error('image') is-invalid @enderror" name="image"
                            accept="image/png, image/jpeg" type="file" id="image"
                            style="width:200px !important; height:200px !important">
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <span class="fw-bold">Optional</span>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <label for="iglink" class="form-label">Instagram</label>
                        <input type="text" class="form-control @error('ig_link') is-invalid @enderror" id="iglink"
                            name="ig_link" value="{{ old('ig_link') }}" placeholder="john_doe">
                        @error('ig_link')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="weblink" class="form-label">Website</label>
                        <input type="text" class="form-control @error('web_link') is-invalid @enderror" id="weblink"
                            name="web_link" value="{{ old('web_link') }}" placeholder="johndoe.com">
                        @error('web_link')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="lilink" class="form-label">LinkedIn</label>
                        <input type="text" class="form-control @error('li_link') is-invalid @enderror" id="lilink"
                            name="li_link" value="{{ old('li_link') }}"
                            placeholder="www.linkedin.com/in/johndoe-123456">
                        @error('li_link')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="button" class="btn btn-primary float-end" id="uploadBtn" onclick="uploadImages()"
                        disabled>Add
                        Member</button>
                    <button type="submit" class="btn btn-primary float-end d-none" id="createBtn">Add
                        Member</button>
                </div>
            </div>
        </div>
    </div>
</form>

@section('scripts')
<script src="/adminview/js/member.js"></script>
<script>
    FilePond.setOptions({
        required: true,
        server: {
        url: "/uploadmi",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
        },
    })

    function uploadBtnState(){
        if($('#nis,#fullName,#words').val().length > 0 && pond.status != "0"){
            $('#uploadBtn').prop('disabled', false);
        }else{
            $('#uploadBtn').prop('disabled', true);
        }
    }

    function uploadImages() {
        pond.processFiles()
        if (pond.status == "4") {
            uploadPost();
        }
    }
</script>
@endsection
@endsection