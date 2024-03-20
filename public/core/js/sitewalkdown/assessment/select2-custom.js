$(document).ready(function () {
    $(".select2").select2({
        allowClear: true,
        placeholder: "Select here..",
    });

    $(".select2-option-ajax").select2({
        allowClear: true,
        tags: true,
        ajax: {
            url: function () {
                return $(this).attr("data-show");
            },
            type: "GET",
            dataType: "json",
            delay: 250,
            data: function (params) {
                if ($(this).attr("data-reff") !== "") {
                    let splitReff = $(this).attr("data-reff").split(";");

                    if (splitReff.length == 2) {
                        if (splitReff[0] == "company_id") {
                            var companyId = $("#" + splitReff[0]).val();
                            var areaId = null;
                        } else if (splitReff[0] == "location_type_id") {
                            var locationType = $("#" + splitReff[0]).val();
                        }
                    } else if (splitReff.length == 3) {
                        var companyId = $("#" + splitReff[0]).val();
                        var areaId = $("#" + splitReff[1]).val();
                        var locationType = null;
                    }

                    return {
                        search: params.term,
                        companyId: companyId,
                        areaId: areaId,
                        locationType: locationType,
                    };
                } else {
                    return {
                        search: params.term,
                    };
                }
            },
            processResults: function (response) {
                return {
                    results: response,
                };
            },
            cache: true,
        },
        placeholder: "Search here..",
    });

    $(".select2-option-ajax").on("select2:select", function (e) {
        var paramsData = e.params.data.text;

        if (paramsData) {
            let url = $(this).attr("data-store");
            let dataForm = $(this).attr("data-form");
            let dataReffSplit = $(this).attr("data-reff").split(";");
            let dataChange = $(this).attr("data-change");

            if (dataForm == "device_type_id") {
                showAssessmentForm($(this).attr("data-alias"), dataForm);
                // showValveInformationForm($(this).attr("data-alias"), dataForm);
            }

            if (url) {
                $.ajax({
                    url: url,
                    method: "POST",
                    data: {
                        _token: CSRF_TOKEN,
                        newoption: paramsData,
                        companyId:
                            dataReffSplit.length !== 0
                                ? dataReffSplit[0] !== ""
                                    ? $("#" + dataReffSplit[0]).val()
                                    : null
                                : null,
                        areaId:
                            dataReffSplit.length !== 0
                                ? dataReffSplit[1] !== ""
                                    ? $("#" + dataReffSplit[1]).val()
                                    : null
                                : null,
                        locationType:
                            dataReffSplit.length !== 0
                                ? dataReffSplit[0] !== ""
                                    ? $("#" + dataReffSplit[0]).val()
                                    : null
                                : null,
                    },
                    dataType: "json",
                    success: function (response) {
                        if (dataChange == "true") {
                            $("#" + dataForm)
                                .val(null)
                                .trigger("change");

                            var option = new Option(
                                response.message.text,
                                response.message.id,
                                true,
                                true
                            );

                            $("#" + dataForm)
                                .append(option)
                                .trigger("change");
                            $("#" + dataForm).trigger("change");
                        } else {
                            if (response.updateOption == true) {
                                $("#" + dataForm)
                                    .find(
                                        "option[value='" +
                                            e.params.data.text +
                                            "']"
                                    )
                                    .remove();

                                var option = new Option(
                                    response.message.text,
                                    response.message.id,
                                    true,
                                    true
                                );

                                $("#" + dataForm)
                                    .append(option)
                                    .trigger("change");
                                $("#" + dataForm).trigger("change");
                            }
                        }
                    },
                });
            }
        }
    });

    $(".select2-option-ajax").on("change", function (e) {
        if ($(this).attr("data-form") == "location_type_id") {
            $("#" + $(this).attr("data-reset-reff"))
                .val("")
                .trigger("change");
        }
    });
});

function showValveInformationForm(url, dataForm) {
    $.ajax({
        type: "get",
        url: url,
        data: {
            deviceTypeId: $("#" + dataForm).val(),
            formId: "valve-info",
        },
        beforeSend: function () {
            Swal.fire({
                title: "Please wait...",
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                },
            });
        },
        success: function (response) {
            $("#valveInformationFormByDeviceType").html("");
            $("#valveInformationFormByDeviceType").html(response);
        },
    });
}

