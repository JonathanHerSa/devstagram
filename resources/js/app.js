import './bootstrap';
import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;
const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage:'Coloca aqui tu imagen',
    acceptedFiles:'.png, .jpg, .jpeg, .gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles:1,
    uploadMultiple: false
});
