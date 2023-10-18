const $newModal = document.getElementById("newModal");
const modal = new Modal($newModal);

let cancelBtn = document.getElementById("cancelBtn");
let closeIco = document.getElementById("closeIco");

openForm = (url) => {
    modalShowAndReset();
    $(".modal-title").text("New Valve Repair Report");
    $("#form_url").val(url);
};

modalShowAndReset = () => {
    modal.show();
    formReset();
};

formReset = () => {
    $("#mainForm select,input").val(null).trigger("change");
    $("#mainForm").attr("method", "POST");
};

closeIco.onclick = function () {
    modalHideAndReset();
};

cancelBtn.onclick = function () {
    modalHideAndReset();
};

modalHideAndReset = () => {
    modal.hide();
    // formReset();
};
onChangeDeviceType = (selected_id = null) => {
    var select = document.getElementById("device_type");

    var val = select.options[select.selectedIndex].text;
    const lowercaseString = val.toLowerCase();
    const underscoreString = lowercaseString.replaceAll(" ", "_");

    var filteredData = array_dropdown.filter(function (item) {
        return item.dropdown_category === underscoreString + "_device_type"; // Replace 'work_type' with the category you want to filter by
    });
    // Assuming you have a select element with the id 'device_type'
    var selectElement = document.getElementById("selected_device_type");

    // Clear any existing options
    selectElement.innerHTML = "";

    var defaultOption = document.createElement("option");
    defaultOption.value = ""; // Set the value to an empty string
    defaultOption.text = "Select Device Type"; // Set the default text
    defaultOption.selected = true; // Set it as the selected option
    defaultOption.disabled = true; // Disable the default option
    selectElement.appendChild(defaultOption);

    // Populate the select element with the filtered data
    filteredData.forEach(function (item) {
        var option = document.createElement("option");
        option.value = item.id; // Set the value of the option to the 'id' property
        if (selected_id !== null && item.id == selected_id) {
            option.selected = true; // Set it as the selected option
        }
        option.text = item.dropdown_label; // Set the text of the option to the 'dropdown_label' property
        selectElement.appendChild(option);
    });
};

function showHideDiv() {
    var select = document.getElementById("order_type");
    var div = document.getElementById("ltsa_div");
    if (select.options[select.selectedIndex].text === "LTSA") {
        div.style.display = "block";
        // div.scrollIntoView({ behavior: "smooth" });
    } else {
        div.style.display = "none";
    }
}

var deviceDetailTab = document.getElementById("deviceDetail-tab");
// Add an onclick event handler
deviceDetailTab.onclick = function () {
    var saveButtonAction = document.getElementById("saveButtonAction");
    var deviceDetailButton = document.getElementById("deviceDetailButton");
    var generalInformationButton = document.getElementById(
        "generalInformationButton"
    );
    deviceDetailButton.style.display = "none";
    saveButtonAction.style.display = "block";
    generalInformationButton.style.display = "block";
};

var deviceDetailTab = document.getElementById("generalInformation-tab");
// Add an onclick event handler
deviceDetailTab.onclick = function () {
    var saveButtonAction = document.getElementById("saveButtonAction");
    var deviceDetailButton = document.getElementById("deviceDetailButton");
    var generalInformationButton = document.getElementById(
        "generalInformationButton"
    );
    deviceDetailButton.style.display = "block";
    saveButtonAction.style.display = "none";
    generalInformationButton.style.display = "none";
};

function goToDeviceInfo() {
    var button = document.getElementById("deviceDetail-tab");
    if (button) {
        button.click();
    }
}

function goToGeneralInformation() {
    var button = document.getElementById("generalInformation-tab");
    if (button) {
        button.click();
    }
}

function scope_of_workDiv() {
    var select = document.getElementById("scope_of_work");
    var div = document.getElementById("repair_type_div");
    if (select.options[select.selectedIndex].text === "Repair") {
        div.style.display = "block";
    } else {
        div.style.display = "none";
    }
}

