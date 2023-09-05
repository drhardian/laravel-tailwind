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
    formReset();
};

function showHideDiv() {
    var select = document.getElementById("order_type");
    var div = document.getElementById("ltsa_div");

    if (select.value === "LTSA") {
        div.style.display = "block";
        div.scrollIntoView({ behavior: "smooth" });
    } else {
        div.style.display = "none";
    }
}

saveRecord = () => {
    Swal.fire({
        template: "#create-template",
    }).then((result) => {
        if (result.isConfirmed) {
            console.log($("#mainForm").serialize());
            // $.ajax({
            //     type: "post",
            //     url: $("#form_url").val(),
            //     data:
            //         $("#mainForm").serialize() +
            //         "&_token=" +
            //         CSRF_TOKEN +
            //         "&_method=" +
            //         $("#mainForm").attr("method"),
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
            //         Swal.close();
            //         modalHideAndReset();
            //         toastr.success(response.message);
            //         $("#main-table").DataTable().ajax.reload();
            //     },
            //     error: function (response) {
            //         Swal.close();

            //         $("#warning-alert").removeClass("hidden").addClass("flex");

            //         $(".warning-alert-message").html("");
            //         $(".warning-alert-title").text("");

            //         if (response.status === 422) {
            //             $(".warning-alert-title").text(
            //                 "Ensure that these requirements are met:"
            //             );

            //             $.each(
            //                 response.responseJSON.errors,
            //                 function (indexInArray, valueOfElement) {
            //                     $(".warning-alert-message").append(
            //                         "<li>" + valueOfElement[0] + "</li>"
            //                     );
            //                 }
            //             );
            //         } else {
            //             $(".warning-alert-title").text(
            //                 "Well, this is unexpected.."
            //             );
            //             $(".warning-alert-message").append(
            //                 "<li>" + response.responseJSON.message + "</li>"
            //             );
            //         }
            //     },
            // });
        }
    });
};

// const step1Form = document.getElementById('step-1-form');
// const step2Form = document.getElementById('step-2-form');
// const step3Form = document.getElementById('step-3-form');
// const step2 = document.getElementById('step-2');
// const step3 = document.getElementById('step-3');
// const nextStep1Btn = document.getElementById('next-step-1');
// const prevStep2Btn = document.getElementById('prev-step-2');
// const nextStep2Btn = document.getElementById('next-step-2');
// const prevStep3Btn = document.getElementById('prev-step-3');

// nextStep1Btn.addEventListener('click', () => {
// step1Form.style.display = 'none';
// step2.style.display = 'block';
// });

// prevStep2Btn.addEventListener('click', () => {
// step2Form.style.display = 'none';
// step1Form.style.display = 'block';
// });

// nextStep2Btn.addEventListener('click', () => {
// step2Form.style.display = 'none';
// step3.style.display = 'block';
// });

// prevStep3Btn.addEventListener('click', () => {
// step3Form.style.display = 'none';
// step2.style.display = 'block';
// });
