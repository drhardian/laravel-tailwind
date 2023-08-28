const $newModal = document.getElementById('newModal');
const modal = new Modal($newModal);

let cancelBtn = document.getElementById('cancelBtn');
let closeIco = document.getElementById('closeIco');

openForm = (url) => {
    modalShowAndReset();
    $('.modal-title').text('New Contract');
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
                data: $('#mainForm').serialize() + '&_token=' + CSRF_TOKEN + '&_method=' + $('#mainForm').attr('method') + '&client_id=' + $('#client_id').text(),
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

                    location.reload();
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
    $('.modal-title').text('Edit Contract');

    $('#warning-alert').removeClass('flex').addClass('hidden');

    $('.warning-alert-message').html('');
    $('.warning-alert-title').text('');

    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
        success: function (response) {
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

                    $('#' + response.cardId).remove();
                    // $('#main-table').DataTable().ajax.reload();
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