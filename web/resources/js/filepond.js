import * as FilePond from 'filepond';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';

import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';

FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginFileValidateType
);

window.FilePond = FilePond;

document.querySelectorAll('.filepond').forEach(inputElement => {
    FilePond.create(inputElement, {
        acceptedFileTypes: ['image/png', 'image/jpeg'],
        allowMultiple: false,
        instantUpload: false,
        storeAsFile: true,
        credits: false,
    })
})
