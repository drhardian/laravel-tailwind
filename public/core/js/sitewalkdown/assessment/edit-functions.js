const $targetEl = document.getElementById("modalEl");
const modal = new Modal($targetEl);

const $targetTag = document.getElementById("taglistmodal");
const modaltag = new Modal($targetTag);

$(document).ready(function () {
    $("#tags-table").DataTable({
        language: {
            processing: "Loading. Please wait...",
        },
        responsive: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        lengthChange: false,
        dom: "ftp",
        ajax: {
            url: $("#tags-table-url").val(),
            data: function (d) {
                d.instructionId = $("#instruction-id").val();
            },
        },
        columns: [{ data: "tagnumber", name: "tagnumber" }],
    });

    selectDropdownAjax();
});

function openTitleList(id) {
    $("#selected-person-id").val(id);
    modal.toggle();
}

function openTagList(instructionId) {
    $("#instruction-id").val(instructionId);
    modaltag.toggle();
    $("#tags-instruction-table").DataTable().ajax.reload();
}

function setSelectedPerson(title) {
    $("#persons_title_" + $("#selected-person-id").val()).val(title);
    $("#browsetitlemodal").modal("toggle");
    $("#selected-person-id").val("");
}

function goToNextPage(event, prev, next, flow) {
    event.preventDefault();

    if (flow == "forward") {
        $("#tabMenu" + next).click();
    } else if (flow == "backward") {
        $("#tabMenu" + prev).click();
    }
}

function addMorePerson(event, id) {
    event.preventDefault();
    nextOtherAreaNum = parseInt(id) + 1;
    if (
        $("#persons_name_" + id).val() !== "" &&
        $("#persons_title_" + id).val() !== "" &&
        $("#persons_email_" + id).val() !== ""
    ) {
        if ($(".persons_ico_" + id).hasClass("fa-trash-can")) {
            $("#persons_group_" + id).remove();
        } else {
            $(".persons_btn_" + id)
                .removeClass("btn-primary")
                .addClass("btn-danger");
            $(".persons_ico_" + id)
                .removeClass("fa fa-plus")
                .addClass("fa-solid fa-trash-can");

            var div = document.createElement("div");
            div.className = "flex flex-col md:flex-row";
            div.id = "persons_group_" + nextOtherAreaNum;

            var divName = document.createElement("div");
            divName.className = "w-full mb-4 md:basis-1/3";

            var inputName = document.createElement("input");
            inputName.type = "text";
            inputName.name = "persons_name[]";
            inputName.placeholder = "Name";
            inputName.className =
                "bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500";

            divName.appendChild(inputName);
            div.appendChild(divName);

            var divTitle = document.createElement("div");
            divTitle.className = "w-full mb-4 md:basis-1/3 md:ml-4";

            var inputTitle = document.createElement("input");
            inputTitle.type = "text";
            inputTitle.id = "persons_title_" + nextOtherAreaNum;
            inputTitle.name = "persons_title[]";
            inputTitle.placeholder = "Title";
            inputTitle.className =
                "bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500";
            // inputTitle.setAttribute("readonly", "readonly");
            inputTitle.setAttribute(
                "onclick",
                "openTitleList('" + nextOtherAreaNum + "')"
            ); // Ganti 'openEmailList()' dengan fungsi yang sesuai
            divTitle.appendChild(inputTitle);
            div.appendChild(divTitle);

            var divEmail = document.createElement("div");
            divEmail.className = "w-full mb-4 md:basis-1/3 md:ml-4";

            var divEmailFlex = document.createElement("div");
            divEmailFlex.className = "flex";

            var inputEmail = document.createElement("input");
            inputEmail.type = "text";
            inputEmail.name = "persons_email[]";
            inputEmail.placeholder = "Email Address";
            inputEmail.className =
                "bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-s-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500";

            var button = document.createElement("button");
            button.id = nextOtherAreaNum;
            button.className =
                "persons_btn_" +
                nextOtherAreaNum +
                " inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-s-0 border-gray-300 rounded-e-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600";
            button.setAttribute(
                "onclick",
                "addMorePerson(event, $(this).attr('id'))"
            );
            var icon = document.createElement("i");
            icon.className = "fa fa-plus persons_ico_" + nextOtherAreaNum;

            button.appendChild(icon);
            divEmailFlex.appendChild(inputEmail);
            divEmailFlex.appendChild(button);
            divEmail.appendChild(divEmailFlex);
            div.appendChild(divEmail);

            $(".persons-container").append(div);
        }
    } else {
        console.log("test");
    }
}

