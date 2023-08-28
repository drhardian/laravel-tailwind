@extends('layout.index')

@section('content')
    <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl">
        <div class="flex mt-2 p-4">
            <div class="w-1/3">
                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="text-center mb-6">
                        <a href="#">
                            <span class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Order
                                Status</span>
                        </a>
                    </div>
                    <div id="chartROStatus"></div>
                </div>
            </div>
            <div class="w-1/3">
                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="text-center mb-6">
                        <a href="#">
                            <span class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Amount
                                Status</span>
                        </a>
                    </div>
                    <div id="chartROAmount"></div>
                </div>
            </div>
            <div class="w-1/3"></div>
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

        var chartROStatus = new ApexCharts(document.querySelector("#chartROStatus"), optionsROStatus);

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
                }
            });
        });
    </script>
@endsection
