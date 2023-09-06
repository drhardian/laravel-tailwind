@extends('layout.index')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css">
@endsection

@section('content')
    <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl">
        <div class="p-4 mt-2">
            <h3 class="mb-2 hidden md:block text-2xl font-medium text-gray-900 dark:text-white">{{ $title }}</h3>

            <div class="flex justify-between mb-7">
                @unless (count($breadcrumbs) === 0)
                    @include('layout.breadcrumbs')
                @endunless
                <button type="button" id="newBtn" onclick="openForm"
                    class="text-white bg-green-700 hidden sm:block hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    <i class="fa-solid fa-file-import"></i> Import
                </button>
                <button type="button" id="newBtn" onclick="openForm"
                    class="text-white bg-yellow-400 hidden sm:block hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                    <i class="fa-solid fa-file-export"></i> Export
                </button>
                <button type="button" id="newBtn" onclick="openForm(`{{ route('general.store') }}`)"
                    class="text-white bg-blue-700 hidden sm:block hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="fa-solid fa-plus"></i> New
                </button>
            </div>

            <div>
                <table id="main-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Area</th>
                            <th>Flow Station</th>
                            <th>Platform</th>
                            <th>Tag Number</th>
                            {{-- <th>Operational</th>
                            <th>Integrity Status</th>
                            <th>Cert Date</th>
                            <th>Expired Date</th> --}}
                            <th>Valve Number</th>
                            <th>Status Update</th>
                            {{-- <th>Deferal</th>
                            <th>Resetting</th>
                            <th>Resize</th>
                            <th>Demolish, Decomm, Inactive</th>
                            <th>Relief Header</th>
                            <th>Note</th>
                            <th>Cert Package</th>
                            <th>Klarifikasi</th> --}}
                            <th>By</th>
                            {{-- <th>Created At</th> --}}
                            <th>Updated At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- New modal -->
    <div id="newModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" role="dialog" aria-modal="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white modal-title"></h3>
                    <button type="button" id="closeIco"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="px-6 space-y-6">
                    <!-- Alert area -->
                    <div id="alert-frame">
                        <div id="warning-alert"
                            class="hidden items-center p-4 my-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium warning-alert-title"></span>
                                <ul class="mt-1.5 ml-4 list-disc list-inside warning-alert-message"></ul>
                            </div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                                onclick="$('#warning-alert').removeClass('flex').addClass('hidden')" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <!-- URL Area -->
                    <input type="hidden" id="form_url" readonly>
                    <!-- Form Area -->
                    <form id="mainForm" method="post">
                        @csrf
                        <!-- LOCATION INFORMATION -->
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LOCATION INFORMATION</label>
                            <div class="row sm:flex">
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="area"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Area</label>
                                    <select class="select2-ajax" id="area" name="area">
                                        <option disabled>Search here..</option>
                                        <option>East</option>
                                        <option>West</option>
                                    </select>
                                </div>
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="flow"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Flow Station</label>
                                    <select class="select2-ajax" id="flow" name="flow">
                                        <option disabled>Search here..</option>
                                        <option>ARCO ARJUNA</option>
                                        <option>BRAVO F/S</option>
                                        <option>CENTRAL PLANT</option>
                                        <option>ECHO F/S</option>
                                        <option>FOXTROT F/S</option>
                                        <option>KILO F/S</option>
                                        <option>KLA F/S</option>
                                        <option>LIMA F/S</option>
                                        <option>MM F/S</option>
                                        <option>OPF</option>
                                        <option>ORF</option>
                                        <option>PAPA F/S</option>
                                        <option>UNIFORM F/S</option>
                                        <option>ZULU F/S</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row sm:flex">
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="platform"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Platform</label>
                                    <select class="select2-ajax" id="platform" name="platform">
                                        <option disabled>Search here..</option>
                                        <option>A P/F</option>
                                        <option>APNA P/F</option>
                                        <option>APNB P/F</option>
                                        <option>APND P/F</option>
                                        <option>APNE P/F</option>
                                        <option>APNF</option> P/F</option>
                                        <option>ARCO ARJUNA</option>
                                        <option>B P/F</option>
                                        <option>B1-COMP. P/F</option>
                                        <option>B2-COMP. P/F</option>
                                        <option>BA P/F</option>
                                        <option>BALONGAN</option>
                                        <option>BB P/F</option>
                                        <option>BC P/F</option>
                                        <option>BD P/F</option>
                                        <option>BE P/F</option>
                                        <option>BF P/F</option>
                                        <option>BG P/F</option>
                                        <option>BH P/F</option>
                                        <option>BK P/F</option>
                                        <option>BL P/F</option>
                                        <option>BLQ P/F</option>
                                        <option>BM P/F</option>
                                        <option>BNA P/F</option>
                                        <option>BPRO P/F</option>
                                        <option>B-PROC. P/F</option>
                                        <option>BQ P/F</option>
                                        <option>B-SERV. P/F</option>
                                        <option>BTSA P/F</option>
                                        <option>BZNA P/F</option>
                                        <option>BZZA P/F</option>
                                        <option>BZZB P/F</option>
                                        <option>C P/F</option>
                                        <option>CILAMAYA
                                        <option>EA P/F</option>
                                        <option>EB P/F</option>
                                        <option>EC P/F</option>
                                        <option>E-COMP. P/F</option>
                                        <option>ED P/F</option>
                                        <option>EE P/F</option>
                                        <option>EF P/F</option>
                                        <option>EH P/F</option>
                                        <option>EJ P/F</option>
                                        <option>EPRO. P/F</option>
                                        <option>E-PROC. P/F</option>
                                        <option>EQA P/F</option>
                                        <option>EQB P/F</option>
                                        <option>EQC P/F</option>
                                        <option>EQD P/F</option>
                                        <option>EQSA P/F</option>
                                        <option>EQSB P/F</option>
                                        <option>ESA P/F</option>
                                        <option>E-SERVICE P/F</option>
                                        <option>ESRA P/F</option>
                                        <option>ESTA P/F</option>
                                        <option>ETA P/F</option>
                                        <option>ETB P/F</option>
                                        <option>EWW P/F</option>
                                        <option>EWY P/F</option>
                                        <option>EZA P/F</option>
                                        <option>EZB P/F</option>
                                        <option>EZC P/F</option>
                                        <option>EZE P/F</option>
                                        <option>FA P/F</option>
                                        <option>FB P/F</option>
                                        <option>FC P/F</option>
                                        <option>F-COMP. P/F</option>
                                        <option>FD P/F</option>
                                        <option>FE P/F</option>
                                        <option>FFA P/F</option>
                                        <option>FFB P/F</option>
                                        <option>FG P/F</option>
                                        <option>FH P/F</option>
                                        <option>FK P/F</option>
                                        <option>FM P/F</option>
                                        <option>FNA P/F</option>
                                        <option>FNB P/F</option>
                                        <option>FN-PROC. P/F</option>
                                        <option>F-PROC. P/F</option>
                                        <option>FSA P/F</option>
                                        <option>F-SERVICE P/F</option>
                                        <option>FSWA P/F</option>
                                        <option>FU P/F</option>
                                        <option>FWA P/F</option>
                                        <option>FWB P/F</option>
                                        <option>FZA P/F</option>
                                        <option>GGA P/F</option>
                                        <option>HZEA P/F</option>
                                        <option>HZEB P/F</option>
                                        <option>J P/F</option>
                                        <option>JJA P/F</option>
                                        <option>KA P/F</option>
                                        <option>KB P/F</option>
                                        <option>KC P/F</option>
                                        <option>K-COMP. P/F</option>
                                        <option>KKA P/F</option>
                                        <option>KKNA P/F</option>
                                        <option>KKNB P/F</option>
                                        <option>KLA P/F</option>
                                        <option>KLB P/F</option>
                                        <option>KLC P/F</option>
                                        <option>KLD P/F</option>
                                        <option>KLXA P/F</option>
                                        <option>KLXB P/F</option>
                                        <option>KLYA P/F</option>
                                        <option>KLYB P/F</option>
                                        <option>KNA P/F</option>
                                        <option>K-PROC. P/F</option>
                                        <option>LA P/F</option>
                                        <option>LB P/F</option>
                                        <option>LC P/F</option>
                                        <option>L-COMP. P/F</option>
                                        <option>LD P/F</option>
                                        <option>LE P/F</option>
                                        <option>LES P/F</option>
                                        <option>LL-4A P/F</option>
                                        <option>LLA P/F</option>
                                        <option>LLB P/F</option>
                                        <option>LLD P/F</option>
                                        <option>LLE P/F</option>
                                        <option>LLF P/F</option>
                                        <option>LNA P/F</option>
                                        <option>LPRO P/F</option>
                                        <option>L-PROC P/F</option>
                                        <option>L-PROC. P/F</option>
                                        <option>LSER P/F</option>
                                        <option>L-SERV P/F</option>
                                        <option>L-SERV. P/F</option>
                                        <option>MB-1 P/F</option>
                                        <option>MB-2 ONSHORE</option>
                                        <option>MB-4 P/F</option>
                                        <option>MBA P/F</option>
                                        <option>MM-1 P/F</option>
                                        <option>MM-5 P/F</option>
                                        <option>MM-6 P/F</option>
                                        <option>MMC P/F</option>
                                        <option>MMF P/F</option>
                                        <option>MMJ P/F</option>
                                        <option>MMS P/F</option>
                                        <option>MQ-1 P/F</option>
                                        <option>MQ-11 P/F</option>
                                        <option>MQ-3 P/F</option>
                                        <option>MQ-5 P/F</option>
                                        <option>MQA P/F</option>
                                        <option>MQD P/F</option>
                                        <option>MRA P/F</option>
                                        <option>MXC P/F</option>
                                        <option>MXD P/F</option>
                                        <option>MXHT P/F</option>
                                        <option>ORFMK</option>
                                        <option>ORFTP</option>
                                        <option>PA P/F</option>
                                        <option>PB P/F</option>
                                        <option>PCP P/F</option>
                                        <option>PCP P/F</option>
                                        <option>PCP P/F</option>
                                        <option>PCS P/F</option>
                                        <option>PD P/F</option>
                                        <option>PE P/F</option>
                                        <option>PF P/F</option>
                                        <option>Q P/F</option>
                                        <option>SBA P/F</option>
                                        <option>SCA P/F</option>
                                        <option>SPA P/F</option>
                                        <option>SPM</option>
                                        <option>TLA P/F</option>
                                        <option>TLC P/F</option>
                                        <option>TLD P/F</option>
                                        <option>TLE P/F</option>
                                        <option>TLF</option> P/F</option>
                                        <option>UA P/F</option>
                                        <option>UB P/F</option>
                                        <option>UC P/F</option>
                                        <option>ULA P/F</option>
                                        <option>U-PROC. P/F</option>
                                        <option>URA P/F</option>
                                        <option>UVA P/F</option>
                                        <option>UW P/F</option>
                                        <option>UWA P/F</option>
                                        <option>UXA P/F</option>
                                        <option>UYA P/F</option>
                                        <option>YA P/F</option>
                                        <option>ZUA P/F</option>
                                        <option>ZUB P/F</option>
                                        <option>ZUC P/F</option>
                                        <option>ZUD P/F</option>
                                        <option>ZUE P/F</option>
                                        <option>ZUF P/F</option>
                                        <option>ZUG P/F</option>
                                        <option>ZUJ1 P/F</option>
                                        <option>ZUK P/F</option>
                                        <option>ZULQ P/F</option>
                                    </select>
                                </div>
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="tag_number"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tag Number</label>
                                    <input type="text" id="tag_number" name="tag_number"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="tag number ">
                                </div>
                            </div>
                        </div>

                        <!-- CERTIFICATION INFORMATION -->
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CERTIFICATION INFORMATION</label>
                            <div class="row sm:flex">
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="operational"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Operational</label>
                                        <input type="text" id="operational" name="operational"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="operational">
                                </div>
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="integrity"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Integrity Status</label>
                                    <input type="text" id="integrity" name="integrity"
                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required placeholder="integrity">
                                </div>
                            </div>
                            <div class="row sm:flex">
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="cert_date"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cert
                                        Date</label>
                                    <div class="relative max-w-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input 
                                            datepicker 
                                            id="cert_date" 
                                            datepicker-format="dd/mm/yyyy" 
                                            name="cert_date" 
                                            type="text"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Select date">
                                    </div>
                                </div>
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="exp_date"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Expired
                                        Date</label>
                                    <div class="relative max-w-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input 
                                            datepicker 
                                            id="exp_date" 
                                            datepicker-format="dd/mm/yyyy" 
                                            name="exp_date" 
                                            type="text"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Select date">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="valve_number"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valve Number</label>
                                <input type="text" id="valve_number" name="valve_number"
                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required placeholder="valve number ">
                            </div>
                        </div>

                        <!-- VALVE HISTORY -->
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">VALVE HISTORY</label>
                            <div class="row sm:flex">
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="status"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Update</label>
                                    <input type="text" id="status" name="status"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="status update">
                                </div>
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="deferal"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deferal</label>
                                    <input type="text" id="deferal" name="deferal"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="deferal">
                                    </div>
                                </div>
                                <div class="row sm:flex">
                                    <div class="sm:w-1/2 w-full sm:pr-2">
                                        <label for="resetting"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Resetting</label>
                                        <input type="text" id="resetting" name="resetting"
                                            class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required placeholder="resetting">
                                    </div>
                                    <div class="sm:w-1/2 w-full sm:pl-2 sm:pt-0 pt-6">
                                        <label for="resize"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Resize</label>
                                        <input type="text" id="resize" name="resize"
                                            class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required placeholder="resize">
                                </div>
                            </div>
                            <div class="row sm:flex">
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="demolish"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Demolish, Decomm, Inactive</label>
                                    <select class="select2-ajax" id="demolish" name="demolish">
                                        <option disabled>Search here..</option>
                                        <option>ACTIVE DECOM</option>
                                        <option>DECOMM</option>
                                        <option>DEMOLISH</option>
                                        <option>DEMOLISH (LINE N/A)</option>
                                        <option>DEMOLISH BY PROJECT</option>
                                        <option>DEMOLISH LINE</option>
                                        <option>DUPLICATE</option>
                                        <option>FAC N/A</option>
                                        <option>IN ACTIVE</option>
                                        <option>INACTIVE</option>
                                        <option>LINE DEMOLISH</option>
                                        <option>LINE INACTIVE</option>
                                        <option>LINE N/A</option>
                                        <option>LINE N/A, LINE DEMOLISH</option>
                                        <option>MOTHBOLT</option>
                                        <option>NUI INACTIVE</option>
                                        <option>TEMPORARY INACTIVE</option>
                                        <option>UNIT N/A</option>
                                        <option>VESSEL IN ACTIVE</option>
                                    </select>
                                </div>
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="relief"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Relief Header</label>
                                    <select class="select2-ajax" id="relief" name="relief">
                                        <option disabled>Search here..</option>
                                        <option>Closed Drain</option>
                                        <option>Sub Sea Vent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row sm:flex">
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="note"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
                                    <input type="text" id="note" name="note"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="note">
                                </div>
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="cert_package"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cert Package</label>
                                    <input type="text" id="cert_package" name="cert_package"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="cert package">
                                </div>
                            </div>
                            <div class="row sm:flex">
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="klarifikasi"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Klarifikasi</label>
                                    <input type="text" id="klarifikasi" name="klarifikasi"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="klarifikasi">
                                </div>
                                <div class="sm:w-1/2 w-full sm:pl-2 sm:pt-0 pt-6">
                                    <label for="by"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">By</label>
                                    <input type="text" id="by" name="by"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="by">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 py-4">
                    <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        onClick="saveRecord()">Save</button>
                    <button id="cancelBtn" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/datepicker.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
    <script type="text/javascript" src="{{ asset('core/js/customerasset_psv/general-custom.js') }}"></script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        
        $(document).ready(function() {
            $('#main-table').DataTable({
                language: {
                    processing: "Loading. Please wait..."
                },
                responsive: true,
                processing: true,
                serverSide: true,
                deferRender: true,
                ajax: {
                    url: "{{ route('general.main.table') }}",
                },
                columns: [{
                        data: 'area',
                        name: 'area',
                        className: ['text-center', 'min-tablet']
                    },
                    {
                        data: 'flow',
                        name: 'flow',
                        className: ['text-center', 'min-tablet']
                    },
                    {
                        data: 'platform',
                        name: 'platform',
                        className: ['text-center', 'min-tablet']
                    },
                    {
                        data: 'tag_number',
                        name: 'tag_number',
                        class: 'all'
                    },
                    // {
                    //     data: 'operational',
                    //     name: 'operational',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'integrity',
                    //     name: 'integrity',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'cert_date',
                    //     name: 'cert_date',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'exp_date',
                    //     name: 'exp_date',
                    //     class: 'all'
                    // },
                    {
                        data: 'valve_number',
                        name: 'valve_number',
                        class: 'all'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        class: 'all'
                    },
                    // {
                    //     data: 'deferal',
                    //     name: 'deferal',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'resetting',
                    //     name: 'resetting',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'resize',
                    //     name: 'resize',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'demolish',
                    //     name: 'demolish',
                    //     className: ['text-center', 'min-tablet']
                    // },
                    // {
                    //     data: 'relief',
                    //     name: 'relief',
                    //     className: ['text-center', 'min-tablet']
                    // },
                    // {
                    //     data: 'note',
                    //     name: 'note',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'cert_package',
                    //     name: 'cert_package',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'klarifikasi',
                    //     name: 'klarifikasi',
                    //     class: 'all'
                    // },
                    {
                        data: 'by',
                        name: 'by',
                        class: 'all'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                        class: ['text-center', 'min-tablet']
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        class: ['text-center', 'min-tablet'],
                        orderable: false,
                        sortable: false,
                    },
                ],
                columnDefs: [{
                        target: [0, 1, 2, 3, 4, 5, 6],
                        className: "dt-head-center",
                    },
                    {
                        target: [6],
                        width: "5%",
                    },
                    {
                        target: [0, 1, 3, 5, 6],
                        className: "dt-center",
                    },
                ]
            });

            $('#area').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                minimumResultsForSearch: -1
            });
            $('#platform').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                minimumResultsForSearch: -1
            });

            $('#flow').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                minimumResultsForSearch: -1
            });

            $('#demolish').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                minimumResultsForSearch: -1
            });

            $('#relief').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                minimumResultsForSearch: -1
            });

            $('#newBtn').on('click', function(e) {
                e.preventDefault();

                $('.modal-title').text('New General Information');
            });
        });
    </script>
@endsection
