@extends('layout.index')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css">
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
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                onclick="openForm('{{ route('products.store') }}')">New Product</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                onclick="openUploadForm()">Import</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Export</a>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- table -->
            <div>
                <table id="main-table" class="table table-striped table-bordered table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>New AssetId</th>
                            <th>Type</th>
                            <th>Size</th>
                            <th>Rating</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>In</th>
                            <th>Doc.In</th>
                            <th>Out</th>
                            <th>Doc.Out</th>
                            <th>Stock</th>
                            <th>#CE</th>
                            <th>#RO</th>
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
                    <!-- Alert Area -->
                    {{-- <div id="alert-frame">
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
                    </div> --}}
                    <!-- Form Area -->
                    <form id="mainForm" method="post">
                        @csrf
                        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                                <li class="mr-2 tab-item" role="presentation">
                                    <button class="inline-block p-4 border-b-2 border-blue-600 rounded-t-lg" id="general-tab" data-tabs-target="#general" type="button" role="tab" aria-controls="profile" aria-selected="false">GENERAL</button>
                                </li>
                                <li class="mr-2 tab-item" role="presentation">
                                    <button class="inline-block p-4 border-b-2 border-blue-600 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="actuator-tab" data-tabs-target="#actuator" type="button" role="tab" aria-controls="actuator" aria-selected="false">ACTUATOR & POSITIONER</button>
                                </li>
                                <li class="tab-item" role="presentation">
                                    <button class="inline-block p-4 border-b-2 border-blue-600 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="stock-tab" data-tabs-target="#stock" type="button" role="tab" aria-controls="stock" aria-selected="false">STOCK</button>
                                </li>
                                <li class="mr-2 tab-item" role="presentation">
                                    <button class="inline-block p-4 border-b-2 border-blue-600 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="others-tab" data-tabs-target="#others" type="button" role="tab" aria-controls="others" aria-selected="false">OTHERS</button>
                                </li>
                            </ul>
                        </div>
                        <div id="myTabContent">
                            <!-- General tab content -->
                            <div class="hidden px-4 rounded-lg" id="general" role="tabpanel" aria-labelledby="general-tab">
                                <div class="space-y-6">
                                    <div>
                                        <div class="row sm:flex space-x-3">
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_status"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                                <select class="select2" id="product_status" name="product_status">
                                                    <option value="Incoming">Incoming</option>
                                                    <option value="Outgoing">Outgoing</option>
                                                    <option value="At Workshop">At Workshop</option>
                                                    <option value="N/A">N/A</option>
                                                </select>
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_status"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Old Id</label>
                                                <input type="text" id="product_assetID" name="product_assetID"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Old Asset ID" required>
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_status"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Id</label>
                                                <input type="text" id="product_newassetID" name="product_newassetID"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="New Asset ID" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="row sm:flex space-x-3">
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_status"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Equipment</label>
                                                <input type="text" id="product_equip" name="product_equip"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Equipment">
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_type"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                                                <select class="select2 select2-ajax" id="product_type" name="product_type">
                                                </select>
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_end"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End Connection</label>
                                                <select class="select2 select2-ajax" id="product_end" name="product_end">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="row sm:flex space-x-3">
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_size"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size (inch)</label>
                                                <select class="select2 select2-ajax" id="product_size" name="product_size">
                                                </select>
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_rating"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating</label>
                                                <select class="select2 select2-ajax" id="product_rating" name="product_rating">
                                                </select>
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_brand"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                                                <select class="select2 select2-ajax" id="product_brand" name="product_brand">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="row sm:flex space-x-3">
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_valvemodel"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
                                                <input type="text" id="product_valvemodel" name="product_valvemodel"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Equipment">
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_serial"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial Number</label>
                                                <input type="text" id="product_serial" name="product_serial"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Equipment">
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_condi"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Condition</label>
                                                <select class="select2" id="product_condi" name="product_condi">
                                                    <option value="Retest">Retest</option>
                                                    <option value="Repair">Repair</option>
                                                    <option value="N/A">N/A</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- footer -->
                                <div class="flex items-center justify-end mt-5 space-x-2 border-t border-gray-200 py-3">
                                    <button id="saveFormBtn" type="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        onClick="$('#actuator-tab').click()">Next<i class="fa-solid fa-chevron-right ml-2"></i></button>
                                </div>
                            </div>
                            <!-- Actuator tab content -->
                            <div class="hidden px-4 rounded-lg" id="actuator" role="tabpanel" aria-labelledby="actuator-tab">
                                <div class="space-y-6">
                                    <div class="mb-6">
                                        <div class="row sm:flex space-x-3">
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_actbrand"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Actuator Brand</label>
                                                <input type="text" id="product_actbrand" name="product_actbrand"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Equipment">
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_acttype"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Actuator Type</label>
                                                <input type="text" id="product_acttype" name="product_acttype"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Equipment">
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_actsize"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Actuator Size</label>
                                                <input type="text" id="product_actsize" name="product_actsize"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Equipment">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex space-x-3">
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_fail"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fail Position</label>
                                                <input type="text" id="product_fail" name="product_fail"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Equipment">
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_actcond"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Actuator Condition</label>
                                                <input type="text" id="product_actcond" name="product_actcond"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Equipment">
                                            </div>
                                            <div class="sm:w-1/3 w-full">&nbsp;</div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex space-x-3">
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_posbrand"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Positioner Brand</label>
                                                <input type="text" id="product_posbrand" name="product_posbrand"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Equipment">
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_posmodel"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Positioner Model</label>
                                                <input type="text" id="product_posmodel" name="product_posmodel"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Equipment">
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_poscond"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Positioner Condition</label>
                                                <input type="text" id="product_poscond" name="product_poscond"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Equipment">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex space-x-3">
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_inputsignal"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Input Signal</label>
                                                <input type="text" id="product_inputsignal" name="product_inputsignal"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Equipment">
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_other"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Others Accessories</label>
                                                <input type="text" id="product_other" name="product_other"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Equipment">
                                            </div>
                                            <div class="sm:w-1/3 w-full">&nbsp;</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- footer -->
                                <div class="flex items-center justify-between mt-5 space-x-2 border-t border-gray-200 py-3">
                                    <button id="saveFormBtn" type="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        onClick="$('#general-tab').click()"><i class="fa-solid fa-chevron-left mr-2"></i>Prev</button>
                                        <button id="saveFormBtn" type="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        onClick="$('#positioner-tab').click()">Next<i class="fa-solid fa-chevron-right ml-2"></i></button>
                                </div>
                            </div>
                            <!-- Stock tab content -->
                            <div class="hidden px-4 rounded-lg" id="stock" role="tabpanel" aria-labelledby="stock-tab">
                                <div class="space-y-6">
                                    <div class="mb-6">
                                        <div class="row sm:flex space-x-3">
                                            <div class="w-full">
                                                <label for="product_stockin"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock In</label>
                                                <input type="text" id="product_stockin" name="product_stockin"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_datein"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date In</label>
                                                <div class="relative max-w-sm">
                                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                    </svg>
                                                    </div>
                                                    <input 
                                                        datepicker
                                                        datepicker-autohide
                                                        datepicker-format="dd/mm/yyyy" 
                                                        type="text" id="product_datein" name="product_datein" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex space-x-3">
                                            <div class="w-full">
                                                <label for="product_stockout"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock Out</label>
                                                <input type="text" id="product_stockout" name="product_stockout"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_dateout"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Out</label>
                                                <div class="relative max-w-sm">
                                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                    </svg>
                                                    </div>
                                                    <input 
                                                        datepicker
                                                        datepicker-autohide
                                                        datepicker-format="dd/mm/yyyy" 
                                                        type="text" id="product_dateout" name="product_dateout" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex space-x-3">
                                            <div class="w-full">
                                                <label for="product_tfoffshore"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Material transfer to offshore</label>
                                                <input type="text" id="product_tfoffshore" name="product_tfoffshore"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_dateoffshore"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date to offshore</label>
                                                <div class="relative max-w-sm">
                                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                    </svg>
                                                    </div>
                                                    <input 
                                                        datepicker
                                                        datepicker-autohide
                                                        datepicker-format="dd/mm/yyyy" 
                                                        type="text" id="product_dateoffshore" name="product_dateoffshore" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex space-x-3">
                                            <div class="w-full">
                                                <label for="product_stockqty"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock Quantity</label>
                                                <input type="text" id="product_stockqty" name="product_stockqty"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_uom"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UOM</label>
                                                <input type="text" id="product_uom" name="product_uom"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex space-x-3">
                                            <div class="w-full">
                                                <label for="product_curloc"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Location</label>
                                                <input type="text" id="product_curloc" name="product_curloc"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_targetpdn"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Target PDN</label>
                                                <div class="relative max-w-sm">
                                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                    </svg>
                                                    </div>
                                                    <input 
                                                        datepicker
                                                        datepicker-autohide
                                                        datepicker-format="dd/mm/yyyy" 
                                                        type="text" id="product_targetpdn" name="product_targetpdn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- footer -->
                                <div class="flex items-center justify-between mt-5 space-x-2 border-t border-gray-200 py-3">
                                    <button id="saveFormBtn" type="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        onClick="$('#others-tab').click()"><i class="fa-solid fa-chevron-left mr-2"></i>Prev</button>
                                    <div class="flex space-x-1">
                                        <button id="saveFormBtn" type="button"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            onClick="">Save<i class="fa-solid fa-chevron-right ml-2"></i></button>
                                        <button type="button" id="cancelBtn"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Others tab content -->
                            <div class="hidden px-4 rounded-lg" id="others" role="tabpanel" aria-labelledby="others-tab">
                                <div class="space-y-6">
                                    <div class="mb-6">
                                        <div class="row sm:flex space-x-3">
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_transfer"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Material Transfer</label>
                                                <input type="text" id="product_transfer" name="product_transfer"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_reser"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reservation Number</label>
                                                <input type="text" id="product_reser" name="product_reser"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_origin"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Origin</label>
                                                <input type="text" id="product_origin" name="product_origin"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex space-x-3">
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_sdvin"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SDV In</label>
                                                <input type="text" id="product_sdvin" name="product_sdvin"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_sdvout"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SDV Out</label>
                                                <input type="text" id="product_sdvout" name="product_sdvout"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_station"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Station</label>
                                                <input type="text" id="product_station" name="product_station"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex space-x-3">
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_requestor"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Requestor</label>
                                                <input type="text" id="product_requestor" name="product_requestor"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_project"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project</label>
                                                <input type="text" id="product_project" name="product_project"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_csrelease"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CS Release</label>
                                                <input type="text" id="product_csrelease" name="product_csrelease"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex space-x-3">
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_csnumber"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CS Number</label>
                                                <input type="text" id="product_csnumber" name="product_csnumber"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_cenumber"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CE Number</label>
                                                <input type="text" id="product_cenumber" name="product_cenumber"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div class="sm:w-1/3 w-full">
                                                <label for="product_ronumber"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RO Number</label>
                                                <input type="text" id="product_ronumber" name="product_ronumber"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- footer -->
                                <div class="flex items-center justify-between mt-5 space-x-2 border-t border-gray-200 py-3">
                                    <button id="saveFormBtn" type="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        onClick="$('#positioner-tab').click()"><i class="fa-solid fa-chevron-left mr-2"></i>Prev</button>
                                    <button id="saveFormBtn" type="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        onClick="$('#stock-tab').click()">Next<i class="fa-solid fa-chevron-right ml-2"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload Excel modal -->
    <div id="uploadExcelModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" role="dialog" aria-modal="true"
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
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
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
                            <input type="file" id="filexls" name="filexls" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
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
                    url: "{{ route('products.main.table') }}",
                },
                columns: [
                    {
                        data: 'product_status',
                        name: 'product_status',
                        className: 'all'
                    },
                    {
                        data: 'product_newassetID',
                        name: 'product_newassetID',
                        className: 'all',
                        width: '20%'
                    },
                    {
                        data: 'product_type',
                        name: 'product_type',
                        className: 'desktop',
                        width: '35%'
                    },
                    {
                        data: 'product_size',
                        name: 'product_size',
                        className: 'tablet-l'
                    },
                    {
                        data: 'product_rating',
                        name: 'product_rating',
                        className: 'all'
                    },
                    {
                        data: 'product_brand',
                        name: 'product_brand',
                        className: 'desktop'
                    },
                    {
                        data: 'product_valvemodel',
                        name: 'product_valvemodel',
                        className: 'all'
                    },
                    {
                        data: 'product_stockin',
                        name: 'product_stockin',
                        className: 'all'
                    },
                    {
                        data: 'product_docin',
                        name: 'product_docin',
                        className: 'desktop'
                    },
                    {
                        data: 'product_stockout',
                        name: 'product_stockout',
                        className: 'all'
                    },
                    {
                        data: 'product_docout',
                        name: 'product_docout',
                        className: 'desktop'
                    },
                    {
                        data: 'product_stockqty',
                        name: 'product_stockqty',
                        className: 'all'
                    },
                    {
                        data: 'product_cenumber',
                        name: 'product_cenumber',
                        className: 'tablet-l',
                        width: '10%'
                    },
                    {
                        data: 'product_ronumber',
                        name: 'product_ronumber',
                        className: 'tablet-l'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        class: 'desktop',
                        orderable: false,
                        sortable: false,
                    },
                ],
                columnDefs: [
                    {
                        target: [0,1,3,4,7,9,11,12,13,14],
                        className: "dt-center",
                    },
                ]
            });

            $('.select2').select2({
                placeholder: 'Select here..'
            });
        });

        function uploadFile() {
            var formData = new FormData();
            formData.append('filexls',$('#filexls')[0].files[0]);
            formData.append('_token',CSRF_TOKEN);

            $.ajax({
                type: "post",
                url: "{{ route('products.import') }}",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                enctype: "multipart/form-data",
                success: function (response) {
                    toastr.success(response.message);
                    closeUploadXlsIco.click();
                    $('#main-table').DataTable().ajax.reload();
                },
                error: function (xhr) {
                    toastr.error(xhr.responseJSON.message);
                }
            });
        }
    </script>
@endsection
