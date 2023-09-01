@extends('layout.index')

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
                    <div id="chartROStatus" class="h-80 flex items-center justify-center">

                        <button disabled type="button" class="py-2.5 px-5 mr-2 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 inline-flex items-center">
                            <svg aria-hidden="true" role="status" class="inline w-6 h-6 mr-3 text-gray-200 animate-spin dark:text-gray-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#1C64F2"/>
                            </svg>
                            Loading...
                        </button>

                    </div>
                </div>
            </div>
            <div class="w-1/3 grid gap-y-2">
                <div class="w-full px-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between px-4 pt-8">
                        <div class="flex flex-col items-left justify-center">
                            <dt class="mb-2 text-3xl font-extrabold customers-text">{{ $customersTotal }}</dt>
                            <dd class="text-gray-500 dark:text-gray-400">Customers</dd>
                        </div>
                        <i class="fa-solid fa-building-user fa-2xl"></i>
                    </div>
                </div>
                <div class="w-full px-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between px-4 pt-8">
                        <div class="flex flex-col items-left justify-center">
                            <dt class="mb-2 text-3xl font-extrabold customers-text">{{ $contractsTotal }}</dt>
                            <dd class="text-gray-500 dark:text-gray-400">Contracts</dd>
                        </div>
                        <i class="fa-solid fa-file-contract fa-2xl"></i>
                    </div>
                </div>
                <div class="w-full px-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between px-4 pt-8">
                        <div class="flex flex-col items-left justify-center">
                            <dt class="mb-2 text-3xl font-extrabold contracts-text">{{ $roTotal }}</dt>
                            <dd class="text-gray-500 dark:text-gray-400">Request Orders</dd>
                        </div>
                        <i class="fa-solid fa-folder-tree fa-2xl"></i>
                    </div>
                </div>
            </div>
            <div class="w-1/3 grid gap-y-2">
                <div
                    class="w-full px-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between px-4 py-3">
                        <div class="flex flex-col items-left justify-center">
                            <dt class="mb-2 text-3xl font-extrabold contracts-text">{{ $roOnProgressTotal }}</dt>
                            <dd class="text-gray-500 dark:text-gray-400">Request Orders (<span
                                    class="font-bold text-slate-800">on progess</span>)</dd>
                        </div>
                        <i class="fa-solid fa-list-check fa-2xl"></i>
                    </div>
                </div>

                <div class="w-full px-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between px-4 py-3">
                        <div class="flex flex-col items-left justify-center">
                            <dt class="mb-2 text-3xl font-extrabold contracts-text">{{ $roCompletedTotal }}</dt>
                            <dd class="text-gray-500 dark:text-gray-400">Request Orders (<span
                                    class="font-bold text-slate-800">completed</span>)</dd>
                        </div>
                        <i class="fa-regular fa-rectangle-list fa-2xl"></i>
                    </div>
                </div>
                <div
                    class="w-full px-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between px-4 py-3">
                        <div class="flex flex-col items-left justify-center">
                            <dt class="mb-2 text-3xl font-extrabold contracts-text">{{ $roInvoicedTotal }}</dt>
                            <dd class="text-gray-500 dark:text-gray-400">Request Orders (<span
                                    class="font-bold text-slate-800">invoiced</span>)</dd>
                        </div>
                        <i class="fa-solid fa-receipt fa-2xl"></i>
                    </div>
                </div>
                <div
                    class="w-full px-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between px-4 py-3">
                        <div class="flex flex-col items-left justify-center">
                            <dt class="mb-2 text-3xl font-extrabold contracts-text">{{ $roPaidTotal }}</dt>
                            <dd class="text-gray-500 dark:text-gray-400">Request Orders (<span
                                    class="font-bold text-slate-800">paid</span>)</dd>
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
                type: 'donut',
                width: '100%',
                height: '90%'
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
                        size: '55%'
                    },
                    customScale: 1
                }
            },
            legend: {
                show: true,
                position: 'bottom'
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
