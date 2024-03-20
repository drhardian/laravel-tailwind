loadCompanySelectbox = (company) => {
    var companyOption = new Option(company[1], company[0], true, true);
    $('#company_id').append(companyOption).trigger('change');
}

loadAreaSelectbox = (area) => {
    var areaOption = new Option(area[1], area[0], true, true);
    $('#area_id').append(areaOption).trigger('change');
}

loadOtherAreaSelectbox = (otherarea) => {
    $.each(otherarea, function (index, value) {
        var otherareaOption = new Option(value[1], value[0], true, true);
        $('#area_others').append(otherareaOption).trigger('change');
    });
}

loadTagNumberSelectbox = (tagnums) => {
    $.each(tagnums, function (index, value) {
        var tagnumOption = new Option(value, value, true, true);
        $('#tag_numbers').append(tagnumOption).trigger('change');
    });
}

loadEngineerSelectbox = (engineers) => {
    $.each(engineers, function (index, value) {
        $.each(value, function (index1, value1) {
            var engineerOption = new Option(value1, index1, true, true);
            $('#engineers').append(engineerOption).trigger('change');
        });
    });
}

function updateInstruction() {
    Swal.fire({
        template: '#create-template'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: $('#instruction_update_url').val(),
                data: $('#instructionForm').serialize(),
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
