<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>X-Apps</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset('theme/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/fontawesome/css/fontawesome.min.css') }}">

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- Custom Style -->
    <style>
        .dataTables_wrapper .dataTables_length select {
            padding-right: 35px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            padding: 0.2em 0.7em;
        }

        table.dataTable {
            padding-top: 10px;
        }

        table.dataTable thead>tr>th.sorting {
            text-align: center;
        }
    </style>

    @yield('css')

    <style>
        .select2-container {
            width: 100% !important;
        }

        .select2-container .select2-selection--single {
            display: block;
            height: 41.5px !important;
            --opacity: 1;
            background-color: rgb(249 250 251 / var(--opacity));
            border-color: rgb(209 213 219 / var(--opacity));
            border-radius: 0.5rem;
            padding-top: 0.2rem;
        }

        .select2-container .select2-selection--multiple {
            display: block;
            --opacity: 1;
            background-color: rgb(249 250 251 / var(--opacity));
            border-color: rgb(209 213 219 / var(--opacity));
            border-radius: 0.5rem;
            padding-top: 0.2rem;
        }

        .select2-container .select2-selection--default .select2-container--open {
            left: 0px !important;
        }
    </style>
</head>

<body>
    <header
        class="bg-white dark:bg-gray-900 sticky w-full z-40 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">X-apps</span>
            </a>
            <div class="flex md:order-2">
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <!-- Asset Manager -->
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Asset Manager</a>
                    </li>
                    <!-- Maintenance Manager -->
                    <li>
                        <a href="{{route('valverepair.index')}}"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Maintenance Manager</a>
                    </li>
                    <!-- Contract Manager -->
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbarCM"
                            class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Contract
                            Manager
                            <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div id="dropdownNavbarCM"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                aria-labelledby="dropdownLargeButton">
                                <!-- Request Order -->
                                <li aria-labelledby="dropdownNavbarLink">
                                    <button id="requestOrderDropdownButton" data-dropdown-toggle="requestOrderDropdown"
                                        data-dropdown-placement="right-start" type="button"
                                        class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Request
                                        Order<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg>
                                    </button>
                                    <div id="requestOrderDropdown"
                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                        <ul class="pt-2 text-sm text-gray-700 dark:text-gray-200">
                                            <li>
                                                <button id="requestOrderDashboardDropdownButton" data-dropdown-toggle="requestOrderDashboardDropdown"
                                                    data-dropdown-placement="right-start" type="button"
                                                    class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                                    </svg></button>
                                                <div id="requestOrderDashboardDropdown"
                                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                                    <ul class="text-sm text-gray-700 dark:text-gray-200">
                                                        <li>
                                                            <a href="{{ route('ro.dashboard.internal') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Internal</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('ro.dashboard.external') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">External</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                        <div>
                                            <ul class="text-sm text-gray-700 dark:text-gray-200">
                                                <li>
                                                    <a href="{{ route('requestorder.index') }}"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Overview</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div>
                                            <ul class="text-sm text-gray-700 dark:text-gray-200">
                                                <li>
                                                    <a href="{{ route('client.index') }}"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Customers</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('unitrate.index') }}"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Unit Rates</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('activity.index') }}"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Activities</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('itemtype.index') }}"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Item Types</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('item.index') }}"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Item</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <!-- SLA/KPI -->
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">SLA/KPI</a>
                                </li>
                                <!-- HSE -->
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">HSE</a>
                                </li>
                                <!-- Human Resource -->
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Human Resource</a>
                                </li>
                                <!-- Engineering -->
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Engineering</a>
                                </li>
                                <!-- Work Progress -->
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Work Progress</a>
                                </li>
                                <!-- Customer Asset -->
                                <li>
                                    <button id="customerAssetDropdownButton" data-dropdown-toggle="customerAssetDropdown"
                                        data-dropdown-placement="right-start" type="button"
                                        class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Customer Asset<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg>
                                    </button>
                                    <div id="customerAssetDropdown"
                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                        <div>
                                            <ul class="text-sm text-gray-700 dark:text-gray-200">
                                                <li>
                                                    <button id="customerInventoryDropdownButton" data-dropdown-toggle="customerInventoryDropdown"
                                                        data-dropdown-placement="right-start" type="button"
                                                        class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Inventory Asset<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                                        </svg>
                                                    </button>
                                                    <div id="customerInventoryDropdown"
                                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                                        <div>
                                                            <ul class="text-sm text-gray-700 dark:text-gray-200">
                                                                <li>
                                                                    <a href="{{ route('products.index') }}"
                                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Spare Unit - Valve</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                {{-- <li>
                                                    <a href="{{ route('unitrate.index') }}"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Unit Rates</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('activity.index') }}"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Activities</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('itemtype.index') }}"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Item Types</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('item.index') }}"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Item</a>
                                                </li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <!-- Reporting/Doc.Control -->
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reporting/Doc. Control</a>
                                </li>
                                <!-- TKDN Monitoring -->
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">TKDN Monitoring</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Operation Manager -->
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbarOM"
                            class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Operation
                            Manager
                            <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div id="dropdownNavbarOM"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Management
                                        Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Task Manager</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sales</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Workshop</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Field Services</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Inventory</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">QHSE</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Human Resources</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">TKDN</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Emerson SSP</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Setup -->
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbarST"
                            class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Setup
                            <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div id="dropdownNavbarST"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                aria-labelledby="dropdownLargeButton">
                                <!-- Table Map -->
                                <li>
                                    <a href="{{ route('tablemap.index') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Table Map</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    @yield('content')

    <template id="create-template">
        <swal-title>
            Do you want to save it?
            <p class="text-muted text-gray-800"><small>Please check before submitting!</small></p>
        </swal-title>
        <swal-icon type="question" color="gray"></swal-icon>
        <swal-button type="confirm" color="#1a57db">
            Yes, save it!
        </swal-button>
        <swal-button type="cancel" color="#babcc2">
            <span class="text-dark">Cancel</span>
        </swal-button>
        <swal-param name="allowEscapeKey" value="false" />
        <swal-param name="customClass" value='{ "popup": "my-popup" }' />
        <swal-function-param name="didOpen" value="popup => console.log(popup)" />
    </template>

    <template id="delete-template">
        <swal-title>
            Do you want to delete it?
            <p class="text-muted text-gray-800"><small>Please check before deleting!</small></p>
        </swal-title>
        <swal-icon type="warning" color="red"></swal-icon>
        <swal-button type="confirm" color="#babcc2">
            Yes, delete it!
        </swal-button>
        <swal-button type="cancel" color="#1a57db">
            <span class="text-dark">Cancel</span>
        </swal-button>
        <swal-param name="allowEscapeKey" value="false" />
        <swal-param name="customClass" value='{ "popup": "my-popup" }' />
        <swal-function-param name="didOpen" value="popup => console.log(popup)" />
    </template>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

    <script>
        $(document).ready(function() {
            toastr.options = {
                "showMethod": "slideDown",
                "hideMethod": "slideUp",
                "progressBar": true,
                "positionClass": "toast-top-right",
                // "positionClass": "toast-top-full-width",
                "closeButton": true
            }
        });
    </script>

    @yield('js')
</body>

</html>
