const title = document.querySelector("#title");
const slug = document.querySelector("#slug");
title.addEventListener("keyup", function () {
    let preslug = title.value;
    preslug = preslug.replace(/ /g, "-");
    slug.value = preslug.toLowerCase();
});

const inputElement = document.querySelector('input[id="image"]');

FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginFileValidateSize,
    FilePondPluginFileValidateType,
    FilePondPluginImageExifOrientation
);

const pond = FilePond.create(inputElement);
FilePond.setOptions({
    required: true,
    labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
    instantUpload: false,
    allowMultiple: true,
    allowReorder: true,
    allowProcess: false,
    checkValidity: true,
    acceptedFileTypes: [
        "image/png",
        "image/jpeg",
        "image/jpg",
        "image/webp",
        "image/svg",
    ],
    onprocessfiles: (files) => {
        uploadPost();
    },
    onaddfilestart: (file) => {
        uploadBtnState();
    },
    onremovefile: (error, file) => {
        uploadBtnState();
    },
});

function uploadPost() {
    $("#createBtn").click();
}

$(document).keyup(function (e) {
    uploadBtnState();
});
