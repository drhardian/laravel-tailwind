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
            </div>
        </div>
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
                                        src="{{ asset($catalogproduct->product_image) }}" alt=""
                                        {{-- src="{{ $catalogproduct->product_image ? asset($catalogproduct->product_image) : asset('storage/assets/img/catalogproducts/default.webp') }}" alt="" --}} id="image-preview" style="max-width: 10%;" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row sm:flex">
                        <div class="sm:w-1/5 w-full mr-2">
                            <label for="itemcode"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item Code</label>
                            <div
                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @if ($catalogproduct->itemcode)
                                    <div class="form-control form-control-solid">
                                        {{ $catalogproduct->itemcode }}</div>
                                @else
                                    <div class="form-control form-control-solid">N/A</div>
                                @endif
                            </div>
                        </div>
                        <div class="sm:w-1/5 w-full mr-2">
                            <label for="productmain_code"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Main
                                Code</label>
                            <div
                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @if ($catalogproduct->productmain_code)
                                    <div class="form-control form-control-solid">
                                        {{ $catalogproduct->productmain_code }}</div>
                                @else
                                    <div class="form-control form-control-solid">N/A</div>
                                @endif
                            </div>
                        </div>
                        <div class="sm:w-1/5 w-full mr-2">
                            <label for="product_code"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code</label>
                            <div
                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @if ($catalogproduct->product_code)
                                    <div class="form-control form-control-solid">
                                        {{ $catalogproduct->product_code }}</div>
                                @else
                                    <div class="form-control form-control-solid">N/A</div>
                                @endif
                            </div>
                        </div>
                        <div class="sm:w-1/5 w-full mr-2">
                            <label for="productsub_code"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sub
                                Code</label>
                            <div
                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @if ($catalogproduct->productsub_code)
                                    <div class="form-control form-control-solid">
                                        {{ $catalogproduct->productsub_code }}</div>
                                @else
                                    <div class="form-control form-control-solid">N/A</div>
                                @endif
                            </div>
                        </div>
                        <div class="sm:w-1/5 w-full mr-2">
                            <label for="productgroup_code"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Group
                                Code</label>
                            <div
                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @if ($catalogproduct->productgroup_code)
                                    <div class="form-control form-control-solid">
                                        {{ $catalogproduct->productgroup_code }}</div>
                                @else
                                    <div class="form-control form-control-solid">N/A</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- PRODUCT INFORMATION -->
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PRODUCT
                            INFORMATION</label>
                        <div class="row sm:flex">
                            <div class="sm:w-1/2 w-full mr-2">
                                <label for="product_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                                <div
                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @if ($catalogproduct->product_name)
                                        <div class="form-control form-control-solid">
                                            {{ $catalogproduct->product_name }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                                </div>
                            </div>
                            <div class="sm:w-1/2 w-full mr-2">
                                <label for="product_brand"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                                <div
                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @if ($catalogproduct->product_brand)
                                        <div class="form-control form-control-solid">
                                            {{ $catalogproduct->product_brand }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row sm:flex">
                        {{-- <div class="sm:w-1/2 w-full mr-2">
                            <label for="product_descrip"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <div
                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @if ($catalogproduct->product_descrip)
                                    <div class="form-control form-control-solid">
                                        {{ $catalogproduct->product_descrip }}</div>
                                @else
                                    <div class="form-control form-control-solid">N/A</div>
                                @endif 
                            </div>
                        </div> --}}
                        <div class="w-full">
                            <label for="product_spec"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Specification</label>
                            <div
                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @if ($catalogproduct->product_spec)
                                    <div class="form-control form-control-solid">
                                        {{ $catalogproduct->product_spec }}</div>
                                @else
                                    <div class="form-control form-control-solid">N/A</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mb-6">
                        <div class="row sm:flex">
                            {{-- <div class="sm:w-1/3 w-full mr-2">
                                <label for="product_brand"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                                <div
                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @if ($catalogproduct->product_brand)
                                        <div class="form-control form-control-solid">
                                            {{ $catalogproduct->product_brand }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                                </div>
                            </div> --}}
                            <div class="sm:w-1/2 w-full mr-2">
                                <label for="product_uom"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UOM</label>
                                <div
                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @if ($catalogproduct->product_uom)
                                        <div class="form-control form-control-solid">
                                            {{ $catalogproduct->product_uom }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                                </div>
                            </div>
                            <div class="sm:w-1/2 w-full mr-2">
                                <label for="product_price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit
                                    Price</label>
                                <div
                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @if ($catalogproduct->product_price)
                                        <div class="form-control form-control-solid">
                                            Rp. {{ $catalogproduct->product_price }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
