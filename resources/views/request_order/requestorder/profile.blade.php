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

            <!-- Request Order Profile -->
            <div class="p-4 mb-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="pb-4 flex justify-between">
                    <a href="{{ route('contract.show', ['contract' => $requestorder->contract->id]) }}" target="_blank">
                        <small>Contract Number</small>
                        <div class="flex items-center">
                            <h6 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $requestorder->contract->contract_number }}</h6><i class="fa-solid fa-share ml-3"></i>
                        </div>
                    </a>
                    <a href="#">
                        <small>Request Order Number</small>
                        <div class="flex items-center">
                            <h6 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $requestorder->ro_number }}</h6><i class="fa-solid fa-copy ml-3 icon-copy-ronumber"></i>
                        </div>
                    </a>
                    <a href="#">
                        <small>Sales Order Number</small>
                        <h6 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $requestorder->so_number }}</h6>
                    </a>
                    <a href="#">
                        <small>Request Amount</small>
                        <div class="flex items-center">
                            <i class="fa-solid fa-rupiah-sign mr-3">.</i>
                            <h6 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white request-order-amount">
                                {{ number_format($requestorder->orderdetails->sum('sub_total')) }}
                            </h6>
                        </div>
                    </a>
                </div>
                <p class="font-medium text-gray-700 dark:text-gray-400">{{ $requestorder->client->name }}</p>
                <p class="font-normal text-gray-700 dark:text-gray-400 mb-2">{{ $requestorder->contract->description }}</p>
                <small>Period: <span
                        class="font-bold">{{ \Carbon\Carbon::parse($requestorder->start_date)->format('d/m/Y') }} -
                        {{ \Carbon\Carbon::parse($requestorder->end_date)->format('d/m/Y') }}</span></small>
            </div>

            <!-- Request Order Items -->
            <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
                    id="defaultTab">
                    <button type="button" aria-controls="about" aria-selected="true"
                        class="inline-block p-4 text-blue-600 rounded-tl-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Request
                        Order Items</button>
                </div>
                <div>
                    <div class="p-4 bg-white rounded-lg md:p-6 dark:bg-gray-800" id="about" role="tabpanel"
                        aria-labelledby="about-tab">
                        <div class="mb-5 flex justify-end">
                            <button type="button" id="newBtn"
                                onclick="openForm(`{{ route('requestorderitem.store') }}`)"
                                class="text-white bg-blue-700 hidden sm:block hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <i class="fa-solid fa-plus mr-2"></i>New
                            </button>
                        </div>
                        <div>
                            <table id="item-table" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Decription</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Sub Total</th>
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

    <!-- New Customer modal -->
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
                    <!-- Alert Message Area -->
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
                            <label for="item"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item</label>
                            <select class="select2-ajax" id="costing_id" name="costing_id">
                                <option disabled>Select item</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <div class="row sm:flex">
                                <div class="sm:w-2/3 w-full sm:pr-2">
                                    <label for="unit_price"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                    <input type="text" id="unit_price" name="unit_price"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="Price" readonly>
                                </div>
                                <div class="sm:w-1/2 w-full sm:pl-2 sm:pt-0 pt-6">
                                    <label for="quantity"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                                    <input type="number" id="quantity" name="quantity"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="Quantity" onkeyup="calculateAmount()">
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="sub_total"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Price</label>
                            <input type="text" id="sub_total" name="sub_total"
                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Total Price" required readonly>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 py-4">
                    <button id="saveFormBtn" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        onClick="saveRecord('{{ $requestorder->id }}')">Save</button>
                    <button id="cancelBtn" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js">
    </script>
    <script type="text/javascript" src="{{ asset('core/js/request_order/profilerequestorder-custom.js') }}"></script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function() {
            let tableItem = $('#item-table').DataTable({
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
                    url: "{{ route('requestorderitem.main.table') }}",
                    data: function(d) {
                        d.requestId = {{ $requestorder->id }};
                    }
                },
                columns: [{
                        data: 'description',
                        name: 'description',
                        className: 'all',
                        orderable: true,
                        sortable: true,
                        searchable: true,
                    },
                    {
                        data: 'quantity',
                        name: 'quantity',
                        className: ['min-tablet', 'text-center'],
                        orderable: true,
                        sortable: true,
                    },
                    {
                        data: 'unit_price',
                        name: 'unit_price',
                        className: ['min-tablet', 'text-center'],
                        orderable: true,
                        sortable: true,
                    },
                    {
                        data: 'sub_total',
                        name: 'sub_total',
                        className: ['min-tablet', 'text-center'],
                        orderable: true,
                        sortable: true,
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        className: ['min-tablet', 'text-center'],
                        orderable: false,
                        sortable: false,
                    },
                ],
                search: {
                    regex: true
                },
                columnDefs: [{
                        className: "dt-body-center",
                        target: [1, 4]
                    },
                    {
                        className: "dt-body-right",
                        target: [2, 3],
                        width: "15%",
                    },
                    {
                        target: [1, 4],
                        width: "5%",
                    },
                ]
            });

            tableItem.on('draw', function() {
                updateTotalAmount("{{ route('requestorderitem.totalamount') }}", {{ $requestorder->id }});
            })

            $('#costing_id').select2({
                ajax: {
                    url: "{{ route('costing.show.dropdown') }}",
                    type: 'GET',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: params.term,
                            contractId: {{ $requestorder->contract->id }}
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
                                    class: obj.class,
                                    unitrate: obj.unitrate,
                                    price: obj.price,
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

            function templateResult(option) {
                var classDesc = option.class ? `<div class="col"><b>Class:</b> ` + option.class + `</div>` : '';
                var unitRate = option.unitrate ? `<div class="col"><b>Rate:</b> ` + option.unitrate + `</div>` : '';
                var price = option.price ? `<div class="col"><b>Price:</b> Rp. ` + option.price + `</div>` : '';

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
                    `</div>` +
                    classDesc +
                    unitRate +
                    price +
                    `</i>` +
                    `</div>`);

                return $option;
            }

            $('#costing_id').on('select2:select', function(e) {
                let data = e.params.data;
                let calculateResult = data.price.replace(/,/g, '') * 1;

                $('#unit_price').val(data.price);
                $('#quantity').val(1);
                $('#sub_total').val(new Intl.NumberFormat().format(calculateResult));
            })

            $('#costing_id').on('select2:clear', function(e) {
                $('#unit_price').val(0);
                $('#quantity').val(0);
                $('#sub_total').val(0);
            })

            $('.icon-copy-ronumber').click(function() {
                var textToCopy = {{ $requestorder->ro_number }};

                var tempInput = $('<input>');
                $('body').append(tempInput);
                tempInput.val(textToCopy).select();
                document.execCommand('copy');
                tempInput.remove();

                toastr.success(textToCopy + ' copied');
            });
        });

        function calculateAmount() {
            let unitPrice = $('#unit_price').val().replace(/,/g, '');
            let quantity = $('#quantity').val();
            let calculateResult = unitPrice * quantity;

            $('#sub_total').val(new Intl.NumberFormat().format(calculateResult));
        }
    </script>
@endsection