loadAreaSelectbox = (area) => {
    var areaOption = new Option(area[1], area[0], true, true);
    $("#area_id").append(areaOption).trigger("change");
};

loadOtherAreaSelectbox = (otherarea) => {
    $.each(otherarea, function (index, value) {
        var otherareaOption = new Option(value[1], value[0], true, true);
        $("#area_others").append(otherareaOption).trigger("change");
    });
};

openImgFrame = (subjectId) => {
    $("#imagesmodal").modal("toggle");

    getImages($("#id").val(), subjectId)
        .then((path) => {
            $.each(path, function (indexInArray, valueOfElement) {
                $("#imageGallery").append(
                    '<a href="' +
                        valueOfElement.path +
                        '" data-sub-html="' +
                        valueOfElement.id +
                        '">' +
                        '<img class="css-io8lqb" src="' +
                        valueOfElement.path +
                        '" alt="caption for image 1" aria-hidden="true">' +
                        "</a>"
                );
            });

            $("#imageGallery")
                .justifiedGallery({
                    border: 6,
                    margins: 5,
                    rowHeight: 120,
                })
                .on("jg.complete", function () {
                    const $imageGallery =
                        document.getElementById("imageGallery");

                    let updateSlideInstance = null;
                    $imageGallery.addEventListener("lgInit", (event) => {
                        let updateSlideInstance = event.detail.instance;

                        const deleteBtn =
                            '<button class="lg-icon" type="button" aria-label="Remove slide" class="lg-icon" id="lg-delete"><i class="fa-solid fa-trash-can"></i></button>';

                        if (
                            !updateSlideInstance.outer.find("#lg-delete")
                                .firstElement
                        ) {
                            updateSlideInstance.outer
                                .find(".lg-toolbar")
                                .append(deleteBtn);
                            updateSlideInstance.outer
                                .find("#lg-delete")
                                .on("click", () => {
                                    const lgId =
                                        updateSlideInstance.items[
                                            updateSlideInstance.index
                                        ].dataset.lgId;

                                    Swal.fire({
                                        template: "#delete-template",
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            const parentLgDiv =
                                                document.getElementById(
                                                    "imageGallery"
                                                );
                                            const childLgDiv =
                                                parentLgDiv.querySelector(
                                                    `[data-lg-id="` +
                                                        lgId +
                                                        `"]`
                                                );
                                            parentLgDiv.removeChild(childLgDiv);

                                            lightGalleryInstance.closeGallery();
                                            lightGalleryInstance.refresh();
                                        }
                                    });
                                });
                        }
                    });

                    const lightGalleryInstance = lightGallery($imageGallery, {
                        download: false,
                        plugins: [lgThumbnail],
                    });
                });
        })
        .catch(function (error) {
            console.log(error);
        });
};

uploadImage = (formInputId, subjectId, url) => {
    let fileImg = $("#" + formInputId).prop("files")[0];

    if (fileImg) {
        var formData = new FormData();

        formData.append("_token", CSRF_TOKEN);
        formData.append("assessmentId", $("#id").val());
        formData.append("subjectId", subjectId);
        formData.append("file", fileImg);

        $.ajax({
            type: "post",
            url: url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
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

                $(".justified-gallery-" + subjectId).append(
                    `<div class="image-wrapper ` +
                        response.fileId +
                        `">
                                <a class="` +
                        subjectId +
                        `" href="` +
                        response.filePath +
                        `">
                                    <img src="` +
                        response.filePath +
                        `"/>
                                </a>
                                <button class="delete-button" onclick="deleteImage('` +
                        response.fileId +
                        `', '` +
                        subjectId +
                        `', event);" title="Delete">
                                    <i class="fa-solid fa-trash fa-sm"></i>
                                </button>
                            </div>`
                );

                loadJustifiedGallery(subjectId);
                // $('.justified-gallery-' + subjectId).justifiedGallery({
                //     border: 6,
                //     margins: 5,
                //     rowHeight: 150,
                //     rel: 'justified-gallery-' + subjectId,
                //     lastRow: 'nojustify',
                //     captions: true,
                // }).on('jg.complete', function (subjectId) {
                //     $(this).find('a').colorbox({
                //         maxWidth: '80%',
                //         maxHeight: '80%',
                //         opacity: 0.8,
                //         transition: 'elastic',
                //         current: '',
                //         rel:subjectId,
                //     });
                // });

                $("#" + formInputId).val("");
            },
            error: function (jqXHR, status, error) {
                Swal.close();
                console.log([jqXHR, status, error]);
            },
        });
    }
};

