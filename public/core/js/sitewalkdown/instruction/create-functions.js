function saveInstruction(id) {
    Swal.fire({
        template: '#create-template'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: $('#instruction_store_url').val(),
                data: $('#instructionForm').serialize() + '&nextPage=' + id,
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
                    window.location.replace(response.url);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    Swal.close();

                    if (jqXHR.status === 500) {
                        console.log(errorThrown);
                        toastr.error(errorThrown);
                    } else if (jqXHR.status === 422) {
                        toastr.error(errorThrown);

                        let errArr = "";
                        $.each(jqXHR.responseJSON.errors, function (index, value) {
                            errArr = errArr + "<li><i class=\"fa-solid fa-circle mr-3 fa-2xs text-warning\"></i>" + value + "</li>";
                        });

                        $('#errors').show().html(
                            "<div class=\"alert alert-warning mb-5\">" +
                                "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">" +
                                "<span aria-hidden=\"true\">&times;</span> </button>" +
                                "<h3 class=\"text-warning\"><i class=\"fa fa-exclamation-circle\"></i> Warning</h3>" +
                                "<ul>" +
                                    errArr +
                                "</ul>" +
                            "</div>");
                    } else {
                        console.log([jqXHR, textStatus, errorThrown]);
                    }
                }
            });
        }
    });
}
