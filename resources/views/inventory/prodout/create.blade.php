@extends('layout.index')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css">
@endsection

@section('content')
    <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl">
        <div class="p-4 mt-2">
            <h3 class="mb-2 hidden md:block text-2xl font-medium text-gray-900 dark:text-white">{{ $title }}</h3>

            <div class="flex justify-between mb-7">
                @unless (count($breadcrumbs) === 0)
                    @include('layout.breadcrumbs')
                @endunless
            </div>

            <div>

                <!-- Alert area -->
                <div id="alert-frame">
                    <div id="warning-alert"
                        class="hidden items-center p-4 my-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium warning-alert-title"></span>
                            <ul class="mt-1.5 ml-4 list-disc list-inside warning-alert-message"></ul>
                        </div>
                        <button type="button"
                            class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                            onclick="$('#warning-alert').removeClass('flex').addClass('hidden')" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- Form Area -->
                <form id="mainForm" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div class id="prodout" role="tab" aria-labelledby="prodout-tab">
                            <div class="space-y-6">
                                <div class="mb-6">
                                    <div class="row sm:flex">
                                        <div class="sm:w-1/2 w-full sm:pr-2">
                                            <label for="date_request"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date
                                                Request</label>
                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                    </svg>
                                                </div>
                                                <input datepicker id="date_request" datepicker-format="dd/mm/yyyy"
                                                    name="date_request" type="text"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Select date"
                                                    autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="sm:w-1/2 w-full sm:pr-2">
                                            <label for="date_out"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date
                                                Out</label>
                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                    </svg>
                                                </div>
                                                <input datepicker id="date_out" datepicker-format="dd/mm/yyyy"
                                                    name="date_out" type="text"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Select date"
                                                    autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <div class="row sm:flex">
                                        <div class="sm:w-1/2 w-full sm:pr-2">
                                            <label for="requested_by"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Requested
                                                By</label>
                                            <select id="requested_by" name="requested_by" class="select2-general-dropdown"
                                                data-show="{{ route('employee.show.dropdown') }}"
                                                data-change="false">
                                            </select>
                                        </div>
                                        <div class="sm:w-1/2 w-full sm:pr-2">
                                            <label for="approved_by"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Approved
                                                By</label>
                                            <select id="approved_by" name="approved_by" class="select2-general-dropdown"
                                                data-show="{{ route('employee.show.dropdown') }}"
                                                data-change="false">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <div class="row sm:flex">
                                        <div class="w-full sm:pr-2">
                                            <label for="selected_product"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Search
                                                Products</label>
                                            <div class="flex">
                                                <select id="selected_product" name="selected_product"
                                                    class="select2-general-dropdown"
                                                    data-show="{{ route('catalog.product.details') }}"
                                                    data-alias="selected_product">
                                                    <option value="">-</option>
                                                </select>
                                                <button type="button" class="ml-2 bg-transparent"
                                                    onclick="addItemToRow()">
                                                    <i class="fa-solid fa-square-plus fa-2xl"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <div class="row sm:flex">
                                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full">
                                            <table
                                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <thead class="text-xs text-white uppercase bg-gray-800">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 w-8/12">
                                                            Product name
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 w-3/12">
                                                            Quantity
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 w-1/12">
                                                            &nbsp;
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="stockout_product_rows">
                                                    <tr
                                                        class="bg-white initial-row-table border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                        <td class="px-6 py-3 text-center text-lg" colspan="3">
                                                            Data not available
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <div class="row sm:flex">
                                        <div class="w-full sm:pr-2">
                                            <label for="selected_product"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Refference
                                                Documents</label>
                                            <div>
                                                <div class="w-full mb-3">
                                                    <input type="file" id="photo_devices" name="photo_devices[]"
                                                        multiple="multiple" onchange="preview_image()">
                                                </div>
                                                <div class="grid grid-cols-4 gap-4" id="image_preview"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex justify-between space-x-2 border-t mt-4 border-gray-200 rounded-b py-4">
                            <button type="button"
                                class="text-white bg-blue-800 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                onClick="saveRecord()">
                                <i class="fa-solid fa-floppy-disk mr-1"></i>
                                Save
                            </button>
                            <a href="{{ route('inventory.prodout.index') }}" id="cancelBtn"
                                class="text-gray-500 bg-white hover:bg-gray-100 hover:text-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-4 py-2.5 focus:z-10">
                                <i class="fa-solid fa-rectangle-xmark mr-1"></i>
                                Cancel and back to Overview
                            </a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/datepicker.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js">
    </script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function() {
            $('.select2-general-dropdown').select2({
                allowClear: true,
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
                            alias: $(this).attr('data-alias'),
                            dataChange: $(this).attr('data-change'),
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        }
                    },
                    cache: true
                },
                placeholder: 'Search here..',
            });

            $('.select2-general-dropdown').on('select2:close', function(e) {
                let getText = $(this).find(':selected');
                var paramsData = getText[0].label;

                if (paramsData) {
                    let url = $(this).attr("data-store");
                    let dataForm = $(this).attr("data-form");
                    let dataChange = $(this).attr("data-change");

                    if (url) {
                        $.ajax({
                            url: url,
                            method: "POST",
                            data: {
                                _token: CSRF_TOKEN,
                                newoption: paramsData,
                                alias: $(this).attr('data-alias')
                            },
                            dataType: "json",
                            success: function(response) {

                                $('#' + dataForm).val(null).trigger('change');

                                if (dataChange == "true") {
                                    var option = new Option(response.message.text, response
                                        .message.text, true, true);
                                } else {
                                    var option = new Option(response.message.text, response
                                        .message.id, true, true);
                                }

                                $('#' + dataForm).append(option).trigger('change');
                                $('#' + dataForm).trigger('change');

                            }
                        });
                    }
                }

            });
        });

        addItemToRow = () => {
            var tbody = document.getElementById("stockout_product_rows");
            var rows = tbody.getElementsByTagName("tr");

            if (rows.length === 1 && rows[0].classList.contains("initial-row-table")) {
                tbody.removeChild(rows[0]); // Remove the "Data not available" row
            }

            var selectedId = $('#selected_product').val();

            // Check if a row with the same product id already exists
            var existingRows = document.querySelectorAll('[name="product_id[]"]');
            for (var i = 0; i < existingRows.length; i++) {
                if (existingRows[i].value === selectedId) {
                    toastr.error("Product already added!");
                    return; // Exit the function if the product already exists
                }
            }

            var selectedText = $('#selected_product option:selected').text();

            $('#stockout_product_rows').prepend(
                '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">' +
                '<th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">' +
                '<input type="text" name="product_id[]" value="' + selectedId + '">' +
                selectedText +
                '</th>' +
                '<td class="px-6 py-2">' +
                '<input type="number" id="qty_out" name="qty_out_' + selectedId + '" class="bg-gray-50 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full">' +
                '</td>' +
                '<td class="px-6 py-2"><i class="fa-solid fa-trash-can fa-lg cursor-pointer" onclick="removeMyRow(this)"></i></i></td>' +
                '</tr>');
        }

        function removeMyRow(element) {
            var row = element.closest("tr"); // Find the closest row element
            if (row) {
                row.remove(); // Remove the row
            }

            var tbody = document.getElementById("stockout_product_rows");
            var rows = tbody.getElementsByTagName("tr");

            if (rows.length === 0) {
                $('#stockout_product_rows').append(
                    '<tr class="bg-white initial-row-table border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">' +
                    '<td class="px-6 py-3 text-center text-lg" colspan="3">Data not available</td>' +
                    '</tr>');
            }
        }

        saveRecord = () => {
            Swal.fire({
                template: '#create-template',
            }).then((result) => {
                if (result.isConfirmed) {
                    const formInput = $('#mainForm')[0];
                    const formData = new FormData(formInput);

                    $.ajax({
                        type: "post",
                        url: "{{ route('inventory.product.out.store') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
                        },
                        beforeSend: function() {
                            Swal.fire({
                                title: 'Please wait...',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                didOpen: () => {
                                    Swal.showLoading()
                                },
                            })
                        },
                        success: function(response) {
                            toastr.success(response.message);

                            window.location.href = "{{ route('inventory.product.out.index') }}";
                        },
                        error: function(response) {
                            Swal.close();

                            $('#warning-alert').removeClass('hidden').addClass('flex');

                            $('.warning-alert-message').html('');
                            $('.warning-alert-title').text('');

                            if (response.status === 422) {
                                $('.warning-alert-title').text(
                                    'Ensure that these requirements are met:');

                                $.each(response.responseJSON.errors, function(indexInArray,
                                    valueOfElement) {
                                    $('.warning-alert-message').append('<li>' +
                                        valueOfElement[0] + '</li>');
                                });
                            } else {
                                $('.warning-alert-title').text('Well, this is unexpected..');
                                $('.warning-alert-message').append('<li>' + response.responseJSON
                                    .message + '</li>');
                            }
                        }
                    });
                }
            });
        }

        preview_image = () => {
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
                    "' placeholder='Image Description' class='mt-2 p-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'><a href='javascript:void(0)' class='delete-button mt-2 text-red-500' onclick=\"delete_image('" +
                    nameFile +
                    "','" +
                    imageId +
                    "')\">Delete</a>    </div>"
                );
            }
        }

        delete_image = (nameFile, imageId) => {
            removeFile(nameFile);
            $("#" + imageId).remove();
        }

        removeFile = (name) => {
            var attachments = document.getElementById("photo_devices").files; // <-- reference your file input here
            var fileBuffer = new DataTransfer();
            // append the file list to an array iteratively
            for (let i = 0; i < attachments.length; i++) {
                // Exclude file in specified index
                if (name !== attachments[i].name) fileBuffer.items.add(attachments[i]);
            }
            // Assign buffer to file input
            document.getElementById("photo_devices").files = fileBuffer
            .files; // <-- according to your file input reference
        }
    </script>
@endsection
