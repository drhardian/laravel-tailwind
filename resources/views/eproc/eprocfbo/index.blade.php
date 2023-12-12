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

                <div class="flex space-x-3"> <!-- Container untuk tombol-tombol -->
                    <button type="button" onclick="openUploadForm()"
                        class="text-white bg-green-700 sm:block hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-md text-sm px-4 py-2 text-center md:mr-0 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        <i class="fa-solid fa-file-import"></i> Import
                    </button>

                    <a id="newBtn" {{-- <a id="newBtn" href="{{ route('psvdatamaster.export') }}" download="exported-data.csv" --}}
                        class="text-white bg-yellow-400 sm:block hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-md text-sm px-4 py-2 text-center md:mr-0 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                        <i class="fa-solid fa-file-export"></i> Export
                    </a>
                    <button type="button" id="newBtn" onclick="openForm(`{{ route('eprocfbo.store') }}`)"
                        class="text-white bg-blue-700 sm:block hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 text-center md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <i class="fa-solid fa-plus"></i> New
                    </button>
                </div>
            </div>

            <div>
                <table id="main-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Required By</th>
                            <th>Division</th>
                            <th>Request Date</th>
                            <th>Status</th>
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
                    <form id="mainForm" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Tab Panel -->
                        {{-- <div class="mb-4 border-b border-gray-200 dark:border-gray-700"> --}}
                        {{-- <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                                data-tabs-toggle="#myTabContent" role="tablist"> --}}
                        {{-- <li class="mr-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="fbo-tab" data-tabs-target="#fbo" type="button" role="tab"
                                        aria-controls="eproc" aria-selected="false">FBO INFORMATION</button>
                                </li> --}}
                        {{-- <li class="mr-2" role="presentation">
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
                                </li> --}}
                        {{-- </ul> --}}
                        {{-- </div> --}}

                        <div id="myTabContent">
                            <div class id="fbo" role="tab" aria-labelledby="fbo-tab">
                                <div class="space-y-6">
                                    <div class="mb-6">
                                        {{-- <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LOCATION INFORMATION</label> --}}
                                        <div class="row sm:flex">
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="required_by"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Required
                                                    By</label>
                                                <input type="text" id="required_by" name="required_by"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="required by">
                                            </div>
                                            <div class="sm:w-1/2 w- full sm:pr-2">
                                                <label for="division"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Division</label>
                                                <input type="text" id="division" name="division"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="division">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row sm:flex">
                                        <div class="sm:w-1/2 w- full sm:pr-2">
                                            <label for="request_date"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Request
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
                                                <input datepicker id="request_date" datepicker-format="dd/mm/yyyy"
                                                    name="request_date" type="text"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Select date">
                                            </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="due_date"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Due
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
                                                <input datepicker id="due_date" datepicker-format="dd/mm/yyyy"
                                                    name="due_date" type="text"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Select date">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- </div> --}}
                                    <div class="mb-6">
                                        <div class="row sm:flex">
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="type_process"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type
                                                    of Process</label>
                                                <select id="type_process" name="type_process"
                                                    class="select2-general-dropdown"
                                                    data-show="{{ route('general.options.showondropdown') }}"
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="eproc-type_process" data-change="true"
                                                    data-form="type process">
                                                </select>
                                            </div>
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="upload_srf"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload
                                                    SRF</label>
                                                <input type="file" id="upload_srf" name="upload_srf"
                                                    accept=".pdf,.doc,.docx"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="upload srf">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex">
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="tkdn_required"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">TKDN
                                                    Required</label>
                                                <select id="tkdn_required" name="tkdn_required"
                                                    class="select2-general-dropdown"
                                                    data-show="{{ route('general.options.showondropdown') }}"
                                                    data-store="{{ route('general.options.storefromdropdown') }}"
                                                    data-alias="eproc-tkdn_required" data-change="true"
                                                    data-form="tkdn required">
                                                </select>
                                            </div>
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="minimum"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Minimum
                                                    (%)</label>
                                                <input type="text" id="minimum" name="minimum"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="minimum">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row sm:flex">
                                        <div class="sm:w-1/3 w-full sm:pr-2">
                                            <label for="required_category"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Required Category</label>
                                            <select id="required_category" name="required_category"
                                                class="select2-general-dropdown"
                                                data-show="{{ route('general.options.showondropdown') }}"
                                                data-store="{{ route('general.options.storefromdropdown') }}"
                                                data-alias="eproc-required_category" data-change="true"
                                                data-form="required category">
                                            </select>
                                        </div>
                                        <div class="sm:w-1/3 w-full sm:pr-2">
                                            <label for="eprocmethod"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Method</label>
                                            <select id="eprocmethod" name="eprocmethod" 
                                                class="select2-general-dropdown"
                                                data-show="{{ route('general.options.showondropdown') }}"
                                                data-store="{{ route('general.options.storefromdropdown') }}"
                                                data-alias="eproc-eprocmethod" data-change="true" 
                                                data-form="eproc method">
                                            </select>
                                        </div>
                                        <div class="sm:w-1/3 w-full sm:pr-2">
                                            <label for="statusfbo"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                                FBO</label>
                                            <select id="statusfbo" name="statusfbo" 
                                                class="select2-general-dropdown"
                                                data-show="{{ route('general.options.showondropdown') }}"
                                                data-store="{{ route('general.options.storefromdropdown') }}"
                                                data-alias="eproc-statusfbo" data-change="true" 
                                                data-form="status fbo">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 py-4">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/datepicker.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
    <script type="text/javascript" src="{{ asset('core/js/eproc/eprocfbo-custom.js') }}"></script>
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
                    url: "{{ route('eprocfbo.main.table') }}",
                },
                columns: [{
                        data: 'required_by',
                        name: 'required_by',
                        class: 'all'
                    },
                    {
                        data: 'division',
                        name: 'division',
                        class: 'all'
                    },
                    {
                        data: 'request_date',
                        name: 'request_date',
                        className: 'all'
                    },
                    {
                        data: 'statusfbo',
                        name: 'statusfbo',
                        className: ['text-center', 'min-tablet']

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
                        target: [0, 1, 2, 3, 4, 5],
                        className: "dt-head-center",
                    },
                    {
                        target: [5],
                        width: "5%",
                    },
                    {
                        target: [0, 1, 3, 5],
                        className: "dt-center",
                    },
                ]
            });

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
                            alias: $(this).attr('data-alias'),
                            dataChange: $(this).attr('data-change'),
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

                if (paramsData) {
                    let url = $(this).attr("data-store");
                    let dataForm = $(this).attr("data-form");
                    let dataChange = $(this).attr("data-change");

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

                                if (dataChange == "true") {
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

            // $('#status').on('select2:close', function(e) {
            //     if ($(this).val() == 'ACTIVE') {
            //         $('#operational').val('YES');
            //     } else {
            //         $('#operational').val('NO');
            //     }
            // });

            $('#newBtn').on('click', function(e) {
                e.preventDefault();

                $('.modal-title').text('New FBO');
            });
        });
    </script>
@endsection
