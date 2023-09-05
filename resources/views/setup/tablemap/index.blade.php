@extends('layout.index')

@section('content')
    <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl">
        <div class="p-4 mt-2">
            <h3 class="mb-2 hidden md:block text-2xl font-medium text-gray-900 dark:text-white">{{ $title }}</h3>

            <div class="flex justify-between mb-7">
                @unless (count($breadcrumbs) === 0)
                    @include('layout.breadcrumbs')
                @endunless

                <button type="button"
                    onclick="openForm(`{{ route('tablemap.store') }}`)"
                    class="text-white bg-blue-700 hidden sm:block hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="fa-solid fa-plus mr-2"></i>New
                </button>
            </div>

            <div>
                <table id="main-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Prefix</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Last Update</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- New modal -->
    <div id="newModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" role="dialog"
    aria-modal="true"
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
                    <!-- Alert Message Area -->
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
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
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
                                    <label for="prefix_title"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prefix</label>
                                    <input type="text" id="prefix_title" name="prefix_title"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="Prefix Title">
                                </div>
                                <div class="sm:w-1/2 w-full sm:pl-2 sm:pt-0 pt-6">
                                    <label for="category"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                    <input type="text" id="category" name="category"
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="Module Category">
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea 
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                placeholder="Write description here..."
                                id="description" 
                                name="description"></textarea>
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
    <script type="text/javascript" src="{{ asset('core/js/setup/tablemap/custom.js') }}"></script>
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
                bAutoWidth: false,
                ajax: {
                    url: "{{ route('tablemap.main.table') }}",
                },
                columns: [
                    {
                        data: 'prefix_title',
                        name: 'prefix_title',
                        className: 'all'
                    },
                    {
                        data: 'category',
                        name: 'category',
                        className: 'all'
                    },
                    {
                        data: 'description',
                        name: 'description',
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
                columnDefs: [
                    {
                        className: "dt-body-center",
                        target: [0,1,3,4]
                    },
                    {
                        target: [3],
                        width: "15%",
                    },
                    {
                        target: [0,1],
                        width: "20%",
                    },
                    {
                        target: [4],
                        width: "5%",
                    },
                ]
            });
        });
    </script>
@endsection
