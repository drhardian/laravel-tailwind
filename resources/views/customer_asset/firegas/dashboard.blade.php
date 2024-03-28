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
                    ASSET INTEGRITY FIRE & GAS SYSTEM
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products
                        designed to help you work and play, stay organized, get answers, keep in touch, grow your business,
                        and more.</p>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 text-center">
                    <tr class="divide-x-2 divide-white">
                        <th scope="col" class="w-1/3 px-6 py-3 rounded-t-lg"
                            style="background-color: #00B050; color: white">
                            GREEN
                        </th>
                        <th scope="col" class="w-1/3 px-6 py-3 rounded-t-lg" style="background-color: #ffff00;">
                            YELLOW
                        </th>
                        <th scope="col" class="w-1/3 px-6 py-3 rounded-t-lg"
                            style="background-color: #d31900; color: white">
                            RED
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white text-center border">
                        <td class="px-4 py-4">
                            Dapat dioperasikan sesuai Spesifikasi
                        </td>
                        <td class="px-4 py-4 border-r border-l">
                            Dapat diOperasikan, Low Performance, ORA, terdapat deffect yang perlu di follow-up
                        </td>
                        <td class="px-4 py-4">
                            Kondisi Rusak, sedang dalam perbaikan
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Chart Information -->
        <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow">
            <div class="grid grid-cols-3 gap-2">
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
                <div class="w-full bg-white">
                    <div class="flex flex-col items-center">
                        <h5 class="mb-1 text-xl font-medium text-gray-900">Integrity Status</h5>
                        <span class="text-sm text-gray-500">Summary of valve based on the integrity status</span>
                        <div id="integrityChart"></div>
                    </div>
                    <div>
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-gray-500 border shadow rounded-lg">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
                                    <tr>
                                        @foreach ($firegasIntegrityResumes as $firegasIntegrityResume)
                                            <th scope="col" class="px-6 py-3 text-center">
                                                {{$firegasIntegrityResume->description}}
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        @foreach ($firegasIntegrityResumes as $firegasIntegrityResume)
                                            <td class="px-6 py-4 text-center text-lg">
                                                {{$firegasIntegrityResume->total}} {{$firegasIntegrityResume->code==="IG"?"%":""}}
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Summary by Equipment Type -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-t">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    EQUIPMENT TYPE
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products
                        designed to help you work and play, stay organized, get answers, keep in touch, grow your business,
                        and more.</p>
                </caption>

                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                            F & G Detector
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            TOTAL
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Major Defect
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Minor Defect
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Good
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Integrity
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($firegasSummDetectors as $firegasSummDetector)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{strtoupper($firegasSummDetector->description)}}
                            </th>
                            <td class="px-6 py-4 text-center">
                                {{$firegasSummDetector->total_tag}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{$firegasSummDetector->major_defect}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{$firegasSummDetector->minor_defect}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{$firegasSummDetector->good_condition}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{number_format($firegasSummDetector->integrity,1)}}%
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Summary by Flow Location -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-t">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    FLOW LOCATION
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products
                        designed to help you work and play, stay organized, get answers, keep in touch, grow your business,
                        and more.</p>
                </caption>

                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                            FLOW STATION/AREA
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            TOTAL
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Major Defect
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Minor Defect
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Good
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Integrity
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($firegasSummFlows as $firegasSummFlow)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{strtoupper($firegasSummFlow->flow_location)}}
                            </th>
                            <td class="px-6 py-4 text-center">
                                {{$firegasSummFlow->total_tag}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{$firegasSummFlow->major_defect}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{$firegasSummFlow->minor_defect}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{$firegasSummFlow->good_condition}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{number_format($firegasSummFlow->integrity,1)}}%
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script>
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

        if (@json($firegasIntegrityChartData)) {
            var integrityChartData = @json($firegasIntegrityChartData);
            console.log(integrityChartData);

            Highcharts.chart('integrityChart', {
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
                            distance: 2,
                            format: '<b>{point.name}<br>{point.y} Tags</b><br> {point.percentage:.1f}%',
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
                    data: integrityChartData
                }],
                credits: {
                    enabled: false
                }
            });
        }
    </script>
@endsection
