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
                {{-- <button type="button" id="newBtn" onclick="openForm"
                    class="text-white bg-green-700 hidden sm:block hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    <i class="fa-solid fa-file-import"></i> Import
                </button>
                <button type="button" id="newBtn" onclick="openForm"
                    class="text-white bg-yellow-400 hidden sm:block hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                    <i class="fa-solid fa-file-export"></i> Export
                </button> --}}
                <button type="button" id="newBtn" onclick="openForm(`{{ route('psvdatamaster.store') }}`)"
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
        <div class="relative w-full max-w-4xl max-h-full">
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
                            <!-- Tab Panel -->
                        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                                data-tabs-toggle="#myTabContent" role="tablist">
                                <li class="mr-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="general-tab" data-tabs-target="#general" type="button" role="tab"
                                        aria-controls="general" aria-selected="false">GENERAL INFORMATION</button>
                                </li>
                                <li class="mr-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="valve-tab" data-tabs-target="#valve" type="button" role="tab"
                                        aria-controls="valve" aria-selected="false">VALVE INFORMATION</button>
                                </li>
                                <li class="mr-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="process-tab" data-tabs-target="#process" type="button" role="tab"
                                        aria-controls="process" aria-selected="false">PROCESS CONDITION</button>
                                </li>
                                <li class="mr-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="condi-tab" data-tabs-target="#condi" type="button" role="tab"
                                        aria-controls="condi" aria-selected="false">CONDITION REPLACEMENT</button>
                                </li>
                            </ul>
                        </div>

                        <div id="myTabContent">
                            <!-- GENERAL INFORMATION -->
                            <div class id="general" role="tab" aria-labelledby="general-tab">
                                <div class="space-y-6">
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
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 py-4">
                                       {{--  <button type="button"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            onClick="nextRecord()">Save</button> --}}
                                        {{-- <button id="nextBtn" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Next</button> --}}
                                        <button id="cancelBtn" type="button"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                                    </div>
                                </div>
                            </div>

                            <!-- VALVE INFORMATION -->
                            <div class id="valve" role="tab" aria-labelledby="valve-tab">
                                <div class="space-y-6">
                                    <div class="mb-6">
                                        <div class="row sm:flex">
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="manufacture"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Manufacture</label>
                                                <input type="text" id="manufacture" name="manufacture"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="manufacture">
                                            </div>
                                            <div class="sm:w-1/2 w-full sm:pl-2 sm:pt-0 pt-6">
                                                <label for="model_number"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model Number</label>
                                                <input type="text" id="model_number" name="model_number"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="model number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex">
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="serial_number"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial Number</label>
                                                    <input type="text" id="serial_number" name="serial_number"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="serial number">
                                            </div>
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="size_in"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size In</label>
                                                    {{-- <input type="text" id="size_in" name="size_in"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="size in"> --}}
                                                    <select class="select2-ajax" id="size_in" name="size_in">
                                                        <option disabled>Search here..</option>
                                                        <option>1/2</option>
                                                        <option>3/4</option>
                                                        <option>1</option>
                                                        <option>1-1/4</option>
                                                        <option>1-1/2</option>
                                                        <option>2</option>
                                                        <option>2-1/2</option>
                                                        <option>3</option>
                                                        <option>3-1/2</option>
                                                        <option>4</option>
                                                        <option>6</option>
                                                        <option>8</option>
                                                        <option>10</option>
                                                        <option>12</option>
                                                        <option>16</option>
                                                        <option>24</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex">
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="rating_in"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating In</label>
                                                    {{-- <input type="text" id="rating_in" name="rating_in"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="rating in"> --}}
                                                    <select class="select2-ajax" id="rating_in" name="rating_in">
                                                        <option disabled>Search here..</option>
                                                        <option>150</option>
                                                        <option>300</option>
                                                        <option>600</option>
                                                        <option>900</option>
                                                        <option>1500</option>
                                                        <option>2500</option>
                                                    </select>
                                            </div>
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="size_out"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size Out</label>
                                                    {{-- <input type="text" id="size_out" name="size_out"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="size out"> --}}
                                                    <select class="select2-ajax" id="size_out" name="size_out">
                                                        <option disabled>Search here..</option>
                                                        <option>1/2</option>
                                                        <option>3/4</option>
                                                        <option>1</option>
                                                        <option>1-1/4</option>
                                                        <option>1-1/2</option>
                                                        <option>2</option>
                                                        <option>2-1/2</option>
                                                        <option>3</option>
                                                        <option>3-1/2</option>
                                                        <option>4</option>
                                                        <option>6</option>
                                                        <option>8</option>
                                                        <option>10</option>
                                                        <option>12</option>
                                                        <option>16</option>
                                                        <option>24</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <div class="row sm:flex">
                                                <div class="sm:w-1/2 w-full sm:pr-2">
                                                    <label for="rating_out"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating Out</label>
                                                        {{-- <input type="text" id="rating_out" name="rating_out"
                                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required placeholder="rating out"> --}}
                                                        <select class="select2-ajax" id="rating_out" name="rating_out">
                                                        <option disabled>Search here..</option>
                                                        <option>150</option>
                                                        <option>300</option>
                                                        <option>600</option>
                                                        <option>900</option>
                                                        <option>1500</option>
                                                        <option>2500</option>
                                                    </select>
                                                </div>
                                                <div class="sm:w-1/2 w-full sm:pr-2">
                                                    <label for="press"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Press. Setting (psi)</label>
                                                    <input type="text" id="press" name="press"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="press">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <div class="row sm:flex">
                                                <div class="sm:w-1/2 w-full sm:pr-2">
                                                    <label for="vacuum"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vacuum Setting (psi)</label>
                                                        <input type="text" id="vacuum" name="vacuum"
                                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required placeholder="vacuum">
                                                </div>
                                                <div class="sm:w-1/2 w-full sm:pr-2">
                                                    <label for="psv"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PSV Style</label>
                                                    <input type="text" id="psv" name="psv"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="psv">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <div class="row sm:flex">
                                                <div class="sm:w-1/2 w-full sm:pr-2">
                                                    <label for="design"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Orifice Design</label>
                                                        <input type="text" id="design" name="design"
                                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required placeholder="design">
                                                </div>
                                                <div class="sm:w-1/2 w-full sm:pr-2">
                                                    <label for="selection"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Orifice Selection</label>
                                                    <input type="text" id="selection" name="selection"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="selection">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <div class="row sm:flex">
                                                <div class="sm:w-1/2 w-full sm:pr-2">
                                                    <label for="psv_capacity"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PSV Capacity</label>
                                                        <input type="text" id="psv_capacity" name="psv_capacity"
                                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required placeholder="psv capacity">
                                                </div>
                                                <div class="sm:w-1/2 w-full sm:pr-2">
                                                    <label for="psv_capacityunit"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PSV Capacity Unit</label>
                                                    <input type="text" id="psv_capacityunit" name="psv_capacityunit"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="psv capacityunit">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <div class="row sm:flex">
                                                <div class="sm:w-1/2 w-full sm:pr-2">
                                                    <label for="bonnet"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bonnet Type</label>
                                                        <input type="text" id="bonnet" name="bonnet"
                                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required placeholder="bonnet">
                                                </div>
                                                <div class="sm:w-1/2 w-full sm:pr-2">
                                                    <label for="seat"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seat Type</label>
                                                    <input type="text" id="seat" name="seat"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="seat">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <div class="row sm:flex">
                                                <div class="sm:w-1/2 w-full sm:pr-2">
                                                    <label for="CAP"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CAP Type</label>
                                                        <input type="text" id="CAP" name="CAP"
                                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required placeholder="CAP">
                                                </div>
                                                <div class="sm:w-1/2 w-full sm:pr-2">
                                                    <label for="body_bonnet"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body Bonnet Material</label>
                                                    <input type="text" id="body_bonnet" name="body_bonnet"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="body bonnet">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <div class="row sm:flex">
                                                <div class="sm:w-1/2 w-full sm:pr-2">
                                                    <label for="disc_material"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Disc Material</label>
                                                        <input type="text" id="disc_material" name="disc_material"
                                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required placeholder="disc material">
                                                </div>
                                                <div class="sm:w-1/2 w-full sm:pr-2">
                                                    <label for="spring_material"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Spring Material</label>
                                                    <input type="text" id="spring_material" name="spring_material"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="spring material">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <div class="row sm:flex">
                                                <div class="sm:w-1/2 w-full sm:pr-2">
                                                    <label for="guide_material"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Guide Material</label>
                                                        <input type="text" id="guide_material" name="guide_material"
                                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required placeholder="guide material">
                                                </div>
                                                <div class="sm:w-1/2 w-full sm:pr-2">
                                                    <label for="resilient_seat"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Resilient Seat</label>
                                                    <input type="text" id="resilient_seat" name="resilient_seat"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="resilient seat">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <label for="bellow_material"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bellow Material</label>
                                            <input type="text" id="bellow_material" name="bellow_material"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required placeholder="bellow material">
                                        </div>
                                        <div class="row sm:flex">
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="year_build"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year Build</label>
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
                                                        id="year_build" 
                                                        datepicker-format="dd/mm/yyyy" 
                                                        name="year_build" 
                                                        type="text"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Select date">
                                                </div>
                                            </div>
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="year_install"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year Install</label>
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
                                                        id="year_install" 
                                                        datepicker-format="dd/mm/yyyy" 
                                                        name="year_install" 
                                                        type="text"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Select date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 py-4">
                                        {{-- <button type="button"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            onClick="saveRecord()">Save</button> --}}
                                        <button id="cancelBtn" type="button"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- PROCESS CONDITION -->
                            <div class id="process" role="tab" aria-labelledby="process-tab">
                                <div class="space-y-6">
                                    <div class="mb-6">
                                        <div class="row sm:flex">
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="service"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service</label>
                                                <input type="text" id="service" name="service"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="service">
                                            </div>
                                            <div class="sm:w-1/2 w-full sm:pl-2 sm:pt-0 pt-6">
                                                <label for="equip_number"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Equipment Number</label>
                                                <input type="text" id="equip_number" name="equip_number"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="equipment number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex">
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="pid"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">P&ID</label>
                                                    <input type="text" id="pid" name="pid"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="P&ID">
                                            </div>
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="size_basic"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size Basic</label>
                                                <input type="text" id="size_basic" name="size_basic"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="size basic">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex">
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="size_code"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size Code</label>
                                                    <input type="text" id="size_code" name="size_code"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="size code">
                                            </div>
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="fluid"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fluid</label>
                                                    <input type="text" id="fluid" name="fluid"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex">
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="required"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Required Capacity</label>
                                                <input type="text" id="required" name="required"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required placeholder="required">
                                            </div>
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="capacity_unit"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Capacity Unit</label>
                                                    <input type="text" id="capacity_unit" name="capacity_unit"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="capacity unit">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex">
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="mawp"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MAWP (psi)</label>
                                                <input type="text" id="mawp" name="mawp"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required placeholder="mawp">
                                            </div>
                                                <div class="sm:w-1/2 w-full sm:pr-2">
                                                    <label for="operating_psi"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Operating Pressure (psi)</label>
                                                        <input type="text" id="operating_psi" name="operating_psi"
                                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required placeholder="operating psi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex">
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="back_psi"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Back Pressure (psi)</label>
                                                <input type="text" id="back_psi" name="back_psi"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required placeholder="back psi">
                                            </div>
                                                <div class="sm:w-1/2 w-full sm:pr-2">
                                                    <label for="operating_temp"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Operating Temp. (°F)</label>
                                                        <input type="text" id="operating_temp" name="operating_temp"
                                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required placeholder="operating temp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex">
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="cold_diff"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cold Diff. Test Press (psi)</label>
                                                <input type="text" id="cold_diff" name="cold_diff"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required placeholder="psv capacityunit">
                                            </div>
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="allowable"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Allowable Over Press. (%)</label>
                                                <input type="text" id="allowable" name="allowable"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required placeholder="allowable">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 py-4">
                                        {{-- <button type="button"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            onClick="saveRecord()">Save</button> --}}
                                        <button id="cancelBtn" type="button"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                                    </div>
                                </div>
                            </div>

                            <!-- CONDITION REPLACEMENT -->
                            <div class id="condi" role="tab" aria-labelledby="condi-tab">
                                <div class="space-y-6">
                                    <div class="mb-6">
                                        <div class="row sm:flex">
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="shutdown"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Shutdown Category</label>
                                                <input type="text" id="shutdown" name="shutdown"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="shutdown">
                                            </div>
                                            <div class="sm:w-1/2 w-full sm:pl-2 sm:pt-0 pt-6">
                                                <label for="valve_upstream"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isolation Valve Upstream</label>
                                                <input type="text" id="valve_upstream" name="valve_upstream"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="valve upstream">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex">
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="condi_upstream"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Condition Upstream BV</label>
                                                    <input type="text" id="condi_upstream" name="condi_upstream"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="condi upstream">
                                            </div>
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="valve_downstream"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isolation Valve Downstrm</label>
                                                <input type="text" id="valve_downstream" name="valve_downstream"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="valve downstream">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex">
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="condi_downstream"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Condition Downstrm BV</label>
                                                    <input type="text" id="condi_downstream" name="condi_downstream"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="condi downstream">
                                            </div>
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="scaffolding"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Scaffolding Req.</label>
                                                    <input type="text" id="scaffolding" name="scaffolding"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="scaffolding">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex">
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="spacer_inlet"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Use Spacer Inlet</label>
                                                <input type="text" id="spacer_inlet" name="spacer_inlet"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required placeholder="spacer inlet">
                                            </div>
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="spacer_outlet"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Use Spacer Outlet</label>
                                                <input type="text" id="spacer_outlet" name="spacer_outlet"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="spacer outlet">
                                            </div>
                                        </div>
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
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/datepicker.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
    <script type="text/javascript" src="{{ asset('core/js/customerasset_psv/psvdatamaster-custom.js') }}"></script>
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
                    url: "{{ route('psvdatamaster.main.table') }}",
                },
                columns: [
                    //GENERAL INFORMATION
                    {
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

                    //VALVE INFORMATION
                    // {
                    //     data: 'manufacture',
                    //     name: 'manufacture',
                    //     className: 'all'
                    // },
                    // {
                    //     data: 'model_number',
                    //     name: 'model_number',
                    //     className: 'all'
                    // },
                    // {
                    //     data: 'serial_number',
                    //     name: 'serial_number',
                    //     className: 'all'
                    // },
                    // {
                    //     data: 'size_in',
                    //     name: 'size_in',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'rating_in',
                    //     name: 'rating_in',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'size_out',
                    //     name: 'size_out',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'rating_out',
                    //     name: 'rating_out',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'press',
                    //     name: 'press',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'vacuum',
                    //     name: 'vacuum',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'psv',
                    //     name: 'psv',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'design',
                    //     name: 'design',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'selection',
                    //     name: 'selection',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'psv_capacity',
                    //     name: 'psv_capacity',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'psv_capacityunit',
                    //     name: 'psv_capacityunit',
                    //     className: ['text-center', 'min-tablet']
                    // },
                    // {
                    //     data: 'bonnet',
                    //     name: 'bonnet',
                    //     className: ['text-center', 'min-tablet']
                    // },
                    // {
                    //     data: 'seat',
                    //     name: 'seat',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'CAP',
                    //     name: 'CAP',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'body_bonnet',
                    //     name: 'body_bonnet',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'disc_material',
                    //     name: 'disc_material',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'spring_material',
                    //     name: 'spring_material',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'guide_material',
                    //     name: 'guide_material',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'resilient_seat',
                    //     name: 'resilient_seat',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'bellow_material',
                    //     name: 'bellow_material',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'year_build',
                    //     name: 'year_build',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'year_install',
                    //     name: 'year_install',
                    //     class: 'all'
                    // },

                    //PROCESS CONDITION
                    // {
                    //     data: 'service',
                    //     name: 'service',
                    //     className: 'all'
                    // },
                    // {
                    //     data: 'equip_number',
                    //     name: 'equip_number',
                    //     className: 'all'
                    // },
                    // {
                    //     data: 'pid',
                    //     name: 'pid',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'size_basic',
                    //     name: 'size_basic',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'size_code',
                    //     name: 'size_code',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'fluid',
                    //     name: 'fluid',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'required',
                    //     name: 'required',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'capacity_unit',
                    //     name: 'capacity_unit',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'mawp',
                    //     name: 'mawp',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'operating_psi',
                    //     name: 'operating_psi',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'back_psi',
                    //     name: 'back_psi',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'operating_temp',
                    //     name: 'operating_temp',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'cold_diff',
                    //     name: 'cold_diff',
                    //     className: 'all'
                    // },
                    // {
                    //     data: 'allowable',
                    //     name: 'allowable',
                    //     className: 'all'
                    // },

                    //CONDITION REPLACEMET
                    // {
                    //     data: 'shutdown',
                    //     name: 'shutdown',
                    //     className: 'all'
                    // },
                    // {
                    //     data: 'valve_upstream',
                    //     name: 'valve_upstream',
                    //     className: 'all'
                    // },
                    // {
                    //     data: 'condi_upstream',
                    //     name: 'condi_upstream',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'valve_downstream',
                    //     name: 'valve_downstream',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'condi_downstream',
                    //     name: 'condi_downstream',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'scaffolding',
                    //     name: 'scaffolding',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'spacer_inlet',
                    //     name: 'spacer_inlet',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'spacer_outlet',
                    //     name: 'spacer_outlet',
                    //     class: 'all'
                    // },

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
                
            });
            $('#platform').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                
            });

            $('#flow').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                
            });

            $('#demolish').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                
            });

            $('#relief').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                
            });

            $('#size_in').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                
            });

            $('#rating_in').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                
            });

            $('#size_out').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                
            });

            $('#rating_out').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                
            });

            $('#newBtn').on('click', function(e) {
                e.preventDefault();

                $('.modal-title').text('New PSV Data Master');
            });
        });
    </script>
@endsection
