@extends('layout.index')

@section('content')
    <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl">
        <div class="flex justify-start mt-10">
            <div class="grid grid-cols-1 sm:grid-cols-6 gap-4 w-full">
                <div class="col-span-1 sm:col-span-4 row-span-2">
                    <div class="w-full h-full border rounded-lg p-3">
                        <div class="flex items-center justify-between mb-5">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Category</h5>
                            {{-- <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                                View others
                            </a> --}}
                        </div>
                        <div class="flow-root">
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-1 min-w-0">
                                            <input type="hidden" id="selected-contract-id"
                                                value="{{ isset($contract->id) ? $contract->id : '' }}">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                <a href="#"
                                                    class="hover:underline">{{ isset($contract->contract_number) ? $contract->contract_number : '' }}</a>
                                            </p>
                                            <div id="chart"></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-span-1 sm:col-span-2">
                    <div class="w-full h-full border rounded-lg p-3">
                        <div class="flex items-center justify-between mb-5">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Asset Owner</h5>
                            {{-- <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                                View others
                            </a> --}}
                        </div>
                        <div class="flow-root">
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-1 min-w-0">
                                            <input type="hidden" id="selected-contract-id"
                                                value="{{ isset($contract->id) ? $contract->id : '' }}">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                <a href="#"
                                                    class="hover:underline">{{ isset($contract->contract_number) ? $contract->contract_number : '' }}</a>
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                {{ isset($contract->description) ? $contract->description : '' }}
                                            </p>
                                            <p class="text-gray-500 truncate dark:text-gray-400 pt-10">
                                                <small>Period:
                                                    <b>{{ isset($contract->start_date) ? \Carbon\Carbon::parse($contract->start_date)->format('d/m/Y') : '00/00/0000' }}</b>
                                                    -
                                                    <b>{{ isset($contract->end_date) ? \Carbon\Carbon::parse($contract->end_date)->format('d/m/Y') : '00/00/0000' }}</b></small>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-span-1 sm:col-span-2">
                    <div class="w-full h-full border rounded-lg p-3">
                        <div class="flex items-center justify-between mb-5">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Product Summary</h5>
                            {{-- <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                                View others
                            </a> --}}
                        </div>
                        <div class="flow-root">
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-1 min-w-0">
                                            <input type="hidden" id="selected-contract-id"
                                                value="{{ isset($contract->id) ? $contract->id : '' }}">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                <a href="#"
                                                    class="hover:underline">{{ isset($contract->contract_number) ? $contract->contract_number : '' }}</a>
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                {{ isset($contract->description) ? $contract->description : '' }}
                                            </p>
                                            <p class="text-gray-500 truncate dark:text-gray-400 pt-10">
                                                <small>Period:
                                                    <b>{{ isset($contract->start_date) ? \Carbon\Carbon::parse($contract->start_date)->format('d/m/Y') : '00/00/0000' }}</b>
                                                    -
                                                    <b>{{ isset($contract->end_date) ? \Carbon\Carbon::parse($contract->end_date)->format('d/m/Y') : '00/00/0000' }}</b></small>
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

        <div class="flex justify-start my-4">
            <div class="grid grid-cols-5 gap-4 w-full">
                <div class="col-span-3">
                    <div class="w-full h-full border rounded-lg p-3">
                        <div class="flex items-center justify-between mb-5">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Product In & Out</h5>
                            {{-- <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                                View others
                            </a> --}}
                        </div>
                        <div class="flow-root">
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                <li class="py-1 sm:py-2">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-1 min-w-0">
                                            <input type="hidden" id="selected-contract-id"
                                                value="{{ isset($contract->id) ? $contract->id : '' }}">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                <a href="#"
                                                    class="hover:underline">{{ isset($contract->contract_number) ? $contract->contract_number : '' }}</a>
                                            </p>
                                            <div id="chartProductInOut"></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="w-full h-full border rounded-lg p-3">
                        <div class="flex items-center justify-between mb-5">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Inventory Summary</h5>
                            {{-- <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                                View others
                            </a> --}}
                        </div>
                        <div class="flow-root">
                            <div id="chartProductInOutQty"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-start mb-10">
            <div class="grid grid-cols-6 gap-4 w-full">
                <div class="col-span-4">
                    <div class="w-full h-full border rounded-lg p-3">
                        <div class="flex items-center justify-between mb-5">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Stock</h5>
                            {{-- <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                                View others
                            </a> --}}
                        </div>
                        <div class="flow-root">
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 rounded-s-lg">
                                                Product name
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Qty
                                            </th>
                                            <th scope="col" class="px-6 py-3 rounded-e-lg">
                                                Price
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-white dark:bg-gray-800">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Apple MacBook Pro 17"
                                            </th>
                                            <td class="px-6 py-4">
                                                1
                                            </td>
                                            <td class="px-6 py-4">
                                                $2999
                                            </td>
                                        </tr>
                                        <tr class="bg-white dark:bg-gray-800">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Microsoft Surface Pro
                                            </th>
                                            <td class="px-6 py-4">
                                                1
                                            </td>
                                            <td class="px-6 py-4">
                                                $1999
                                            </td>
                                        </tr>
                                        <tr class="bg-white dark:bg-gray-800">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Magic Mouse 2
                                            </th>
                                            <td class="px-6 py-4">
                                                1
                                            </td>
                                            <td class="px-6 py-4">
                                                $99
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="font-semibold text-gray-900 dark:text-white">
                                            <th scope="row" class="px-6 py-3 text-base">Total</th>
                                            <td class="px-6 py-3">3</td>
                                            <td class="px-6 py-3">21,000</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="w-full h-full border rounded-lg p-3">
                        <div class="flex items-center justify-between mb-5">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Low Quantity Stock
                            </h5>
                            {{-- <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                                View others
                            </a> --}}
                        </div>
                        <div class="flow-root">
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg" style="height: 300px; overflow: auto;">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <tbody>
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <img class="w-14 md:w-14 max-w-full max-h-full rounded-full" src="{{ asset('theme/assets/images/apple-watch.jpg') }}" alt="Jese image">
                                                <div class="ps-3">
                                                    <div class="text-base font-semibold">Bonnie Green</div>
                                                    <div class="font-normal text-gray-500">bonnie@flowbite.com</div>
                                                </div>
                                            </th>
                                            <td class="px-6 py-4">
                                                <a href="#"
                                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Low</a>
                                            </td>
                                        </tr>
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <img class="w-14 md:w-14 max-w-full max-h-full rounded-full" src="{{ asset('theme/assets/images/watch.jpg') }}" alt="Jese image">
                                                <div class="ps-3">
                                                    <div class="text-base font-semibold">Bonnie Green</div>
                                                    <div class="font-normal text-gray-500">bonnie@flowbite.com</div>
                                                </div>
                                            </th>
                                            <td class="px-6 py-4">
                                                <a href="#"
                                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Low</a>
                                            </td>
                                        </tr>
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <img class="w-14 md:w-14 max-w-full max-h-full rounded-full" src="{{ asset('theme/assets/images/watch-1.jpg') }}" alt="Jese image">
                                                <div class="ps-3">
                                                    <div class="text-base font-semibold">Bonnie Green</div>
                                                    <div class="font-normal text-gray-500">bonnie@flowbite.com</div>
                                                </div>
                                            </th>
                                            <td class="px-6 py-4">
                                                <a href="#"
                                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Low</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        let compareValuePerActivityChart = new ApexCharts(
            document.querySelector("#chart_activity"), {
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
                    formatter: function(val, opts) {
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
            var options = {
                series: [{
                    name: 'Inflation',
                    data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5, 0.2]
                }],
                chart: {
                    height: 350,
                    type: 'bar',
                },
                plotOptions: {
                    bar: {
                        borderRadius: 10,
                        dataLabels: {
                            position: 'top', // top, center, bottom
                        },
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val) {
                        return val + "%";
                    },
                    offsetY: -20,
                    style: {
                        fontSize: '12px',
                        colors: ["#304758"]
                    }
                },
                xaxis: {
                    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                        "Dec"
                    ],
                    position: 'top',
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    crosshairs: {
                        fill: {
                            type: 'gradient',
                            gradient: {
                                colorFrom: '#D8E3F0',
                                colorTo: '#BED1E6',
                                stops: [0, 100],
                                opacityFrom: 0.4,
                                opacityTo: 0.5,
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,
                    }
                },
                yaxis: {
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false,
                    },
                    labels: {
                        show: false,
                        formatter: function(val) {
                            return val + "%";
                        }
                    }
                },
                title: {
                    text: 'Monthly Inflation in Argentina, 2002',
                    floating: true,
                    offsetY: 330,
                    align: 'center',
                    style: {
                        color: '#444'
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();

            var optionsProductInOut = {
                series: [{
                    name: 'Net Profit',
                    data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
                }, {
                    name: 'Revenue',
                    data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
                }, {
                    name: 'Free Cash Flow',
                    data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                },
                yaxis: {
                    title: {
                        text: '$ (thousands)'
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return "$ " + val + " thousands"
                        }
                    }
                }
            };

            var chartProductInOut = new ApexCharts(document.querySelector("#chartProductInOut"),
                optionsProductInOut);
            chartProductInOut.render();

            var optionsProductInOutQty = {
                series: [{
                        name: "High - 2013",
                        data: [28, 29, 33, 36, 32, 32, 33]
                    },
                    {
                        name: "Low - 2013",
                        data: [12, 11, 14, 18, 17, 13, 13]
                    }
                ],
                chart: {
                    height: 350,
                    type: 'line',
                    dropShadow: {
                        enabled: true,
                        color: '#000',
                        top: 18,
                        left: 7,
                        blur: 10,
                        opacity: 0.2
                    },
                    toolbar: {
                        show: false
                    }
                },
                colors: ['#77B6EA', '#545454'],
                dataLabels: {
                    enabled: true,
                },
                stroke: {
                    curve: 'smooth'
                },
                // title: {
                //     text: 'Average High & Low Temperature',
                //     align: 'left'
                // },
                grid: {
                    borderColor: '#e7e7e7',
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                    },
                },
                markers: {
                    size: 1
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    title: {
                        text: 'Month'
                    }
                },
                yaxis: {
                    title: {
                        text: 'Temperature'
                    },
                    min: 5,
                    max: 40
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right',
                    floating: true,
                    offsetY: -25,
                    offsetX: -5
                }
            };

            var chartProductInOutQty = new ApexCharts(document.querySelector("#chartProductInOutQty"),
                optionsProductInOutQty);
            chartProductInOutQty.render();
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

        closeChartIco.onclick = function() {
            chartModalShowOrHide(0, '');
            compareValuePerActivityChart.updateSeries([{
                data: []
            }]);
        }
    </script>
@endsection
