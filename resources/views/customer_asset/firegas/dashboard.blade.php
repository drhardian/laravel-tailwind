@extends('layout.index')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css">
@endsection

@section('content')
    <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl space-y-2 p-5">
        {{-- <div class="flex mt-2 p-4 gap-x-5">
            <div class="w-1/3">
                <div
                    class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="text-center mb-6">
                        <a href="#">
                            <span
                                class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">OPERATIONAL</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-1/3">
                <div
                    class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="text-center mb-6">
                        <a href="#">
                            <span class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">INTEGRITY
                                STATUS</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="w-1/2 grid gap-y-2">
                <div
                    class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-2">
                    <div class="flex items-center justify-center px-10 py-3">
                        <div class="flex flex-col items-center justify-center text-center">
                            <dt class="mb-2 text-3xl font-extrabold contracts-text">{{ $psvTotal }}</dt>
                            <dd class="text-gray-500 justify-center dark:text-gray-400">TOTAL PSV</dd>
                        </div>
                        <i class="fa-solid fa-4x2"></i>
                    </div>
                </div>
                <div
                    class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-2">
                    <div class="flex items-center justify-center px-4 py-3">
                        <div class="flex flex-col items-center justify-center text-center">
                            <dt class="mb-2 text-3xl font-extrabold contracts-text">{{ $totalPsvByMonth }}</dt>
                            <dd class="text-gray-500 dark:text-gray-400">TOTAL PSV</dd>
                            <dt class="text-gray-500 dark:text-gray-400">Bulan : {{ date('F Y') }}</dt>
                        </div>
                        <i class="fa-solid fa-4x2"></i>
                    </div>
                </div>
            </div>
        </div> --}}
        
        <!-- General Information -->
        <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">General Information</h5>
            </a>
            <div class="grid grid-cols-4 mt-5">
                
                <div class="w-full max-w-sm bg-white">
                    <div class="flex flex-col items-center">
                        <h5 class="mb-1 text-xl font-medium text-gray-900">Area</h5>
                        <span class="text-sm text-gray-500 mb-5">Based on area location</span>
                        <div id="areaDonutChart"></div>
                    </div>
                </div>
                
                <div class="w-full max-w-sm bg-white">
                    <div class="flex flex-col items-center">
                        <h5 class="mb-1 text-xl font-medium text-gray-900">Operational</h5>
                        <span class="text-sm text-gray-500 mb-5">Operational Status</span>
                        <div id="operationalChart"></div>
                    </div>
                </div>

                <div class="w-full max-w-sm bg-white">
                    <div class="flex flex-col items-center">
                        <h5 class="mb-1 text-xl font-medium text-gray-900">Integrity</h5>
                        <span class="text-sm text-gray-500 mb-5">Integrity Status</span>
                        <div id="integrityChart"></div>
                    </div>
                </div>
                
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="flex items-center px-5 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="pl-3">
                                        <div class="text-base font-semibold">Total PSV</div>
                                        <div class="font-normal text-gray-500">Total all data</div>
                                    </div>  
                                </th>
                                <td class="px-6 py-4 text-right">
                                    <p class="text-xl text-gray-900 font-medium">{{ $psvTotal }}</p>
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="flex items-center px-5 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="pl-3">
                                        <div class="text-base font-semibold">Total PSV</div>
                                        <div class="font-normal text-gray-500">Total on {{ date('F Y') }}</div>
                                    </div>
                                </th>
                                <td class="px-6 py-4 text-right">
                                    <p class="text-xl text-gray-900 font-medium">{{ $totalPsvByMonth }}</p>
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="flex items-center px-5 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="pl-3">
                                        <div class="text-base font-semibold">Total Platform</div>
                                        <div class="font-normal text-gray-500">Based on platform name</div>
                                    </div>  
                                </th>
                                <td class="px-6 py-4 text-right">
                                    <p class="text-xl text-gray-900 font-medium">{{ $psvplatformcount1->count() }}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <!-- Certification Schedule -->
        <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow">
            <div class="flex flex-col gap-2">
                <div class="w-full">
                    <div class="flex items-center justify-between">
                        <div>
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Certification Schedule</h5>
                            </a>
                        </div>
                        <div class="relative">
                            <select id="year" onchange="filterData()">
                                @foreach ($getYears as $year)
                                    <option value="{{ $year->year_list }}">{{ $year->year_list }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    @for ($month = 1; $month <= 12; $month++)
                                        <th scope="col" class="px-6 py-3">
                                            {{ date('F', mktime(0, 0, 0, $month, 1)) }}
                                        </th>
                                    @endfor
        
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b text-center">
                                    @for ($month = 1; $month <= 12; $month++)
                                        <td class="total-psv-cell px-6 py-4 hover:font-bold hover:text-xl" 
                                            onclick="showTagNumber(this, {{ $month }})">
                                            {{ $monthlyPsvTotals[$month] }}
                                        </td>
                                    @endfor
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-2">
            <!-- Quantity based on flow station -->
            <div class="w-full bg-white border border-gray-200 rounded-lg shadow p-3">
                <div class="flex flex-col items-center">
                    <h5 class="mb-1 text-xl font-medium text-gray-900">Flow Station</h5>
                    <span class="text-sm text-gray-500 mb-5">Quantity based on flow station</span>
                    <div id="psvflowChart"></div>
                </div>
            </div>
            <!-- Quantity based on flow station -->
            <div class="w-full bg-white border border-gray-200 rounded-lg shadow p-3">
                <div class="flex flex-col items-center">
                    <h5 class="mb-1 text-xl font-medium text-gray-900">PSV Style</h5>
                    <span class="text-sm text-gray-500 mb-5">Quantity based on style</span>
                    <div id="psvstylebarChart"></div>
                </div>
            </div>
            <!-- Integrity status based on area -->
            <div class="w-full bg-white border border-gray-200 rounded-lg shadow p-3">
                <div class="flex flex-col items-center">
                    <h5 class="mb-1 text-xl font-medium text-gray-900">Integrity Status</h5>
                    <span class="text-sm text-gray-500 mb-5">Integrity Status based on area</span>
                    <div id="areastatusChart"></div>
                </div>
            </div>
        </div>

        <div class="w-full bg-white border border-gray-200 rounded-lg shadow p-3">
            <div class="flex flex-col items-center pb-12">
                <h5 class="mb-1 text-xl font-medium text-gray-900">Brand</h5>
                <span class="text-sm text-gray-500 mb-5">Quantity based on brand name</span>
                <div id="psvbrandChart" class="w-full h-80"></div>
            </div>
        </div>

        <div class="w-full bg-white border border-gray-200 rounded-lg shadow p-3">
            <div class="flex flex-col items-center pb-16">
                <h5 class="mb-1 text-xl font-medium text-gray-900">Size</h5>
                <span class="text-sm text-gray-500 mb-5">Quantity based on valve size</span>
                <div id="psvsizeChart" class="w-full h-80"></div>
            </div>
        </div>

        <div class="w-full bg-white border border-gray-200 rounded-lg shadow p-3">
            <div class="flex flex-col items-center pb-16">
                <h5 class="mb-1 text-xl font-medium text-gray-900">Platform</h5>
                <span class="text-sm text-gray-500 mb-5">Quantity based on platform location</span>
                <div id="psvplatformChart" class="w-full h-80"></div>
            </div>
        </div>

        <!-- Tabel hasil filter -->
        {{-- <div class="horizontal-table" id="filteredData">
                <!-- Data akan ditempatkan di sini melalui JavaScript -->
                @foreach ($monthlyPsvTotals as $month => $total)
                <div>
                    <table class="vertical-table">
                        <thead>
                            <tr>
                                <td>{{ date('F Y', mktime(0, 0, 0, $month, 1)) }}</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2" onmouseover="showTagNumber(this, '{{ $monthlyTagNumbers[$month] }}')" onmouseout="hideTagNumber()">{{ $monthlyPsvTotals[$month] }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="tag-number-popup" onmouseover="showTagNumber(this, '{{ $monthlyTagNumbers[$month] }}')" onmouseout="hideTagNumber()">
                        Tag Number: {{ $monthlyTagNumbers[$month] }}
                    </div>
                </div>
            @endforeach
            </div> --}}

        {{-- <style>
            /* Mengatur tampilan tabel */
            .vertical-table {
                display: flex;
                flex-direction: column;
                /* justify-content: space-between; */
                align-items: center;
            }

            .horizontal-table {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                /* align-items: flex-start; */
                align-items: center;

            }

            /* Mengatur sel dalam tabel */
            .vertical-table td {
                /* display: flex; */
                border: 1px solid #ccc;
                /* Atur gaya border sesuai kebutuhan Anda */
                padding: 10px;
                width: 150px;
                /* Atur lebar sel sesuai kebutuhan Anda */
                text-align: center;
                /* Tengahkan teks */
                white-space: nowrap;
                /* Hindari pemisahan teks berlebihan ke bawah */
                cursor: pointer;
            }

            /* Gaya rincian tag_number */
            .tag-number-popup {
                display: none;
                position: absolute;
                top: 100%;
                /* Muncul di bawah sel */
                left: 0;
                background-color: #fff;
                border: 1px solid #ccc;
                padding: 10px;
            }
        </style> --}}

        {{-- <div class="vertical-table">
            <table class="table-auto">
                <thead>
                    <tr>
                        <td class="px-4 py-2">Tahun <span id="selected-year-text"></span></td>
                        @for ($month = 1; $month <= 12; $month++) --}}
                            {{-- <tr> --}}
                            {{-- <td>{{ date('F', mktime(0, 0, 0, $month, 1)) }}</td> --}}
                            {{-- <td class="total-psv-cell" onmouseover="showTagNumber(this, {{ $month }})" onmouseout="hideTagNumber()">{{ $monthlyPsvTotals[$month] }}</td>
                            </tr> --}}
                        {{-- @endfor --}}
                        {{-- <td class="px-4 py-2">Total PSV</td> --}}
                    {{-- </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Total PSV</td>
                        @for ($month = 1; $month <= 12; $month++)
                            <td class="total-psv-cell" onmouseover="showTagNumber(this, {{ $month }})"
                                onmouseout="hideTagNumber()">{{ $monthlyPsvTotals[$month] }}</td> --}}
                            {{-- <tr>
                                <td>{{ date('F Y', mktime(0, 0, 0, $month, 1)) }}</td>
                                <td class="total-psv-cell" onmouseover="showTagNumber(this, {{ $month }})" onmouseout="hideTagNumber()">{{ $monthlyPsvTotals[$month] }}</td>
                            </tr> --}}
                        {{-- @endfor
                    </tr>
                </tbody>
            </table>
            <div class="tag-number-popup" id="tagNumberPopup"></div>
        </div> --}}

        {{-- <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl">
            <div class="flex mt-2 p-4 gap-x-5"> --}}
                {{-- <div class="w-1/3">
                    <div
                        class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="text-center mb-6">
                            <a href="#">
                                <span class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">PSV
                                    SIZE</span>
                            </a>
                        </div>
                        <div id="psvsizeChart"></div>
                    </div>
                </div> --}}
                {{-- <div class="w-1/3">
                    <div
                        class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="text-center mb-6">
                            <a href="#">
                                <span class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">PSV
                                    BRAND</span>
                            </a>
                        </div>
                        <div id="psvbrandChart"></div>
                    </div>
                </div> --}}
            {{-- </div>
            <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl"> --}}
                {{-- <div class="flex mt-2 p-4 gap-x-5">
                    <div class="flex-1 flex-shrink">
                        <div
                            class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <div class="text-center mb-6">
                                <a href="#">
                                    <span
                                        class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">PLATFORM</span>
                                </a>
                            </div>
                            <div id="psvplatformChart"></div>
                        </div>
                    </div>
                </div> --}}
                {{-- </div> --}}
                {{-- <div class="flex mt-2 p-4 gap-x-5">
                    <div class="flex-1">
                        <div
                            class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <div class="text-center mb-6">
                                <a href="#">
                                    <span
                                        class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Integrity
                                        Status Based on Flow Station</span>
                                </a>
                            </div> --}}
                            {{-- <div id="flowstatusChart"></div> --}}
                        {{-- </div>
                    </div>
                </div> --}}
            {{-- </div>
        </div> --}}

            {{-- CHART OPERATIONAL --}}
            {{-- <div id="operationalChart" style="width: 400px; height: 400px;"></div> --}}
        @endsection

        @section('js')
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
            <script>
                $(document).ready(function() {
                    // Initialize variables to store counts
                    var yesCount = {{ $yesCount }};
                    var noCount = {{ $noCount }};

                    // Function to create the donut chart
                    function createDonutChart() {
                        var options = {
                            chart: {
                                type: 'donut',
                            },
                            series: [yesCount, noCount],
                            labels: ['Yes', 'No'],
                            colors: ['#1450A3','#6499E9'], // Customize colors as needed
                            legend: {
                                show: false // Menghilangkan legenda
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

                        var chart = new ApexCharts(document.querySelector("#operationalChart"), options);
                        chart.render();
                    }

                    // Call the createDonutChart function to initially create the chart
                    createDonutChart();

                    $('#year').select2({
                        allowClear: true,
                        placeholder: 'Select years..',
                    });
                });

                // Fungsi untuk menampilkan rincian tag_number
                function showTagNumber(element, month) {
                    var tagNumberPopup = document.getElementById('tagNumberPopup');
                    tagNumberPopup.style.display = 'block';

                    // Mengambil data tag_number berdasarkan bulan
                    var tagNumber = tagNumbers[month];
                    tagNumberPopup.innerHTML = 'Tag Number: ' + tagNumber;
                }

                // Fungsi untuk menyembunyikan rincian tag_number
                function hideTagNumber() {
                    var tagNumberPopup = document.getElementById('tagNumberPopup');
                    tagNumberPopup.style.display = 'none';
                }

                // Data tag_numbers sesuai dengan bulan
                var tagNumbers = [
                    @foreach ($monthlyTagNumbers as $tagNumber)
                        '{{ $tagNumber }}',
                    @endforeach
                ];

            </script>

            {{-- CHART INTEGRITY - DONUT --}}
            <script>
                // Function to create the donut chart
                function createDonutChart() {
                    var options = {
                        chart: {
                            type: 'donut',
                        },
                        series: @json($psvintegritySeries),
                        labels: @json($psvintegrityLabels),
                        colors: ['#54B435','#F9D923','#FF1E00'], // Customize colors as needed
                        legend: {
                            show: false // Menghilangkan legenda
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

                    var chart = new ApexCharts(document.querySelector("#integrityChart"), options);
                    chart.render();
                }

                // Call the createDonutChart function to initially create the chart
                createDonutChart();
            </script>

            {{-- CHART AREA - DONUT --}}
            <script>
                // Function to create the donut chart
                function createDonutChart() {
                    var options = {
                        chart: {
                            type: 'donut',
                        },
                        series: @json($psvareacount->pluck('jumlaharea')->toArray()),
                        labels: @json($psvareacount->pluck('area')->toArray()),
                        colors: ['#1450A3','#6499E9'], // Customize colors as needed
                        legend: {
                            show: false // Menghilangkan legenda
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

                    var chart = new ApexCharts(document.querySelector("#areaDonutChart"), options);
                    chart.render();
                }

                // Call the createDonutChart function to initially create the chart
                createDonutChart();
            </script>

            {{-- CHART FLOW STATION - BAR --}}
            <script>
                // Function to create the bar chart
                function createBarChart() {
                    var options = {
                        chart: {
                            type: 'bar',
                            width: '400px',
                        },
                        series: [{
                            name: 'Qty',
                            data: @json($psvflowcount->pluck('jumlahflow')->toArray()),
                        }],
                        xaxis: {
                            categories: @json($psvflowcount->pluck('flow')->toArray()),
                        },
                        colors: ['#6499E9'], // Customize colors as needed
                        plotOptions: {
                            bar: {
                                // horizontal: false,
                                horizontal: true,
                                endingShape: 'rounded',
                                dataLabels: {
                                    position: 'top',
                                }
                            },
                        },
                        dataLabels: {
                            enabled: true, // Disable data labels (optional)
                            textAnchor: 'start',
                            style: {
                                colors: ['#000'],
                            },
                            offsetX: 20,
                        },
                        tooltip: {
                            enabled: true,
                            shared: true,
                            intersect: false 
                        },
                    };

                    var chart = new ApexCharts(document.querySelector("#psvflowChart"), options);
                    chart.render();
                }

                // Call the createBarChart function to initially create the chart
                createBarChart();
            </script>

            <script>
                /* CHART PSV STYLE - BAR */
                var optionsPsvStyle = {
                    chart: {
                        type: 'bar',
                        width: '400px',
                    },
                    series: [{
                        name: 'Qty',
                        data: @json($psvstylecount->pluck('jumlahstyle')->toArray()),
                    }],
                    xaxis: {
                        categories: @json($psvstylecategories),
                    },
                    colors: ['#6499E9'], // Customize colors as needed
                    plotOptions: {
                        bar: {
                            horizontal: true,
                            endingShape: 'rounded',
                            dataLabels: {
                                position: 'top',
                            }
                        },
                    },
                    dataLabels: {
                        enabled: true, // Disable data labels (optional)
                        textAnchor: 'start',
                        style: {
                            colors: ['#000'],
                        },
                        offsetX: 20,
                    },
                    tooltip: {
                        enabled: true,
                        shared: true,
                        intersect: false 
                    },
                };

                var chartPsvStyle = new ApexCharts(document.querySelector("#psvstylebarChart"), optionsPsvStyle);
                chartPsvStyle.render();

                /* CHART INTEGRITY STATUS - BAR */
                var optionsIntegrityByArea = {
                    chart: {
                        type: 'bar',
                        width: '400px',

                    },
                    series: [
                        {
                            name: 'Good',
                            data: @json($integrityAreaStatusGood),

                        },
                        {
                            name: 'Warning',
                            data: @json($integrityAreaStatusWarning),
                        },
                        {
                            name: 'Expired',
                            data: @json($integrityAreaStatusExpired),
                        }
                    ],
                    xaxis: {
                        categories: @json($psvareacount->pluck('area')->toArray()),
                    },
                    colors: ['#54B435','#F9D923','#FF1E00'], // Customize colors as needed '#54B435','#F9D923','#FF1E00'
                    plotOptions: {
                        bar: {
                            horizontal: true, // Set to true for horizontal bar chart
                            endingShape: 'rounded',
                            dataLabels: {
                                position: 'top',
                            }
                        },
                    },
                    dataLabels: {
                        enabled: true, // Disable data labels (optional)
                        textAnchor: 'start',
                        style: {
                            colors: ['#000'],
                        },
                        offsetX: 20,
                    },
                    tooltip: {
                        enabled: true,
                        shared: true,
                        intersect: false 
                    },
                };

                var chartIntegrityByArea = new ApexCharts(document.querySelector("#areastatusChart"), optionsIntegrityByArea);
                chartIntegrityByArea.render();

                /* CHART PSV BRAND - BAR */
                var optionsBrand = {
                    chart: {
                        type: 'bar',
                        width: '100%',
                        height: '100%',
                    },
                    series: [{
                        name: 'Qty',
                        data: @json($psvbrandcount->pluck('jumlahbrand')->toArray()),
                    }],
                    xaxis: {
                        categories: @json($psvbrandcategories),
                        labels: {
                            show: true,
                            rotate: -30
                        },
                    },
                    colors: ['#6499E9'], // Customize colors as needed
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            dataLabels: {
                                position: 'top',
                            }
                        },
                    },
                    dataLabels: {
                        enabled: true, // Disable data labels (optional)
                        textAnchor: 'start',
                        style: {
                            colors: ['#000'],
                        },
                        offsetX: -14,
                    },
                    tooltip: {
                        enabled: true,
                        shared: true,
                        intersect: false 
                    },
                };

                var chartBrand = new ApexCharts(document.querySelector("#psvbrandChart"), optionsBrand);
                chartBrand.render();

                /* CHART PSV SIZE - BAR */
                var optionsSizeBar = {
                    chart: {
                        type: 'bar',
                        width: '100%',
                        height: '100%',
                    },
                    series: [{
                        name: 'Qty',
                        data: @json($psvsizecount->pluck('jumlahsize')->toArray()),
                    }],
                    xaxis: {
                        categories: @json($psvsizecategories),
                    },
                    colors: ['#6499E9'], // Customize colors as needed
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            dataLabels: {
                                position: 'top',
                            }
                        },
                    },
                    dataLabels: {
                        enabled: true, // Disable data labels (optional)
                        textAnchor: 'start',
                        style: {
                            colors: ['#000'],
                        },
                        offsetX: -14,
                    },
                    tooltip: {
                        enabled: true,
                        shared: true,
                        intersect: false 
                    },
                };

                var chartSizeBar = new ApexCharts(document.querySelector("#psvsizeChart"), optionsSizeBar);
                chartSizeBar.render();

                /* CHART PSV PLATFORM - BAR */
                var optionsPlatform = {
                    chart: {
                        type: 'bar',
                        width: '100%',
                        height: '100%',
                    },
                    series: [{
                        name: 'Qty',
                        data: @json($psvplatformcount->pluck('jumlahplatform')->toArray()),
                    }],
                    xaxis: {
                        categories: @json($psvplatformcategories),
                        labels: {
                            show: true,
                            rotate: -30
                        },
                    },
                    colors: ['#6499E9'], // Customize colors as needed
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            dataLabels: {
                                position: 'top',
                            }
                        },
                    },
                    dataLabels: {
                        enabled: true, // Disable data labels (optional)
                        textAnchor: 'start',
                        style: {
                            colors: ['#000'],
                        },
                        offsetX: -14,
                    },
                    tooltip: {
                        enabled: true,
                        shared: true,
                        intersect: false 
                    },
                };

                var chartPlatform = new ApexCharts(document.querySelector("#psvplatformChart"), optionsPlatform);
                chartPlatform.render();
            </script>

            {{-- CHART PSV SIZE - DONUT --}}
            {{-- <div id="psvsizeChart" style="width: 400px; height: 400px;"></div> --}}
            {{-- <script>
                // Function to create the donut chart
                function createDonutChart() {
                    var options = {
                        chart: {
                            type: 'donut',
                        },
                        series: @json($psvsizecount->pluck('jumlahsize')->toArray()),
                        labels: @json($psvsizecount->pluck('size_in')->toArray()),
                        colors: ['#1E90FF'], // Customize colors as needed
                        legend: {
                            show: false // Menghilangkan legenda
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

                    var chart = new ApexCharts(document.querySelector("#psvsizeChart"), options);
                    chart.render();
                }

                // Call the createDonutChart function to initially create the chart
                createDonutChart();
            </script> --}}

            {{-- CHART PSV BRAND --}}
            {{-- <div id="psvbrandChart" style="width: 400px; height: 400px;"></div> --}}
            {{-- <script>
                // Function to create the donut chart
                function createDonutChart() {
                    var options = {
                        chart: {
                            type: 'donut',
                        },
                        series: @json($psvbrandcount->pluck('jumlahbrand')->toArray()),
                        labels: @json($psvbrandcount->pluck('manufacture')->toArray()),
                        colors: ['#1E90FF'], // Customize colors as needed
                        legend: {
                            show: false // Menghilangkan legenda
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

                    var chart = new ApexCharts(document.querySelector("#psvbrandChart"), options);
                    chart.render();
                }

                // Call the createDonutChart function to initially create the chart
                createDonutChart();
            </script> --}}

            {{-- CHART PLATFORM --}}
            {{-- <div id="psvplatformChart" style="width: 400px; height: 400px;"></div>
            <script>
                // Function to create the bar chart
                function createBarChart() {
                    var options = {
                        chart: {
                            type: 'bar',
                            // width: '100%',
                        },
                        series: [{
                            name: 'Qty',
                            data: @json($psvplatformcount->pluck('jumlahplatform')->toArray()),
                        }],
                        xaxis: {
                            categories: @json($psvplatformcount->pluck('platform')->toArray()),
                        },
                        colors: ['#4169E1'], // Customize colors as needed
                        plotOptions: {
                            bar: {
                                // horizontal: false,
                                horizontal: true,
                                endingShape: 'rounded'
                            },
                        },
                        dataLabels: {
                            enabled: false // Disable data labels (optional)
                        }
                    };

                    var chart = new ApexCharts(document.querySelector("#psvplatformChart"), options);
                    chart.render();
                }

                // Call the createBarChart function to initially create the chart
                createBarChart();
            </script> --}}

            {{-- CHART FLOW STATUS --}}
            {{-- <div id="flowstatusChart" style="width: 400px; height: 400px;"></div> --}}
            {{-- <script>
                // Function to create the bar chart
                function createBarChart() {
                    var options = {
                        chart: {
                            type: 'bar',
                            width: '100%',

                        },
                        series: [{
                                name: 'GREEN',
                                data: @json($psvintegritycount->pluck('jumlahintegrity')->toArray()),
                            },
                            {
                                name: 'RED',
                                data: @json($psvintegritycount->pluck('jumlahintegrity')->toArray()),

                            }
                        ],
                        xaxis: {
                            categories: @json($psvflowcount->pluck('flow')->toArray()),
                            // categories: @json($psvintegritycount->pluck('integrity')->toArray()),

                        },
                        colors: ['#3CB371', '#FF0000'], // Customize colors as needed
                        plotOptions: {
                            bar: {
                                horizontal: true, // Set to true for horizontal bar chart
                                // horizontal: false,
                                endingShape: 'rounded'
                            },
                        },
                        dataLabels: {
                            enabled: false // Disable data labels (optional)
                        }
                    };

                    var chart = new ApexCharts(document.querySelector("#flowstatusChart"), options);
                    chart.render();
                }

                // Call the createBarChart function to initially create the chart
                createBarChart();
            </script> --}}
        @endsection
