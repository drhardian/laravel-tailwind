const $newModalCalibration = document.getElementById("calibrationModal");
const modalCalibrations = new Modal($newModalCalibration);

let cancelBtnCalibration = document.getElementById("cancelBtnCalibration");
let closeIcoCalibration = document.getElementById("closeIcoCalibration");


// modalCalibration.show();

openFormCalibration= (url) => {
    modalShowAndResetCalibration();
    $(".modal-title-isolation").text(
        "CALIBRATION"
    );
    calibrationCheck(url);
    // goTobodyIsolation();
};

cancelBtnCalibration.onclick = function () {
    modalHideAndResetCalibration();
};

modalShowAndResetCalibration = () => {
    modalCalibrations.show();
    formResetCalibration();
};

modalHideAndResetCalibration = () => {
    modalCalibrations.hide();
    formResetConstruction();
};

closeIcoCalibration.onclick = function () {
    modalHideAndResetCalibration();
};

formResetCalibration = () => {
    var forms = $("#form_id_calibration").val();
    if (forms) {
        $("#" + forms).each(function () {
            this.reset();
        });
        $("#" + forms).attr("method", "POST");
    }
};

saveRecordIsolationCalibration = () => {
    var form_url = $("#form_url_calibration").val();
    Swal.fire({
        template: "#create-template",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: form_url,
                data:
                    $("#form_calibration").serialize() +
                    "&repair_report_id=" +
                    valveRepair.id +
                    "&scope_of_work_id=" +
                    scopeofwork.id +
                    "&_token=" +
                    CSRF_TOKEN +
                    "&_method=" +
                    $("#form_calibration").attr("method"),
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
                    Swal.close();
                    modalHideAndResetCalibration();
                    toastr.success(response.message);
                    $("#main-table").DataTable().ajax.reload();
                },
                error: function (response) {
                    Swal.close();

                    $("#warning-alert").removeClass("hidden").addClass("flex");

                    $(".warning-alert-message").html("");
                    $(".warning-alert-title").text("");

                    if (response.status === 422) {
                        $(".warning-alert-title").text(
                            "Ensure that these requirements are met:"
                        );

                        $.each(
                            response.responseJSON.errors,
                            function (indexInArray, valueOfElement) {
                                $(".warning-alert-message").append(
                                    "<li>" + valueOfElement[0] + "</li>"
                                );
                            }
                        );
                    } else {
                        $(".warning-alert-title").text(
                            "Well, this is unexpected.."
                        );
                        $(".warning-alert-message").append(
                            "<li>" + response.responseJSON.message + "</li>"
                        );
                    }
                },
            });
        }
    });
};


calibrationCheck = (url) => {
    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
        data:{
            scopeofworkid : scopeofwork.id,
            valveRepairid : valveRepair.id
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
            if (response.datastatus == "empty") {
                $("#form_url_calibration").val(response.url);
                $("#form_calibration").attr("method", "POST");
                Swal.close();
            } else {
                $.each(response.data, function (index, value) {
                    $("#" + index).val(value);
                });
                $("#form_url_calibration").val(response.url);
                $("#form_calibration").attr("method", "PUT");
                Swal.close();
            }
        },
        error: function (response) {
            Swal.close();

            $("#warning-alert").removeClass("hidden").addClass("flex");

            $(".warning-alert-message").html("");
            $(".warning-alert-title").text("");

            $(".warning-alert-title").text("Well, this is unexpected..");
            $(".warning-alert-message").append(
                "<li>" + response.responseJSON.message + "</li>"
            );
        },
    });
}
