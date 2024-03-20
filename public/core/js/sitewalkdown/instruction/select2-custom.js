$(document).ready(function () {
    $('.select2-option-ajax').select2({
        allowClear: true,
        tags: true,
        ajax: {
            url: function () {
                return $(this).attr('data-show');
            },
            type: 'GET',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                if( $(this).attr('data-reff') !== "" ) {
                    let splitReff = $(this).attr('data-reff').split(';');

                    if(splitReff.length == 2) {
                        var companyId = $('#' + splitReff[0]).val();
                        var areaId = null;
                    } else if(splitReff.length == 3) {
                        var companyId = $('#' + splitReff[0]).val();
                        var areaId = $('#' + splitReff[1]).val();
                    }

                    return {
                        search: params.term,
                        companyId: companyId,
                        areaId: areaId
                    };
                } else {
                    return {
                        search: params.term,
                    };
                }

            },
            processResults: function (response) {
                return {
                    results: response
                }
            },
            cache: true
        },
        placeholder: 'Search here..',
    });

    $('.select2-option-ajax').on('select2:select', function (e) {
        var paramsData = e.params.data.text;

        if(paramsData) {
            let url = $(this).attr("data-store");
            let dataForm = $(this).attr("data-form");
            let dataReffSplit = $(this).attr('data-reff').split(';');
            let dataChange = $(this).attr('data-change');

            if(url) {
                $.ajax({
                    url: url,
                    method: "POST",
                    data: {
                        _token: CSRF_TOKEN,
                        newoption: e.params.data.text,
                        companyId: dataReffSplit.length !== 0 ? dataReffSplit[0] !== "" ? $('#' + dataReffSplit[0]).val() :null :null,
                        areaId: dataReffSplit.length !== 0 ? dataReffSplit[1] !== "" ? $('#' + dataReffSplit[1]).val() :null :null
                    },
                    dataType: "json",
                    success: function (response) {
                        if(dataChange == "true") {
                            $('#' + dataForm).val(null).trigger('change');

                            var option = new Option(response.message.text, response.message.id, true, true);

                            $('#' + dataForm).append(option).trigger('change');
                            $('#' + dataForm).trigger('change');
                        } else {
                            if (response.updateOption == true) {
                                $('#' + dataForm).find("option[value='" + e.params.data.text + "']").remove();

                                var option = new Option(response.message.text, response.message.id, true, true);

                                $('#' + dataForm).append(option).trigger('change');
                                $('#' + dataForm).trigger('change');
                            }
                        }
                    }
                });
            }
        }
    });

    /* prepare for deletion */
    // $('.select2-option-ajax-new').on('select2:select', function (e) {
    //     let url = $(this).attr("data-store");
    //     let dataForm = $(this).attr("data-form");
    //     let dataReffSplit = $(this).attr('data-reff').split(';');
    //     let dataChange = $(this).attr('data-change');

    //     console.log([dataReffSplit, dataReffSplit.length]);

    //     $.ajax({
    //         url: url,
    //         method: "POST",
    //         data: {
    //             _token: CSRF_TOKEN,
    //             newoption: e.params.data.text,
    //             companyId: dataReffSplit.length !== 0 ? dataReffSplit[0] !== "" ? $('#' + dataReffSplit[0]).val() :null :null,
    //             areaId: dataReffSplit.length !== 0 ? dataReffSplit[1] !== "" ? $('#' + dataReffSplit[1]).val() :null :null
    //         },
    //         dataType: "json",
    //         success: function (response) {
    //             if(dataChange == "true") {
    //                 $('#' + dataForm).val(null).trigger('change');

    //                 var option = new Option(response.message.text, response.message.id, true, true);

    //                 $('#' + dataForm).append(option).trigger('change');
    //                 $('#' + dataForm).trigger('change');
    //             } else {
    //                 if (response.updateOption == true) {
    //                     $('#' + dataForm).find("option[value='" + e.params.data.text + "']").remove();

    //                     var option = new Option(response.message.text, response.message.id, true, true);

    //                     $('#' + dataForm).append(option).trigger('change');
    //                     $('#' + dataForm).trigger('change');
    //                 }
    //             }
    //         }
    //     });
    // });

    $('.select2-tagnum').select2({
        allowClear: true,
        width: 'resolve',
        tags: true,
        ajax: {
            url: function() {
                return $(this).attr('data-show');
            },
            type: 'GET',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    search: params.term,
                    company: $('#company_id').val(),
                    area: $('#area_id').val(),
                    otherarea: $('#area_others').val()
                };
            },
            processResults: function(response) {
                return {
                    results: response
                }
            }
        },
        placeholder: 'Search here...'
    });

    $('.select2-engineer').select2({
        allowClear: true,
        width: 'resolve',
        tags: false,
        ajax: {
            url: function() {
                return $(this).attr('data-show');
            },
            type: 'GET',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    search: params.term,
                    company: $('#company').val(),
                    area: $('#area').val(),
                    otherarea: $('#otherarea').val()
                };
            },
            processResults: function(response) {
                return {
                    results: response
                }
            }
        },
        placeholder: 'Search here...'
    });
});
