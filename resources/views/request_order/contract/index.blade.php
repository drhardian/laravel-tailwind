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

            <!-- Contract Details Area -->
            <div>
                <div class="flex justify-center">
                    <div
                        class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-between">
                            <div>
                                <span class="underline sm:block hidden">Contract No.</span>
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $contract->contract_number }}</h5>
                                <span id="clientid" class="hidden">{{ $contract->client_id }}</span>
                                <span id="contractid" class="hidden">{{ $contract->id }}</span>
                            </div>
                            <div>
                                <span class="underline sm:block hidden">Contract Period</span>
                                <p class="font-normal text-gray-700 dark:text-gray-600 text-sm sm:block hidden">
                                    <span
                                        class="font-semibold">{{ \Carbon\Carbon::parse($contract->start_date)->format('d-M-Y') }}</span>
                                    to
                                    <span
                                        class="font-semibold">{{ \Carbon\Carbon::parse($contract->end_date)->format('d-M-Y') }}</span>
                                </p>
                            </div>
                        </div>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $contract->description }}</p>
                        <p class="mb-10 sm:mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $contract->details }}</p>
                        <p class="font-normal text-gray-700 dark:text-gray-600 text-sm sm:hidden">
                            <span
                                class="font-semibold">{{ \Carbon\Carbon::parse($contract->start_date)->format('d-M-Y') }}</span>
                            to
                            <span
                                class="font-semibold">{{ \Carbon\Carbon::parse($contract->end_date)->format('d-M-Y') }}</span>
                        </p>
                    </div>
                </div>
            </div>

            <div>
                <div class="flex justify-center mt-5">
                    <div
                        class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <!-- Tab Panel -->
                        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                                data-tabs-toggle="#myTabContent" role="tablist">
                                <li class="mr-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="costing-tab" data-tabs-target="#costing" type="button" role="tab"
                                        aria-controls="costing" aria-selected="false">Costing</button>
                                </li>
                                <li class="mr-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="activity-tab" data-tabs-target="#activity" type="button" role="tab"
                                        aria-controls="activity" aria-selected="false">Activities</button>
                                </li>
                            </ul>
                        </div>
                        <!-- Tab Page -->
                        <div id="myTabContent">
                            <!-- Costing Tab -->
                            <div class="hidden px-4 pb-4 rounded-lg dark:bg-gray-800" id="costing" role="tabpanel"
                                aria-labelledby="costing-tab">
                                <div class="mb-5 flex justify-end">
                                    <button type="button" id="newCostingBtn"
                                        onclick="openFormCosting(`{{ route('costing.store') }}`)"
                                        class="text-white bg-blue-700 hidden sm:block hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <i class="fa-solid fa-plus mr-2"></i>New
                                    </button>
                                </div>
                                <div>
                                    <table id="costing-table" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Rate Type</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Activity Tab -->
                            <div class="hidden p-4 rounded-lg dark:bg-gray-800" id="activity" role="tabpanel"
                                aria-labelledby="activity-tab">
                                <div class="mb-5 flex justify-end">
                                    <button type="button" id="newActivityBtn"
                                        onclick="openFormActivity(`{{ route('contractactivity.store') }}`)"
                                        class="text-white bg-blue-700 hidden sm:block hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <i class="fa-solid fa-plus mr-2"></i>New
                                    </button>
                                </div>
                                <div>
                                    <table id="activity-table" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Activity</th>
                                                <th>Value</th>
                                                <th>Update At</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating button on mobile screen -->
    <button
        class="flex sm:hidden fixed z-50 bottom-10 right-8 bg-blue-700 w-12 h-12 rounded-full drop-shadow-lg justify-center items-center text-white text-xl hover:bg-blue-800 hover:drop-shadow-2xl animate-bounce duration-300"
        onclick="openFormCosting(`{{ route('costing.store') }}`)">
        <i class="fa-solid fa-plus"></i>
    </button>

    <!-- New Costing modal -->
    <div id="newCostingModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" role="dialog"
        aria-modal="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white modal-title"></h3>
                    <button type="button" id="closeCostingIco"
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
                        <div id="warning-alert-costing"
                            class="hidden items-center p-4 my-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium warning-alert-costing-title"></span>
                                <ul class="mt-1.5 ml-4 list-disc list-inside warning-alert-costing-message"></ul>
                            </div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                                onclick="$('#warning-alert-costing').removeClass('flex').addClass('hidden')" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <!-- URL Area -->
                    <input type="hidden" id="form_costing_url" readonly>
                    <!-- Form Area -->
                    <form id="costingForm" method="post">
                        <div class="mb-6">
                            <label for="item"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item</label>
                            <select class="select2-ajax" id="item_id" name="item_id">
                                <option disabled>Select item</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <div class="row sm:flex">
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="unitrate"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit
                                        Rate</label>
                                    <select class="select2-ajax" id="unit_rate_id" name="unit_rate_id">
                                        <option disabled>Select Unit Rate</option>
                                    </select>
                                </div>
                                <div class="sm:w-1/2 w-full sm:pl-2 sm:pt-0 pt-6">
                                    <label for="price"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                    <input type="number" id="price" name="price"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="Item Price">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 py-4">
                    <button id="saveFormBtn" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        onClick="saveCostingRecord()">Save</button>
                    <button id="cancelCostingBtn" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- New Activity modal -->
    <div id="newActivityModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" role="dialog"
        aria-modal="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white modal-title"></h3>
                    <button type="button" id="closeActivityIco"
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
                                onclick="$('#warning-alert-activity').removeClass('flex').addClass('hidden')" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <!-- URL Area -->
                    <input type="hidden" id="form_activity_url" readonly>
                    <!-- Form Area -->
                    <form id="activityForm" method="post">
                        <div class="mb-6">
                            <label for="activity_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Activity</label>
                            <select class="select2-ajax" id="activity_id" name="activity_id">
                                <option disabled>Select here..</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="value"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contract Value</label>
                            <input type="number" id="value" name="value"
                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required placeholder="Write here">
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 py-4">
                    <button id="saveFormBtn" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        onClick="saveActivityRecord()">Save</button>
                    <button id="cancelActivityBtn" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@vite(['resources/js/tab.js'])

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/datepicker.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js">
    </script>
    <script type="text/javascript" src="{{ asset('core/js/request_order/contract-custom.js') }}"></script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function() {
            $('#costing-table').DataTable({
                language: {
                    processing: "Loading. Please wait..."
                },
                responsive: true,
                processing: true,
                serverSide: true,
                deferRender: true,
                searching: true,
                bAutoWidth: false,
                ajax: {
                    url: "{{ route('costing.table') }}",
                    data: function (d) {
                        d.clientId= $('#clientid').text();
                        d.contractId= $('#contractid').text();
                    }
                },
                columns: [{
                        data: 'rate_type',
                        name: 'unitrate.rate_name',
                        className: 'all',
                        orderable: true,
                        sortable: true,
                        searchable: true,
                    },
                    {
                        data: 'description',
                        name: 'description',
                        className: 'min-tablet',
                        orderable: true,
                        sortable: true,
                    },
                    {
                        data: 'price_wcurrency',
                        name: 'price_wcurrency',
                        className: 'min-tablet',
                        className: 'text-center',
                        orderable: true,
                        sortable: true,
                        searchable: true,
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        className: 'min-tablet',
                        className: 'text-center',
                        orderable: true,
                        sortable: true,
                        searchable: false,
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                        className: 'min-tablet',
                        className: 'text-center',
                        orderable: true,
                        sortable: true,
                        searchable: false,
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        className: 'min-tablet',
                        className: 'text-center',
                        orderable: false,
                        sortable: false,
                        searchable: false,
                    },
                    {
                        data: 'item.activity.activity_name',
                    },
                    {
                        data: 'item.itemtype.type_name',
                    },
                    {
                        data: 'item.size',
                    },
                    {
                        data: 'item.class',
                    },
                    {
                        data: 'price',
                    },
                ],
                search: {
                    regex: true
                },
                columnDefs: [{
                        target: [6, 7, 8, 9, 10],
                        visible: false,
                    },
                    {
                        className: "dt-head-center",
                        target: [0, 1, 2, 3, 4]
                    },
                    {
                        target: [0],
                        width: "17%",
                    },
                    {
                        target: [2],
                        width: "17%",
                    },
                    {
                        target: [3, 4],
                        width: "11%",
                    },
                    {
                        target: [5],
                        width: "5%",
                    },
                ]
            });

            $('#item_id').select2({
                ajax: {
                    url: "{{ route('item.show.dropdown') }}",
                    type: 'GET',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: params.term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: $.map(response, function(obj) {
                                return {
                                    id: obj.id,
                                    text: obj.activity,
                                    type_name: obj.itemtype,
                                    size: obj.text,
                                    class: obj.class
                                };
                            }),
                        }
                    },
                    cache: true
                },
                templateResult: templateResult,
                placeholder: 'Select an item',
                allowClear: true,
                templateSelection: function(data, container) {
                    if (data.type_name) {
                        let classDesc = data.class ? ', ' + data.class : '';
                        let sizeDesc = data.size ? ', ' + data.size : '';

                        return data.text + ' ( ' + data.type_name + sizeDesc + classDesc + ' )';
                    } else {
                        return data.text;
                    }
                },
                width: 'resolve',
                dropdownCssClass: 'bigdrop'
            });

            $('#unit_rate_id').select2({
                ajax: {
                    url: "{{ route('unitrate.activity.show.dropdown') }}",
                    type: 'GET',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        var query = {
                            search: params.term,
                            itemid: $('#item_id').val(),
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
                placeholder: 'Select unit rate',
                allowClear: true,
                width: 'resolve',
                dropdownCssClass: 'bigdrop'
            });

            function templateResult(option) {
                var classDesc = option.class ? `<div class="col"><b>Class:</b> ` + option.class + `</div>` : '';

                var $option = $(`<div>` +
                    `<b style="font-size:11px">Activity:</b><span style="font-size:13px;"> ` + option.text +
                    `</span>` +
                    `</div>` +
                    `<div class="row">` +
                    `<i style="font-size:11px">` +
                    `<div class="col">` +
                    `<b>Type:</b> ` + option.type_name +
                    `</div>` +
                    `<div class="col">` +
                    `<b>Size:</b> ` + option.size +
                    `</div>` + classDesc +
                    `</i>` +
                    `</div>`);

                return $option;
            }

            $('#item_id').on('select2:select', function(e) {
                $('#unit_rate_id').val(null).trigger('change');
            });

            $('#activity_id').select2({
                ajax: {
                    url: "{{ route('activity.show.dropdown') }}",
                    type: 'GET',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: params.term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        }
                    },
                    cache: true
                },
                width: 'resolve',
                dropdownCssClass: 'bigdrop',
                placeholder: 'Select here..'
            });

            $('#activity-table').DataTable({
                language: {
                    processing: "Loading. Please wait..."
                },
                responsive: true,
                processing: true,
                serverSide: true,
                deferRender: true,
                searching: true,
                bAutoWidth: false,
                ajax: {
                    url: "{{ route('contractactivity.table') }}",
                    data: function (d) {
                        d.contractId= $('#contractid').text();
                    }
                },
                columns: [{
                        data: 'activity_name',
                        name: 'activity.activity_name',
                        className: 'all',
                        orderable: true,
                        sortable: true,
                        searchable: true,
                    },
                    {
                        data: 'price_wcurrency',
                        name: 'price_wcurrency',
                        className: 'min-tablet',
                        className: 'text-center',
                        orderable: true,
                        sortable: true,
                        searchable: true,
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                        className: 'min-tablet',
                        className: 'text-center',
                        orderable: false,
                        sortable: false,
                        searchable: false,
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        className: 'min-tablet',
                        className: 'text-center',
                        orderable: false,
                        sortable: false,
                        searchable: false,
                        width: "5%",
                    },
                ],
                search: {
                    regex: true
                },
                columnDefs: [
                    {
                        className: "dt-body-center",
                        target: [2,3]
                    },
                    {
                        target: [1],
                        width: "20%",
                    },
                    {
                        target: [2],
                        className: "dt-head-center",
                        width: "10%",
                    },
                    {
                        target: [3],
                        width: "5px",
                    },
                ]
            });
        });
    </script>
@endsection
