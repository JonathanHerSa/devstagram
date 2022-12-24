import "./bootstrap";
import Dropzone from "dropzone";

Dropzone.autoDiscover = false;
const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Coloca aqui tu imagen",
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar archivo",
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        if (document.querySelector('[name="imagen"]').value.trim()) {
            const imgPu = {};
            imgPu.size = 1234;
            imgPu.name = document.querySelector('[name="imagen"]').value;

            this.options.addedfile.call(this, imgPu);
            this.options.thumbnail.call(this, imgPu, `/uploads/${imgPu.name}`);
            imgPu.previewElement.classList.add("dz-success", "dz-complete");
        }
    },
});

dropzone.on("success", (file, response) => {
    document.querySelector('[name="imagen"]').value = response.imagen;
});

dropzone.on("removedfile", (file) => {
    document.querySelector('[name="imagen"]').value = "";
});
