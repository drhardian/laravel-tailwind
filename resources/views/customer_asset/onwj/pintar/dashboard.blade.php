@extends('layout.index')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css">
@endsection

@section('content')
    <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl space-y-2 p-5">
        <!-- Header Information -->
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 space-x-1">
                <caption
                    class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    INTEGRITY STATUS PINTAR SYSTEM
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products
                        designed to help you work and play, stay organized, get answers, keep in touch, grow your business,
                        and more.</p>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 text-center">
                    <tr class="divide-x-2 divide-white">
                        <th scope="col" class="w-1/4 px-6 py-3 rounded-t-lg"
                            style="background-color: #00B050; color: white">
                            GREEN
                        </th>
                        <th scope="col" class="w-1/4 px-6 py-3 rounded-t-lg" style="background-color: #ffff00;">
                            YELLOW
                        </th>
                        <th scope="col" class="w-1/4 px-6 py-3 rounded-t-lg"
                            style="background-color: #d31900; color: white">
                            RED
                        </th>
                        <th scope="col" class="w-1/4 px-6 py-3 rounded-t-lg"
                            style="background-color: #000000; color: white">
                            BLACK
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white text-center border">
                        <td class="px-4 py-4">
                            Dapat dioperasikan sesuai Spesifikasi
                        </td>
                        <td class="px-4 py-4 border-l">
                            Dapat diOperasikan, Low Performance
                        </td>
                        <td class="px-4 py-4 border-l">
                            Kondisi Rusak, sedang dalam perbaikan
                        </td>
                        <td class="px-4 py-4 border-l">
                            Status Decomm / Well Shut in
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Chart Information -->
        <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow">
            <div class="grid grid-cols-3 gap-2">
                <div class="w-full bg-white">
                    <div class="flex flex-col items-center">
                        <h5 class="mb-1 text-xl font-medium text-gray-900">All Area</h5>
                        <span class="text-sm text-gray-500">Summary of valve based on the integrity status</span>
                        <div id="allAreaChart"></div>
                    </div>
                    <div>
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-gray-500 border shadow rounded-lg">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
                                    <tr>
                                        @foreach ($allAreaIntegrityResumes as $allAreaIntegrityResume)
                                            <th scope="col" class="px-6 py-3 text-center">
                                                {{$allAreaIntegrityResume->integritystatus}}
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        @foreach ($allAreaIntegrityResumes as $allAreaIntegrityResume)
                                            <td class="px-6 py-4 text-center text-lg">
                                                {{$allAreaIntegrityResume->totalStatus}}
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                @foreach ($areas as $area)
                <div class="w-full bg-white">
                    <div class="flex flex-col items-center">
                        <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $area->area }}</h5>
                        <span class="text-sm text-gray-500">Integrity Status PINTAR</span>
                        <div id="{{ $area->area }}Chart"></div>
                    </div>
                    <div>
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-gray-500 border shadow rounded-lg">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
                                    <tr>
                                        @foreach ($detailPerAreas as $detailPerArea)
                                            @if ($detailPerArea['title'] === $area->area)
                                                @foreach ($detailPerArea['data'] as $totalPerArea)
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        {{ $totalPerArea->name }}
                                                    </th>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        @foreach ($detailPerAreas as $detailPerArea)
                                            @if ($detailPerArea['title'] === $area->area)
                                                @foreach ($detailPerArea['data'] as $totalPerArea)
                                                    <td class="px-6 py-4 text-center text-lg">
                                                        {{ $totalPerArea->y }}
                                                    </td>
                                                @endforeach
                                            @endif
                                        @endforeach
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
        var allAreas = @json($allAreas);
        Highcharts.chart('allAreaChart', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                },
                width: 350,
                height: 300,
                marginTop: 0
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
                    depth: 50,
                    dataLabels: {
                        enabled: true,
                        distance: 5,
                        format: '<b>{point.y} Tags</b>:<br> {point.percentage:.1f}%',
                        connectorShape: 'straight'
                    },
                    startAngle: 0,
                    showInLegend: false,
                    size: '60%',
                    tooltip: {
                        pointFormat: '<b>{point.percentage:.1f}%</b>'
                    }
                }
            },
            series: [{
                data: allAreas[0]['data']
            }],
            credits: {
                enabled: false
            }
        });

        var detailPerAreas = @json($detailPerAreas);
        $.each(detailPerAreas, function(index, value) {
            Highcharts.chart(value['title'] + 'Chart', {
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45
                    },
                    width: 350,
                    height: 300,
                    marginTop: 0
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
                        depth: 50,
                        dataLabels: {
                            enabled: true,
                            distance: 5,
                            format: '<b>{point.y} Tags</b>:<br> {point.percentage:.1f}%',
                            connectorShape: 'straight'
                        },
                        startAngle: 0,
                        showInLegend: false,
                        size: '60%',
                        tooltip: {
                            pointFormat: '<b>{point.percentage:.1f}%</b>'
                        }
                    }
                },
                series: [{
                    data: value['data']
                }],
                credits: {
                    enabled: false
                }
            });
        });
    </script>
@endsection
