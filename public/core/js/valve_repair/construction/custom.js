const $newModalConstruction = document.getElementById("constructionModal");
const modalConstruction = new Modal($newModalConstruction);

let cancelBtnConstruction = document.getElementById("cancelBtnConstruction");
let closeIcoConstruction = document.getElementById("closeIcoConstruction");

document.addEventListener("DOMContentLoaded", function () {
    // goTobodyIsolation();
});

openFormConstruction = (url) => {
    modalShowAndResetConstruction();
    $(".modal-title-isolation").text(
        "CONSTRUCTION - ACTUATOR [ISOLATION VALVE]"
    );
    goTobodyIsolation();
    // $("#form_url_construction").val(url);
};

modalShowAndResetConstruction = () => {
    modalConstruction.show();
    formResetConstruction();
};

formResetConstruction = () => {
    var forms = bodyIsolationClick.getAttribute("data-form");

    $("#" + forms + " select,input, textarea")
        .val(null)
        .trigger("change");
    $("#" + forms).attr("method", "POST");
};

closeIcoConstruction.onclick = function () {
    modalHideAndResetCosntruction();
};

cancelBtnConstruction.onclick = function () {
    modalHideAndResetCosntruction();
};
modalHideAndResetCosntruction = () => {
    modalConstruction.hide();
    formResetConstruction();
};

// Get a reference to the checkbox
const checkbox_construction = document.getElementById(
    "checkbox_body_construction_isolation_valve"
);

// Add an event listener to the checkbox
checkbox_construction.addEventListener("change", () => {
    bodyCheckBox();
});

bodyCheckBox = () => {
    const elements_construction = document.querySelectorAll('[id^="bc_"]');
    const body_construction_found_id = document.getElementById(
        "body_construction_found"
    );
    const body_construction_left_id = document.getElementById(
        "body_construction_left"
    );
    const body_construction_note = document.getElementById("bc_note");
    const body_construction_note_div = document.getElementById(
        "body_construction_note_div"
    );

    elements_construction.forEach((element) => {
        element.disabled = !checkbox_construction.checked;
        // Jika checkbox dicentang, hapus kelas 'opacity-50' untuk mengurangi transparansi
        if (checkbox_construction.checked) {
            element.setAttribute("disabled", "disabled");
            element.classList.add("cursor-not-allowed");
            body_construction_found_id.style.display = "none";
            body_construction_left_id.style.display = "none";
            body_construction_note_div.style.display = "none";
            body_construction_note.setAttribute("disabled", "disabled");
        } else {
            element.removeAttribute("disabled");
            element.classList.remove("cursor-not-allowed");
            body_construction_found_id.style.display = "block";
            body_construction_left_id.style.display = "block";
            body_construction_note_div.style.display = "block";
            body_construction_note.removeAttribute("disabled");
        }
    });
};

const checkbox_actuator = document.getElementById(
    "checkbox_actuator_isolation_valve"
);

// Add an event listener to the checkbox
checkbox_actuator.addEventListener("change", () => {
    const elements_actuator = document.querySelectorAll(
        '[id^="actuator_construction_"]'
    );
    const actuator_construction_found_id = document.getElementById(
        "actuator_construction_found"
    );
    const actuator_construction_left_id = document.getElementById(
        "actuator_construction_left"
    );
    const actuator_construction_note =
        document.getElementById("body_actuator_note");
    const ctuator_construction_note_div = document.getElementById(
        "actuator_construction_note_div"
    );

    elements_actuator.forEach((element) => {
        element.disabled = !checkbox_actuator.checked;
        // Jika checkbox_actuator dicentang, hapus kelas 'opacity-50' untuk mengurangi transparansi
        if (checkbox_actuator.checked) {
            element.setAttribute("disabled", "disabled");
            element.classList.add("cursor-not-allowed");
            actuator_construction_found_id.style.display = "none";
            actuator_construction_left_id.style.display = "none";
            ctuator_construction_note_div.style.display = "none";
            actuator_construction_note.setAttribute("disabled", "disabled");
        } else {
            element.removeAttribute("disabled");
            element.classList.remove("cursor-not-allowed");
            actuator_construction_found_id.style.display = "block";
            actuator_construction_left_id.style.display = "block";
            ctuator_construction_note_div.style.display = "block";
            actuator_construction_note.removeAttribute("disabled");
        }
    });
});

// var saveButtonAction = document.getElementById("saveButtonAction");
var bodyIsolationClick = document.getElementById("BodyIsolation-tab");

// Add an onclick event handler
bodyIsolationClick.onclick = function () {
    var dataUrl = bodyIsolationClick.getAttribute("data-url");
    var forms = bodyIsolationClick.getAttribute("data-form");
    $("#form_url_construction").val(dataUrl);
    $("#form_id_construction").val(forms);
    $("#" + forms).attr("method", "POST");
    var url = dataUrl + "/" + valveRepair.id;

    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
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
            // $.each(response.form, function(key, value) {
            //     // Find the input element with the corresponding ID
            //     var inputElement = $("#" + key);

            //     // Check if the input element exists on the page
            //     if (inputElement.length) {
            //         inputElement.val(value);
            //     }
            // });
            $.each(response.form[0], function (key, value) {
                // Find the input element with the corresponding ID
                var inputElement = $("#" + key);
                // Check if the input element exists on the page
                if (key == "bc_checkbox") {
                    var checkbox_body_construction_isolation_valve = $(
                        "#checkbox_body_construction_isolation_valve"
                    );
                    checkbox_body_construction_isolation_valve.prop(
                        "checked",
                        value == 1
                    );
                    bodyCheckBox();
                }
                if (inputElement.length) {
                    inputElement.val(value);
                }
            });
            Swal.close();

            $('#form_url_construction').val(response.update_url);
            $('#'+forms).attr('method', 'PUT');

        },
        error: function(response) {
            Swal.close();

            $('#warning-alert').removeClass('hidden').addClass('flex');

            $('.warning-alert-message').html('');
            $('.warning-alert-title').text('');

            $('.warning-alert-title').text('Well, this is unexpected..');
            $('.warning-alert-message').append('<li>'+response.responseJSON.message+'</li>');
        }
    });

};

function goTobodyIsolation() {
    var bodyIsolationClick = document.getElementById("BodyIsolation-tab");
    if (bodyIsolationClick) {
        bodyIsolationClick.click();
    }
}

var actuatorHandwheel = document.getElementById("actuatorHandwheel-tab");
// Add an onclick event handler
actuatorHandwheel.onclick = function () {
    var dataUrl = actuatorHandwheel.getAttribute("data-url");
    $("#form_url_construction").val(dataUrl);
};

saveRecordIsolation = () => {
    var form_url = $("#form_url_construction").val();
    var form_id_name = $("#form_id_construction").val();
    // console.log( $('#'+form_id_name).serialize());

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
                    modalHideAndResetCosntruction();
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