getImages = (assessmentId, subjectId) => {
    return new Promise((resolve, reject) => {
        $.ajax({
            type: "get",
            url: $("#urlGetImage").val(),
            data: {
                assessmentId: assessmentId,
                subjectId: subjectId,
            },
            dataType: "json",
            beforeSend: function () {
                $("#imageGallery").html("");
            },
        })
            .done(function (response) {
                resolve(response.path);
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                reject(errorThrown);
            });
    });
};

deleteImage = (imageId, subjectID, event) => {
    event.preventDefault();

    Swal.fire({
        template: "#delete-template",
    }).then((result) => {
        if (result.isConfirmed) {
            var url = $("#urlRemoveImage").val();
            url = url.replace(":image", imageId);

            $.ajax({
                type: "post",
                url: url,
                data: {
                    _token: CSRF_TOKEN,
                    _method: "DELETE",
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
                    console.log(response.imageCount);

                    Swal.close();

                    $("." + imageId).remove();

                    $(".justified-gallery-" + subjectID).justifiedGallery(
                        "destroy"
                    );

                    if (response.imageCount == 0) {
                        $(".justified-gallery-" + subjectID).removeAttr(
                            "style"
                        );
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    Swal.close();
                    console.log([jqXHR, textStatus, errorThrown]);
                },
            });
        }
    });
};

updateAssessment = (recordStatus) => {
    Swal.fire({
        template: "#my-template",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: $("#urlUpdateAssessment").val(),
                data:
                    $("#assessmentForm").serialize() +
                    "&recordStatus=" +
                    recordStatus,
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
                    window.location.replace(response.url);
                },
                error: function (response) {
                    Swal.close();
                    console.log(response);
                },
            });
        }
    });
};

loadExistingImages = () => {
    $.ajax({
        type: "get",
        url: $("#urlGetAssessmentImage").val(),
        data: {
            assessmentId: $("#id").val(),
        },
        success: function (response) {
            $.each(response, function (index, subjects) {
                $.each(subjects, function (indexSubject, images) {
                    $.each(images, function (indexImage, image) {
                        $(".justified-gallery-" + indexSubject).append(
                            `<div class="image-wrapper ` +
                                image[0] +
                                `">
                                        <a class="` +
                                indexSubject +
                                `" href="` +
                                image[1] +
                                `">
                                            <img src="` +
                                image[1] +
                                `"/>
                                        </a>
                                        <button class="delete-button" onclick="deleteImage('` +
                                image[0] +
                                `', '` +
                                indexSubject +
                                `', event);" title="Delete">
                                            <i class="fa-solid fa-trash fa-sm"></i>
                                        </button>
                                    </div>`
                        );
                    });

                    loadJustifiedGallery(indexSubject);
                });
            });
        },
    });
};

loadJustifiedGallery = (subjectId) => {
    $(".justified-gallery-" + subjectId)
        .justifiedGallery({
            border: 0,
            margins: 3,
            rowHeight: 70,
            rel: "justified-gallery-" + subjectId,
            lastRow: "nojustify",
            captions: true,
        })
        .on("jg.complete", function (subjectId) {
            $(this).find("a").colorbox({
                maxWidth: "80%",
                maxHeight: "80%",
                opacity: 0.8,
                transition: "elastic",
                current: "",
                rel: subjectId,
            });
        });
};
