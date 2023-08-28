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

                <button type="button" id="newBtn" onclick="openForm(`{{ route('requestorder.store') }}`)"
                    class="text-white bg-blue-700 hidden sm:block hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="fa-solid fa-plus mr-2"></i>New
                </button>
            </div>

            <div>
                <table id="main-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#RO</th>
                            <th>#SO</th>
                            <th>Customer</th>
                            <th>Period Start</th>
                            <th>RO Activity</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- New modal -->
    <div id="newModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" role="dialog" aria-modal="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white modal-title"></h3>
                    <button type="button" id="closeIco"
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
                    <!-- Alert area -->
                    <div id="alert-frame">
                        <div id="warning-alert"
                            class="hidden items-center p-4 my-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
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
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <!-- URL Area -->
                    <input type="hidden" id="form_url" readonly>
                    <!-- Form Area -->
                    <form id="mainForm" method="post">
                        @csrf
                        <div class="mb-6">
                            <div class="row sm:flex">
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="contract_id"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">#Contract</label>
                                    <select class="select2-ajax" id="contract_id" name="contract_id">
                                        <option disabled>Search here..</option>
                                    </select>
                                </div>
                                <div class="sm:w-1/2 w-full sm:pl-2 sm:pt-0 pt-6">
                                    <label for="ro_number"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">#Request
                                        Order</label>
                                    <input type="text" id="ro_number" name="ro_number"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="Request order number ">
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="activity_code"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Activities</label>
                            <select class="select2-ajax" id="activity_code" name="activity_code">
                                <option disabled>Search here..</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <div class="row sm:flex">
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="so_number"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start
                                        Date</label>
                                    <div class="relative max-w-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input 
                                            datepicker 
                                            id="start_date" 
                                            datepicker-format="dd/mm/yyyy" 
                                            name="start_date" 
                                            type="text"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Select date">
                                    </div>
                                </div>
                                <div class="sm:w-1/2 w-full sm:pl-2 sm:pt-0 pt-6">
                                    <label for="activity_code"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End
                                        Date</label>
                                    <div class="relative max-w-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input 
                                            datepicker 
                                            id="end_date" 
                                            datepicker-format="dd/mm/yyyy" 
                                            name="end_date" 
                                            type="text"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Select date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <div class="row sm:flex">
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="so_number"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">#SO</label>
                                    <input type="text" id="so_number" name="so_number"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="Request order number ">
                                </div>
                                <div class="sm:w-1/2 w-full sm:pl-2 sm:pt-0 pt-6">
                                    <label for="status"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order Status</label>
                                    <select class="select2-ajax" id="status" name="status">
                                        <option value="1">Received</option>
                                        <option value="2">Work in progress</option>
                                        <option value="3">Work completed</option>
                                        <option value="4">Invoiced</option>
                                        <option value="9">Paid</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 py-4">
                    <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        onClick="saveRecord()">Save</button>
                    <button id="cancelBtn" type="button"
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
    <script type="text/javascript" src="{{ asset('core/js/request_order/requestorder-custom.js') }}"></script>
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
                    url: "{{ route('requestorder.main.table') }}",
                },
                columns: [{
                        data: 'ro_number',
                        name: 'ro_number',
                        className: 'all'
                    },
                    {
                        data: 'so_number',
                        name: 'so_number',
                        className: ['text-center', 'min-tablet']
                    },
                    {
                        data: 'client.name',
                        name: 'client.name',
                        class: 'all'
                    },
                    {
                        data: 'start_date',
                        name: 'start_date',
                        class: 'all'
                    },
                    {
                        data: 'orderactivity.activity.activity_name',
                        name: 'orderactivity.activity.activity_name',
                        className: ['text-center', 'min-tablet']
                    },
                    {
                        data: 'total_amount',
                        name: 'total_amount',
                        className: ['text-center', 'min-tablet']
                    },
                    {
                        data: 'status',
                        name: 'status',
                        className: ['text-center', 'min-tablet']
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        class: ['text-center', 'min-tablet'],
                        orderable: false,
                        sortable: false,
                    },
                ],
                columnDefs: [{
                        target: [0, 1, 2, 3, 4, 5, 6],
                        className: "dt-head-center",
                    },
                    {
                        target: [6],
                        width: "5%",
                    },
                    {
                        target: [0, 1, 3, 5, 6],
                        className: "dt-center",
                    },
                ]
            });

            $('#contract_id').select2({
                ajax: {
                    url: "{{ route('contract.show.dropdown') }}",
                    type: 'GET',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        var query = {
                            search: params.term
                        }

                        return query;
                    },
                    processResults: function(response) {
                        return {
                            results: $.map(response, function(obj) {
                                return {
                                    id: obj.id,
                                    text: obj.text,
                                    client: obj.client,
                                    description: obj.description,
                                    startdate: obj.startdate,
                                    enddate: obj.enddate
                                };
                            }),
                        };
                    },
                    cache: true
                },
                templateResult: templateResultContract,
                placeholder: 'Search here..',
                allowClear: true,
                templateSelection: function(data, container) {
                    return data.text;
                },
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop'
            });

            function templateResultContract(option) {
                var $option = $(`` +
                    `<div>` +
                    `<span style="font-size:12px">#Contract:</span><b style="font-size:15px;"> ` + option.text +
                    `</b>` +
                    `</div>` +
                    `<div class="row">` +
                    `<span style="font-size:12px">` +
                    `<div class="col">` + option.client + `</div>` +
                    `<div class="col">` +
                    `<b>` + option.description + `</b>` +
                    `</div><br>` +
                    `<div class="col">` +
                    `Period: ` + option.startdate + ` - ` + option.enddate +
                    `</div>` +
                    `</span>` +
                    `</div>`);

                return $option;
            }

            $('#activity_code').select2({
                ajax: {
                    url: "{{ route('activity.show.dropdown') }}",
                    type: 'GET',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        var query = {
                            search: params.term
                        }

                        return query;
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                },
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop'
            });

            $('#status').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                minimumResultsForSearch: -1
            });
        });
    </script>
@endsection
