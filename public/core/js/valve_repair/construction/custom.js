const $newModalConstruction = document.getElementById("constructionModal");
const modalConstruction = new Modal($newModalConstruction);

let cancelBtnConstruction = document.getElementById("cancelBtnConstruction");
let closeIcoConstruction = document.getElementById("closeIcoConstruction");

document.addEventListener("DOMContentLoaded", function () {
    // var bodyIsolationClickFirst = document.getElementById("BodyIsolation-tab");
    // var dataUrl = bodyIsolationClickFirst.getAttribute("data-url");
    // var forms = bodyIsolationClickFirst.getAttribute("data-form");
    // $("#form_url_construction").val(dataUrl);
    // $("#form_id_construction").val(forms);
});

openFormConstruction = (url) => {
    modalShowAndResetConstruction();
    $(".modal-title-isolation").text(
        "CONSTRUCTION"
    );
    goTobodyIsolation();
};

modalShowAndResetConstruction = () => {
    modalConstruction.show();
    formResetConstruction();
};

formResetConstruction = () => {
    var forms = $("#form_id_construction").val();
    if (forms) {
        $("#" + forms).each(function () {
            this.reset();
        });
        $("#" + forms).attr("method", "POST");
    }
};

formResetConstructionNew = (formid) => {
    console.log(formid);
    $("#" + formid).each(function () {
        this.reset();
    });
    $("#" + formid).attr("method", "POST");
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

hideLeftFormConstruction = (nameId) => {
    const divId = document.getElementById(nameId);
    divId.style.display = "none";

    var foundId = nameId.replace("left", "found");
    // Get the element with the modified ID
    const foundElement = document.getElementById(foundId);
    // Remove the class 'sm:w-1/2'
    foundElement.classList.remove("sm:w-1/2");
    // Add the class 'sm:w-2/2'
    foundElement.classList.add("sm:w-2/2");
};

resetLeftFormConstruction = (nameId) => {
    const divId = document.getElementById(nameId);
    var foundId = nameId.replace("left", "found");
    divId.style.display = "block";
    // Get the element with the modified ID
    const foundElement = document.getElementById(foundId);
    if (foundElement.classList.contains("sm:w-2/2")) {
        // Remove the class 'sm:w-1/2'
        foundElement.classList.remove("sm:w-2/2");
        // Add the class 'sm:w-2/2'
        foundElement.classList.add("sm:w-1/2");
    }
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

const checkbox_actuator = document.getElementById("id_ahc_checkbox");

// Add an event listener to the checkbox
checkbox_actuator.addEventListener("change", () => {
    FunctionCheckboxActuator();
});

// Add an event listener to the checkbox
FunctionCheckboxActuator = () => {
    const elements_actuator = document.querySelectorAll('[id^="ahc_"]');
    const actuator_construction_found_id = document.getElementById(
        "actuator_construction_found"
    );
    const actuator_construction_left_id = document.getElementById(
        "actuator_construction_left"
    );
    const actuator_construction_note = document.getElementById("ahc_note");
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
};

const checkbox_actuator_automation = document.getElementById(
    "checkbox_actuator_automation"
);

// Add an event listener to the checkbox
checkbox_actuator_automation.addEventListener("change", () => {
    FunctionCheckboxAutomation();
});

// Add an event listener to the checkbox
FunctionCheckboxAutomation = () => {
    const elements_actuator = document.querySelectorAll('[id^="aa_"]');
    const actuator_automation_found_id = document.getElementById(
        "actuator_automation_found"
    );
    const actuator_automation_left_id = document.getElementById(
        "actuator_automation_left"
    );
    const actuator_automation_note = document.getElementById("aa_note");
    const actuator_automation_note_div = document.getElementById(
        "automation_note_div"
    );

    elements_actuator.forEach((element) => {
        element.disabled = !checkbox_actuator_automation.checked;
        // Jika checkbox_actuator dicentang, hapus kelas 'opacity-50' untuk mengurangi transparansi
        if (checkbox_actuator_automation.checked) {
            element.setAttribute("disabled", "disabled");
            element.classList.add("cursor-not-allowed");
            actuator_automation_found_id.style.display = "none";
            actuator_automation_left_id.style.display = "none";
            actuator_automation_note_div.style.display = "none";
            actuator_automation_note.setAttribute("disabled", "disabled");
        } else {
            element.removeAttribute("disabled");
            element.classList.remove("cursor-not-allowed");
            actuator_automation_found_id.style.display = "block";
            actuator_automation_left_id.style.display = "block";
            actuator_automation_note_div.style.display = "block";
            actuator_automation_note.removeAttribute("disabled");
        }
    });
};

const checkbox_positioner_isolation = document.getElementById(
    "checkbox_positioner_isolation"
);

// Add an event listener to the checkbox
checkbox_positioner_isolation.addEventListener("change", () => {
    FunctionCheckboxPositioner();
});

// Add an event listener to the checkbox
FunctionCheckboxPositioner = () => {
    const elements_actuator = document.querySelectorAll('[id^="pc_"]');
    const isolation_positioner_found_id = document.getElementById(
        "isolation_positioner_found"
    );
    const isolation_positioner_left_id = document.getElementById(
        "isolation_positioner_left"
    );
    const isolation_positioner_note = document.getElementById("pc_note");
    const isolation_positioner_note_div = document.getElementById(
        "isolation_positioner_note_div"
    );

    elements_actuator.forEach((element) => {
        element.disabled = !checkbox_positioner_isolation.checked;
        // Jika checkbox_actuator dicentang, hapus kelas 'opacity-50' untuk mengurangi transparansi
        if (checkbox_positioner_isolation.checked) {
            element.setAttribute("disabled", "disabled");
            element.classList.add("cursor-not-allowed");
            isolation_positioner_found_id.style.display = "none";
            isolation_positioner_left_id.style.display = "none";
            isolation_positioner_note_div.style.display = "none";
            isolation_positioner_note.setAttribute("disabled", "disabled");
        } else {
            element.removeAttribute("disabled");
            element.classList.remove("cursor-not-allowed");
            isolation_positioner_found_id.style.display = "block";
            isolation_positioner_left_id.style.display = "block";
            isolation_positioner_note_div.style.display = "block";
            isolation_positioner_note.removeAttribute("disabled");
        }
    });
};

const checkbox_accessories_isolation = document.getElementById(
    "checkbox_accessories_isolation"
);

// Add an event listener to the checkbox
checkbox_accessories_isolation.addEventListener("change", () => {
    FunctionCheckboxAccessories();
});

// Add an event listener to the checkbox
FunctionCheckboxAccessories = () => {
    const elements_actuator = document.querySelectorAll('[id^="ac_"]');
    const isolation_accessories_found_id = document.getElementById(
        "isolation_accessories_found"
    );
    const isolation_accessories_left_id = document.getElementById(
        "isolation_accessories_left"
    );
    const isolation_positioner_note = document.getElementById("pc_note");
    const isolation_accessories_note_div = document.getElementById(
        "isolation_accessories_note_div"
    );

    elements_actuator.forEach((element) => {
        element.disabled = !checkbox_accessories_isolation.checked;
        // Jika checkbox_actuator dicentang, hapus kelas 'opacity-50' untuk mengurangi transparansi
        if (checkbox_accessories_isolation.checked) {
            element.setAttribute("disabled", "disabled");
            element.classList.add("cursor-not-allowed");
            isolation_accessories_found_id.style.display = "none";
            isolation_accessories_left_id.style.display = "none";
            isolation_accessories_note_div.style.display = "none";
            isolation_positioner_note.setAttribute("disabled", "disabled");
        } else {
            element.removeAttribute("disabled");
            element.classList.remove("cursor-not-allowed");
            isolation_accessories_found_id.style.display = "block";
            isolation_accessories_left_id.style.display = "block";
            isolation_accessories_note_div.style.display = "block";
            isolation_positioner_note.removeAttribute("disabled");
        }
    });
};

// var saveButtonAction = document.getElementById("saveButtonAction");
var bodyIsolationClick = document.getElementById("BodyIsolation-tab");

// Add an onclick event handler
bodyIsolationClick.onclick = function () {
    var dataUrl = bodyIsolationClick.getAttribute("data-url");
    var forms = bodyIsolationClick.getAttribute("data-form");
    $("#form_url_construction").val(dataUrl);
    $("#form_id_construction").val(forms);
    formResetConstruction();
    $("#" + forms).attr("method", "POST");
    var url = dataUrl + "/" + valveRepair.id;

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
                Swal.close();
            } else {
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


                if (response.is_change == 0) {
                    hideLeftFormConstruction("body_construction_left");
                }else{
                    resetLeftFormConstruction("body_construction_left");
                }

                Swal.close();
                $("#form_url_construction").val(response.update_url);
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

var actuatorHandwheelClick = document.getElementById("actuatorHandwheel-tab");

// Add an onclick event handler
actuatorHandwheelClick.onclick = function () {
    var dataUrl = actuatorHandwheelClick.getAttribute("data-url");
    var forms = actuatorHandwheelClick.getAttribute("data-form");
    $("#form_url_construction").val(dataUrl);
    $("#form_id_construction").val(forms);
    formResetConstruction();
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
                Swal.close();
                Swal.fire({
                    icon: "alert",
                    title: "Information",
                    text: response.message,
                    confirmButtonText: "Oke",
                }).then((result) => {
                    if (result.isConfirmed) {
                        goTobodyIsolation();
                    }
                });
            } else {
                $.each(response.form[0], function (key, value) {
                    // Find the input element with the corresponding ID
                    var inputElement = $("#" + key);
                    // Check if the input element exists on the page
                    if (key == "ahc_checkbox") {
                        var checkbox_action_handwheel_isolation_valve =
                            $("#id_ahc_checkbox");
                        checkbox_action_handwheel_isolation_valve.prop(
                            "checked",
                            value == 1
                        );
                        checkbox_action_handwheel_isolation_valve.trigger(
                            "change"
                        );
                        FunctionCheckboxActuator();
                    }
                    if (inputElement.length) {
                        inputElement.val(value);
                    }
                });

                if (response.is_change == 0) {
                    hideLeftFormConstruction("actuator_construction_left");
                }else{
                    resetLeftFormConstruction("actuator_construction_left");
                }
            }

            Swal.close();
            $("#form_id_construction").val(forms);
            $("#form_url_construction").val(response.update_url);
            $("#" + forms).attr("method", "PUT");
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

var actuatorAutomationClick = document.getElementById("ActuatorAutomation-tab");

// Add an onclick event handler
actuatorAutomationClick.onclick = function () {
    var dataUrl = actuatorAutomationClick.getAttribute("data-url");
    var forms = actuatorAutomationClick.getAttribute("data-form");
    formResetConstruction();
    $("#form_url_construction").val(dataUrl);
    $("#form_id_construction").val(forms);
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
            console.log(response.status);

            if (response.status == "empty") {
                Swal.close();
                Swal.fire({
                    icon: "alert",
                    title: "Information",
                    text: response.message,
                    confirmButtonText: "Oke",
                }).then((result) => {
                    if (result.isConfirmed) {
                        goTobodyIsolation();
                    }
                });
            } else {
                $.each(response.form[0], function (key, value) {
                    // Find the input element with the corresponding ID
                    var inputElement = $("#" + key);
                    // Check if the input element exists on the page
                    if (key == "aa_checkbox") {
                        var checkbox_body_construction_isolation_valve = $(
                            "#checkbox_actuator_automation"
                        );
                        checkbox_body_construction_isolation_valve.prop(
                            "checked",
                            value == 1
                        );
                        FunctionCheckboxAutomation();
                    }
                    if (inputElement.length) {
                        inputElement.val(value);
                    }
                });
                if (response.is_change == 0) {
                    hideLeftFormConstruction("actuator_automation_left");
                }else{
                    resetLeftFormConstruction("actuator_automation_left");
                }
            }
            Swal.close();
            console.log(forms);
            $("#form_id_construction").val(forms);
            $("#form_url_construction").val(response.update_url);
            $("#" + forms).attr("method", "PUT");
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

var positionerIsolationClick = document.getElementById(
    "PositionerIsolationValve-tab"
);

// Add an onclick event handler
positionerIsolationClick.onclick = function () {
    var dataUrl = positionerIsolationClick.getAttribute("data-url");
    var forms = positionerIsolationClick.getAttribute("data-form");
    formResetConstruction();
    $("#form_url_construction").val(dataUrl);
    $("#form_id_construction").val(forms);
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
                Swal.close();
                Swal.fire({
                    icon: "alert",
                    title: "Information",
                    text: response.message,
                    confirmButtonText: "Oke",
                }).then((result) => {
                    if (result.isConfirmed) {
                        goTobodyIsolation();
                    }
                });
            } else {
                $.each(response.form[0], function (key, value) {
                    // Find the input element with the corresponding ID
                    var inputElement = $("#" + key);
                    // Check if the input element exists on the page
                    if (key == "pc_checkbox") {
                        var checkbox_positioner_isolation_valve = $(
                            "#checkbox_positioner_isolation"
                        );
                        checkbox_positioner_isolation_valve.prop(
                            "checked",
                            value == 1
                        );
                        FunctionCheckboxPositioner();
                    }
                    if (inputElement.length) {
                        inputElement.val(value);
                    }
                });
                if (response.is_change == 0) {
                    hideLeftFormConstruction("isolation_positioner_left");
                }else{
                    resetLeftFormConstruction("isolation_positioner_left");
                }
            }
            Swal.close();
            console.log(forms);
            $("#form_id_construction").val(forms);
            $("#form_url_construction").val(response.update_url);
            $("#" + forms).attr("method", "PUT");
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

$("#ac_selected_found").on("change", function () {
    // Hapus semua baris yang ada di dalam tbody tabel
    $("#accessoriesTableFound tbody").empty();
    // Dapatkan nilai yang dipilih dari Select2
    var selectedAccessories = $(this).val();
    var data = $("#ac_selected_found").select2("data");

    // Tampilkan aksesori yang dipilih di dalam tabel
    if (selectedAccessories) {
        for (var i = 0; i < selectedAccessories.length; i++) {
            var selectedId = selectedAccessories[i];
            var accessory = data[i].text;
            var newRow =
                '<tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">' +
                '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">' +
                accessory +
                "</th>" +
                "</tr>";
            $("#accessoriesTableFound tbody").append(newRow);
            // <td class="px-6 py-4"><span onclick="acFoundTableDelete(' +selectedId + ')" '+' class="cursor-pointer font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</span></td>
        }
    }
});

$("#ac_selected_left").on("change", function () {
    // Hapus semua baris yang ada di dalam tbody tabel
    $("#accessoriesTableLeft tbody").empty();
    // Dapatkan nilai yang dipilih dari Select2
    var selectedAccessoriesLeft = $(this).val();
    var data = $("#ac_selected_left").select2("data");

    // Tampilkan aksesori yang dipilih di dalam tabel
    if (selectedAccessoriesLeft) {
        for (var i = 0; i < selectedAccessoriesLeft.length; i++) {
            var selectedId = selectedAccessoriesLeft[i];
            console.log(i);
            var accessory = data[i].text;

            var newRow =
                '<tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">' +
                '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">' +
                accessory +
                "</th>" +
                "</tr>";
            $("#accessoriesTableLeft tbody").append(newRow);
            // <td class="px-6 py-4"><span onclick="acFoundTableDelete(' +selectedId + ')" '+' class="cursor-pointer font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</span></td>
        }
    }
});

var accesoriesIsolationClick = document.getElementById(
    "AccessoriesIsolationValve-tab"
);

// Add an onclick event handler
accesoriesIsolationClick.onclick = function () {
    var dataUrl = accesoriesIsolationClick.getAttribute("data-url");
    var forms = accesoriesIsolationClick.getAttribute("data-form");
    // formResetConstruction();
    $("#form_url_construction").val(dataUrl);
    $("#form_id_construction").val(forms);
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
                Swal.close();
                Swal.fire({
                    icon: "alert",
                    title: "Information",
                    text: response.message,
                    confirmButtonText: "Oke",
                }).then((result) => {
                    if (result.isConfirmed) {
                        goTobodyIsolation();
                    }
                });
            } else {
                $.each(
                    response.form[0].filteredAccesorie,
                    function (key, value) {
                        // Find the input element with the corresponding ID
                        var inputElement = $("#" + key);
                        // Check if the input element exists on the page
                        if (key == "ac_checkbox") {
                            var checkbox_accessories_isolation_valve = $(
                                "#checkbox_accessories_isolation"
                            );
                            checkbox_accessories_isolation_valve.prop(
                                "checked",
                                value == 1
                            );
                            FunctionCheckboxAccessories();
                        }
                        var trueRadio = document.getElementById(
                            "construction_change_radio_true"
                        );

                        var falseRadio = document.getElementById(
                            "construction_change_radio_false"
                        );

                        if (key == "construction_change") {
                            console.log(value);
                            if (value === 1) {
                                trueRadio.checked = true;
                            } else {
                                falseRadio.checked = true;
                            }
                        }

                        if (inputElement.length) {
                            inputElement.val(value);
                        }
                    }
                );

                if (response.is_change == 0) {
                    hideLeftFormConstruction("isolation_accessories_left");
                }else{
                    resetLeftFormConstruction("isolation_accessories_left");
                }

                $("#ac_selected_found")
                    .val(response.form[0].selectedValueFound)
                    .trigger("change");
                $("#ac_selected_left")
                    .val(response.form[0].selectedValueLeft)
                    .trigger("change");
            }
            Swal.close();
            $("#form_id_construction").val(forms);
            $("#form_url_construction").val(response.update_url);
            $("#" + forms).attr("method", "PUT");
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
