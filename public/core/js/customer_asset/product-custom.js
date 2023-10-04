const $newModal = document.getElementById('newModal');
const modal = new Modal($newModal);
let cancelBtn = document.getElementById('cancelBtn');
let closeIco = document.getElementById('closeIco');

openForm = (url) => {
    modalShowAndReset();
    $('.modal-title').text('New Item');
    $('#form_url').val(url);
}

modalShowAndReset = () => {
    modal.show();
    formReset();
}

formReset = () => {
    $("#mainForm select,input").val(null).trigger('change');
    $('#mainForm').attr('method', 'POST');
}

closeIco.onclick = function() {
    modalHideAndReset();
}

cancelBtn.onclick = function() {
    modalHideAndReset();
}

modalHideAndReset = () => {
    modal.hide();
    formReset();    
}

saveRecord = () => {
    Swal.fire({
        template: '#create-template',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: $('#form_url').val(),
                data: $('#mainForm').serialize() + '&_token=' + CSRF_TOKEN + '&_method=' + $('#mainForm').attr('method'),
                beforeSend: function() {
                    Swal.fire({
                        title: 'Please wait...',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        didOpen: () => {
                            Swal.showLoading()
                        },
                    })
                },
                success: function(response) {
                    Swal.close();
                    modalHideAndReset();
                    toastr.success(response.message);
                    $('#main-table').DataTable().ajax.reload();
                },
                error: function(response) {
                    Swal.close();

                    $('#warning-alert').removeClass('hidden').addClass('flex');

                    $('.warning-alert-message').html('');
                    $('.warning-alert-title').text('');

                    if (response.status === 422) {
                        $('.warning-alert-title').text(
                            'Ensure that these requirements are met:');

                        $.each(response.responseJSON.errors, function(indexInArray,
                            valueOfElement) {
                            $('.warning-alert-message').append('<li>' +
                                valueOfElement[0] + '</li>');
                        });
                    } else {
                        $('.warning-alert-title').text('Well, this is unexpected..');
                        $('.warning-alert-message').append('<li>' + response.responseJSON
                            .message + '</li>');
                    }
                }
            });
        }
    });
}

// editRecord = (url) => {
//     modalShowAndReset();
//     $('.modal-title').text('Edit Unit Rate');

//     $('#warning-alert').removeClass('flex').addClass('hidden');

//     $('.warning-alert-message').html('');
//     $('.warning-alert-title').text('');

//     $.ajax({
//         type: "get",
//         url: url,
//         dataType: "json",
//         success: function (response) {
//             $.each(response.form, function (index, value) { 
//                 $('#' + value[0]).val(value[1]);
//             });

//             $('#form_url').val(response.update_url);
//             $('#mainForm').attr('method', 'PUT');
//         }
//     });
// }

// deleteRecord = (url) => {
//     Swal.fire({
//         template: '#delete-template',
//     }).then((result) => {
//         if (result.isConfirmed) {
//             $.ajax({
//                 type: "post",
//                 url: url,
//                 data: {
//                     _token: CSRF_TOKEN,
//                     _method: 'DELETE',
//                 },
//                 beforeSend: function () {
//                     Swal.fire({
//                         title: 'Please wait...',
//                         allowOutsideClick: false,
//                         allowEscapeKey: false,
//                         didOpen: () => {
//                             Swal.showLoading()
//                         },
//                     })
//                 },
//                 success: function(response) {
//                     Swal.close();

//                     toastr.success(response.message);
//                     $('#main-table').DataTable().ajax.reload();
//                 },
//                 error: function(response) {
//                     Swal.close();

//                     $('#warning-alert').removeClass('hidden').addClass('flex');

//                     $('.warning-alert-message').html('');
//                     $('.warning-alert-title').text('');

//                     $('.warning-alert-title').text('Well, this is unexpected..');
//                     $('.warning-alert-message').append('<li>'+response.responseJSON.message+'</li>');
//                 }
//             });
//         }
//     });
// }

const $uploadExcelModal = document.getElementById('uploadExcelModal');
const uploadExcelModal = new Modal($uploadExcelModal);
let cancelUploadBtn = document.getElementById('cancelUploadBtn');
let closeUploadXlsIco = document.getElementById('closeUploadXlsIco');

openUploadForm = () => {
    modalUploadShowAndReset();
}

modalUploadShowAndReset = () => {
    uploadExcelModal.show();
}

cancelUploadBtn.onclick = function() {
    uploadExcelModal.hide();
    formUploadReset();    
}

closeUploadXlsIco.onclick = function() {
    uploadExcelModal.hide();
    formUploadReset();    
}

formUploadReset = () => {
    $("#filexls").val('');
}

preview_image = () => {
    var total_file = document.getElementById("photo_devices").files.length;
    for (var i = 0; i < total_file; i++) {
        var nameFile = event.target.files[i].name;
        var nameFileSpaces = nameFile.replace(/\s/g, "");
        var fileNameWithoutExtension = nameFileSpaces.replace(/\.[^/.]+$/, "");

        var imageId = "image-item-" + fileNameWithoutExtension;
        var imageIdArray = i;

        $("#image_preview").append(
            "<div id='" +
                imageId +
                "' class='image-item flex flex-col items-center'><img src='" +
                URL.createObjectURL(event.target.files[i]) +
                "' alt='Preview' class='max-w-full h-auto'><input type='text' name='input-" +
                imageId +
                "' placeholder='Image Description' class='mt-2 p-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'><a href='javascript:void(0)' class='delete-button mt-2 text-red-500' onclick=\"delete_image('" +
                nameFile +
                "','" +
                imageId +
                "')\">Delete</a>    </div>"
        );
    }
}

delete_image = (nameFile,imageId) => {
    removeFile(nameFile);
    $("#" + imageId).remove();
}

removeFile = (name) => {
    var attachments = document.getElementById("photo_devices").files; // <-- reference your file input here
    var fileBuffer = new DataTransfer();
    // append the file list to an array iteratively
    for (let i = 0; i < attachments.length; i++) {
        // Exclude file in specified index
        if (name !== attachments[i].name) fileBuffer.items.add(attachments[i]);
    }
    // Assign buffer to file input
    document.getElementById("photo_devices").files = fileBuffer.files; // <-- according to your file input reference
}