const $newModalOptionalservices = document.getElementById(
    "optionalservicesModal"
);

const modalOptionalservices = new Modal($newModalOptionalservices);

let cancelBtnOptionalservices = document.getElementById(
    "cancelBtnOptionalservices"
);
let closeIcoOptionalservices = document.getElementById(
    "closeIcoOptionalservices"
);

// modalCalibration.show();

openFormOptionalServices = (url) => {
    modalShowAndResetOptionalservices();
    $(".modal-title-isolation").text("OPTIONAL SERVICES");
    // optionalservicesCheck(url);
    goToValvePretest();
};

cancelBtnOptionalservices.onclick = function () {
    modalHideAndResetOptionalservices();
};

modalShowAndResetOptionalservices = () => {
    modalOptionalservices.show();
    formResetOptionalservices();
};

modalHideAndResetOptionalservices = () => {
    modalOptionalservices.hide();
    formResetConstruction();
};

closeIcoOptionalservices.onclick = function () {
    modalHideAndResetOptionalservices();
};

formResetOptionalservices = () => {
    var forms = $("#form_id_optionalservices").val();
    if (forms) {
        $("#" + forms).each(function () {
            this.reset();
        });
        $("#" + forms).attr("method", "POST");
    }
};

saveRecordIsolationOptionalservices = () => {
    var form_url = $("#form_url_optionalservices").val();
    var form_id_name = $("#form_id_optionalservices").val();
    Swal.fire({
        template: "#create-template",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: form_url,
                data:
                    $("#" + form_id_name).serialize() +
                    "&repair_report_id=" +
                    valveRepair.id +
                    "&scope_of_work_id=" +
                    scopeofwork.id +
                    "&_token=" +
                    CSRF_TOKEN +
                    "&_method=" +
                    $("#" + form_id_name).attr("method"),
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
                    modalHideAndResetOptionalservices();
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

optionalservicesCheck = (url) => {
    // $.ajax({
    //     type: "get",
    //     url: url,
    //     dataType: "json",
    //     data:{
    //         scopeofworkid : scopeofwork.id,
    //         valveRepairid : valveRepair.id
    //     },
    //     beforeSend: function () {
    //         Swal.fire({
    //             title: "Please wait...",
    //             allowOutsideClick: false,
    //             allowEscapeKey: false,
    //             didOpen: () => {
    //                 Swal.showLoading();
    //             },
    //         });
    //     },
    //     success: function (response) {
    //         if (response.datastatus == "empty") {
    //             $("#form_url_optionalservices").val(response.url);
    //             $("#form_optionalservices").attr("method", "POST");
    //             Swal.close();
    //         } else {
    //             $.each(response.data, function (index, value) {
    //                 $("#" + index).val(value);
    //             });
    //             $("#form_url_optionalservices").val(response.url);
    //             $("#form_optionalservices").attr("method", "PUT");
    //             Swal.close();
    //         }
    //     },
    //     error: function (response) {
    //         Swal.close();
    //         $("#warning-alert").removeClass("hidden").addClass("flex");
    //         $(".warning-alert-message").html("");
    //         $(".warning-alert-title").text("");
    //         $(".warning-alert-title").text("Well, this is unexpected..");
    //         $(".warning-alert-message").append(
    //             "<li>" + response.responseJSON.message + "</li>"
    //         );
    //     },
    // });
};

// Get a reference to the checkbox
const val_valvepretest_checkbox = document.getElementById(
    "valvepretest_checkbox"
);

// Add an event listener to the checkbox
val_valvepretest_checkbox.addEventListener("change", () => {
    const val_valvepretest = document.getElementById("valvepretest");

    if (val_valvepretest_checkbox.checked) {
        val_valvepretest.style.display = "none";
    } else {
        val_valvepretest.style.display = "block";
    }
});

function copyDropdownValues() {
    // Array of dropdown ids to copy values from
    const sourceDropdownIds = [
        "mv_body",
        "mv_pdb",
        "mv_stem_shaft",
        "mv_cage",
        "mv_seat",
        "mv_bushing",
        "mv_body_bonnet",
        "mv_gasket",
    ];

    // Loop through each source dropdown
    sourceDropdownIds.forEach((sourceId) => {
        // Get the selected value from the source dropdown
        const selectedValue = document.getElementById(
            sourceId + "_found"
        ).value;

        // Get the target dropdown by appending '_copy' to the source dropdown id
        const targetId = sourceId + "_left";
        const targetDropdown = document.getElementById(targetId);

        // Set the selected value in the target dropdown
        targetDropdown.value = selectedValue;
    });
}

// Get a reference to the checkbox
const val_materialverify_checkbox = document.getElementById(
    "material_verification_checkbox"
);

// Add an event listener to the checkbox
val_materialverify_checkbox.addEventListener("change", () => {
    const val_materialverifcontent = document.getElementById(
        "materialverificationcontent"
    );

    if (val_materialverify_checkbox.checked) {
        val_materialverifcontent.style.display = "none";
    } else {
        val_materialverifcontent.style.display = "block";
    }
});

// Get a reference to the checkbox
const val_sliding_stemcontent_checkbox = document.getElementById(
    "sliding_stemcontent_checkbox"
);

// Add an event listener to the checkbox
val_sliding_stemcontent_checkbox.addEventListener("change", () => {
    const val_slidingstemcontent =
        document.getElementById("slidingstemcontent");

    if (val_sliding_stemcontent_checkbox.checked) {
        val_slidingstemcontent.style.display = "none";
    } else {
        val_slidingstemcontent.style.display = "block";
    }
});

function goToValvePretest() {
    var valvepretestdataClick = document.getElementById("valvepretestdata-tab");
    if (valvepretestdataClick) {
        valvepretestdataClick.click();
    }
}

// var saveButtonAction = document.getElementById("saveButtonAction");
var valvepretestdataClick = document.getElementById("valvepretestdata-tab");

// Add an onclick event handler
valvepretestdataClick.onclick = function () {
    var dataUrl = valvepretestdataClick.getAttribute("data-url");
    var forms = valvepretestdataClick.getAttribute("data-form");
    $("#form_url_optionalservices").val(dataUrl);
    $("#form_id_optionalservices").val(forms);
    // formResetConstruction();
    $("#" + forms).attr("method", "POST");
    var url = dataUrl + "/" + scopeofwork.id + "?valverepair=" + valveRepair.id;
    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
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
            if (response.status == "empty") {
                // if(scopeofwork.scope_of_work_id != 1){
                //     hideLeftFormConstruction("body_construction_left");
                // }
                Swal.close();
            } else {
                console.log(response.data);
                if (response.data.valvepretest_checkbox == 1) {
                    const val_valvepretest =
                        document.getElementById("valvepretest");
                    val_valvepretest.style.display = "none";
                    var valvepretest_checkbox = $("#valvepretest_checkbox");
                    valvepretest_checkbox.prop(
                        "checked",
                        response.data.valvepretest_checkbox == 1
                    );
                } else {
                    $.each(response.data, function (index, value) {
                        $("#" + index).val(value);
                    });
                }
                Swal.close();
                $("#form_url_optionalservices").val(response.update_url);
                $("#" + forms).attr("method", "PUT");
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
};

// var saveButtonAction = document.getElementById("saveButtonAction");
var materialverificationtabClick = document.getElementById(
    "materialverification-tab"
);

// Add an onclick event handler
materialverificationtabClick.onclick = function () {
    var dataUrl = materialverificationtabClick.getAttribute("data-url");
    var forms = materialverificationtabClick.getAttribute("data-form");
    $("#form_url_optionalservices").val(dataUrl);
    $("#form_id_optionalservices").val(forms);
    $("#" + forms).attr("method", "POST");
    var url = dataUrl;
    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
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
            if (response.status == "empty") {
                // if(scopeofwork.scope_of_work_id != 1){
                //     hideLeftFormConstruction("body_construction_left");
                // }
                Swal.close();
            } else {
                if (response.data.material_verification_checkbox == 1) {
                    const materialverificationcontent = document.getElementById(
                        "materialverificationcontent"
                    );
                    materialverificationcontent.style.display = "none";
                    var material_verification_checkbox = $(
                        "#material_verification_checkbox"
                    );
                    material_verification_checkbox.prop(
                        "checked",
                        response.data.material_verification_checkbox == 1
                    );
                } else {
                    $.each(response.data, function (index, value) {
                        $("#" + index).val(value);
                    });
                }
                Swal.close();
                $("#form_url_optionalservices").val(response.update_url);
                $("#" + forms).attr("method", "PUT");
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
};
