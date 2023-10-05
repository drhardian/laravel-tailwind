const $newModal = document.getElementById('newModal');
const modal = new Modal($newModal);

let cancelBtn = document.getElementById('cancelBtn');
let closeIco = document.getElementById('closeIco');

openForm = (url) => {
    modalShowAndReset();
    $('.modal-title').text('New Input PSV Data Master');
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
    $('.modal-title').text('Edit Input PSV Data Master');

    $('#warning-alert').removeClass('flex').addClass('hidden');

    $('.warning-alert-message').html('');
    $('.warning-alert-title').text('');

    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
        success: function (response) {
            // console.log(response);
            //GENERAL INFORMATION
            var areaOptions = new Option(response.dropdown.area, response.dropdown.area, true, true);
            $('#area').append(areaOptions).trigger('change');
            var flowOptions = new Option(response.dropdown.flow, response.dropdown.flow, true, true);
            $('#flow').append(flowOptions).trigger('change');
            var platformOptions = new Option(response.dropdown.platform, response.dropdown.platform, true, true);
            $('#platform').append(platformOptions).trigger('change');
            var statusOptions = new Option(response.dropdown.status, response.dropdown.status, true, true);
            $('#status').append(statusOptions).trigger('change');
            var demolishOptions = new Option(response.dropdown.demolish, response.dropdown.demolish, true, true);
            $('#demolish').append(demolishOptions).trigger('change');
            var reliefOptions = new Option(response.dropdown.relief, response.dropdown.relief, true, true);
            $('#relief').append(reliefOptions).trigger('change');
            //VALVE INFORMATION
            var size_inOptions = new Option(response.dropdown.size_in, response.dropdown.size_in, true, true);
            $('#size_in').append(size_inOptions).trigger('change');
            var rating_inOptions = new Option(response.dropdown.rating_in, response.dropdown.rating_in, true, true);
            $('#rating_in').append(rating_inOptions).trigger('change');
            var condi_inOptions = new Option(response.dropdown.condi_in, response.dropdown.condi_in, true, true);
            $('#condi_in').append(condi_inOptions).trigger('change');
            var size_outOptions = new Option(response.dropdown.size_out, response.dropdown.size_out, true, true);
            $('#size_out').append(size_outOptions).trigger('change');
            var rating_outOptions = new Option(response.dropdown.rating_out, response.dropdown.rating_out, true, true);
            $('#rating_out').append(rating_outOptions).trigger('change');
            var condi_outOptions = new Option(response.dropdown.condi_out, response.dropdown.condi_out, true, true);
            $('#condi_out').append(condi_outOptions).trigger('change');
            var manufactureOptions = new Option(response.dropdown.manufacture, response.dropdown.manufacture, true, true);
            $('#manufacture').append(manufactureOptions).trigger('change');
            var psvOptions = new Option(response.dropdown.psv, response.dropdown.psv, true, true);
            $('#psv').append(psvOptions).trigger('change');
            
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
    $('.modal-title').text('Import PSV Data Master');
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