function showAssessmentForm(url, dataForm) {
    $(".tab2menu").addClass("hidden");
    $.ajax({
        type: "get",
        url: url,
        data: {
            deviceTypeId: $("#" + dataForm).val(),
            formId: "assessment-form",
        },
        success: function (response) {
            $("#assessmentFormByDeviceType").html("");
            // $('#assessmentFormByDeviceType').html(response);

            setTimeout(() => {
                selectDropdownAjax();
                $(".tab3menu, .tab4menu").remove();
                $(".tab2menu").removeClass("hidden");
                $(".tab2menu").addClass("inline-block");
                Swal.close();
            }, 1500);

            $("#health_level_rating").val("");
            $("#health_priority_rating").val("");
            $("#health_priority_rating_color").css("background-color", "white");
        },
    });
}

function selectDropdownAjax() {
    $(".select2-static").select2({
        allowClear: true,
        placeholder: "Select here..",
    });

    $(".select2-dropdown-ajax").select2({
        allowClear: true,
        tags: true,
        ajax: {
            url: function () {
                return $(this).attr("data-show");
            },
            type: "GET",
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    search: params.term,
                    alias: $(this).attr("data-alias"),
                    datascope: $(this).attr("data-scope"),
                    devicetype: $("#device_type_id").val(),
                };
            },
            processResults: function (response) {
                return {
                    results: response,
                };
            },
            error: function (response) {
                if (response.status == 500) {
                    toastr.error(response.responseJSON.message);
                }
            },
            cache: true,
        },
        placeholder: "Search here..",
    });

    $(".select2-dropdown-ajax").on("select2:select", function (e) {
        var paramsData = e.params.data.text;

        if (paramsData) {
            var url = $(this).attr("data-store");
            var dataForm = $(this).attr("data-form");
            var dataChange = $(this).attr("data-change");
            var alias = $(this).attr("data-alias");
            var dataScope = $(this).attr("data-scope");
            var dataReff = $(this).attr("data-reff");
            var dataReffReset = $(this).attr("data-reff-reset");

            if (url) {
                $.ajax({
                    url: url,
                    method: "POST",
                    data: {
                        _token: CSRF_TOKEN,
                        newoption: paramsData,
                        alias: alias,
                        datascope: dataScope,
                        datareff: $("#" + dataReff).val(),
                        devicetype: $("#device_type_id").val(),
                        criticalityLevel: $("#criticality_level_id").val(),
                    },
                    dataType: "json",
                    success: function (response) {
                        if (dataReffReset == "true") {
                            $("#" + dataReff)
                                .val(null)
                                .trigger("change");

                            var option = new Option(
                                response.message.healthRatingText,
                                response.message.healthRatingId,
                                true,
                                true
                            );

                            $("#" + dataReff)
                                .append(option)
                                .trigger("change");
                            $("#" + dataReff).trigger("change");

                            $("#health_level_rating").val(
                                response.message.healthLevelRating
                            );
                            $("#health_priority_rating").val(
                                response.message.healthPriorityRating.title
                            );
                            $("#health_priority_rating_color").css(
                                "background-color",
                                response.message.healthPriorityRating.color
                            );
                        }

                        if (dataChange == "true") {
                            $("#" + dataForm)
                                .val(null)
                                .trigger("change");

                            var option = new Option(
                                response.message.text,
                                response.message.id,
                                true,
                                true
                            );

                            $("#" + dataForm)
                                .append(option)
                                .trigger("change");
                            $("#" + dataForm).trigger("change");
                        }
                    },
                    error: function (response) {
                        if (response.status == 500) {
                            toastr.error(response.responseJSON.message);
                        }

                        $("#" + dataForm)
                            .val("")
                            .trigger("change");
                    },
                });
            }
        }
    });

    $(".select2-multiple").select2({
        allowClear: true,
        tags: true,
        ajax: {
            url: function () {
                return $(this).attr("data-show");
            },
            type: "GET",
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    search: params.term,
                    alias: $(this).attr("data-alias"),
                    datascope: $(this).attr("data-scope"),
                    devicetype: $("#device_type_id").val(),
                };
            },
            processResults: function (response) {
                return {
                    results: response,
                };
            },
            cache: true,
        },
        placeholder: "Search here...",
    });

    $(".select2-multiple-new").on("select2:select", function (e) {
        var url = $(this).attr("data-store");
        var alias = $(this).attr("data-alias");
        var dataScope = $(this).attr("data-scope");
        var dataReff = $(this).attr("data-reff");
        var newoption = e.params.data.text;

        var data = {
            _token: CSRF_TOKEN,
            newoption: newoption,
            alias: alias,
            datascope: dataScope,
            datareff: $("#" + dataReff).val(),
            devicetype: $("#device_type_id").val(),
        };

        $.ajax({
            url: url,
            method: "POST",
            data: data,
            dataType: "json",
            error: function (xhr) {
                toastr.error(xhr.responseJSON.error);
            },
        });
    });
}
