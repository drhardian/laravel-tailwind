@extends('layout.index')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css">
@endsection

@section('content')
    <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl space-y-2 p-5">
        <!-- General Information -->
        <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow">
            {{-- <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">General Information</h5>
            </a> --}}
            <div class="grid grid-cols-2">
                @foreach ($areas as $area)
                    <div class="w-full bg-white">
                        <div class="flex flex-col items-center">
                            <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $area->area }}</h5>
                            <span class="text-sm text-gray-500">Asset Integrity Fire & Gas System</span>
                            <div id="{{ $area->area }}Chart"></div>
                        </div>
                        <div>
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                &nbsp;
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Green
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Yellow
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Red
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Apple MacBook Pro 17"
                                            </th>
                                            <td class="px-6 py-4">
                                                Silver
                                            </td>
                                            <td class="px-6 py-4">
                                                Laptop
                                            </td>
                                            <td class="px-6 py-4">
                                                $2999
                                            </td>
                                        </tr>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Microsoft Surface Pro
                                            </th>
                                            <td class="px-6 py-4">
                                                White
                                            </td>
                                            <td class="px-6 py-4">
                                                Laptop PC
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
                                                Black
                                            </td>
                                            <td class="px-6 py-4">
                                                Accessories
                                            </td>
                                            <td class="px-6 py-4">
                                                $99
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script>
        var areas = @json($areas);
        var detailPerAreas = @json($detailPerArea);

        $.each(detailPerAreas, function(index, value) {
            Highcharts.chart(value['title'] + 'Chart', {
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45
                    }
                },
                title: {
                    text: '',
                    align: 'center',
                    y: 45,
                    style: {
                        fontWeight: 'bold'
                    }
                },
                plotOptions: {
                    pie: {
                        innerSize: 90,
                        depth: 75,
                        dataLabels: {
                            enabled: true,
                            distance: 15,
                            format: '<b>{point.y} Tags</b>:<br> {point.percentage:.1f}%',
                        },
                        startAngle: 90,
                        showInLegend: true,
                        size: '100%',
                        tooltip: {
                            pointFormat: '<b>{point.percentage:.1f}%</b>'
                        }
                    }
                },
                series: [{
                    data: value['data']
                }],
                legend: {
                    y: -50
                },
                credits: {
                    enabled: false
                }
            });
        });
    </script>
@endsection
