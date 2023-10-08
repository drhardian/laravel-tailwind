@extends('layout.index')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css">
    <style>
        .in_uom .select2-container .select2-selection--single {
            display: block;
            height: 41.5px !important;
            --opacity: 1;
            background-color: rgb(249 250 251 / var(--opacity));
            border-color: rgb(209 213 219 / var(--opacity));
            border-start-end-radius: 0px !important;
            padding-top: 0.2rem;
        }
    </style>
@endsection

@section('content')
    <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl">
        <div class="p-4 mt-2">
            <h3 class="mb-2 hidden md:block text-2xl font-medium text-gray-900 dark:text-white">{{ $title }}</h3>
            <!-- header page -->
            <div class="flex justify-between mb-7">
                @unless (count($breadcrumbs) === 0)
                    @include('layout.breadcrumbs')
                @endunless

                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">Action <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <span
                                class="block px-4 py-2 hover:bg-gray-100 cursor-pointer"
                                onclick="openForm('{{ route('cina.products.store') }}')">New Product</span>
                        </li>
                        <li>
                            <span class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                onclick="openUploadForm()">Import</span>
                        </li>
                        <li>
                            <span class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Export</span>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- table -->
            <div>
                <table id="main-table" class="table table-striped table-bordered table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Asset id (old)</th> <!-- show -->
                            <th>Asset id (new)</th> <!-- show --> 
                            <!-- <th>Stock</th> show --> 
                            <th>Equipment</th> <!-- show --> 
                            <th>Type</th> <!-- show --> 
                            <th>Size (inch)</th> <!-- show --> 
                            <th>Rating</th> <!-- show --> 
                            <th>Brand</th> <!-- show --> 
                            <th>Model</th> <!-- show --> 
                            <th>Condition</th> <!-- show --> 
                            <th>Material Transfer</th> <!-- show --> 
                            <th>Station</th> <!-- show --> 
                            <th>Ex.Station</th>
                            <th>Project</th>
                            <th>Date In</th>
                            <th>Date Out</th>
                            <th>Current Location</th> <!-- show -->
                            <th>Target PDN</th> <!-- show -->
                            <th>#CE</th>
                            <th>#RO</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Price Repair</th>
                            <th>Origin</th>
                            <th>Asset Type</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- New Item modal -->
    <div id="newModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" role="dialog" aria-modal="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- URL Area -->
                <input type="hidden" id="form_url" readonly>
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 bg-gray-100 border-b rounded-t dark:border-gray-600">
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
                <div class="px-4 space-y-6">
                    <!-- Alert Area -->
                    <div id="alert-frame">
                        <div id="warning-alert-activity"
                            class="hidden items-center p-4 my-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium warning-alert-activity-title"></span>
                                <ul class="mt-1.5 ml-4 list-disc list-inside warning-alert-activity-message"></ul>
                            </div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                                onclick="$('#warning-alert-activity').removeClass('flex').addClass('hidden')"
                                aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <!-- Form Area -->
                    <form id="mainForm" method="post">
                        @csrf

                        <div>
                            <!-- item origin, material transfer, reservation number -->
                            <div class="row sm:flex">
                                <div class="sm:w-1/3 w-full m-1 my-3">
                                    <label for="cina_product_origin_id"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item
                                        Origin</label>
                                    <select name="cina_product_origin_id" id="cina_product_origin_id"
                                        class="select2-custom-ajax" 
                                        data-show="{{ route('cinaproductorigin.showondropdown') }}" 
                                        {{-- data-store="{{ route('cinaproductorigin.storefromdropdown') }}" --}}
                                        data-form="cina_product_origin_id"></select>
                                </div>
                                <div class="sm:w-1/3 w-full m-1 my-3">
                                    <label for="material_transfer"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Material
                                        Transfer</label>
                                    <input type="text" id="material_transfer" name="material_transfer"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div class="sm:w-1/3 w-full m-1 my-3">
                                    <label for="reservation_number"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reservation
                                        Number</label>
                                    <input type="text" id="reservation_number" name="reservation_number"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                            </div>

                            <!-- ex station, old id, new id -->
                            <div class="row sm:flex">
                                <div class="sm:w-1/3 w-full m-1 my-3">
                                    <label for="ex_station"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ex.
                                        Station</label>
                                    <input type="text" id="ex_station" name="ex_station"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div class="sm:w-1/3 w-full m-1 my-3">
                                    <label for="old_id"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Old Id</label>
                                    <input type="text" id="old_id" name="old_id"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div class="sm:w-1/3 w-full m-1 my-3">
                                    <label for="new_id"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Id</label>
                                    <input type="text" id="new_id" name="new_id"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                            </div>

                            <!-- sdv in, sdv out, station -->
                            <div class="row sm:flex">
                                <div class="sm:w-1/3 w-full m-1 my-3">
                                    <label for="sdv_in"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SDV In</label>
                                    <input type="text" id="sdv_in" name="sdv_in"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div class="sm:w-1/3 w-full m-1 my-3">
                                    <label for="sdv_out"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SDV
                                        Out</label>
                                    <input type="text" id="sdv_out" name="sdv_out"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div class="sm:w-1/3 w-full m-1 my-3">
                                    <label for="station"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Station</label>
                                    <input type="text" id="station" name="station"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                            </div>
                            
                            <!-- requestor, project, dt out -->
                            <div class="row sm:flex">
                                <div class="sm:w-1/3 w-full m-1 my-3">
                                    <label for="requestor"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Requestor</label>
                                    <input type="text" id="requestor" name="requestor"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div class="sm:w-1/3 w-full m-1 my-3">
                                    <label for="project"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project</label>
                                    <input type="text" id="project" name="project"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div class="sm:w-1/3 w-full m-1 my-3">
                                    <label for="dt_out"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DT Out</label>
                                    <input type="text" id="dt_out" name="dt_out"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                            </div>

                            <!-- date to offshore, material transfer to offshore, current location -->
                            <div class="row sm:flex">
                                <div class="sm:w-1/3 w-full m-1 my-3">
                                    <label for="date_to_offshore"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date to
                                        offshore</label>
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
                                        <input datepicker datepicker-autohide datepicker-format="dd/mm/yyyy"
                                            value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}" type="text"
                                            id="date_to_offshore" name="date_to_offshore"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Select date" autocomplete="off">
                                    </div>
                                </div>
                                <div class="sm:w-1/3 w-full m-1 my-3">
                                    <label for="material_transfer_to_offshore"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Material
                                        Transfer to offshore</label>
                                    <input type="text" id="material_transfer_to_offshore"
                                        name="material_transfer_to_offshore"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div class="sm:w-1/3 w-full m-1 my-3">
                                    <label for="cina_product_location_id"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current
                                        Location</label>
                                    <select name="cina_product_location_id" id="cina_product_location_id"
                                        class="select2">
                                        <option value="MARUNDA">MARUNDA</option>
                                        <option value="PROJECT">PROJECT</option>
                                        <option value="PTCS">PTCS</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="my-4 border-b border-gray-200 dark:border-gray-700">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                                data-tabs-toggle="#myTabContent" role="tablist">
                                <li class="mr-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="othersinfo-tab"
                                        data-tabs-target="#othersinfo" type="button" role="tab"
                                        aria-controls="othersinfo" aria-selected="false">OTHERS INFORMATION</button>
                                </li>
                                <li class="mr-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="stockinfo-tab" data-tabs-target="#stockinfo" type="button" role="tab"
                                        aria-controls="stockinfo" aria-selected="false">STOCK INFORMATION</button>
                                </li>
                                <li class="mr-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="additionalinfo-tab" data-tabs-target="#additionalinfo" type="button" role="tab"
                                        aria-controls="additionalinfo" aria-selected="false">ADDITIONAL INFORMATION</button>
                                </li>
                                <li class="mr-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="uploadfiles-tab" data-tabs-target="#uploadfiles" type="button" role="tab"
                                        aria-controls="uploadfiles" aria-selected="false">UPLOAD FILES</button>
                                </li>
                            </ul>
                        </div>
                        <div id="myTabContent">
                            <div class="hidden p-2 rounded-lg" id="othersinfo" role="tabpanel" aria-labelledby="othersinfo-tab">
                                <div class="space-y-4">
                                    <!-- target pdn, CS relase,number, CE number -->
                                    <div class="row sm:flex space-x-3">
                                        <div class="w-full">
                                            <label for="target_pdn"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Target
                                                PDN</label>
                                            <div class="relative max-w-sm">
                                                <div
                                                    class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                    </svg>
                                                </div>
                                                <input datepicker datepicker-autohide datepicker-format="dd/mm/yyyy"
                                                    value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}" type="text"
                                                    id="target_pdn" name="target_pdn"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Select date" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="w-full">
                                            <label for="cs_release"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CS
                                                Release</label>
                                            <input type="text" id="cs_release" name="cs_release"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </div>
                                        <div class="w-full">
                                            <label for="cs_number"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CS
                                                Number</label>
                                            <input type="text" id="cs_number" name="cs_number"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </div>
                                        <div class="w-full">
                                            <label for="ce_number"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CE
                                                Number</label>
                                            <input type="text" id="ce_number" name="ce_number"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </div>
                                    </div>
                                    <!-- RO number, start-end date, repair price -->
                                    <div class="row sm:flex space-x-3">
                                        <div class="w-full">
                                            <label for="ro_number"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RO
                                                Number</label>
                                            <input type="number" id="ro_number" name="ro_number"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </div>
                                        <div class="w-full">
                                            <label for="start_date"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start
                                                Date</label>
                                            <div class="relative max-w-sm">
                                                <div
                                                    class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                    </svg>
                                                </div>
                                                <input datepicker datepicker-autohide datepicker-format="dd/mm/yyyy"
                                                    value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}" type="text"
                                                    id="start_date" name="start_date"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Select date" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="w-full">
                                            <label for="end_date"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End
                                                Date</label>
                                            <div class="relative max-w-sm">
                                                <div
                                                    class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                    </svg>
                                                </div>
                                                <input datepicker datepicker-autohide datepicker-format="dd/mm/yyyy"
                                                    value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}" type="text"
                                                    id="end_date" name="end_date"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Select date" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="w-full">
                                            <label for="repair_price"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repair
                                                Price</label>
                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                                    <i class="fa-solid fa-rupiah-sign"></i>
                                                </div>
                                                <input type="number" id="repair_price" name="repair_price"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden p-2 rounded-lg" id="stockinfo" role="tabpanel" aria-labelledby="stockinfo-tab">
                                <div class="space-y-4">
                                    <!-- current stock & location -->
                                    <div class="row sm:flex space-x-4">
                                        <div class="sm:w-1/2 w-full">
                                            <label for="current_qty"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current
                                                Stock Quantity</label>
                                            <input type="number" id="current_qty" name="current_qty" readonly
                                                class="bg-gray-50 sm:p-2 p-1.5 text-center rounded-lg border border-gray-300 text-gray-900 sm:text-base text-sm focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </div>
                                        <div class="sm:w-1/2 w-full">
                                            <label for="current_uom"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UOM</label>
                                            <input type="number" id="current_uom" name="current_uom" readonly
                                                class="bg-gray-50 sm:p-2 p-1.5 text-center rounded-lg border border-gray-300 text-gray-900 sm:text-base text-sm focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </div>
                                    </div>
                                    <div class="row sm:flex space-x-4">
                                        <div class="sm:w-1/2 w-full">
                                            <!-- stock in -->
                                            <div class="row sm:flex">
                                                <div class="w-full">
                                                    <label for="in_date"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date
                                                        In</label>
                                                    <div class="relative max-w-sm">
                                                        <div
                                                            class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="currentColor" viewBox="0 0 20 20">
                                                                <path
                                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                            </svg>
                                                        </div>
                                                        <input datepicker datepicker-autohide
                                                            datepicker-format="dd/mm/yyyy"
                                                            value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}"
                                                            type="text" id="in_date" name="in_date"
                                                            class="bg-gray-50 border-y border-l border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="Select date" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="sm:w-1/2 w-full mr-2">
                                                    <label for="in_qty"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qty</label>
                                                    <input type="number" id="in_qty" name="in_qty"
                                                        class="bg-gray-50 rounded-r-lg sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                </div>
                                                <div class="w-full">
                                                    <label for="in_uom"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UOM</label>
                                                    <select id="in_uom" name="in_uom"
                                                        class="bg-gray-50 select2-custom-ajax border-y border-r border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        data-show="{{ route('cinaproductuom.showondropdown') }}" 
                                                        data-store="{{ route('cinaproductuom.storefromdropdown') }}"
                                                        data-form="in_uom">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sm:w-1/2 w-full">
                                            <!-- stock out -->
                                            <div class="row sm:flex">
                                                <div class="w-full">
                                                    <label for="out_date"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date
                                                        Out</label>
                                                    <div class="relative max-w-sm">
                                                        <div
                                                            class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="currentColor" viewBox="0 0 20 20">
                                                                <path
                                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                            </svg>
                                                        </div>
                                                        <input datepicker datepicker-autohide
                                                            datepicker-format="dd/mm/yyyy"
                                                            value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}"
                                                            type="text" id="out_date" name="out_date"
                                                            class="bg-gray-50 border-y border-l border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="Select date" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="sm:w-1/2 w-full mr-2">
                                                    <label for="out_qty"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qty</label>
                                                    <input type="number" id="out_qty" name="out_qty"
                                                        class="bg-gray-50 rounded-r-lg sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                </div>
                                                <div class="w-full">
                                                    <label for="out_uom"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UOM</label>
                                                    <select id="out_uom" name="out_uom"
                                                        class="bg-gray-50 select2-custom-ajax border-y border-r border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        data-show="{{ route('cinaproductuom.showondropdown') }}" 
                                                        data-store="{{ route('cinaproductuom.storefromdropdown') }}"
                                                        data-form="out_uom">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="hidden p-2 rounded-lg" id="additionalinfo" role="tabpanel" aria-labelledby="additionalinfo-tab">
                                <div class="w-full" id="default_additional_form">
                                    <span class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-1.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">
                                        Please select item origin first
                                    </span>
                                </div>
                                <!-- Spare Unit Form Container -->
                                <div class="space-y-4 hidden" id="spare_unit_form">
                                    <div class="w-full">
                                        <label for="cina_asset_type_id"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asset
                                            Type</label>
                                        <select name="cina_asset_type_id" id="cina_asset_type_id"
                                            class="select2-custom-ajax" 
                                            data-show="{{ route('cinaassettype.showondropdown') }}" 
                                            data-store="{{ route('cinaassettype.storefromdropdown') }}"
                                            data-form="cina_asset_type_id"></select>
                                    </div>
                                    <!-- Asset Valve Form -->
                                    <div class="space-y-4 hidden" id="asset_valve_form">
                                        <!-- equipment,valve type,valve size -->
                                        <div class="row sm:flex space-x-2">
                                            <div class="sm:w-1/3 w-full">
                                                <label for="equipment"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Equipment</label>
                                                <select name="equipment" id="equipment"
                                                    class="select2-general-dropdown" 
                                                    data-show="{{ route('general.options.showondropdown') }}" 
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="cina-equipment"
                                                    data-change="true"
                                                    data-form="equipment"></select>
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="valve_type"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                                                <select name="valve_type" id="valve_type"
                                                    class="select2-general-dropdown" 
                                                    data-show="{{ route('general.options.showondropdown') }}" 
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="cina-valvetype"
                                                    data-change="true"
                                                    data-form="valve_type"></select>
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="valve_size"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size (inch)</label>
                                                <select name="valve_size" id="valve_size"
                                                    class="select2-general-dropdown" 
                                                    data-show="{{ route('general.options.showondropdown') }}" 
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="cina-valvesize"
                                                    data-change="true"
                                                    data-form="valve_size"></select>
                                            </div>
                                        </div>
                                        <!-- valve rating,end connection,serial number -->
                                        <div class="row sm:flex space-x-2">
                                            <div class="sm:w-1/3 w-full">
                                                <label for="valve_rating"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valve Rating</label>
                                                <select name="valve_rating" id="valve_rating"
                                                    class="select2-general-dropdown" 
                                                    data-show="{{ route('general.options.showondropdown') }}" 
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="cina-valverating"
                                                    data-change="true"
                                                    data-form="valve_rating"></select>
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="end_connection"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End Connection</label>
                                                <select name="end_connection" id="end_connection"
                                                    class="select2-general-dropdown" 
                                                    data-show="{{ route('general.options.showondropdown') }}" 
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="cina-endconnection"
                                                    data-change="true"
                                                    data-form="end_connection"></select>
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="serial_number"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial Number</label>
                                                <select name="serial_number" id="serial_number"
                                                    class="select2-general-dropdown" 
                                                    data-show="{{ route('general.options.showondropdown') }}" 
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="cina-serialnumber"
                                                    data-change="true"
                                                    data-form="serial_number"></select>
                                            </div>
                                        </div>
                                        <!-- valve model,valve brand,valve condition -->
                                        <div class="row sm:flex space-x-2">
                                            <div class="sm:w-1/3 w-full">
                                                <label for="valve_model"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
                                                <select name="valve_model" id="valve_model"
                                                    class="select2-general-dropdown" 
                                                    data-show="{{ route('general.options.showondropdown') }}" 
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="cina-valvemodel"
                                                    data-change="true"
                                                    data-form="valve_model"></select>
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="brand"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                                                <select name="brand" id="brand"
                                                    class="select2-general-dropdown" 
                                                    data-show="{{ route('general.options.showondropdown') }}" 
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="cina-brand"
                                                    data-change="true"
                                                    data-form="brand"></select>
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="valve_condition"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Condition</label>
                                                <select name="valve_condition" id="valve_condition"
                                                    class="select2-general-dropdown" 
                                                    data-show="{{ route('general.options.showondropdown') }}" 
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="cina-valvecondition"
                                                    data-change="true"
                                                    data-form="valve_condition"></select>
                                            </div>
                                        </div>
                                        <!-- actuator brand,actuator type,actuator size -->
                                        <div class="row sm:flex space-x-2">
                                            <div class="sm:w-1/3 w-full">
                                                <label for="actuator_brand"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Actuator Brand</label>
                                                <select name="actuator_brand" id="actuator_brand"
                                                    class="select2-general-dropdown" 
                                                    data-show="{{ route('general.options.showondropdown') }}" 
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="cina-actuatorbrand"
                                                    data-change="true"
                                                    data-form="actuator_brand"></select>
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="actuator_type"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Actuator Type</label>
                                                <select name="actuator_type" id="actuator_type"
                                                    class="select2-general-dropdown" 
                                                    data-show="{{ route('general.options.showondropdown') }}" 
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="cina-actuatortype"
                                                    data-change="true"
                                                    data-form="actuator_type"></select>
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="actuator_size"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Actuator Size</label>
                                                <select name="actuator_size" id="actuator_size"
                                                    class="select2-general-dropdown" 
                                                    data-show="{{ route('general.options.showondropdown') }}" 
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="cina-actuatorsize"
                                                    data-change="true"
                                                    data-form="actuator_size"></select>
                                            </div>
                                        </div>
                                        <!-- fail position,actuator condition,positioner brand -->
                                        <div class="row sm:flex space-x-2">
                                            <div class="sm:w-1/3 w-full">
                                                <label for="fail_position"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fail Position</label>
                                                <select name="fail_position" id="fail_position"
                                                    class="select2-general-dropdown" 
                                                    data-show="{{ route('general.options.showondropdown') }}" 
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="cina-failposition"
                                                    data-change="true"
                                                    data-form="fail_position"></select>
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="actuator_condition"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Actuator Condition</label>
                                                <select name="actuator_condition" id="actuator_condition"
                                                    class="select2-general-dropdown" 
                                                    data-show="{{ route('general.options.showondropdown') }}" 
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="cina-actuatorcondition"
                                                    data-change="true"
                                                    data-form="actuator_condition"></select>
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="positioner_brand"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Positioner Brand</label>
                                                <select name="positioner_brand" id="positioner_brand"
                                                    class="select2-general-dropdown" 
                                                    data-show="{{ route('general.options.showondropdown') }}" 
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="cina-positionerbrand"
                                                    data-change="true"
                                                    data-form="positioner_brand"></select>
                                            </div>
                                        </div>
                                        <!-- positioner model,input signal,positioner condition -->
                                        <div class="row sm:flex space-x-2">
                                            <div class="sm:w-1/3 w-full">
                                                <label for="positioner_model"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Positioner Model</label>
                                                <select name="positioner_model" id="positioner_model"
                                                    class="select2-general-dropdown" 
                                                    data-show="{{ route('general.options.showondropdown') }}" 
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="cina-positionermodel"
                                                    data-change="true"
                                                    data-form="positioner_model"></select>
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="input_signal"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Input Signal</label>
                                                <select name="input_signal" id="input_signal"
                                                    class="select2-general-dropdown" 
                                                    data-show="{{ route('general.options.showondropdown') }}" 
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="cina-inputsignal"
                                                    data-change="true"
                                                    data-form="input_signal"></select>
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="positioner_condition"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Positioner Condition</label>
                                                <select name="positioner_condition" id="positioner_condition"
                                                    class="select2-general-dropdown" 
                                                    data-show="{{ route('general.options.showondropdown') }}" 
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="cina-positionercondition"
                                                    data-change="true"
                                                    data-form="positioner_condition"></select>
                                            </div>
                                        </div>
                                        <!-- other accessories -->
                                        <div class="row sm:flex space-x-2">
                                            <div class="sm:w-1/3 w-full">
                                                <label for="other_accessories"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Other Accessories</label>
                                                <select name="other_accessories" id="other_accessories"
                                                    class="select2-general-dropdown" 
                                                    data-show="{{ route('general.options.showondropdown') }}" 
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="cina-otheraccessories"
                                                    data-change="true"
                                                    data-form="other_accessories"></select>
                                            </div>
                                            <div class="sm:w-1/3 w-full"></div><div class="sm:w-1/3 w-full"></div>
                                        </div>
                                    </div>
                                    <!-- Asset Instrument Form -->
                                    <div class="space-y-4 hidden" id="asset_instrument_form">
                                        <!-- instrument type,instrument brand -->
                                        <div class="row sm:flex space-x-2">
                                            <div class="sm:w-1/2 w-full">
                                                <label for="instrument_type"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instrument Type</label>
                                                <select name="instrument_type" id="instrument_type"
                                                    class="select2-general-dropdown" 
                                                    data-show="{{ route('general.options.showondropdown') }}" 
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="cina-instrumenttype"
                                                    data-change="true"
                                                    data-form="instrument_type"></select>
                                            </div>
                                            <div class="sm:w-1/2 w-full">
                                                <label for="instrument_brand"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instrument Brand</label>
                                                <select name="instrument_brand" id="instrument_brand"
                                                    class="select2-general-dropdown" 
                                                    data-show="{{ route('general.options.showondropdown') }}" 
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="cina-instrumentbrand"
                                                    data-change="true"
                                                    data-form="instrument_brand"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Asset Automation Form -->
                                    <div class="space-y-4 hidden" id="asset_automation_form">
                                        <div class="row sm:flex space-x-2">
                                            <div class="sm:w-1/2 w-full">
                                                <label for="automation_brand"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instrument Brand</label>
                                                <select name="automation_brand" id="automation_brand"
                                                    class="select2-general-dropdown" 
                                                    data-show="{{ route('general.options.showondropdown') }}" 
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="cina-automationbrand"
                                                    data-change="true"
                                                    data-form="automation_brand"></select>
                                            </div>
                                            <div class="sm:w-1/2 w-full"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Bulk Material Form Container -->
                                <div class="space-y-4 hidden" id="bulk_material_form">
                                    <div class="w-full">
                                        <label for="bulk_material_type"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type of Bulk Material</label>
                                        <select name="bulk_material_type" id="bulk_material_type"
                                            class="select2-general-dropdown" 
                                            data-show="{{ route('general.options.showondropdown') }}" 
                                            data-store="{{ route('general.options.storefromdropdown') }}"
                                            data-alias="cina-bulkmaterialtype"
                                            data-change="true"
                                            data-form="bulk_material_type"></select>
                                    </div>
                                </div>
                                <!-- Spare Parts Form Container -->
                                <div class="space-y-4 hidden" id="spare_parts_form">
                                    <div class="row sm:flex space-x-2">
                                        <div class="sm:w-1/2 w-full m-1 my-3">
                                            <label for="sparepart_description"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                            <input type="text" id="sparepart_description" name="sparepart_description"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </div>
                                        <div class="sm:w-1/2 w-full m-1 my-3">
                                            <label for="sparepart_number"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Part Number</label>
                                            <input type="text" id="sparepart_number" name="sparepart_number"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden p-2 rounded-lg" id="uploadfiles" role="tabpanel" aria-labelledby="uploadfiles-tab">
                                <div class="w-full mb-3">
                                    <input type="file" id="photo_devices" name="photo_devices[]" multiple="multiple" onchange="preview_image()">
                                </div>
                                <div class="grid grid-cols-4 gap-4" id="image_preview"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- footer -->
                <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 mt-5">
                    <button type="button" onclick="saveRecord()"
                        class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                    <button id="cancelBtn" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload Excel modal -->
    <div id="uploadExcelModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" role="dialog"
        aria-modal="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Upload File</h3>
                    <button type="button" id="closeUploadXlsIco"
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
                    <!-- Alert Area -->
                    <div id="alert-frame">
                        <div id="warning-alert-activity"
                            class="hidden items-center p-4 my-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium warning-alert-activity-title"></span>
                                <ul class="mt-1.5 ml-4 list-disc list-inside warning-alert-activity-message"></ul>
                            </div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                                onclick="$('#warning-alert-activity').removeClass('flex').addClass('hidden')"
                                aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <!-- Form Area -->
                    <form id="uploadXlsForm" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File</label>
                            <input type="file" id="filexls" name="filexls"
                                accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 py-4">
                    <button id="saveFormBtn" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        onClick="uploadFile()">Upload</button>
                    <button type="button" id="cancelUploadBtn"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>
    <script type="text/javascript" src="{{ asset('core/js/customer_asset/product-custom.js') }}"></script>
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
                scrollX: true,
                bAutoWidth: false,
                ajax: {
                    url: "{{ route('cina.products.main.table') }}",
                },
                columns: [
                    { data: 'old_id', name: 'old_id', className: 'desktop' },
                    { data: 'new_id', name: 'new_id', className: 'desktop' },
                    { data: 'equipment', name: 'equipment', className: 'desktop' },
                    { data: 'valve_type', name: 'valve_type', className: 'desktop' },
                    { data: 'valve_size', name: 'valve_size', className: 'desktop' },
                    { data: 'valve_rating', name: 'valve_rating', className: 'desktop' },
                    { data: 'brand', name: 'brand', className: 'desktop' },
                    { data: 'valve_model', name: 'valve_model', className: 'desktop' },
                    { data: 'valve_condition', name: 'valve_condition', className: 'desktop' },
                    { data: 'material_transfer', name: 'material_transfer', className: 'all' },
                    { data: 'station', name: 'station', className: 'desktop' },
                    { data: 'ex_station', name: 'ex_station', className: 'tablet-l' },
                    { data: 'project', name: 'project', className: 'tablet-l' },
                    { data: 'in_date', name: 'in_date', className: 'tablet-l' },
                    { data: 'out_date', name: 'out_date', className: 'tablet-l' },
                    { data: 'cina_product_location_id', name: 'cina_product_location_id', className: 'tablet-l' },
                    { data: 'target_pdn', name: 'target_pdn', className: 'tablet-l' },
                    { data: 'ce_number', name: 'ce_number', className: 'tablet-l' },
                    { data: 'ro_number', name: 'ro_number', className: 'tablet-l' },
                    { data: 'start_date', name: 'start_date', className: 'tablet-l' },
                    { data: 'end_date', name: 'end_date', className: 'tablet-l' },
                    { data: 'repair_price', name: 'repair_price', className: 'tablet-l' },
                    { data: 'cina_product_origin_id', name: 'cina_product_origin_id', className: 'tablet-l' },
                    { data: 'cina_asset_type_id', name: 'cina_asset_type_id', className: 'tablet-l' },
                    { data: 'actions', name: 'actions', class: 'tablet-l', orderable: false, sortable: false, },
                ],
                columnDefs: [{
                    target: [0, 1, 3, 4, 7, 9, 11, 12, 13, 14],
                    className: "dt-center",
                }, ]
            });

            $('.select2').select2({
                placeholder: 'Select here..'
            });

            $('.select2-custom-ajax').select2({
                allowClear: true,
                tags: true,
                ajax: {
                    url: function() {
                        return $(this).attr('data-show');
                    },
                    type: 'GET',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: params.term,
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        }
                    },
                    cache: true
                },
                placeholder: 'Search here..',
            });

            $('.select2-custom-ajax').on('select2:close', function(e) {
                // var paramsData = e.params.data.text;
                let getText = $(this).find(':selected');
                var paramsData = getText[0].label;

                if (paramsData) {
                    let url = $(this).attr("data-store");
                    let dataForm = $(this).attr("data-form");

                    if (url) {
                        $.ajax({
                            url: url,
                            method: "POST",
                            data: {
                                _token: CSRF_TOKEN,
                                newoption: paramsData
                            },
                            dataType: "json",
                            success: function(response) {
                                $('#' + dataForm).val(null).trigger('change');

                                var option = new Option(response.message.text, response
                                    .message.id, true, true);

                                $('#' + dataForm).append(option).trigger('change');
                                $('#' + dataForm).trigger('change');
                            }
                        });
                    }
                }
            });

            $('#cina_product_origin_id').on('select2:select', function(e) {
                let url = "{{ route('cina.products.getformtemplate', ':product') }}";
                url = url.replace(':product', $(this).val());

                $.ajax({
                    type: "get",
                    url: url,
                    success: function (response) {
                        $('#default_additional_form').hide();
                        
                        if( response == "spare_unit" ) {
                            $('#bulk_material_form').hide();
                            $('#spare_parts_form').hide();
                            $('#' + response + '_form').show();
                        } else if( response == "bulk_material" ) {
                            $('#spare_unit_form').hide();
                            $('#spare_parts_form').hide();
                            $('#' + response + '_form').show();
                        } else if( response == "spare_parts" ) {
                            $('#spare_unit_form').hide();
                            $('#bulk_material_form').hide();
                            $('#' + response + '_form').show();
                        } else {
                            $('#spare_unit_form').hide();
                            $('#bulk_material_form').hide();
                            $('#spare_parts_form').hide();
                            
                            $('#default_additional_form').show();
                        }
                    }
                });
            });

            $('#cina_asset_type_id').on('select2:select', function(e) {
                let url = "{{ route('cina.asset.getformtemplate', ':product') }}";
                url = url.replace(':product', $(this).val());

                $.ajax({
                    type: "get",
                    url: url,
                    success: function (response) {
                        if(response == "valve") {
                            $('#asset_valve_form').show();
                            $('#asset_instrument_form').hide();
                            $('#asset_automation_form').hide();
                        } else if(response == "instrument") {
                            $('#asset_valve_form').hide();
                            $('#asset_instrument_form').show();
                            $('#asset_automation_form').hide();
                        } else if(response == "automation") {
                            $('#asset_valve_form').hide();
                            $('#asset_instrument_form').hide();
                            $('#asset_automation_form').show();
                        }
                    }
                });
            })

            $('.select2-general-dropdown').select2({
                allowClear: true,
                tags: true,
                ajax: {
                    url: function() {
                        return $(this).attr('data-show');
                    },
                    type: 'GET',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: params.term,
                            alias: $(this).attr('data-alias')
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        }
                    },
                    cache: true
                },
                placeholder: 'Search here..',
            });

            $('.select2-general-dropdown').on('select2:close', function(e) {
                let getText = $(this).find(':selected');
                var paramsData = getText[0].label;
                // var paramsData = e.params.data.text;

                if (paramsData) {
                    let url = $(this).attr("data-store");
                    let dataForm = $(this).attr("data-form");

                    if (url) {
                        $.ajax({
                            url: url,
                            method: "POST",
                            data: {
                                _token: CSRF_TOKEN,
                                newoption: paramsData,
                                alias: $(this).attr('data-alias')
                            },
                            dataType: "json",
                            success: function(response) {
                                $('#' + dataForm).val(null).trigger('change');

                                if( $(this).attr('data-change') == "true" ) {
                                    var option = new Option(response.message.text, response
                                        .message.text, true, true);
                                } else {
                                    var option = new Option(response.message.text, response
                                        .message.id, true, true);
                                }

                                $('#' + dataForm).append(option).trigger('change');
                                $('#' + dataForm).trigger('change');
                            }
                        });
                    }
                }
            });
        });

        function uploadFile() {
            var formData = new FormData();
            formData.append('filexls', $('#filexls')[0].files[0]);
            formData.append('_token', CSRF_TOKEN);

            $.ajax({
                type: "post",
                url: "{{ route('cina.products.import') }}",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                enctype: "multipart/form-data",
                beforeSend: function() {
                    Swal.fire({
                        title: 'Please wait...',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        didOpen: () => {
                            Swal.showLoading()
                        },
                    })
                },
                success: function(response) {
                    Swal.close();
                    toastr.success(response.message);
                    closeUploadXlsIco.click();
                    $('#main-table').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    Swal.close();
                    toastr.error(xhr.responseJSON.message);
                }
            });
        }
    </script>
@endsection
