@extends('layout.index')

@section('content')
    <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl">

        <div class="flex justify-start mt-10">
            <div class="grid grid-cols-13 gap-2 w-full h-48">
                <div class="col-start-1 col-end-2 flex justify-center">
                    <img class="rounded-full w-36 h-36 ring-2 ring-gray-300 p-1"
                        src="https://ui-avatars.com/api/?name={{ isset($customer->name) ? $customer->name:'' }}&background=1450A3&color=F5F5F5&bold=true"
                        alt="image description">
                </div>
                <div class="col-start-2 col-end-8">
                    <span class="text-lg">{{ isset($customer->name) ? $customer->name:'' }}</span>
                    <p class="mt-5">{{ isset($customer->address) ? $customer->address:'' }}</p>
                    <p class="font-semibold">{{ isset($customer->email) ? $customer->email:'' }}</p>
                    <p class="text-slate-400">{{ isset($customer->phone_number) ? $customer->phone_number:'' }}</p>
                </div>
                <div class="col-start-8 col-end-13">
                    <div class="w-full h-full border rounded-lg p-3">
                        <div class="flex items-center justify-between mb-5">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Contract Details</h5>
                            <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                                View others
                            </a>
                        </div>
                        <div class="flow-root">
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-1 min-w-0">
                                            <input type="hidden" id="selected-contract-id" value="{{ isset($contract->id) ? $contract->id:'' }}">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                <a href="#"
                                                    class="hover:underline">{{ isset($contract->contract_number) ? $contract->contract_number:'' }}</a>
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                {{ isset($contract->description) ? $contract->description:'' }}
                                            </p>
                                            <p class="text-gray-500 truncate dark:text-gray-400 pt-10">
                                                <small>Period:
                                                    <b>{{ isset($contract->start_date) ? \Carbon\Carbon::parse($contract->start_date)->format('d/m/Y'):'00/00/0000' }}</b>
                                                    -
                                                    <b>{{ isset($contract->end_date) ? \Carbon\Carbon::parse($contract->end_date)->format('d/m/Y'):'00/00/0000' }}</b></small>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="h-px my-4 bg-gray-200 border-0">

        <div class="flex px-0 gap-x-5">
            <div class="w-1/3 grid gap-y-2">
                <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between px-4 py-3">
                        <div class="flex flex-col items-left justify-center">
                            <dt class="mb-2 text-3xl font-extrabold contracts-text">
                                <small class="text-sm">
                                    <i class="fa-solid fa-rupiah-sign mr-2">.</i>
                                </small>
                                {{ isset($contract) ? number_format($contract->contractactivities->sum('value')):0 }}
                            </dt>
                            <dd class="text-gray-500 dark:text-gray-400">Initial Contract Value</dd>
                        </div>
                        <i class="fa-solid fa-cash-register fa-2xl"></i>
                    </div>
                </div>
                <div
                    class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-2">
                    <div class="flex items-center justify-between px-4 py-3">
                        <div class="flex flex-col items-left justify-center">
                            <dt class="mb-2 text-3xl font-extrabold contracts-text">
                                <small class="text-sm">
                                    <i class="fa-solid fa-rupiah-sign mr-2">.</i>
                                </small>
                                {{ number_format($remainingContractValue) }}
                            </dt>
                            <dd class="text-gray-500 dark:text-gray-400">Remaining Contract Value</dd>
                        </div>
                        <i class="fa-solid fa-scale-unbalanced-flip fa-2xl"></i>
                    </div>
                </div>
            </div>
            <div class="w-1/3 grid gap-y-2">
                <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between px-4 py-3">
                        <div class="flex flex-col items-left justify-center">
                            <dt class="mb-2 text-3xl font-extrabold contracts-text">
                                <small class="text-sm">
                                    <i class="fa-solid fa-rupiah-sign mr-2">.</i>
                                </small>
                                {{ number_format($requestOrderCommitted->sum('sub_total')) }}
                            </dt>
                            <dd class="text-gray-500 dark:text-gray-400">Request Order Committed</dd>
                        </div>
                        <i class="fa-solid fa-handshake fa-2xl"></i>
                    </div>
                </div>
                <div
                    class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-2">
                    <div class="flex items-center justify-between px-4 py-3">
                        <div class="flex flex-col items-left justify-center">
                            <dt class="mb-2 text-3xl font-extrabold contracts-text">
                                <small class="text-sm">
                                    <i class="fa-solid fa-rupiah-sign mr-2">.</i>
                                </small>
                                {{ number_format($requestOrderInProgress) }}
                            </dt>
                            <dd class="text-gray-500 dark:text-gray-400">Request Order In Progress</dd>
                        </div>
                        <i class="fa-solid fa-list-check fa-2xl"></i>
                    </div>
                </div>
            </div>
            <div class="w-1/3 grid gap-y-2">
                <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between px-4 py-3">
                        <div class="flex flex-col items-left justify-center">
                            <dt class="mb-2 text-3xl font-extrabold contracts-text">
                                <small class="text-sm">
                                    <i class="fa-solid fa-rupiah-sign mr-2">.</i>
                                </small>
                                {{ number_format($requestOrderInvoiced->sum('sub_total') + $requestOrderPaid->sum('sub_total')) }}
                            </dt>
                            <dd class="text-gray-500 dark:text-gray-400">Request Order Invoiced</dd>
                        </div>
                        <i class="fa-regular fa-rectangle-list fa-2xl"></i>
                    </div>
                </div>
                <div
                    class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-2">
                    <div class="flex items-center justify-between px-4 py-3">
                        <div class="flex flex-col items-left justify-center">
                            <dt class="mb-2 text-3xl font-extrabold contracts-text">
                                <small class="text-sm">
                                    <i class="fa-solid fa-rupiah-sign mr-2">.</i>
                                </small>
                                {{ number_format($requestOrderInvoiced->sum('sub_total')) }}
                            </dt>
                            <dd class="text-gray-500 dark:text-gray-400">Request Order Unpaid</dd>
                        </div>
                        <i class="fa-solid fa-sack-xmark fa-2xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 mb-5 grid grid-cols-3 gap-5">
            @if ($contract)
                @foreach ($contract->contractactivities as $activity)
                    <div
                        class="h-64 mix-blend-luminosity p-3 bg-white/10 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="text-center mb-6">
                            <a href="#"
                                onclick="openChartModal('{{ $activity->activity->activity_name }}','{{ $activity->activity->id }}','{{ $contract->id }}')">
                                <span
                                    class="mb-2 font-bold tracking-tight text-gray-900 dark:text-white text-sm hover:underline">
                                    {{ $activity->activity->activity_name }}
                                </span>
                            </a>
                        </div>
                        <div id="chart_{{ $activity->activity->id }}" class="flex h-40 items-center justify-center">
                            <button disabled type="button" class="py-2.5 px-5 mr-2 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 inline-flex items-center">
                                <svg aria-hidden="true" role="status" class="inline w-6 h-6 mr-3 text-gray-200 animate-spin dark:text-gray-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#1C64F2"/>
                                </svg>
                                Loading...
                            </button>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="mt-5 mb-5 grid grid-cols-2 gap-5">
            <div class="border rounded-lg shadow p-3">
                <div class="flex items-center justify-between mb-10">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Contract Activities</h5>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($activities as $activity)
                            <li class="py-1 sm:py-2">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            <a href="#" class="hover:underline">{{ $activity->activity_name }}</a>
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            {{ $activity->totalro }} request orders
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        <small class="text-sm">
                                            <i class="fa-solid fa-rupiah-sign mr-1">.</i>
                                        </small>
                                        {{ number_format($activity->value) }}
                                    </div>
                                </div>
                            </li>
                            @php
                                $total = $total + $activity->value;
                            @endphp
                        @endforeach
                        <li class="py-1 sm:py-2">
                            <div class="flex items-center space-x-4">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        <a href="#" class="hover:underline">TOTAL</a>
                                    </p>
                                </div>
                                <div
                                    class="inline-flex items-center text-base font-extrabold dark:text-white text-blue-950">
                                    <small class="text-sm">
                                        <i class="fa-solid fa-rupiah-sign mr-1">.</i>
                                    </small>
                                    {{ number_format($total) }}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border rounded-lg shadow p-3">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Request Orders</h5>
                </div>
                <div class="flow-root">
                    <div>
                        <table id="ro-table" class="table table-striped table-bordered hover" style="width:100%">
                            <thead class="bg-sky-800 text-white bg-opacity-85">
                                <tr>
                                    <th>#Request Order</th>
                                    <th>Period Start</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- New modal -->
    <div id="newModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" role="dialog"
        aria-modal="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Request Order Items</h3>
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
                <div class="p-5">
                    <div>
                        <input type="hidden" id="selected-contract-id" readonly>
                        <table id="roitem-table" class="table table-striped table-bordered" style="width:100%">
                            <thead class="bg-sky-800 text-white bg-opacity-85">
                                <tr>
                                    <th>Decription</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody id="roitem-row"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart modal -->
    <div id="newChartModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" role="dialog"
        aria-modal="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white chart-modal-title"></h3>
                    <button type="button" id="closeChartModalIco"
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
                <div class="p-5">
                    <div id="chart_activity" class="flex items-center justify-center"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        let compareValuePerActivityChart = new ApexCharts(
            document.querySelector("#chart_activity"), 
            {
                series: [{
                    name: 'Actual',
                    data: []
                }],
                chart: {
                    height: 350,
                    type: 'bar',
                    id: 'chart_activity'
                },
                plotOptions: {
                    bar: {
                        columnWidth: '60%'
                    }
                },
                colors: ['#00E396'],
                dataLabels: {
                    enabled: true,
                    formatter: function (val, opts) {
                        return 'Rp. ' + new Intl.NumberFormat().format(val)
                    }
                },
                legend: {
                    show: true,
                    showForSingleSeries: true,
                    customLegendItems: ['Actual', 'Expected'],
                    markers: {
                        fillColors: ['#00E396', '#775DD0']
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return 'Rp. ' + new Intl.NumberFormat().format(value)
                        }
                    }
                }
            }
        );

        $(document).ready(function() {
            $('#ro-table').DataTable({
                language: {
                    processing: "Loading. Please wait..."
                },
                responsive: true,
                processing: true,
                serverSide: true,
                deferRender: true,
                lengthChange: false,
                ajax: {
                    url: "{{ route('requestorder.bycontract.main.table') }}",
                    data: function(d) {
                        d.contractId = {{ $contract ? $contract->id:'' }};
                    }
                },
                columns: [{
                        data: 'ronumber',
                        name: 'ronumber',
                        className: 'all'
                    },
                    {
                        data: 'start_date',
                        name: 'start_date',
                        class: 'all'
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
                    }
                ],
                columnDefs: [{
                    target: [0, 1, 3],
                    className: "dt-center",
                }, ],
            });

            $.ajax({
                type: "get",
                url: "{{ route('ro.dashboard.external.chart.activities') }}",
                data: {
                    contractId: $('#selected-contract-id').val()
                },
                success: function(response) {
                    $.each(response, function(index, value) {
                        new ApexCharts(document.querySelector("#chart_" + value.chartid), {
                            series: [],
                            chart: {
                                id: 'chart_' + value.chartid,
                                type: 'donut',
                                width: '85%'
                            },
                            labels: [],
                            responsive: [{
                                breakpoint: 480,
                                options: {
                                    chart: {
                                        width: 200
                                    },
                                    legend: {
                                        position: 'bottom'
                                    }
                                }
                            }],
                            plotOptions: {
                                pie: {
                                    donut: {
                                        size: '45%'
                                    }
                                }
                            },
                            legend: {
                                show: true,
                            },
                            tooltip: {
                                custom: function({
                                    series,
                                    seriesIndex,
                                    w
                                }) {
                                    return '<div class="p-2"><span class="underline">' +
                                        w.globals.labels[seriesIndex] +
                                        ':</span><p>Rp. ' + new Intl.NumberFormat()
                                        .format(series[seriesIndex]) + '</p>' +
                                        '</div>'
                                }
                            }

                        }).render();

                        ApexCharts.exec('chart_' + value.chartid,
                            'updateOptions', {
                                series: value.series,
                                labels: value.labels,
                                colors: value.colors,
                            }, false, false);
                    });
                }
            });

            $('#roitem-table').DataTable({
                language: {
                    processing: "Loading. Please wait..."
                },
                responsive: true,
                processing: true,
                deferRender: true,
                searching: true,
                bAutoWidth: false,
                lengthChange: false,
                pageLength: 5,
                search: {
                    regex: true
                },
                ajax: {
                    url: "{{ route('requestorderitem.main.dashboard.external.table') }}",
                    data: function(d) {
                        d.contractId = $('#selected-contract-id').val();
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
                ],
                columnDefs: [{
                        className: "dt-body-center",
                        width: "5%",
                        target: [1]
                    },
                    {
                        className: "dt-body-right",
                        target: [2, 3],
                        width: "15%",
                    }
                ],
            });
        });

        const $newModal = document.getElementById('newModal');
        const modal = new Modal($newModal);

        let closeIco = document.getElementById('closeIco');

        openForm = (id) => {
            modalShowOrHide(1, id);
        }

        modalShowOrHide = (flag, id) => {
            if (flag === 0) {
                modal.hide();
                return false;
            }

            $('#selected-contract-id').val(id);

            modal.show();

            $('#roitem-table').DataTable().ajax.reload();
        }

        closeIco.onclick = function() {
            modalShowOrHide(0, '');
        }

        const $chartModal = document.getElementById('newChartModal');
        const chartModal = new Modal($chartModal);

        let closeChartIco = document.getElementById('closeChartModalIco');

        openChartModal = (title, activityId, contractId) => {
            chartModalShowOrHide(1, title, activityId, contractId);
        }

        chartModalShowOrHide = (flag, title, activityId, contractId) => {
            if (flag === 0) {
                chartModal.hide();
                return false;
            }

            $('.chart-modal-title').text(title);

            $.ajax({
                type: "get",
                url: "{{ route('ro.dashboard.external.chart.activities.detail') }}",
                data: {
                    contractId: contractId,
                    activityId: activityId
                },
                beforeSend: function() {
                    $('#chart_activity').html('');
                    $('#chart_activity').append(`<button disabled type="button" class="py-2.5 px-5 mr-2 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 inline-flex items-center">
                            <svg aria-hidden="true" role="status" class="inline w-6 h-6 mr-3 text-gray-200 animate-spin dark:text-gray-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#1C64F2"/>
                            </svg>
                            Loading...
                        </button>`);
                },
                success: function(response) {
                    compareValuePerActivityChart.render();
                    compareValuePerActivityChart.updateSeries([{ data: response.series }]);
                }
            });

            chartModal.show();
        }

        closeChartIco.onclick = function() {
            chartModalShowOrHide(0, '');
            compareValuePerActivityChart.updateSeries([{ data: [] }]);
        }
    </script>
@endsection
