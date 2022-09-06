@extends('dashboard.layouts.main')

@section('container')
<style>
    .filepond--root {
        width: 170px !important;
        height: 170px !important
    }
</style>
<form class="mb-5" action="/dashboard/members/{{ $member->nis }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><span class="fw-bold">Photo</span></div>
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-center mb-3">
                        <input type="hidden" name="oldImage" value="{{ $member->image }}">
                        @if ($member->image)
                        <div class="text-center" id="preview">
                            <img src="{{ asset('storage/member-photos/' . $member->image) }}"
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
                        <div id="edit" class="{{ $member->image ? 'd-none' : '' }}">
                            <input class="form-control @error('image') is-invalid @enderror" name="image" type="file"
                                id="image">
                            <button
                                class="{{ $member->image ? '' : 'd-none' }} filepond--file-action-button filepond--action-revert-item-processing"
                                id="backprev" type="button" style=" transform: translate3d(70px, -56px, 0px) scale3d(1, 1, 1); opacity:
                                            1;position:absolute"><svg width="26" height="26" viewBox="0 0 26 26"
                                    xmlns="http://www.w3.org/2000/svg">
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
            <div class="card">
                <div class="card-header">
                    <span class="fw-bold">Data Diri</span>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="text" class="form-control @error('nis') is-invalid @enderror"
                            placeholder="134100000" id="nis" name="nis" value="{{ old('nis', $member->nis) }}" autofocus
                            required>
                        @error('nis')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('fullName') is-invalid @enderror" id="fullName"
                            name="fullName" value="{{ old('fullName', $member->fullName) }}" placeholder="John Doe"
                            required>
                        @error('fullName')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="words" class="form-label">Julukan</label>
                        <input type="text" class="form-control @error('words') is-invalid @enderror" id="words"
                            name="words" value="{{ old('words', $member->words) }}" placeholder="Cool" required>
                        @error('words')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header"><span class="fw-bold">Optional</span></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="ig_link" class="form-label">Instagram</label>
                        <input type="text" class="form-control @error('ig_link') is-invalid @enderror" id="ig_link"
                            name="ig_link" value="{{ old('ig_link', $member->ig_link) }}" placeholder="john_doe">
                        @error('ig_link')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="web_link" class="form-label">Website</label>
                        <input type="text" class="form-control @error('web_link') is-invalid @enderror" id="web_link"
                            name="web_link" value="{{ old('web_link', $member->web_link) }}" placeholder="johndoe.com">
                        @error('web_link')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="li_link" class="form-label">LinkedIn</label>
                        <input type="text" class="form-control @error('li_link') is-invalid @enderror" id="li_link"
                            name="li_link" value="{{ old('li_link', $member->li_link) }}"
                            placeholder="www.linkedin.com/in/johndoe-123456">
                        @error('li_link')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="button" class="btn btn-warning float-end" id="uploadBtn" onclick="uploadImages()">Save
                        Changes</button>
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
        styleProgressIndicatorPosition: "right bottom",
        styleButtonRemoveItemPosition: "right bottom",
        styleButtonProcessItemPosition: "right bottom",
        required: false,
        server: {
        url: "/uploadmi",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
        },
    })

    function uploadBtnState(){
        if($('#nis,#fullName,#words').val().length > 0){
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