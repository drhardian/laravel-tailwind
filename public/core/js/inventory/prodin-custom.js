const $newModal = document.getElementById('newModal');
const modal = new Modal($newModal);

let cancelBtn = document.getElementById('cancelBtn');
let closeIco = document.getElementById('closeIco');

openForm = (url) => {
    modalShowAndReset();
    $('.modal-title').text('New Input Product In');
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
            const formInput = $('#mainForm')[0];
            const formData = new FormData(formInput);

            $.ajax({
                type: "post",
                url: $('#form_url').val(),
                data: formData,
                // data: $('#mainForm').serialize() + '&_token=' + CSRF_TOKEN + '&_method=' + $('#mainForm').attr('method'),
                contentType: false,
                processData: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
                },
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

editRecord = (url) => {
    modalShowAndReset();
    $('.modal-title').text('Edit Input Product In');

    $('#warning-alert').removeClass('flex').addClass('hidden');

    $('.warning-alert-message').html('');
    $('.warning-alert-title').text('');

    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
        success: function (response) {
            // console.log(response);
            var inv_ownerOptions = new Option(response.dropdown.inv_owner, response.dropdown.inv_owner, true, true);
            $('#inv_owner').append(inv_ownerOptions).trigger('change');
            var inv_uomOptions = new Option(response.dropdown.inv_uom, response.dropdown.inv_uom, true, true);
            $('#inv_uom').append(inv_uomOptions).trigger('change');
            var stock_locOptions = new Option(response.dropdown.stock_loc, response.dropdown.stock_loc, true, true);
            $('#stock_loc').append(stock_locOptions).trigger('change');

            $.each(response.form, function (index, value) { 
                $('#' + value[0]).val(value[1]);
            });

            $('#form_url').val(response.update_url);
            $('#mainForm').attr('method', 'PUT');
        }
    });
}

deleteRecord = (url) => {
    Swal.fire({
        template: '#delete-template',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: url,
                data: {
                    _token: CSRF_TOKEN,
                    _method: 'DELETE',
                },
                beforeSend: function () {
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

                    toastr.success(response.message);
                    $('#main-table').DataTable().ajax.reload();
                },
                error: function(response) {
                    Swal.close();

                    $('#warning-alert').removeClass('hidden').addClass('flex');

                    $('.warning-alert-message').html('');
                    $('.warning-alert-title').text('');

                    $('.warning-alert-title').text('Well, this is unexpected..');
                    $('.warning-alert-message').append('<li>'+response.responseJSON.message+'</li>');
                }
            });
        }
    });
}

const $uploadExcelModal = document.getElementById('uploadExcelModal');
const uploadExcelModal = new Modal($uploadExcelModal);
let cancelUploadBtn = document.getElementById('cancelUploadBtn');
let closeUploadXlsIco = document.getElementById('closeUploadXlsIco');

openUploadForm = () => {
    modalUploadShowAndReset();
    $('.modal-title').text('Import Product In');
    $('#form_url').val(url);
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