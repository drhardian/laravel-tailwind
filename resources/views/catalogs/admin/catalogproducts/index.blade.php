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

                    <a id="newBtn" href="{{ route('psvdatamaster.export') }}" download="exported-data.csv"
                        class="text-white bg-yellow-400 sm:block hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-md text-sm px-4 py-2 text-center md:mr-0 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                        <i class="fa-solid fa-file-export"></i> Export
                    </a>
                    <button type="button" id="newBtn" onclick="openForm(`{{ route('admin.catalogproduct.store') }}`)"
                        class="text-white bg-blue-700 sm:block hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 text-center md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <i class="fa-solid fa-plus"></i> New
                    </button>
                </div>
            </div>

            <div>
                <table id="main-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Item Code</th>
                            <th>Main Code</th>
                            <th>Code</th>
                            <th>Sub Code</th>
                            <th>Group Code</th>
                            <th>Product Name</th>
                            <th>Brand</th>
                            {{-- <th>Specification</th> --}}
                            <th>Price</th>
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
                                        aria-controls="catalog" aria-selected="false">PRODUCT</button>
                                </li>
                            </ul>
                        </div> --}}

                        <div id="myTabContent">
                            <div class id="product" role="tab" aria-labelledby="product-tab">
                                <div class="space-y-6">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-xl-4">
                                            <!-- Product image card-->
                                            <div class="card mb-4 mb-xl-0 text-center">
                                                <div class="card-header"><b>Image Product</b></div>
                                                <div class="card-body">
                                                    <!-- Product image -->
                                                    <img class="img-account-profile mb-3 mx-auto"
                                                        src="{{ asset('storage/assets/img/catalogproducts/default.webp') }}"
                                                        alt="" id="image-preview" style="max-width: 10%;" />
                                                    <!-- Product image help block -->
                                                    <div class="small font-italic text-muted mb-2">JPG or PNG no larger than
                                                        2
                                                        MB</div>
                                                    <!-- Product image input -->
                                                    <input
                                                        class="form-control form-control-solid mb-3 @error('product_image') is-invalid @enderror"
                                                        type="file" id="image" name="product_image" accept="image/*">
                                                    {{-- @error('product_image')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-6">
                                    <div class="col-xl-8">
                                        <div class="row sm:flex">
                                            <div class="sm:w-1/4 w-full mr-2" id="productmain_code_frame">
                                                {{-- <!-- ITEM CODE --> --}}
                                                <label for="productmain_code"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Main
                                                    Code</label>
                                                <select id="productmain_code" name="productmain_code"
                                                    class="select2-catalog-dropdown"
                                                    data-show="{{ route('catalog.options.showondropdown') }}"
                                                    data-store="{{ route('catalog.options.storefromdropdown') }}"
                                                    data-alias="catalog-titlemain_code" data-change="true"
                                                    data-form="product main code"></select>
                                            </div>
                                            <div class="sm:w-1/4 w-full mr-2" id="product_code_frame">
                                                <label for="product_code"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code</label>
                                                <select id="product_code" name="product_code"
                                                    class="select2-catalog-dropdown"
                                                    data-show="{{ route('catalog.options.showondropdown') }}"
                                                    data-store="{{ route('catalog.options.storefromdropdown') }}"
                                                    data-alias="catalog-title_code" data-change="true"
                                                    data-form="product code"></select>
                                            </div>
                                            <div class="sm:w-1/4 w-full mr-2" id="productsub_code_frame">
                                                <label for="productsub_code"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sub
                                                    Code</label>
                                                <select id="productsub_code" name="productsub_code"
                                                    class="select2-catalog-dropdown"
                                                    data-show="{{ route('catalog.options.showondropdown') }}"
                                                    data-store="{{ route('catalog.options.storefromdropdown') }}"
                                                    data-alias="catalog-titlesub_code" data-change="true"
                                                    data-form="product sub code"></select>
                                            </div>
                                            <div class="sm:w-1/4 w-full mr-2" id="productgroup_code_frame">
                                                <label for="productgroup_code"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Group
                                                    Code</label>
                                                <select id="productgroup_code" name="productgroup_code"
                                                    class="select2-catalog-dropdown"
                                                    data-show="{{ route('catalog.options.showondropdown') }}"
                                                    data-store="{{ route('catalog.options.storefromdropdown') }}"
                                                    data-alias="catalog-titlegroup_code" data-change="true"
                                                    data-form="product group code"></select>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- </div> --}}
                                    <!-- PRODUCT INFORMATION -->
                                    <div class="space-y-6">
                                        <div class="mb-6">
                                            <label
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PRODUCT
                                                INFORMATION</label>
                                            <div class="row sm:flex">
                                                <div class="sm:w-1/2 w-full mr-2">
                                                    <label for="product_name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                                        Name</label>
                                                    <input type="text" id="product_name" name="product_name"
                                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required placeholder="product name">
                                                </div>
                                                <div class="sm:w-1/2 w-full mr-2">
                                                    <label for="product_brand"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                                                    <input type="text" id="product_brand" name="product_brand"
                                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required placeholder="brand">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row sm:flex">
                                            {{-- <div class="sm:w-1/2 w-full mr-2">
                                                    <label for="product_descrip"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                                    <input type="text" id="product_descrip" name="product_descrip"
                                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required placeholder="description">
                                                </div> --}}
                                            <div class="w-full">
                                                <label for="product_spec"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Specification</label>
                                                <textarea
                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Write specification here..." id="product_spec" name="product_spec"></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <div class="row sm:flex">
                                                {{-- <div class="sm:w-1/3 w-full mr-2">
                                                        <label for="product_brand"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                                                        <input type="text" id="product_brand" name="product_brand"
                                                            class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            required placeholder="brand">
                                                    </div> --}}
                                                <div class="sm:w-1/2 w-full mr-2">
                                                    <label for="product_uom"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UOM</label>
                                                    <select id="product_uom" name="product_uom"
                                                        class="select2-general-dropdown"
                                                        data-show="{{ route('general.options.showondropdown') }}"
                                                        data-store="{{ route('general.options.storefromdropdown') }}"
                                                        data-alias="catalog-product_uom" data-change="true"
                                                        data-form="product group code"></select>
                                                </div>
                                                <div class="sm:w-1/2 w-full mr-2">
                                                    <label for="product_price"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit
                                                        Price</label>
                                                    <input type="number" id="product_price" name="product_price"
                                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required placeholder="price">
                                                </div>
                                            </div>
                                        </div>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js">
    </script>
    <script type="text/javascript" src="{{ asset('core/js/catalog/catalogproduct-custom.js') }}"></script>
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
                    url: "{{ route('admin.catalogproduct.main.table') }}",
                },
                columns: [{
                        data: 'product_image',
                        name: 'product_image',
                        className: ['text-center', 'min-tablet']
                    },
                    {
                        data: 'itemcode',
                        name: 'itemcode',
                        className: ['text-center', 'min-tablet']
                    },
                    {
                        data: 'productmain_code',
                        name: 'productmain_code',
                        className: ['text-center', 'min-tablet']
                    },
                    {
                        data: 'product_code',
                        name: 'product_code',
                        class: ['text-center', 'min-tablet']
                    },
                    {
                        data: 'productsub_code',
                        name: 'productsub_code',
                        class: ['text-center', 'min-tablet']
                    },
                    {
                        data: 'productgroup_code',
                        name: 'productgroup_code',
                        class: ['text-center', 'min-tablet']
                    },
                    {
                        data: 'product_name',
                        name: 'product_name',
                        class: 'all'
                    },
                    {
                        data: 'product_brand',
                        name: 'product_brand',
                        class: 'all'
                    },
                    // {
                    //     data: 'product_descrip',
                    //     name: 'product_descrip',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'product_spec',
                    //     name: 'product_spec',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'product_brand',
                    //     name: 'product_brand',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'product_uom',
                    //     name: 'product_uom',
                    //     class: 'all'
                    // },
                    {
                        data: 'product_price',
                        name: 'product_price',
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

            $('.select2-catalog-dropdown').on('select2:close', function(e) {
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

                $('.modal-title').text('New e-Proc Item Code');
            });
        });

        function uploadFile() {
            var formData = new FormData();
            formData.append('filexls', $('#filexls')[0].files[0]);
            formData.append('_token', CSRF_TOKEN);

            $.ajax({
                type: "post",
                url: "{{ route('psvdatamaster.import') }}",
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
