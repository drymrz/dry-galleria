const inputElement = document.querySelector('input[id="image"]');

FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginFileValidateSize,
    FilePondPluginFileValidateType,
    FilePondPluginImageExifOrientation,
    FilePondPluginImageCrop,
    FilePondPluginImageResize,
    FilePondPluginImageTransform
);

const pond = FilePond.create(inputElement);
FilePond.setOptions({
    labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,

    imageCropAspectRatio: 1,
    imageResizeTargetWidth: 800,

    stylePanelLayout: "compact circle",
    styleLoadIndicatorPosition: "center top",
    styleProgressIndicatorPosition: "center bottom",
    styleButtonRemoveItemPosition: "center bottom",
    styleButtonProcessItemPosition: "center bottom",

    instantUpload: false,
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
