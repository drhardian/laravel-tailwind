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
            <div class id="prodin" role="tab" aria-labelledby="prodin-tab">
                <div class="space-y-6">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-xl-4">
                            <!-- Product image card-->
                            <div class="card mb-4 mb-xl-0 text-center">
                                <div class="card-header"><b>Image Product In</b></div>
                                <div class="card-body">
                                    <!-- Product image -->
                                    <div id = "imageprofilecontainer"></div>
                                    <!-- Product image help block -->
                                    {{-- <div class="small font-italic text-muted mb-2">JPG or PNG no larger than
                                                        2
                                                        MB</div> --}}
                                    <!-- Product image input -->
                                    {{-- <input
                                                        class="form-control form-control-solid mb-3 @error('prodin_image') is-invalid @enderror"
                                                        type="file" id="image" name="prodin_image" accept="image/*"> --}}
                                    {{-- @error('prodin_image')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6">
                        <div class="row sm:flex">
                            <div class="sm:w-1/2 w- full sm:pr-2">
                                <label for="catalog_product_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                    Name</label>
                                <div
                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @if ($prodin->catalog_product_id)
                                        <div class="form-control form-control-solid">
                                            {{ $prodin->catalogProduct->product_name }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                                </div>
                            </div>
                            <div class="sm:w-1/2 w- full sm:pr-2">
                                <label for="catalog_product_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                    Code</label>
                                <div
                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @if ($prodin->catalog_product_id)
                                        <div class="form-control form-control-solid">
                                            {{ $prodin->catalogProduct->itemcode  }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <div class="row sm:flex">
                                <div class="sm:w-1/3 w- full sm:pr-2">
                                    <label for="inv_brand"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                                    <div
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @if ($prodin->catalog_product_id)
                                            <div class="form-control form-control-solid">
                                                {{ $prodin->catalogProduct->product_brand  }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="sm:w-1/3 w- full sm:pr-2">
                                    <label for="inv_category"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                    <div
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @if ($prodin->catalog_product_id)
                                            <div class="form-control form-control-solid">
                                                {{ $prodin->catalogProduct->productgroup_code  }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="sm:w-1/3 w-full sm:pr-2">
                                    <label for="inv_uom"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UOM</label>
                                    <div
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @if ($prodin->catalog_product_id)
                                            <div class="form-control form-control-solid">
                                                {{ $prodin->catalogProduct->product_uom  }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <div class="w- full">
                                <label for="inv_spec"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Specification</label>
                                <div
                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @if ($prodin->catalog_product_id)
                                        <div class="form-control form-control-solid">
                                            {{ $prodin->catalogProduct->product_spec  }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <div class="w- full">
                                <label for="prodin_actual"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Actual</label>
                                <div
                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @if ($prodin->prodin_actual)
                                        <div class="form-control form-control-solid">
                                            {{ $prodin->prodin_actual }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <div class="row sm:flex">
                                <div class="sm:w-1/3 w- full sm:pr-2">
                                    <label for="prodin_origin"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                        Origin</label>
                                    <div
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @if ($prodin->prodin_origin)
                                            <div class="form-control form-control-solid">
                                                {{ $prodin->prodin_origin }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="sm:w-1/3 w- full sm:pr-2">
                                    <label for="prodin_budgetorigin"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Budget
                                        Origin</label>
                                    <div
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @if ($prodin->prodin_budgetorigin)
                                            <div class="form-control form-control-solid">
                                                {{ $prodin->prodin_budgetorigin }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="sm:w-1/3 w- full sm:pr-2">
                                    <label for="prodin_noref"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                                        Ref</label>
                                    <div
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @if ($prodin->prodin_noref)
                                            <div class="form-control form-control-solid">
                                                {{ $prodin->prodin_noref }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <div class="row sm:flex">
                                <div class="sm:w-1/3 w- full sm:pr-2">
                                    <label for="prodin_datein"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date
                                        In</label>
                                    <div
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @if ($prodin->prodin_datein)
                                            <div class="form-control form-control-solid">
                                                {{ $prodin->prodin_datein }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="sm:w-1/3 w- full sm:pr-2">
                                    <label for="prodin_owner"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Owner</label>
                                    <div
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @if ($prodin->prodin_owner)
                                            <div class="form-control form-control-solid">
                                                {{ $prodin->prodin_owner }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="sm:w-1/3 w- full sm:pr-2">
                                    <label for="prodin_supplier"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supplier</label>
                                    <div
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @if ($prodin->prodin_supplier)
                                            <div class="form-control form-control-solid">
                                                {{ $prodin->prodin_supplier }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <div class="row sm:flex">
                                <div class="sm:w-1/2 w- full sm:pr-2">
                                    <label for="prodin_stockin"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock
                                        In</label>
                                    <div
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @if ($prodin->prodin_stockin)
                                            <div class="form-control form-control-solid">
                                                {{ $prodin->prodin_stockin }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="sm:w-1/2 w- full sm:pr-2">
                                    <label for="prodin_stockloc"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock
                                        Location</label>
                                    <div
                                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @if ($prodin->prodin_stockloc)
                                            <div class="form-control form-control-solid">
                                                {{ $prodin->prodin_stockloc }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <div class="w- full">
                                <label for="prodin_detailloc"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detail
                                    Location</label>
                                <div
                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @if ($prodin->prodin_detailloc)
                                        <div class="form-control form-control-solid">
                                            {{ $prodin->prodin_detailloc }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="w- full">
                            <label for="prodin_detailloc"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detail Location</label>
                            <textarea
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Write specification here..." id="prodin_detailloc" name="detail location"></textarea>
                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
