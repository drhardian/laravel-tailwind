@extends('layout.index')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css">
@endsection

@section('content')
    <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl space-y-2 p-5">

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 space-x-1">
                <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    ASSET INTEGRITY FIRE & GAS SYSTEM
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.</p>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 text-center">
                    <tr class="divide-x-2 divide-white">
                        <th scope="col" class="w-1/3 px-6 py-3 rounded-t-lg" style="background-color: #7ab317; color: white">
                            GREEN
                        </th>
                        <th scope="col" class="w-1/3 px-6 py-3 rounded-t-lg" style="background-color: #ffff00;">
                            YELLOW
                        </th>
                        <th scope="col" class="w-1/3 px-6 py-3 rounded-t-lg" style="background-color: #d31900; color: white">
                            RED
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white text-center">
                        <td class="px-4 py-4">
                            Dapat dioperasikan sesuai Spesifikasi
                        </td>
                        <td class="px-4 py-4">
                            Dapat diOperasikan, Low Performance, ORA, terdapat deffect yang perlu di follow-up
                        </td>
                        <td class="px-4 py-4">
                            Kondisi Rusak, sedang dalam perbaikan
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- General Information -->
        <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow">
            <div class="grid grid-cols-2 gap-3">
                @foreach ($areas as $area)
                    <div class="w-full bg-white">
                        <div class="flex flex-col items-center">
                            <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $area->area }}</h5>
                            <span class="text-sm text-gray-500">Asset Integrity Fire & Gas System</span>
                            <div id="{{ $area->area }}Chart"></div>
                        </div>
                        <div>
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-gray-500 border shadow rounded-lg">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-200 ">
                                        <tr>
                                            @foreach ($detailPerAreas as $detailPerArea)
                                                @if ($detailPerArea['title'] === $area->area)
                                                    @foreach ($detailPerArea['data'] as $totalPerArea)
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            {{$totalPerArea->name}}
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
                                                            {{$totalPerArea->y}}
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
        var detailPerAreas = @json($detailPerAreas);

        console.log(detailPerAreas);

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
