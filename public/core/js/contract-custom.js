const $newCostingModal = document.getElementById('newCostingModal');
const modalCosting = new Modal($newCostingModal);

let cancelCostingBtn = document.getElementById('cancelCostingBtn');
let closeCostingIco = document.getElementById('closeCostingIco');

openFormCosting = (url) => {
    modalCostingShowAndReset();
    $('.modal-title').text('New Costing Item');
    $('#form_costing_url').val(url);
}

cancelCostingBtn.onclick = function() {
    modalCostingHideAndReset();
}

closeCostingIco.onclick = function() {
    modalCostingHideAndReset();
}

modalCostingShowAndReset = () => {
    modalCosting.show();
    costingFormReset();
}

modalCostingHideAndReset = () => {
    modalCosting.hide();
    costingFormReset();    
}

costingFormReset = () => {
    $("#costingForm select,input").val(null).trigger('change');
}

saveCostingRecord = () => {
    Swal.fire({
        template: '#create-template',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: $('#form_costing_url').val(),
                data: $('#costingForm').serialize() + '&client_id=' + $('#clientid').text() +
                    '&contract_id=' + $('#contractid').text() + '&_token=' + CSRF_TOKEN +
                    '&_method=' + $('#costingForm').attr('method'),
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
                    modalCostingHideAndReset();
                    toastr.success(response.message);
                    $('#costing-table').DataTable().ajax.reload();
                },
                error: function(response) {
                    Swal.close();

                    $('#warning-alert-costing').removeClass('hidden').addClass('flex');

                    $('.warning-alert-costing-message').html('');
                    $('.warning-alert-costing-title').text('');

                    if (response.status === 422) {
                        $('.warning-alert-costing-title').text(
                            'Ensure that these requirements are met:');

                        $.each(response.responseJSON.errors, function(indexInArray,
                            valueOfElement) {
                            $('.warning-alert-costing-message').append('<li>' +
                                valueOfElement[0] + '</li>');
                        });
                    } else {
                        $('.warning-alert-costing-title').text('Well, this is unexpected..');
                        $('.warning-alert-costing-message').append('<li>' + response.responseJSON
                            .message + '</li>');
                    }
                }
            });
        }
    });
}

editCostingRecord = (url) => {
    modalCostingShowAndReset();
    $('.modal-title').text('Edit Costing Item');

    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
        success: function(response) {
            var itemOptions = new Option(response.item_id.text, response.item_id.id, true, true);
            $('#item_id').append(itemOptions).trigger('change');

            var unitrateOptions = new Option(response.unit_rate_id.text, response.unit_rate_id.id,
                true, true);
            $('#unit_rate_id').append(unitrateOptions).trigger('change');

            $('#price').val(response.price);

            $('#form_costing_url').val(response.update_url);
            $('#costingForm').attr('method', 'PUT');
        }
    });
}

deleteCostingRecord = (url) => {
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
                    $('#costing-table').DataTable().ajax.reload();
                },
                error: function(response) {
                    Swal.close();

                    $('#warning-alert-costing').removeClass('hidden').addClass('flex');

                    $('.warning-alert-costing-message').html('');
                    $('.warning-alert-costing-title').text('');

                    $('.warning-alert-costing-title').text('Well, this is unexpected..');
                    $('.warning-alert-costing-message').append('<li>'+response.responseJSON.message+'</li>');
                }
            });
        }
    });
}

const $newActivityModal = document.getElementById('newActivityModal');
const modalActivity = new Modal($newActivityModal);

let cancelActivityBtn = document.getElementById('cancelActivityBtn');
let closeActivityIco = document.getElementById('closeActivityIco');

openFormActivity = (url) => {
    modalActivityShowAndReset();
    $('.modal-title').text('New Actvitiy');
    $('#form_activity_url').val(url);
}

modalActivityShowAndReset = () => {
    modalActivity.show();
    activityFormReset();
}

activityFormReset = () => {
    $("#activityForm select,input").val(null).trigger('change');
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
                data: $('#activityForm').serialize() + '&contract_id=' + $('#contractid').text() + '&_token=' + CSRF_TOKEN +
                    '&_method=' + $('#activityForm').attr('method'),
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
    $('.modal-title').text('Edit Activity Item');

    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
        success: function (response) {
            var activityOptions = new Option(response.activity_id.text, response.activity_id.id, true, true);
            $('#activity_id').append(activityOptions).trigger('change');

            $('#value').val(response.value);

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