const $newActivityModal = document.getElementById('newActivityModal');
const modalActivity = new Modal($newActivityModal);

let cancelActivityBtn = document.getElementById('cancelActivityBtn');
let closeActivityIco = document.getElementById('closeActivityIco');

openFormActivity = (url) => {
    modalActivityShowAndReset();
    $('.modal-title').text('New Activity');
    $('#form_activity_url').val(url);
}

modalActivityShowAndReset = () => {
    modalActivity.show();
    activityFormReset();
}

activityFormReset = () => {
    $("#activityForm select,input").val(null).trigger('change');
    $('#activityForm').attr('method', 'POST');
}

closeActivityIco.onclick = function() {
    modalActivityHideAndReset();
}

cancelActivityBtn.onclick = function() {
    modalActivityHideAndReset();
}

modalActivityHideAndReset = () => {
    modalActivity.hide();
    activityFormReset();    
}

saveActivityRecord = () => {
    Swal.fire({
        template: '#create-template',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: $('#form_activity_url').val(),
                data: $('#activityForm').serialize() + '&_token=' + CSRF_TOKEN + '&_method=' + $('#activityForm').attr('method'),
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
                    modalActivityHideAndReset();
                    toastr.success(response.message);
                    $('#activity-table').DataTable().ajax.reload();
                },
                error: function(response) {
                    Swal.close();

                    $('#warning-alert-activity').removeClass('hidden').addClass('flex');

                    $('.warning-alert-activity-message').html('');
                    $('.warning-alert-activity-title').text('');

                    if (response.status === 422) {
                        $('.warning-alert-activity-title').text(
                            'Ensure that these requirements are met:');

                        $.each(response.responseJSON.errors, function(indexInArray,
                            valueOfElement) {
                            $('.warning-alert-activity-message').append('<li>' +
                                valueOfElement[0] + '</li>');
                        });
                    } else {
                        $('.warning-alert-activity-title').text('Well, this is unexpected..');
                        $('.warning-alert-activity-message').append('<li>' + response.responseJSON
                            .message + '</li>');
                    }
                }
            });
        }
    });
}

editActivityRecord = (url) => {
    modalActivityShowAndReset();
    $('.modal-title').text('Edit Activity');

    $('#warning-alert-activity').removeClass('flex').addClass('hidden');

    $('.warning-alert-activity-message').html('');
    $('.warning-alert-activity-title').text('');

    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
        success: function (response) {
            $.each(response.activity_unitrate, function (index, value) { 
                var activityOptions = new Option(value[1], value[0], true, true);
                $('#unit_rate_id').append(activityOptions).trigger('change');
            });

            $.each(response.activity, function (index, value) { 
                $('#' + value[0]).val(value[1]);
            });

            $('#form_activity_url').val(response.update_url);
            $('#activityForm').attr('method', 'PUT');
        }
    });
}

deleteActivityRecord = (url) => {
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
                    $('#activity-table').DataTable().ajax.reload();
                },
                error: function(response) {
                    Swal.close();

                    $('#warning-alert-activity').removeClass('hidden').addClass('flex');

                    $('.warning-alert-activity-message').html('');
                    $('.warning-alert-activity-title').text('');

                    $('.warning-alert-activity-title').text('Well, this is unexpected..');
                    $('.warning-alert-activity-message').append('<li>'+response.responseJSON.message+'</li>');
                }
            });
        }
    });
}