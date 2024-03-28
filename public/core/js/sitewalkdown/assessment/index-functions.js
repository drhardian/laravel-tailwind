var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

browseInstructions = () => {
    $('#instruction-table').DataTable().ajax.reload();
}

function deleteInstruction(url) {
    Swal.fire({
        template: '#delete-template',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: url,
                data: {
                    _token: CSRF_TOKEN,
                    _method: 'DELETE'
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
                success: function (response) {
                    Swal.close();

                    toastr.success(response.message);

                    $('#instruction-table').DataTable().ajax.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    Swal.close();

                    if (jqXHR.status === 500) {
                        toastr.error(errorThrown);
                    }
                }
            });
        }
    });
}

$(document).ready(function () {
    $('#instruction-table').DataTable({
        language: {
			processing: "Loading. Please wait..."
        },
		responsive: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: {
            url: $('#instruction-table-url').val(),
            data: function (d) {
                d.actionBtn = 1;
            }
        },
        columns: [
            { data: 'instruction_num', name: 'instruction_num', class:'text-center' },
            { data: 'instruction_status', name: 'instruction_status', class:'text-center' },
            { data: 'instruction_period', name: 'instruction_period', class:'text-center' },
            { data: 'companyname', name: 'companyname' },
            { data: 'areaname', name: 'areaname' },
            { data: 'subarea', name: 'subarea' },
            { data: 'tagnumber', name: 'tagnumber' },
            { data: 'engineers', name: 'engineers' },
            { data: 'notes', name: 'notes' }
        ],
    });

    $('#assessment-table').DataTable({
		language: {
			processing: "Loading. Please wait..."
        },
		responsive: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: {
            url: $('#assessment-table-url').val(),
            data: function (d) {
                d.actionBtn = 3;
            }
        },
        columns: [
            { data: 'activity_date', name: 'activity_date', class:'text-center' },
            { data: 'tag_number', name: 'tag_number', class:'text-center' },
            { data: 'serial_number', name: 'serial_number', class:'text-center' },
            { data: 'instruction_number', name: 'instruction_number' },
            { data: 'company', name: 'company' },
            { data: 'servicelocation', name: 'servicelocation' },
            { data: 'healthstatus', name: 'healthstatus' },
            { data: 'inspectedby', name: 'inspectedby' },
            { data: 'actions', name: 'actions' },
        ],
        order: [0, 'desc'],
	});
});
