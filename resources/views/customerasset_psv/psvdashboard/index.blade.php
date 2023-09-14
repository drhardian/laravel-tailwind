@extends('layout.index')


<script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>

@section('content')
    <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl">
        <div class="flex mt-2 p-4 gap-x-5">
            <div class="w-1/3">
                <div
                    class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="text-center mb-6">
                        <a href="#">
                            <span class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Order
                                Status</span>
                        </a>
                    </div> 
                    <div id="chartROStatus"></div>
                </div>
            </div>
            <div class="w-1/3 grid gap-y-2">
                {{-- <div class="flex items-center align-items-center justify-between">
                    <div class="w-1/2 mr-2">
                        <div
                            class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex items-center justify-between px-4 py-3">
                                <div class="flex flex-col items-left justify-center">
                                    <dt class="mb-2 text-3xl font-extrabold customers-text">{{ $customersTotal }}</dt>
                                    <dd class="text-gray-500 dark:text-gray-400">Customers</dd>
                                </div>
                                <i class="fa-solid fa-building-user fa-2xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <div
                            class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex items-center justify-between px-4 py-3">
                                <div class="flex flex-col items-left justify-center">
                                    <dt class="mb-2 text-3xl font-extrabold customers-text">{{ $contractsTotal }}</dt>
                                    <dd class="text-gray-500 dark:text-gray-400">Contracts</dd>
                                </div>
                                <i class="fa-solid fa-file-contract fa-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div
                    class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-2">
                    <div class="flex items-center justify-between px-4 py-3">
                        <div class="flex flex-col items-left justify-center">
                            <dt class="mb-2 text-3xl font-extrabold contracts-text">{{ $roTotal }}</dt>
                            <dd class="text-gray-500 dark:text-gray-400">Total PSV</dd>
                        </div>
                        <i class="fa-solid fa-folder-tree fa-2xl"></i>
                    </div>
                </div>
                <div
                    class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-2">
                    <div class="flex items-center justify-between px-4 py-3">
                        <div class="flex flex-col items-left justify-center">
                            <dt class="mb-2 text-3xl font-extrabold contracts-text">{{ $roOnProgressTotal }}</dt>
                            <dd class="text-gray-500 dark:text-gray-400">Request Orders (<span class="font-bold text-slate-800">on progess</span>)</dd>
                        </div>
                        <i class="fa-solid fa-list-check fa-2xl"></i>
                    </div>
                </div>
            </div>
            <div class="w-1/3 grid gap-y-2">
                <div
                    class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between px-4 py-3">
                        <div class="flex flex-col items-left justify-center">
                            <dt class="mb-2 text-3xl font-extrabold contracts-text">{{ $roCompletedTotal }}</dt>
                            <dd class="text-gray-500 dark:text-gray-400">Request Orders (<span class="font-bold text-slate-800">completed</span>)</dd>
                        </div>
                        <i class="fa-regular fa-rectangle-list fa-2xl"></i>
                    </div>
                </div>
                <div
                    class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-2">
                    <div class="flex items-center justify-between px-4 py-3">
                        <div class="flex flex-col items-left justify-center">
                            <dt class="mb-2 text-3xl font-extrabold contracts-text">{{ $roInvoicedTotal }}</dt>
                            <dd class="text-gray-500 dark:text-gray-400">Request Orders (<span class="font-bold text-slate-800">invoiced</span>)</dd>
                        </div>
                        <i class="fa-solid fa-receipt fa-2xl"></i>
                    </div>
                </div>
                <div
                    class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-2">
                    <div class="flex items-center justify-between px-4 py-3">
                        <div class="flex flex-col items-left justify-center">
                            <dt class="mb-2 text-3xl font-extrabold contracts-text">{{ $roPaidTotal }}</dt>
                            <dd class="text-gray-500 dark:text-gray-400">Request Orders (<span class="font-bold text-slate-800">paid</span>)</dd>
                        </div>
                        <i class="fa-solid fa-money-bill-transfer fa-2xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var optionsROStatus = {
            series: [],
            chart: {
                type: 'donut'
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
                        size: '50%'
                    }
                }
            }
        };

        // var optionsROAmount = {
        //     series: [],
        //     chart: {
        //         type: 'donut'
        //     },
        //     labels: [],
        //     responsive: [{
        //         breakpoint: 480,
        //         options: {
        //             chart: {
        //                 width: 200
        //             },
        //             legend: {
        //                 position: 'bottom'
        //             }
        //         }
        //     }],
        //     plotOptions: {
        //         pie: {
        //             donut: {
        //                 size: '50%'
        //             }
        //         }
        //     }
        // };

        var chartROStatus = new ApexCharts(document.querySelector("#chartROStatus"), optionsROStatus);
        // var chartROAmount = new ApexCharts(document.querySelector("#chartROAmount"), optionsROAmount);

        $(document).ready(function() {
            $.ajax({
                type: "get",
                url: "{{ route('ro.dashboard.rostatus') }}",
                success: function(response) {
                    chartROStatus.render();
                    chartROStatus.updateOptions({
                        series: response.series,
                        labels: response.labels
                    });

                    // chartROAmount.render();
                    // chartROAmount.updateOptions({
                    //     series: response.series,
                    //     labels: response.labels
                    // });
                }
            });
        });
    </script>
@endsection
