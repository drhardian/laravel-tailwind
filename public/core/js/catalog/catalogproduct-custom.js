const $newModal = document.getElementById('newModal');
const modal = new Modal($newModal);

let cancelBtn = document.getElementById('cancelBtn');
let closeIco = document.getElementById('closeIco');

openForm = (url) => {
    modalShowAndReset();
    $('.modal-title').text('New Input Product e-Proc');
    $('#form_url').val(url);
    $('#productmain_code_frame').show();
    $('#product_code_frame').show();
    $('#productsub_code_frame').show();
    $('#productgroup_code_frame').show();
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
            formData.append('_method',$('#mainForm').attr('method'));

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
    $('.modal-title').text('Edit Input Product e-Proc');

    $('#warning-alert').removeClass('flex').addClass('hidden');

    $('.warning-alert-message').html('');
    $('.warning-alert-title').text('');

    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
        success: function (response) {
            $('#productmain_code_frame').hide();
            $('#product_code_frame').hide();
            $('#productsub_code_frame').hide();
            $('#productgroup_code_frame').hide();
            // console.log(response);
            var productmain_codeOptions = new Option(response.dropdown.productmain_code, response.dropdown.productmain_code, true, true);
            $('#productmain_code').append(productmain_codeOptions).trigger('change');
            var product_codeOptions = new Option(response.dropdown.product_code, response.dropdown.product_code, true, true);
            $('#product_code').append(product_codeOptions).trigger('change');
            var productsub_codeOptions = new Option(response.dropdown.productsub_code, response.dropdown.productsub_code, true, true);
            $('#productsub_code').append(productsub_codeOptions).trigger('change');
            var productgroup_codeOptions = new Option(response.dropdown.productgroup_code, response.dropdown.productgroup_code, true, true);
            $('#productgroup_code').append(productgroup_codeOptions).trigger('change');
            var product_nameOptions = new Option(response.dropdown.product_name, response.dropdown.product_name, true, true);
            $('#product_name').append(product_nameOptions).trigger('change');
            var product_uomOptions = new Option(response.dropdown.product_uom, response.dropdown.product_uom, true, true);
            $('#product_uom').append(product_uomOptions).trigger('change');
            var inv_categoryOptions = new Option(response.dropdown.inv_category, response.dropdown.inv_category, true, true);
            $('#inv_category').append(inv_categoryOptions).trigger('change');


            $.each(response.form, function (index, value) { 
                $('#' + value[0]).val(value[1]);
            });

            $('#image_container').html('');
            $('#image_container').append(response.product_image);

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
    $('.modal-title').text('Import Catalog Product');
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