@extends('dashboard.layouts.main')

@section('container')
<style>
    .filepond--root {
        width: 170px !important;
        height: 170px !important
    }
</style>
<form class="mb-5" action="/dashboard/su/users" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-center">

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                            name="username" value="{{ old('username') }}" autofocus required placeholder="johndoe">
                        @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" required placeholder="John Doe">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}" required placeholder="john@example.net">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <label for="isRole" class="form-label">Role</label>
                        <select id="isRole" class="form-select @error('isRole') is-invalid @enderror" name="isRole"
                            required>
                            <option value="0" selected>User</option>
                            <option value="1">Admin</option>
                            @if (auth()->user()->isRole == 2)
                            <option value="2">SuperUser</option>
                            @endif
                        </select>
                        @error('isRole')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="Insert min 8 character">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="confirm" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control @error('confirm') is-invalid @enderror" id="confirm"
                            name="confirm" placeholder="Re-enter your password">
                        @error('confirm')
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
        <div class="col-lg-4">
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
    </div>
</form>

@section('scripts')
<script src="/adminview/js/user.js"></script>
<script>
    FilePond.setOptions({
        server: {
        url: "/uploadpp",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
        },
    })

    function uploadBtnState(){
        if($('#username').val().length > 0 && $('#name').val().length > 0 &&
           $('#email').val().length > 0 && $('#password').val().length > 0 && 
           $('#confirm').val() == $('#password').val() && $('#isRole').val().length > 0 )
        {
            $('#uploadBtn').prop('disabled', false);
        }
        else
        {
            $('#uploadBtn').prop('disabled', true);
        }
    }

    function uploadImages() {
        pond.processFiles()
        if (pond.status == "0" || pond.status == "4") {
            uploadPost();
        }
    }
</script>
@endsection
@endsection