saveRecord = () => {
    const mainForm = document.getElementById("mainForm");
    const requiredFields = getRequiredFields("mainForm");
    const inputElements = document.querySelectorAll("#mainForm input");

    // const classInputOriginal = '';
    // const additionalClass = 'bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';

    const emptyRequiredFields = requiredFields.filter((field) => {
        return !field.value; // Check if the field is empty
    });

    requiredFields.forEach((field) => {
        field.classList.remove(
            "bg-red-50",
            // "border",
            "border-red-500",
            "text-red-900",
            "placeholder-red-700",
            // "text-sm",
            // "rounded-lg",
            "focus:ring-red-500",
            "dark:bg-gray-700",
            "focus:border-red-500",
            // "block",
            // "w-full",
            // "p-2.5",
            "dark:text-red-500",
            "dark:placeholder-red-500",
            "dark:border-red-500"
        );
    });

    if (emptyRequiredFields.length === 0) {
        Swal.fire({
            template: "#create-template",
        }).then((result) => {
            if (result.isConfirmed) {
                var fromInput = $("#mainForm")[0];
                var formData = new FormData(fromInput);
                // Append the serialized form data to formData
                // formData.append("mainFormData", $("#mainForm").serialize());
                var ins = document.getElementById("photo_devices").files.length;
                for (var x = 0; x < ins; x++) {
                    formData.append(
                        "fileToUpload[]",
                        document.getElementById("photo_devices").files[x]
                    );
                }
                // Append the image file to formData (assuming you have an input field with the ID "imageInput")
                // formData.append("files", $("#photo_devices")[0].files);
                $.ajax({
                    type: "POST",
                    url: $("#form_url").val(),
                    data: formData,
                    processData: false, // Prevent jQuery from processing the data
                    contentType: false, // Set the content type to false to let the browser handle it
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
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
                        Swal.close();
                        modalHideAndReset();
                        toastr.success(response.message);
                        $("#main-table").DataTable().ajax.reload();
                        if (response.action) {
                            Swal.fire({
                                icon: "success",
                                title: "Update Data Success",
                                text: response.message,
                                confirmButtonText: "Oke",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        }
                    },
                    error: function (response) {
                        Swal.close();

                        $("#warning-alert")
                            .removeClass("hidden")
                            .addClass("flex");

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
    } else {
        console.log("Required Fields:", emptyRequiredFields);

        // // Get all input elements in the form
        // const inputElements = document.querySelectorAll("#mainForm input");

        // // Define the new class
        // const newClass =
        //     "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500";

        // // Loop through each input and add the new class
        // inputElements.forEach((input) => {
        //     input.classList.add(newClass);
        // });
        emptyRequiredFields.forEach((field) => {
            // field.className = '';

            field.classList.add(
                "bg-red-50",
                "border",
                "border-red-500",
                "text-red-900",
                "placeholder-red-700",
                "text-sm",
                "rounded-lg",
                "focus:ring-red-500",
                "dark:bg-gray-700",
                "focus:border-red-500",
                "block",
                "w-full",
                "p-2.5",
                "dark:text-red-500",
                "dark:placeholder-red-500",
                "dark:border-red-500"
            );
        });
        // You can also display an alert or handle it as needed
        alert("Please fill in all required fields.");
    }
};

function getRequiredFields(formId) {
    const form = document.getElementById(formId);
    const requiredFields = [];

    // Iterate through the form's elements
    for (let i = 0; i < form.elements.length; i++) {
        const element = form.elements[i];

        // Check if the element has the 'required' attribute
        if (element.hasAttribute("required")) {
            // Add the element to the list of required fields
            requiredFields.push(element);
        }
    }

    return requiredFields;
}

// const convertBase64 = (file) => {
//     const fileReader = new FileReader();
//     fileReader.readAsDataURL(file);

//     fileReader.onload = () => {
//         return fileReader.result;
//     };

//     fileReader.onerror = (error) => {
//         return error;
//     };
// };

function convertToBase64(file, callback) {
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function () {
        const base64String = reader.result.split(",")[1]; // Get the base64 data
        console.log(base64String);
        callback(base64String);
    };
}

// function preview_image() {
//     var total_file = document.getElementById("photo_devices").files.length;
//     for (var i = 0; i < total_file; i++) {
//         var imageId = "image-item-" + i;
//         // const file = URL.createObjectURL(event.target.files[i]);
//         // const base64 = convertToBase64(ev ent.target.files[i]);
//         const file = event.target.files[i];

//         convertToBase64(file, function (base64) {
//             // Do something with the base64 string, e.g., assign it to 'base64' variable
//             $("#image_preview").append(
//                 "<div id='" +
//                     imageId +
//                     "' class='image-item flex flex-col items-center'><img src='data:image/png;base64," +
//                     base64 +
//                     "' alt='Preview' class='max-w-full h-auto'><input type='text' name='descriptions[]' placeholder='Image Description' class='mt-2 p-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'>                    <button class='delete-button mt-2 text-red-500' onclick=\"delete_image('" +
//                     imageId +
//                     "')\">Delete</button>    </div>"
//             );
//         });
//     }
// }

// function delete_image(imageId) {
//     $("#" + imageId).remove();
// }
function preview_image() {
    var total_file = document.getElementById("photo_devices").files.length;
    for (var i = 0; i < total_file; i++) {
        var nameFile = event.target.files[i].name;
        var nameFileSpaces = nameFile.replace(/\s/g, "");
        var fileNameWithoutExtension = nameFileSpaces.replace(/\.[^/.]+$/, "");

        var imageId = "image-item-" + fileNameWithoutExtension;
        var imageIdArray = i;

        $("#image_preview").append(
            "<div id='" +
                imageId +
                "' class='image-item flex flex-col items-center'><img src='" +
                URL.createObjectURL(event.target.files[i]) +
                "' alt='Preview' class='max-w-full h-auto'><input type='text' name='input-" +
                imageId +
                "' placeholder='Image Description' class='mt-2 p-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'><button class='delete-button mt-2 text-red-500' onclick=\"delete_image('" +
                nameFile +
                "','" +
                imageId +
                "')\">Delete</button>    </div>"
        );
    }
}

function delete_image(nameFile, imageId) {
    // event.preventDefault()
    // Remove the image and its associated input field
    removeFile(nameFile);
    $("#" + imageId).remove();
}

function deleteImage(nameFile, imageId, idValveRepair, url, divId) {
    $.ajax({
        type: "POST",
        url: url,
        data: {
            idValveRepair: idValveRepair,
            imageId: imageId,
            nameFile: nameFile,
            _token: CSRF_TOKEN,
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
            if (response.success) {
                // Hapus gambar dari tampilan
                $("#" + divId).remove();
                Swal.close();
            } else {
                alert("Gagal menghapus gambar.");
            }
        },
        error: function (response) {
            Swal.close();
            alert(response.responseJSON.message);
        },
    });
}

function removeFile(name) {
    var attachments = document.getElementById("photo_devices").files; // <-- reference your file input here
    var fileBuffer = new DataTransfer();
    // append the file list to an array iteratively
    for (let i = 0; i < attachments.length; i++) {
        // Exclude file in specified index
        if (name !== attachments[i].name) fileBuffer.items.add(attachments[i]);
    }
    // Assign buffer to file input
    document.getElementById("photo_devices").files = fileBuffer.files; // <-- according to your file input reference
}

editRecord = (url) => {
    var selected_device_id_type = document.getElementById(
        "selected_device_type_value"
    ).value;
    modal.show();
    showHideDiv();
    scope_of_workDiv();
    onChangeDeviceType(selected_device_id_type);
    $(".modal-title").text("Edit Valve Repair Request");
    $("#warning-alert").removeClass("flex").addClass("hidden");
    $(".warning-alert-message").html("");
    $(".warning-alert-title").text("");
    $("#form_url").val(updateUrls);
    $("#mainForm").attr("method", "PUT");
};

// Get the image and popup elements
var modals = document.getElementById("myImageModal");
var closeBtn = document.getElementById("closeModalImg");
var ImgSrc = document.getElementById("ImgSrc");

function openModalImg(params, alt) {
    modals.classList.remove("hidden");
    ImgSrc.src = params;
}

// Add a click event listener to the close button
if (closeBtn) {
    closeBtn.addEventListener("click", function () {
        modals.classList.add("hidden");
    });
}

// Close the popup when clicking outside the image
window.addEventListener("click", function (event) {
    if (event.target == modals) {
        modals.classList.add("hidden");
    }
});
