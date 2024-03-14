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

                <div class="flex space-x-3"> <!-- Container untuk tombol-tombol -->
                    <button type="button" onclick="openUploadModalForm()"
                        class="text-white bg-green-500 sm:block hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-md text-sm px-3 py-2 text-center md:mr-0">
                        <i class="fa-solid fa-file-import mr-1"></i> Import
                    </button>

                    <a href="{{ route('firegas.create') }}" id="newBtn"
                        class="text-white bg-blue-600 sm:block hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-3 py-2 text-center md:mr-0">
                        <i class="fa-solid fa-plus-circle mr-2"></i> New
                    </a>
                </div>
            </div>

            <div>
                <table id="main-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Area</th>
                            <th>Subarea</th>
                            <th>Platform</th>
                            <th>Tag Number</th>
                            <th>Sensor Location</th>
                            <th>Equipment Type</th>
                            <th>Integrity Status</th>
                            <th>Asset Type</th>
                            <th>Manufacturer</th>
                            <th>Model Number</th>
                            <th>Part Number</th>
                            <th>Serial Number</th>
                            <th>Startup</th>
                            <th>Last Execution</th>
                            <th>Total Hours</th>
                            <th>Number of Tag Failures</th>
                            <th>Number of Serial Failures</th>
                            <th>Test Interval</th>
                            <th>Failure Rate</th>
                            <th>PFD</th>
                            <th>Defect Highlight</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Upload Excel modal -->
    <div id="uploadExcelModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" role="dialog"
        aria-modal="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Upload File</h3>
                    <button type="button" onclick="uploadExcelModal.hide()"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="px-6 space-y-6">
                    <!-- Alert Area -->
                    <div id="alert-frame">
                        <div id="warning-alert-activity"
                            class="hidden items-center p-4 my-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium warning-alert-activity-title"></span>
                                <ul class="mt-1.5 ml-4 list-disc list-inside warning-alert-activity-message"></ul>
                            </div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                                onclick="$('#warning-alert-activity').removeClass('flex').addClass('hidden')"
                                aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <!-- Form Area -->
                    <form id="uploadXlsForm" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File</label>
                            <input type="file" id="file" name="file"
                                accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 py-4">
                    <button id="saveFormBtn" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        onClick="uploadFile()">Upload</button>
                    <button type="button" onclick="uploadExcelModal.hide()"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                </div>
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
            $('#main-table').DataTable({
                language: {
                    processing: "Loading. Please wait..."
                },
                responsive: true,
                processing: true,
                serverSide: true,
                deferRender: true,
                ajax: {
                    url: "{{ route('firegas.main.table') }}",
                },
                columns: [{
                        data: 'area',
                        name: 'area'
                    },
                    {
                        data: 'subarea',
                        name: 'subarea',
                    },
                    {
                        data: 'platform',
                        name: 'platform',
                    },
                    {
                        data: 'tagnumber',
                        name: 'tagnumber',
                    },
                    {
                        data: 'sensorlocation',
                        name: 'sensorlocation',
                    },
                    {
                        data: 'equipment_type',
                        name: 'equipment_type',
                    },
                    {
                        data: 'integritystatus',
                        name: 'integritystatus',
                    },
                    {
                        data: 'asset_type',
                        name: 'asset_type',
                    },
                    {
                        data: 'manufacturer',
                        name: 'manufacturer',
                    },
                    {
                        data: 'modelnumber',
                        name: 'modelnumber',
                    },
                    {
                        data: 'partnumber',
                        name: 'partnumber',
                    },
                    {
                        data: 'serialnumber',
                        name: 'serialnumber',
                    },
                    {
                        data: 'startup',
                        name: 'startup',
                    },
                    {
                        data: 'lastexecution',
                        name: 'lastexecution',
                    },
                    {
                        data: 'totalhours',
                        name: 'totalhours',
                    },
                    {
                        data: 'numberoftagfailures',
                        name: 'numberoftagfailures',
                    },
                    {
                        data: 'numberofserialfailures',
                        name: 'numberofserialfailures',
                    },
                    {
                        data: 'testinterval',
                        name: 'testinterval',
                    },
                    {
                        data: 'failurerate',
                        name: 'failurerate',
                    },
                    {
                        data: 'pfd',
                        name: 'pfd',
                    },
                    {
                        data: 'defecthighlight',
                        name: 'defecthighlight',
                    },
                    {
                        data: 'remarks',
                        name: 'remarks',
                    },

                ],
                columnDefs: [{
                        sortable: false,
                        orderable: false,
                        targets: [0]
                    },
                    {
                        className: "dt-center",
                        target: [0, 2, 3, 6]
                    },
                    {
                        className: "tablet-1",
                        target: [7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21]
                    },
                ],
                order: []
            });
        });

        const $uploadExcelModal = document.getElementById('uploadExcelModal');
        const uploadExcelModal = new Modal($uploadExcelModal);

        openUploadModalForm = () => {
            uploadExcelModal.show();
        }

        function uploadFile() {
            var formData = new FormData();
            formData.append('file', $('#file')[0].files[0]);
            formData.append('_token', CSRF_TOKEN);

            $.ajax({
                type: "post",
                url: "{{ route('firegas.data.import') }}",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                enctype: "multipart/form-data",
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
                    Swal.close();
                    toastr.success(response.message);
                    uploadExcelModal.hide();

                    $('#main-table').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    Swal.close();
                    toastr.error(xhr.responseJSON.message);
                }
            });
        }
    </script>
@endsection
