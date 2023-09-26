@extends('layout.index')

@section('content')
     <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl">
        <div class="flex mt-2 p-4 gap-x-5">
            <div class="w-1/3">
                <div
                    class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="text-center mb-6">
                        <a href="#">
                            <span class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">OPERATIONAL</span>
                        </a>
                    </div>
                    <div id="operationalChart"></div>
                </div>
            </div>
            <div class="w-1/3">
                <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="text-center mb-6">
                    <a href="#">
                        <span class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">INTEGRITY STATUS</span>
                    </a>
                </div>
                <div id="integrityChart"></div>
            </div>
        </div>
            
        <div class="w-1/2 grid gap-y-2">
            <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-2">
                <div class="flex items-center justify-center px-10 py-3">
                    <div class="flex flex-col items-center justify-center text-center">
                        <dt class="mb-2 text-3xl font-extrabold contracts-text">{{ $psvTotal }}</dt>
                        <dd class="text-gray-500 justify-center dark:text-gray-400">TOTAL PSV</dd>
                        {{-- <div id="areaChart"></div> --}}
                    </div>
                    <i class="fa-solid fa-4x2"></i>
                </div>
            </div>
            <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-2">
                <div class="flex items-center justify-center px-4 py-3">
                    <div class="flex flex-col items-center justify-center text-center">
                        <dt class="mb-2 text-3xl font-extrabold contracts-text">{{ $totalPsvByMonth }}</dt>
                        <dd class="text-gray-500 dark:text-gray-400">TOTAL PSV</dd>
                        <dt class="text-gray-500 dark:text-gray-400">Bulan : {{ date('F Y') }}</dt> 
                        {{-- NAMPILIN TOTAL BULAN INI --}}
                    </div>
                    <i class="fa-solid fa-4x2"></i>
                </div>
            </div> 
        </div>
    </div>
    {{-- <div class="container">
        <h1 class="text-center text-danger pt-4">Date Filters</h1>
        <hr> --}}

   {{-- <div class="row py-2">
        <div class="col-md-6">
            <h2>List of Data Master PSV</h3>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="date_filter">Filter by Date:</label>

                <form method="get" action="psvdatamaster">
                    <div class="input-group">
                        <select class="form-select" name="date_filter">
                            <option value="">All Dates</option>
                            <option value="today" {{ $dateFilter == 'today' ? 'selected' : '' }}>Today</option>
                            <option value="yesterday" {{ $dateFilter == 'yesterday' ? 'selected' : '' }}>Yesterday</option>
                            <option value="this_week" {{ $dateFilter == 'this_week' ? 'selected' : '' }}>This Week</option>
                            <option value="last_week" {{ $dateFilter == 'last_week' ? 'selected' : '' }}>Last Week</option>
                            <option value="this_month" {{ $dateFilter == 'this_month' ? 'selected' : '' }}>This Month</option>
                            <option value="last_month" {{ $dateFilter == 'last_month' ? 'selected' : '' }}>Last Month</option>
                            <option value="this_year" {{ $dateFilter == 'this_year' ? 'selected' : '' }}>This Year</option>
                            <option value="last_year" {{ $dateFilter == 'last_year' ? 'selected' : '' }}>Last Year</option>
                            </select>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>

            </div>
        </div>
    </div> --}}
    
    {{-- <table class="table  table-bordered table-hover">
        <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($monthlyPsvTotals as $month => $total)
                <tr>
                    <td>{{ date('F Y', mktime(0, 0, 0, $month, 1)) }}</td>
                    <td class="border px-4 py-2" onmouseover="showTagNumber(this, '{{ $monthlyTagNumbers[$month] }}')" onmouseout="hideTagNumber()">{{ $monthlyPsvTotals[$month] }}</td>
                </tr>
                    
                @endforeach
            </tbody>
        </table> --}}

    {{-- MEMBUAT TABEL UNTUK QTY PER BULAN --}}
    {{-- <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl">
        <style>
            /* Mengatur tampilan tabel */
            .horizontal-table {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }
        
            .vertical-table {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
        
            /* Mengatur sel dalam tabel */
            .vertical-table td {
                border: 1px solid #ccc; /* Atur gaya border sesuai kebutuhan Anda */
                padding: 10px;
                width: 150px; /* Atur lebar sel sesuai kebutuhan Anda */
                text-align: center; /* Tengahkan teks */
                white-space: nowrap; /* Hindari pemisahan teks berlebihan ke bawah */
                cursor: pointer; /* Mengubah kursor saat mengarahkan ke sel */
            }
        
            /* Gaya rincian tag_number */
            .tag-number-popup {
                display: none;
                position: absolute;
                top: 100%;
                left: 0; /* Muncul di sebelah kanan sel */
                background-color: #fff;
                border: 1px solid #ccc;
                padding: 10px;
            }
        </style>
        
        <div class="horizontal-table">
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
        </div>
        
        <script>
            // Fungsi untuk menampilkan rincian tag_number
            function showTagNumber(element, tagNumber) {
                var tagNumberPopup = element.querySelector('.tag-number-popup');
                tagNumberPopup.style.display = 'block';
                tagNumberPopup.innerHTML = 'Tag Number: ' + tagNumber;
            }
        
            // Fungsi untuk menyembunyikan rincian tag_number
            function hideTagNumber() {
                var tagNumberPopups = document.querySelectorAll('.tag-number-popup');
                tagNumberPopups.forEach(function (popup) {
                    popup.style.display = 'none';
                });
            }
        </script> --}}

            <!-- Tambahkan elemen dropdown untuk tahun -->
            <label for="year">Pilih Tahun:</label>
            <select id="year" onchange="filterData()">
                <option value="2023">2023</option>
                <option value="2024">2024</option>

                <!-- Tambahkan opsi tahun lainnya sesuai kebutuhan Anda -->
            </select>
        
            <!-- Tabel hasil filter -->
            {{--<div class="horizontal-table" id="filteredData">
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
            
            {{-- TABEL HORIZONTAL SOROT TAG NUMBER --}}
            {{-- <style>
                /* Mengatur tampilan tabel */
                .horizontal-table {
                    display: flex;
                    flex-direction: row;
                    justify-content: space-between;
                    align-items: center;
                }
            
                .vertical-table {
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    align-items: center;
                }
            
                /* Mengatur sel dalam tabel */
                .vertical-table td {
                    border: 1px solid #ccc; /* Atur gaya border sesuai kebutuhan Anda */
                    padding: 10px;
                    width: 150px; /* Atur lebar sel sesuai kebutuhan Anda */
                    text-align: center; /* Tengahkan teks */
                    white-space: nowrap; /* Hindari pemisahan teks berlebihan ke bawah */
                    cursor: pointer; /* Mengubah kursor saat mengarahkan ke sel */
                }
            
                /* Gaya rincian tag_number */
                .tag-number-popup {
                    display: none;
                    position: absolute;
                    top: 0;
                    left: 100%; /* Muncul di sebelah kanan sel */
                    background-color: #fff;
                    border: 1px solid #ccc;
                    padding: 10px;
                }
            </style> --}}
        
        <style>
            /* Mengatur tampilan tabel */
            .vertical-table {
                display: flex;
                flex-direction: column;
                /* justify-content: space-between; */
                align-items: center;
            }
            .horizontal-table {
                    display: flex;
                    flex-direction:  column;
                    justify-content: space-between;
                    /* align-items: flex-start; */
                    align-items: center;

                }
        
            /* Mengatur sel dalam tabel */
            .vertical-table td {
                /* display: flex; */
                border: 1px solid #ccc; /* Atur gaya border sesuai kebutuhan Anda */
                padding: 10px;
                width: 150px; /* Atur lebar sel sesuai kebutuhan Anda */
                text-align: center; /* Tengahkan teks */
                    white-space: nowrap; /* Hindari pemisahan teks berlebihan ke bawah */
                    cursor: pointer;
            }
        
            /* Gaya rincian tag_number */
            .tag-number-popup {
                display: none;
                position: absolute;
                top: 100%; /* Muncul di bawah sel */
                left: 0;
                background-color: #fff;
                border: 1px solid #ccc;
                padding: 10px;
            }
        </style>
        
        <div class="vertical-table">
            <table class="table-auto">
                <thead>
                    <tr>
                        <td class="px-4 py-2">Bulan</td>
                        <td class="px-4 py-2">Total PSV</td>
                    </tr>
                </thead>
                <tbody>
                    @for ($month = 1; $month <= 12; $month++)
                        <tr>
                            <td>{{ date('F Y', mktime(0, 0, 0, $month, 1)) }}</td>
                            <td class="total-psv-cell" onmouseover="showTagNumber(this, {{ $month }})" onmouseout="hideTagNumber()">{{ $monthlyPsvTotals[$month] }}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
            <div class="tag-number-popup" id="tagNumberPopup"></div>
        </div>
        
        <script>
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
        
        <div class="flex mt-2 p-4 gap-x-5">
            <div class="flex-1 flex-shrink">
                <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="text-center mb-6">
                        <a href="#">
                            <span class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">AREA</span>
                        </a>
                    </div>
                    <div id="areaChart"></div>
                </div>
            </div>
            <div class="flex-1">
                <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="text-center mb-6">
                        <a href="#">
                            <span class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">FLOW STATION</span>
                        </a>
                    </div>
                    <div id="psvflowChart"></div>
                </div>
            </div>
        </div>
        <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl">
            <div class="flex mt-2 p-4 gap-x-5">
                <div class="w-1/3">
                    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="text-center mb-6">
                            <a href="#">
                                <span class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">PSV STYLE</span>
                            </a>
                        </div>
                        <div id="psvstyleChart"></div>
                    </div>
                </div>
                <div class="w-1/3">
                    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="text-center mb-6">
                            <a href="#">
                                <span class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">PSV SIZE</span>
                            </a>
                        </div>
                        <div id="psvsizeChart"></div>
                    </div>
                </div>
                <div class="w-1/3">
                    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="text-center mb-6">
                            <a href="#">
                                <span class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">PSV BRAND</span>
                            </a>
                        </div>
                        <div id="psvbrandChart"></div>
                    </div>
                </div>
            </div>
        <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl">
            <div class="flex mt-2 p-4 gap-x-5">
                <div class="flex-1 flex-shrink">
                    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="text-center mb-6">
                            <a href="#">
                                <span class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">PLATFORM</span>
                            </a>
                        </div>
                        <div id="psvplatformChart"></div>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
        <div class="flex mt-2 p-4 gap-x-5">
            <div class="flex-1 flex-shrink">
                <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="text-center mb-6">
                        <a href="#">
                            <span class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Integrity Status Based on Area</span>
                        </a>
                    </div>
                    <div id="areastatusChart"></div>
                </div>
            </div>
            <div class="flex-1">
                <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="text-center mb-6">
                        <a href="#">
                            <span class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Integrity Status Based on Flow Station</span>
                        </a>
                    </div>
                    <div id="flowstatusChart"></div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

{{-- CHART OPERATIONAL --}}
<div id="operationalChart" style="width: 400px; height: 400px;"></div>
<script>
    $(document).ready(function () {
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
                colors: ['#00BFFF', '#778899'], // Customize colors as needed
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
    
            var chart = new ApexCharts(document.querySelector("#operationalChart"), options);
            chart.render();
        }
    
        // Call the createDonutChart function to initially create the chart
        createDonutChart();
    });
</script>
    
{{-- CHART INTEGRITY --}}
<div id="integrityChart" style="width: 400px; height: 400px;"></div>
<script>
    
        // Function to create the donut chart
        function createDonutChart() {
            var options = {
                chart: {
                    type: 'donut',
                },
                series : @json($psvintegritycount->pluck('jumlahintegrity')->toArray()),
                labels : @json($psvintegritycount->pluck('integrity')->toArray()),
                colors: ['#3CB371', '#FF0000'], // Customize colors as needed
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
    
            var chart = new ApexCharts(document.querySelector("#integrityChart"), options);
            chart.render();
        }
    
        // Call the createDonutChart function to initially create the chart
        createDonutChart();
</script>

{{-- CHART AREA --}}
<div id="areaChart" style="width: 400px; height: 400px;"></div>
{{-- <script>
    $(document).ready(function () {
        // Ambil data total East dan West dari controller
        var eastCount = {{ $eastCount }};
        var westCount = {{ $westCount }};
    
        // Function to create the bar chart
        function createBarChart() {
            var options = {
                chart: {
                    type: 'bar',
                    width: '100%',

                },
                series: [
                {
                    name: 'Qty',
                    data: [eastCount, westCount]
                }],
                xaxis: {
                    categories: ['East', 'West'],
                },
                colors: ['#4169E1'], // Customize colors as needed
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
    
            var chart = new ApexCharts(document.querySelector("#areaChart"), options);
            chart.render();
    }
    
    // Call the createBarChart function to initially create the chart
    createBarChart();
    });
</script> --}}
<script>
    // Function to create the bar chart
    function createBarChart() {
        var options = {
            chart: {
                type: 'bar',
                width: '100%',
            },
            series: [
            {
                name: 'Qty',
                data: @json($psvareacount->pluck('jumlaharea')->toArray()),
            }],
            xaxis: {
                categories: @json($psvareacount->pluck('area')->toArray()),
            },
            // series : @json($psvareacount->pluck('jumlaharea')->toArray()),
            // labels : @json($psvareacount->pluck('area')->toArray()),
            colors: ['#4169E1'], // Customize colors as needed
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

        var chart = new ApexCharts(document.querySelector("#areaChart"), options);
        chart.render();
    }

    // Call the createBarChart function to initially create the chart
    createBarChart();
</script>

{{-- <script>
$(document).ready(function () {
// Ambil data total East dan West dari controller
var eastCount = {{ $eastCount }};
var westCount = {{ $westCount }};

// Konfigurasi grafik
function createBarChart() {
var options = {
    chart: {
        type: 'bar',
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
    colors: ['#FF5733', '#33FF57'], // Warna untuk East dan West
    series: [{
        name: 'East',
        data: [eastCount]
    }, {
        name: 'West',
        data: [westCount]
    }],
    xaxis: {
        categories: ['East & West']
    }
};

// Membuat grafik batang menggunakan ApexCharts
var chart = new ApexCharts(document.querySelector("#barChart"), options);
chart.render();

// Call the createBarChart function to initially create the chart
createBarChart();
});
</script> --}}

{{-- CHART FLOW STATION --}}
<div id="psvflowChart" style="width: 400px; height: 400px;"></div>
<script>
    // Function to create the bar chart
    function createBarChart() {
        var options = {
            chart: {
                type: 'bar',
                // width: '100%',
            },
            series: [
            {
                name: 'Qty',
                data: @json($psvflowcount->pluck('jumlahflow')->toArray()),
            }],
            xaxis: {
                categories: @json($psvflowcount->pluck('flow')->toArray()),
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

        var chart = new ApexCharts(document.querySelector("#psvflowChart"), options);
        chart.render();
    }

    // Call the createBarChart function to initially create the chart
    createBarChart();
</script>

{{-- CHART PSV STYLE --}}
<div id="psvstyleChart" style="width: 400px; height: 400px;"></div>
<script>
        // Function to create the donut chart
        function createDonutChart() {
            var options = {
                chart: {
                    type: 'donut',
                },
                series : @json($psvstylecount->pluck('jumlahstyle')->toArray()),
                labels : @json($psvstylecount->pluck('psv')->toArray()),
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
    
            var chart = new ApexCharts(document.querySelector("#psvstyleChart"), options);
            chart.render();
        }
    
        // Call the createDonutChart function to initially create the chart
        createDonutChart();
</script>

{{-- <div id="psvstyleChart" style="width: 400px; height: 400px;"></div>
<script>
    // Function to create the donut chart
    function createDonutChart() {
        var options = {
            chart: {
                type: 'donut',
            },
            series : @json($psvstylecount->pluck('jumlahstyle')->toArray()),
            labels : @json($psvstylecount->pluck('psv')->toArray()),
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

        var chart = new ApexCharts(document.querySelector("#psvstyleChart"), options);
        chart.render();
    }

    // Call the createDonutChart function to initially create the chart
    createDonutChart();
</script> --}}

{{-- CHART PSV SIZE --}}
<div id="psvsizeChart" style="width: 400px; height: 400px;"></div>
<script>
        // Function to create the donut chart
        function createDonutChart() {
            var options = {
                chart: {
                    type: 'donut',
                },
                series : @json($psvsizecount->pluck('jumlahsize')->toArray()),
                labels : @json($psvsizecount->pluck('size_in')->toArray()),
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
</script>

{{-- CHART PSV BRAND --}}
<div id="psvbrandChart" style="width: 400px; height: 400px;"></div>
<script>
        // Function to create the donut chart
        function createDonutChart() {
            var options = {
                chart: {
                    type: 'donut',
                },
                series : @json($psvbrandcount->pluck('jumlahbrand')->toArray()),
                labels : @json($psvbrandcount->pluck('manufacture')->toArray()),
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
</script>

{{-- CHART PLATFORM --}}
<div id="psvplatformChart" style="width: 400px; height: 400px;"></div>
<script>
        // Function to create the bar chart
        function createBarChart() {
            var options = {
                chart: {
                    type: 'bar',
                    // width: '100%',
                },
                series: [
                {
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
</script>

{{-- CHART AREA STATUS --}}
<div id="areastatusChart" style="width: 400px; height: 400px;"></div>
<script> 
        // Function to create the bar chart
        function createBarChart() {
            var options = {
                chart: {
                    type: 'bar',
                    width: '100%',

                },
                series: [
                    {
                    name: 'Green',
                    data: @json($psvintegritycount->pluck('jumlahintegrity')->toArray()),

                },
                {
                    name: 'Red',
                    data: @json($psvintegritycount->pluck('jumlahintegrity')->toArray()),
                }
                    // {
                    //     name: 'RED',
                    //     data: @json($psvintegritycount->pluck('jumlahintegrity')->toArray()),

                    // }
                ],
                xaxis: {
                    categories: @json($psvareacount->pluck('area')->toArray()),
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
    
            var chart = new ApexCharts(document.querySelector("#areastatusChart"), options);
            chart.render();
    }
    
    // Call the createBarChart function to initially create the chart
    createBarChart();
</script>


{{-- CHART FLOW STATUS --}}
<div id="flowstatusChart" style="width: 400px; height: 400px;"></div>
<script> 
        // Function to create the bar chart
        function createBarChart() {
            var options = {
                chart: {
                    type: 'bar',
                    width: '100%',

                },
                series: [
                    {
                        name: 'GREEN',
                        data: @json($psvintegritycount->pluck('jumlahintegrity')->toArray()),
                    },
                    {
                        name: 'RED',
                        data: @json($psvintegritycount->pluck('jumlahintegrity')->toArray()),

                    }],
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
</script>

{{-- <script>
    // Sample data for testing (replace with your actual data)
    var psvareacount = [
        { area: 'Category 1', jumlaharea: 20, jumlahintegrity: 10 },
        { area: 'Category 2', jumlaharea: 25, jumlahintegrity: 15 },
        // Add more data points as needed
    ];

    // Function to create the bar chart
    function createBarChart() {
        var options = {
            chart: {
                type: 'bar',
                width: '100%',
            },
            series: [
                {
                    name: 'Jumlah Area',
                    data: psvareacount.map(item => item.jumlaharea),
                },
                {
                    name: 'Jumlah Integrity',
                    data: psvareacount.map(item => item.jumlahintegrity),
                },
            ],
            xaxis: {
                categories: psvareacount.map(item => item.area),
            },
            colors: ['#3CB371', '#FF0000'], // Customize colors as needed
            plotOptions: {
                bar: {
                    horizontal: false,
                    endingShape: 'rounded',
                },
            },
            dataLabels: {
                enabled: false, // Disable data labels (optional)
            },
            tooltip: {
                y: {
                    formatter: function (value, { series, seriesIndex, dataPointIndex }) {
                        return seriesIndex === 0 ? 'Jumlah Area: ' + value : 'Jumlah Integrity: ' + value;
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#areastatusChart"), options);
        chart.render();
    }

    // Call the createBarChart function to initially create the chart
    createBarChart();
</script> --}}

@endsection
