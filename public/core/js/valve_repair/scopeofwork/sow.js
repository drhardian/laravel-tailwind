const $newModalSow = document.getElementById("sowModal");
const modalsow = new Modal($newModalSow);

let cancelBtnSow = document.getElementById("cancelBtnSow");
let closeIcoSow = document.getElementById("closeSow");

openFormSow = (url) => {
    modalShowAndResetSow();
    $(".modal-title-sow").text("New Scope Of Work");
    $("#form_url_sow").val(url);
};

modalShowAndResetSow = () => {
    modalsow.show();
    formResetSow();
};

formResetSow = () => {
    $("#mainFormSow select,input").val(null).trigger("change");
    $("#mainFormSow").attr("method", "POST");
    $("#repair_report_id_sow").val(valveRepair.id);
};

closeIcoSow.onclick = function () {
    modalHideAndReset();
};

cancelBtnSow.onclick = function () {
    modalHideAndResetSow();
};

modalHideAndResetSow = () => {
    modalsow.hide();
    formResetSow();
};

saveRecordSow = () => {
    console.log($("#mainFormSow").attr("method"));
    Swal.fire({
        template: "#create-template",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: $("#form_url_sow").val(),
                data:
                    $("#mainFormSow").serialize() +
                    "&_token=" +
                    CSRF_TOKEN +
                    "&_method=" +
                    $("#mainFormSow").attr("method"),
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
                    modalHideAndResetSow();
                    toastr.success(response.message);
                    // $('#main-table').DataTable().ajax.reload();
                    $("#scope_of_work_id_table").DataTable().ajax.reload();
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
