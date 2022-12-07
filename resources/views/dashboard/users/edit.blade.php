@php
$roleName = "";
if($user->isRole == 0){
$roleName = "User";
}elseif($user->isRole == 1){
$roleName = "Admin";
}else{
$roleName = "SuperUser";
}
@endphp
@extends('dashboard.layouts.main')

@section('container')
<style>
    .filepond--root {
        width: 170px !important;
        height: 170px !important
    }
</style>
<form class="mb-5" action="/dashboard/su/users/{{ $user->username }}" method="post" enctype="multipart/form-data">
    @method("put")
    @csrf
    <div class="row justify-content-center">

        <div class="col-lg-6 order-2 order-lg-1">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                            name="username" value="{{ old('username', $user->username) }}" autofocus required
                            placeholder="johndoe">
                        @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name', $user->name) }}" required placeholder="John Doe">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email', $user->email) }}" required
                            placeholder="john@example.net">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="isRole" class="form-label">Role</label>
                        <select id="isRole" class="form-select @error('isRole') is-invalid @enderror" name="isRole"
                            required>
                            @if (old('isRole', $user->isRole))
                            <option value="{{ $user->isRole }}" selected hidden>{{ $roleName }}</option>
                            @endif
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                            @if (auth()->user()->isRole == 2)
                            <option value="2">SuperUser</option>
                            @endif
                        </select>
                        @error('isRole')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="button" class="btn btn-warning float-end" id="uploadBtn"
                        onclick="uploadImages()">Update
                        Member</button>
                    <button type="submit" class="btn btn-primary float-end d-none" id="createBtn">Add
                        Member</button>
                </div>
            </div>
            {{-- <div class="card">
                <div class="card-body">
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

                </div>
            </div> --}}
        </div>
        <div class="col-lg-4 order-1 order-lg-2">
            <div class="card">
                <div class="card-header">
                    <span class="fw-bold">Photo</span>
                </div>
                <div class="card-body" style="margin:auto">
                    <div class="mb-4">
                        <input type="hidden" name="oldImage" value="{{ $user->image }}">
                        @if ($user->image)
                        <div class="text-center" id="preview">
                            <img src="{{ asset('storage/profile-photos/' . $user->image) }}"
                                class="img-preview img-fluid mb-3 col-sm-5 d-block"
                                style="border-radius: 150px; width : 170px">
                            <button class="filepond--file-action-button filepond--action-edit-item img-edit"
                                type="button"
                                style="position: absolute;transform: translate3d(-17px, -60px, 0px) scale3d(1, 1, 1); opacity: 1;"><svg
                                    width="26" height="26" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg"
                                    aria-hidden="true" focusable="false">
                                    <path
                                        d="M8.5 17h1.586l7-7L15.5 8.414l-7 7V17zm-1.707-2.707l8-8a1 1 0 0 1 1.414 0l3 3a1 1 0 0 1 0 1.414l-8 8A1 1 0 0 1 10.5 19h-3a1 1 0 0 1-1-1v-3a1 1 0 0 1 .293-.707z"
                                        fill="currentColor" fill-rule="nonzero"></path>
                                </svg><span>edit</span>
                            </button>
                        </div>
                        @endif
                        <div id="edit" class="{{ $user->image ? 'd-none' : '' }}">
                            <input class="form-control @error('image') is-invalid @enderror" name="image" type="file"
                                id="image">
                            <button
                                class="{{ $user->image ? '' : 'd-none' }} filepond--file-action-button filepond--action-revert-item-processing"
                                id="backprev" type="button" style=" transform: translate3d(70px, -56px, 0px) scale3d(1, 1, 1); opacity:
                                                                    1;position:absolute"><svg width="26" height="26"
                                    viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.185 10.81l.02-.038A4.997 4.997 0 0 1 13.683 8a5 5 0 0 1 5 5 5 5 0 0 1-5 5 1 1 0 0 0 0 2A7 7 0 1 0 7.496 9.722l-.21-.842a.999.999 0 1 0-1.94.484l.806 3.23c.133.535.675.86 1.21.73l3.233-.803a.997.997 0 0 0 .73-1.21.997.997 0 0 0-1.21-.73l-.928.23-.002-.001z"
                                        fill="currentColor" fill-rule="nonzero"></path>
                                </svg><span>Undo</span>
                            </button>
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
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
        styleProgressIndicatorPosition: "right bottom",
        styleButtonRemoveItemPosition: "right bottom",
        styleButtonProcessItemPosition: "right bottom",
        required: false,
        server: {
        url: "/uploadpp",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
        },
    })

    function uploadBtnState(){
        if($('#username').val().length > 0 && $('#name').val().length > 0 &&
           $('#email').val().length > 0 || $('#password').val().length > 0 && 
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

    $(".img-edit").click(function (e) {
        e.preventDefault();
        $("#preview").addClass("d-none");
        $("#edit").removeClass("d-none");
    });
    
    $("#backprev").click(function (e) {
        e.preventDefault();
        $("#edit").addClass("d-none");
        $("#preview").removeClass("d-none");
        pond.removeFile()
    });
</script>
@endsection
@endsection