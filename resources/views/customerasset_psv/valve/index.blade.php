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
                <button type="button" id="newBtn" onclick="openForm(`{{ route('valve.store') }}`)"
                    class="text-white bg-blue-700 hidden sm:block hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="fa-solid fa-plus mr-2"></i>New
                </button>
            </div>

            <div>
                <table id="main-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Manufacture</th>
                            <th>Model Number</th>
                            <th>Serial Number</th>
                            <th>Size In</th>
                            <th>Rating In</th>
                            <th>Size Out</th>
                            <th>Rating Out</th>
                            {{-- <th>Press. Setting (psi)</th> --}}
                            {{-- <th>Vacuum Setting (psi)</th> --}}
                            {{-- <th>PSV Style</th>
                            <th>Orifice Design</th>
                            <th>Orifice Selection</th>
                            <th>PSV Capacity</th>
                            <th>PSV Capacity Unit</th>
                            <th>Bonnet Type</th>
                            <th>Seat Type</th>
                            <th>CAP Type</th> --}}
                            {{-- <th>Body Bonnet Material</th> --}}
                            {{-- <th>Disc Material</th> --}}
                            {{-- <th>Spring Material</th> --}}
                            {{-- <th>Guide Material</th> --}}
                            {{-- <th>Resilient Seat</th> --}}
                            {{-- <th>Bellow Material</th> --}}
                            <th>Year Build</th>
                            <th>Year Install</th>
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
                    <!-- Alesize_in -->
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
                                        required placeholder="serial  number">
                                </div>
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="size_in"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size In</label>
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
                                        <input type="text" id="rating_in" name="rating_in"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="rating in">
                                </div>
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="size_out"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size Out</label>
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
                            <div class="mb-6">
                                <div class="row sm:flex">
                                    <div class="sm:w-1/2 w-full sm:pr-2">
                                        <label for="rating_out"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating Out</label>
                                            <input type="text" id="rating_out" name="rating_out"
                                            class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required placeholder="rating out">
                                    </div>
                                    <div class="sm:w-1/2 w-full sm:pr-2">
                                        <label for="press"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Press. Setting (psi)</label>
                                        <input type="text" id="press" name="press"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="press">
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
                                                                <div class="mb-6">
                                                                            <label for="bellow_material"
                                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bellow Material</label>
                                                                                <input type="text" id="bellow_material" name="bellow_material"
                                                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                                required placeholder="bellow material">
                                                                        </div>
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
<script type="text/javascript" src="{{ asset('core/js/customerasset_psv/valve-custom.js') }}"></script>
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
                    url: "{{ route('valve.main.table') }}",
                },
                columns: [{
                        data: 'manufacture',
                        name: 'manufacture',
                        className: 'all'
                    },
                    {
                        data: 'model_number',
                        name: 'model_number',
                        className: 'all'
                    },
                    {
                        data: 'serial_number',
                        name: 'serial_number',
                        className: 'all'
                    },
                    {
                        data: 'size_in',
                        name: 'size_in',
                        class: 'all'
                    },
                    {
                        data: 'rating_in',
                        name: 'rating_in',
                        class: 'all'
                    },
                    {
                        data: 'size_out',
                        name: 'size_out',
                        class: 'all'
                    },
                    {
                        data: 'rating_out',
                        name: 'rating_out',
                        class: 'all'
                    },
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
                    {
                        data: 'year_build',
                        name: 'year_build',
                        class: 'all'
                    },
                    {
                        data: 'year_install',
                        name: 'year_install',
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
            $('#size_in').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                minimumResultsForSearch: -1
            });

            $('#size_out').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                minimumResultsForSearch: -1
            });


            $('#newBtn').on('click', function(e) {
                e.preventDefault();

                $('.modal-title').text('New Valve Information');
            });
        });
    </script>
@endsection
