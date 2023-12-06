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

                    <a id="newBtn"
                    {{-- <a id="newBtn" href="{{ route('psvdatamaster.export') }}" download="exported-data.csv" --}}
                        class="text-white bg-yellow-400 sm:block hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-md text-sm px-4 py-2 text-center md:mr-0 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                        <i class="fa-solid fa-file-export"></i> Export
                    </a>
                    <button type="button" id="newBtn" onclick="openForm(`{{ route('catalogcodeitem.store') }}`)"
                        class="text-white bg-blue-700 sm:block hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 text-center md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <i class="fa-solid fa-plus"></i> New
                    </button>
                </div>
            </div>

            <div>
                <table id="main-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Main Code</th>
                            <th>Title Main Code</th>
                            <th>Code</th>
                            <th>Title Code</th>
                            <th>Sub Code</th>
                            <th>Title sub Code</th>
                            <th>Group Code</th>
                            <th>Title Group Code</th>
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
                        {{-- <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                                data-tabs-toggle="#myTabContent" role="tablist">
                                <li class="mr-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="catalog-tab" data-tabs-target="#catalog" type="button" role="tab"
                                        aria-controls="catalog" aria-selected="false">TOOLS CODE</button>
                                </li>
                            </ul>
                        </div> --}}

                        <div id="myTabContent">
                            
                            <!-- CODE TOOLS -->
                            <div class id="code" role="tab" aria-labelledby="code-tab">
                                <div class="space-y-6">
                                    <div class="mb-6">
                                        <div class="row sm:flex space-x-4">
                                            <div class="w-full">
                                                <div class="row sm:flex">
                                                    <div class="w-full">
                                                        <label for="main_code_and_titlemain_code"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Main Code</label>
                                                        <div class="flex">
                                                            <div class="w-1/4"> <!-- Bagian Main Code -->
                                                                <select id="main_code" name="main_code"
                                                                    class="select2-catalog-dropdown"
                                                                    data-show="{{ route ('catalog.options.showondropdown') }}"
                                                                    data-store="{{ route ('catalog.options.storefromdropdown') }}"
                                                                    data-alias="catalog-main_code"
                                                                    data-change="true"
                                                                    data-form="main code"></select>
                                                            </div>
                                                            <div class="w-3/4"> <!-- Bagian Title Main Code -->
                                                                <select id="titlemain_code" name="titlemain_code"
                                                                    class="select2-catalog-dropdown"
                                                                    data-show="{{ route ('catalog.options.showondropdown') }}"
                                                                    data-store="{{ route ('catalog.options.storefromdropdown') }}"
                                                                    data-alias="catalog-titlemain_code"
                                                                    data-change="true"
                                                                    data-form="title main code"></select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row sm:flex space-x-4">
                                            <div class="w-full">
                                                <div class="row sm:flex">
                                                    <div class="w-full"> 
                                                        <label for="code_and_title_code"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code</label>
                                                        <div class="flex">
                                                            <div class="w-1/4"> <!-- Bagian Code -->
                                                                <select id="code" name="code"
                                                                    class="select2-catalog-dropdown"
                                                                    data-show="{{ route ('catalog.options.showondropdown') }}"
                                                                    data-store="{{ route ('catalog.options.storefromdropdown') }}"
                                                                    data-alias="catalog-code"
                                                                    data-change="true"
                                                                    data-form="code"></select>
                                                            </div>
                                                            <div class="w-3/4"> <!-- Bagian Title Code -->
                                                                <select id="title_code" name="title_code"
                                                                    class="select2-catalog-dropdown"
                                                                    data-show="{{ route ('catalog.options.showondropdown') }}"
                                                                    data-store="{{ route ('catalog.options.storefromdropdown') }}"
                                                                    data-alias="catalog-title_code"
                                                                    data-change="true"
                                                                    data-form="title code"></select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="row sm:flex space-x-4">
                                                <div class="w-full">
                                                    <div class="row sm:flex">
                                                        <div class="w-full">
                                                            <label for="subcode_and_titlesub_code"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sub Code</label>
                                                            <div class="flex">
                                                                <div class="w-1/4"> <!-- Bagian Sub Code -->
                                                                    <select id="sub_code" name="sub_code"
                                                                        class="select2-catalog-dropdown"
                                                                        data-show="{{ route ('catalog.options.showondropdown') }}"
                                                                        data-store="{{ route ('catalog.options.storefromdropdown') }}"
                                                                        data-alias="catalog-sub_code"
                                                                        data-change="true"
                                                                        data-form="sub code"></select>
                                                                </div>
                                                                <div class="w-3/4"> <!-- Bagian Title Sub Code -->
                                                                    <select id="titlesub_code" name="titlesub_code"
                                                                        class="select2-catalog-dropdown"
                                                                        data-show="{{ route ('catalog.options.showondropdown') }}"
                                                                        data-store="{{ route ('catalog.options.storefromdropdown') }}"
                                                                        data-alias="catalog-titlesub_code"
                                                                        data-change="true"
                                                                        data-form="title sub code"></select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row sm:flex space-x-4">
                                                <div class="w-full">
                                                    <div class="row sm:flex">
                                                        <div class="w-full">
                                                            <label for="groupcode_and_titlegroup_code"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Group Code</label>
                                                            <div class="flex">
                                                                <div class="w-1/4"> <!-- Bagian Group Code -->
                                                                    <select id="group_code" name="group_code"
                                                                        class="select2-catalog-dropdown"
                                                                        data-show="{{ route ('catalog.options.showondropdown') }}"
                                                                        data-store="{{ route ('catalog.options.storefromdropdown') }}"
                                                                        data-alias="catalog-group_code"
                                                                        data-change="true"
                                                                        data-form="group code"></select>
                                                                </div>
                                                                <div class="w-3/4"> <!-- Bagian Title Group Code -->
                                                                    <select id="titlegroup_code" name="titlegroup_code"
                                                                        class="select2-catalog-dropdown"
                                                                        data-show="{{ route ('catalog.options.showondropdown') }}"
                                                                        data-store="{{ route ('catalog.options.storefromdropdown') }}"
                                                                        data-alias="catalog-titlegroup_code"
                                                                        data-change="true"
                                                                        data-form="title group code"></select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
    <script type="text/javascript" src="{{ asset('core/js/catalog/catalogcodeitem-custom.js') }}"></script>
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
                    url: "{{ route('catalogcodeitem.main.table') }}",
                },
                columns: [
                    {
                        data: 'main_code',
                        name: 'main_code',
                        className: ['text-center', 'min-tablet']
                    },
                    {
                        data: 'titlemain_code',
                        name: 'titlemain_code',
                        className: ['text-center', 'min-tablet']
                    },
                    {
                        data: 'code',
                        name: 'code',
                        className: ['text-center', 'min-tablet']
                    },
                    {
                        data: 'title_code',
                        name: 'title_code',
                        class: ['text-center', 'min-tablet']
                    },

                    {
                        data: 'sub_code',
                        name: 'sub_code',
                        class: ['text-center', 'min-tablet']
                    },

                    {
                        data: 'titlesub_code',
                        name: 'titlesub_code',
                        class: ['text-center', 'min-tablet']
                    },

                    {
                        data: 'group_code',
                        name: 'group_code',
                        class: ['text-center', 'min-tablet']
                    },

                    {
                        data: 'titlegroup_code',
                        name: 'titlegroup_code',
                        class: ['text-center', 'min-tablet']
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

            // $('#area').select2({
            //     allowClear: true,
            //     width: 'resolve',
            //     placeholder: 'Select here..',
            //     dropdownCssClass: 'bigdrop',
                
            // });
            // $('#platform').select2({
            //     allowClear: true,
            //     width: 'resolve',
            //     placeholder: 'Select here..',
            //     dropdownCssClass: 'bigdrop',
                
            // });

            // $('#flow').select2({
            //     allowClear: true,
            //     width: 'resolve',
            //     placeholder: 'Select here..',
            //     dropdownCssClass: 'bigdrop',
                
            // });

            $('.select2-catalog-dropdown').select2({
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

            $('.select2-catalog-dropdown').on('select2:close', function(e){
                let getText = $(this).find(':selected');
                var paramsData = getText[0].label;

                if (paramsData){
                    let url = $ (this).attr("data-store");
                    let dataForm = $(this).attr("data-form");
                    let dataChange = $(this).attr("data-change");
                    
                    if (url){
                        $.ajax({
                            url : url,
                            method: "POST",
                            data: {
                                _token:CSRF_TOKEN,
                                newoption: paramsData,
                                alias: $(this).attr('data-alias')
                            },
                            dataType: "json",
                            success: function (response){

                                $('#' + dataForm).val(null).trigger('change');

                                if ( dataChange == "true" ) {
                                    var option = new Option(response.message.text, response.message.text, true, true);
                                } else {
                                    var option = new Option(response.message.text, response.message.id, true, true);
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

                $('.modal-title').text('New e-Proc Item Code');
            });
        });

        // function uploadFile() {
        //     var formData = new FormData();
        //     formData.append('filexls', $('#filexls')[0].files[0]);
        //     formData.append('_token', CSRF_TOKEN);

        //     $.ajax({
        //         type: "post",
        //         url: "{{ route('psvdatamaster.import') }}",
        //         data: formData,
        //         dataType: "json",
        //         contentType: false,
        //         processData: false,
        //         enctype: "multipart/form-data",
        //         beforeSend: function() {
        //             Swal.fire({
        //                 title: 'Please wait...',
        //                 allowOutsideClick: false,
        //                 allowEscapeKey: false,
        //                 didOpen: () => {
        //                     Swal.showLoading()
        //                 },
        //             })
        //         },
        //         success: function(response) {
        //             Swal.close();
        //             toastr.success(response.message);
        //             closeUploadXlsIco.click();
        //             $('#main-table').DataTable().ajax.reload();
        //         },
        //         error: function(xhr) {
        //             Swal.close();
        //             toastr.error(xhr.responseJSON.message);
        //         }
        //     });
        // }
    </script>
@endsection