@extends('layout.index')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css">
@endsection

@section('content')
    <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl space-y-2 p-5">
        <!-- General Information -->
        <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow space-y-4">
            <div>
                <h5 class="mb-1 text-xl font-medium text-gray-900">General Information</h5>
                <span class="text-sm text-gray-500 mb-5">Total asset based on status</span>
            </div>
            <div class="grid grid-cols-4 mt-5">
                
                <div class="w-full max-w-sm bg-white">
                    <div class="flex flex-col items-center">
                        <h5 class="mb-1 text-xl font-medium text-gray-900">Incoming</h5>
                        <span class="text-sm text-gray-500 mb-5">Total incoming asset</span>
                        <div id="incomingDonutChart"></div>
                    </div>
                </div>
                
                <div class="w-full max-w-sm bg-white">
                    <div class="flex flex-col items-center">
                        <h5 class="mb-1 text-xl font-medium text-gray-900">At Workshop</h5>
                        <span class="text-sm text-gray-500 mb-5">Total asset at workshop</span>
                        <div id="atworkshopDonutChart"></div>
                    </div>
                </div>

                <div class="w-full max-w-sm bg-white">
                    <div class="flex flex-col items-center">
                        <h5 class="mb-1 text-xl font-medium text-gray-900">Outgoing</h5>
                        <span class="text-sm text-gray-500 mb-5">Total outgoing asset</span>
                        <div id="outgoingDonutChart"></div>
                    </div>
                </div>
                
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-1">
                    <table id="main-table" class="table table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Tag Number</th> 
                                <th>Status</th> 
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

            </div>
        </div>

        <!-- Asset Status -->
        <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow">
            <div class="flex flex-col gap-3">
                <div class="w-full">
                    <div class="flex items-center justify-between">
                        <div>
                            <h5 class="mb-1 text-xl font-medium text-gray-900">Asset Status</h5>
                            <span class="text-sm text-gray-500 mb-5">Total asset based on status and item origin</span>
                        </div>
                        <div class="relative">
                            <select id="assetTypes" onchange="filterData()">
                                @foreach ($assetTypes as $assetType)
                                    <option value="{{ $assetType->id }}">{{ $assetType->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center">Status</th>
                                    @foreach ($assetOrigins as $assetOrigin)
                                        <th scope="col" class="px-6 py-4 text-center">
                                            {{ $assetOrigin->title }}
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b text-center">
                                    <td class="total-psv-cell px-6 py-4 text-base font-bold text-left">Incoming</td>
                                    @foreach ($totalIncomingPerOriginByStatus as $totalIncomingPerOrigin)
                                        <td class="total-psv-cell px-6 py-4 text-base font-semibold">
                                            {{ $totalIncomingPerOrigin }}
                                        </td>
                                    @endforeach
                                </tr>
                                <tr class="bg-white border-b text-center">
                                    <td class="total-psv-cell px-6 py-4 text-base font-bold text-left">Outgoing</td>
                                    @foreach ($totalOutgoingPerOriginByStatus as $totalOutgoingPerOrigin)
                                        <td class="total-psv-cell px-6 py-4 text-base font-semibold">
                                            {{ $totalOutgoingPerOrigin }}
                                        </td>
                                    @endforeach
                                </tr>
                                <tr class="bg-white border-b text-center">
                                    <td class="total-psv-cell px-6 py-4 text-base font-bold text-left">At Workshop</td>
                                    @foreach ($totalAtWorkshopPerOriginByStatus as $totalAtWorkshopPerOrigin)
                                        <td class="total-psv-cell px-6 py-4 text-base font-semibold">
                                            {{ $totalAtWorkshopPerOrigin }}
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Asset - Repair At Workshop -->
        <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow">
            <div class="flex flex-col gap-3">
                <div class="w-full">
                    <div class="flex items-center justify-between">
                        <div>
                            <h5 class="mb-1 text-xl font-medium text-gray-900">Asset Repair</h5>
                            <span class="text-sm text-gray-500 mb-5">Total repaired asset at workshop</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div id="monthlyAssetRepairChart" class="w-full h-80"></div>

                </div>
            </div>
        </div>
        
        @endsection

        @section('js')
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#main-table').DataTable({
                        language: {
                            processing: "Loading. Please wait..."
                        },
                        responsive: true,
                        processing: true,
                        serverSide: true,
                        deferRender: true,
                        scrollX: true,
                        bAutoWidth: false,
                        pageLength: 4,
                        pagingType: "simple",
                        dom: "r<'flex flex-col items-center'f>t<'flex flex-col items-center'p>",
                        ajax: {
                            url: "{{ route('cina.products.main.table') }}",
                        },
                        columns: [
                            { data: 'cina_asset_type_id', name: 'cina_asset_type_id', className: 'desktop' },
                            { data: 'tagnumber', name: 'tagnumber', className: 'desktop' },
                            { data: 'valve_condition', name: 'valve_condition', className: 'desktop' },
                        ],
                    });

                    $('#assetTypes').select2({
                        allowClear: true,
                        placeholder: 'Select years..',
                        closeOnSelect: true
                    });
                    
                    var optionsIncoming = {
                        chart: {
                            type: 'donut',
                        },
                        series: [@json($totalIncoming)],
                        labels: ['Incoming'],
                        colors: ['#1450A3'],
                        legend: {
                            show: false // Menghilangkan legenda
                        },
                        dataLabels: {
                            enabled: false
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    labels: {
                                        show: true,
                                        total: {
                                            show: true
                                        }
                                    }
                                },
                                expandOnClick: false
                            }
                        },
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
                        }]
                    };
                    var chartIncoming = new ApexCharts(document.querySelector("#incomingDonutChart"), optionsIncoming);
                    chartIncoming.render();

                    var optionsAtWorkshop = {
                        chart: {
                            type: 'donut',
                        },
                        series: [@json($totalAtWorkshop)],
                        labels: ['AtWorkshop'],
                        colors: ['#6499E9'],
                        legend: {
                            show: false // Menghilangkan legenda
                        },
                        dataLabels: {
                            enabled: false
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    labels: {
                                        show: true,
                                        total: {
                                            show: true
                                        }
                                    }
                                },
                                expandOnClick: false
                            }
                        },
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
                        }]
                    };
                    var chartAtWorkshop = new ApexCharts(document.querySelector("#atworkshopDonutChart"), optionsAtWorkshop);
                    chartAtWorkshop.render();

                    var optionsOutgoing = {
                        chart: {
                            type: 'donut',
                        },
                        series: [@json($totalOutgoing)],
                        labels: ['Outgoing'],
                        colors: ['#64CCC5'],
                        legend: {
                            show: false // Menghilangkan legenda
                        },
                        dataLabels: {
                            enabled: false
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    labels: {
                                        show: true,
                                        total: {
                                            show: true
                                        }
                                    }
                                },
                                expandOnClick: false
                            }
                        },
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
                        }]
                    };
                    var chartOutgoing = new ApexCharts(document.querySelector("#outgoingDonutChart"), optionsOutgoing);
                    chartOutgoing.render();
                });

                /* Chart Asset Repair At Workshop */
                var optionsRepair = {
                    chart: {
                        type: 'bar',
                        width: '100%',
                        height: '100%',
                    },
                    series: [
                        {
                            name: 'Incoming',
                            data: @json($totalIncomingPerMonth),
                        },
                        {
                            name: 'At Workshop',
                            data: @json($totalAtworkshopPerMonth),
                        },
                        {
                            name: 'Outgoing',
                            data: @json($totalOutgoingPerMonth),
                        }
                    ],
                    xaxis: {
                        categories: ['January','February','March','April','May','June','July','August','September','October','November','December'],
                        labels: {
                            show: true,
                            rotate: -30
                        },
                    },
                    colors: ['#3085C3','#5CD2E6','#618264'], /* Customize colors as needed */
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            dataLabels: {
                                position: 'top',
                            }
                        },
                    },
                    dataLabels: {
                        enabled: true, /* Disable data labels (optional) */
                        textAnchor: 'start',
                        style: {
                            colors: ['#000'],
                        },
                        offsetX: -9,
                    },
                    tooltip: {
                        enabled: true,
                        shared: true,
                        intersect: false 
                    },
                };

                var chartRepair = new ApexCharts(document.querySelector("#monthlyAssetRepairChart"), optionsRepair);
                chartRepair.render();
            </script>
        @endsection
