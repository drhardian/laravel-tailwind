@extends('layout.index')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css">
@endsection

@section('content')
    <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl">
        {{-- <div class="p-4 mt-2">
            <h3 class="mb-2 hidden md:block text-2xl font-medium text-gray-900 dark:text-white">{{ $title }}</h3>

            <div class="flex justify-between mb-7">
                @unless (count($breadcrumbs) === 0)
                    @include('layout.breadcrumbs')
                @endunless
                <a href="{{ route('psvdatamaster.pdf', ['id' => $psvdatamaster->id]) }}" class="text-white bg-blue-700 hidden sm:block hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="fa-solid fa-print mr-2"></i>
                    Print
                </a>
            </div>
        </div> --}}

        <div>
            <div class="flex justify-center mt-5">
                <div
                    class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <!-- Tab Panel -->
                    {{-- <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                            data-tabs-toggle="#myTabContent" role="tablist">
                            <li class="mr-2" role="presentation">
                                <button
                                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    id="general-tab" data-tabs-target="#general" type="button" role="tab"
                                    aria-controls="general" aria-selected="false">GENERAL INFORMATION</button>
                            </li>
                            <li class="mr-2" role="presentation">
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
                            </li>
                        </ul>
                    </div> --}}

                    <div id="myTabContent">
                        <!-- GENERAL INFORMATION -->
                        <div class id="general" role="tab" aria-labelledby="general-tab">
                            <div class="space-y-6">
                                <!-- LOCATION INFORMATION -->
                                <div class="mb-6">
                                    <label class="block mb-2 text-sm font-medium text-blue-900 dark:text-white">LOCATION INFORMATION</label>
                                    <div class="row sm:flex">
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="area"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Area</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->area)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->area }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="flow"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Flow Station</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->flow)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->flow }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="platform"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Platform</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->platform)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->platform }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="tag_number"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tag Number</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->tag_number)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->tag_number }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- CERTIFICATION INFORMATION -->
                                <div class="mb-6">
                                    <label class="block mb-2 text-sm font-medium text-blue-900 dark:text-white">CERTIFICATION INFORMATION</label>
                                    <div class="mb-6">
                                        <label for="operational"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Operational</label>
                                            <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @if ($psvdatamaster->operational)
                                                    <div class="form-control form-control-solid">{{ $psvdatamaster->operational }}</div>
                                                @else
                                                    <div class="form-control form-control-solid">N/A</div>
                                                @endif
                                            </div>
                                    </div>
                                    <div class="row sm:flex">
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="integrity"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Integrity Status</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->integrity)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->integrity }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="cert_date"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cert
                                                Date</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->cert_date)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->cert_date }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="exp_date"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Expired
                                                Date</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @if ($psvdatamaster->exp_date)
                                                    <div class="form-control form-control-solid">{{ $psvdatamaster->exp_date }}</div>
                                                @else
                                                    <div class="form-control form-control-solid">N/A</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="valve_number"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valve Number</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->valve_number)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->valve_number }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <label for="cert_doc"
                                            divclass="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Certificate Document</label>
                                            <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @if($psvdatamaster->cert_doc)
                                                    <a href="{{ asset($psvdatamaster->cert_doc) }}" target="_blank"><button class="btn btn-success">Download</button></a>
                                                @else
                                                    No Document Available
                                                @endif
                                            </div>
                                    </div>
                                </div>

                                <!-- VALVE HISTORY -->
                                <div class="mb-6 space-y-5">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">VALVE HISTORY</label>
                                    <div class="row sm:flex">
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="status"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Update</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->status)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->status }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="deferal"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deferal</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->deferal)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->deferal }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="resetting"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Resetting</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->resetting)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->resetting }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pl-2">
                                                <label for="resize"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Resize</label>
                                                    <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        @if ($psvdatamaster->resize)
                                                            <div class="form-control form-control-solid">{{ $psvdatamaster->resize }}</div>
                                                        @else
                                                            <div class="form-control form-control-solid">N/A</div>
                                                        @endif
                                                    </div>
                                        </div>
                                    </div>
                                    <div class="row sm:flex">
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="demolish"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Demolish, Decomm, Inactive</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->demolish)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->demolish }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="relief"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Relief Header</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->relief)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->relief }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="note"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->note)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->note }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="cert_package"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cert Package</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->cert_package)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->cert_package }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row sm:flex">
                                        <div class="sm:w-1/2 w-full sm:pr-2">
                                            <label for="klarifikasi"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Klarifikasi</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->klarifikasi)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->klarifikasi }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/2 w-full sm:pl-2 sm:pt-0 pt-6">
                                            <label for="by"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">By</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->by)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->by }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- VALVE INFORMATION -->
                        <div class id="valve" role="tab" aria-labelledby="valve-tab">
                            <div class="space-y-6">
                                <div class="mb-6">
                                    <label class="block mb-2 text-sm font-medium text-blue-900 dark:text-white">VALVE INFORMATION</label>
                                <div class="row sm:flex">
                                    <div class="sm:w-1/3 w-full sm:pr-2">
                                        <label for="manufacture"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Manufacture</label>
                                            <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @if ($psvdatamaster->manufacture)
                                                    <div class="form-control form-control-solid">{{ $psvdatamaster->manufacture }}</div>
                                                @else
                                                    <div class="form-control form-control-solid">N/A</div>
                                                @endif
                                            </div>
                                    </div>
                                    <div class="sm:w-1/3 w-full sm:pr-2">
                                        <label for="model_number"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model Number</label>
                                            <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @if ($psvdatamaster->model_number)
                                                    <div class="form-control form-control-solid">{{ $psvdatamaster->model_number }}</div>
                                                @else
                                                    <div class="form-control form-control-solid">N/A</div>
                                                @endif
                                            </div>
                                    </div>
                                    <div class="sm:w-1/3 w-full sm:pr-2">
                                        <label for="serial_number"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial Number</label>
                                            <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @if ($psvdatamaster->serial_number)
                                                    <div class="form-control form-control-solid">{{ $psvdatamaster->serial_number }}</div>
                                                @else
                                                    <div class="form-control form-control-solid">N/A</div>
                                                @endif
                                            </div>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <div class="row sm:flex">
                                        <div class="sm:w-1/3 w-full sm:pr-2">
                                            <label for="size_in"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size In</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->size_in)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->size_in }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/3 w-full sm:pr-2">
                                            <label for="rating_in"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating In</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->rating_in)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->rating_in }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/3 w-full sm:pr-2">
                                            <label for="condi_in"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Connection In</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->condi_in)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->condi_in }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <div class="row sm:flex">
                                        <div class="sm:w-1/3 w-full sm:pr-2">
                                            <label for="size_out"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size Out</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->size_out)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->size_out }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/3 w-full sm:pr-2">
                                            <label for="rating_out"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating Out</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->rating_out)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->rating_out }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/3 w-full sm:pr-2">
                                            <label for="condi_out"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Connection  Out</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->condi_out)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->condi_out }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex">
                                            <div class="sm:w-1/4 w-full sm:pr-2">
                                                <label for="press"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Press. Setting (psi)</label>
                                                    <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        @if ($psvdatamaster->press)
                                                            <div class="form-control form-control-solid">{{ $psvdatamaster->press }}</div>
                                                        @else
                                                            <div class="form-control form-control-solid">N/A</div>
                                                        @endif
                                                    </div>
                                            </div>
                                            <div class="sm:w-1/4 w-full sm:pr-2">
                                                <label for="vacuum"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vacuum Setting (psi)</label>
                                                    <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        @if ($psvdatamaster->vacuum)
                                                            <div class="form-control form-control-solid">{{ $psvdatamaster->vacuum }}</div>
                                                        @else
                                                            <div class="form-control form-control-solid">N/A</div>
                                                        @endif
                                                    </div>
                                            </div>
                                            <div class="sm:w-1/4 w-full sm:pr-2">
                                                <label for="psv"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PSV Style</label>
                                                    <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        @if ($psvdatamaster->psv)
                                                            <div class="form-control form-control-solid">{{ $psvdatamaster->psv }}</div>
                                                        @else
                                                            <div class="form-control form-control-solid">N/A</div>
                                                        @endif
                                                    </div>
                                            </div>
                                            <div class="sm:w-1/4 w-full sm:pr-2">
                                                <label for="design"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Orifice Design</label>
                                                    <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        @if ($psvdatamaster->design)
                                                            <div class="form-control form-control-solid">{{ $psvdatamaster->design }}</div>
                                                        @else
                                                            <div class="form-control form-control-solid">N/A</div>
                                                        @endif
                                                    </div>
                                            </div>
                                            <div class="sm:w-1/4 w-full sm:pr-2">
                                                <label for="selection"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Orifice Selection</label>
                                                    <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        @if ($psvdatamaster->selection)
                                                            <div class="form-control form-control-solid">{{ $psvdatamaster->selection}}</div>
                                                        @else
                                                            <div class="form-control form-control-solid">N/A</div>
                                                        @endif
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex">
                                            <div class="sm:w-1/4 w-full sm:pr-2">
                                                <label for="psv_capacity"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PSV Capacity</label>
                                                    <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        @if ($psvdatamaster->psv_capacity)
                                                            <div class="form-control form-control-solid">{{ $psvdatamaster->psv_capacity}}</div>
                                                        @else
                                                            <div class="form-control form-control-solid">N/A</div>
                                                        @endif
                                                    </div>
                                            </div>
                                            <div class="sm:w-1/4 w-full sm:pr-2">
                                                <label for="psv_capacityunit"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PSV Capacity Unit</label>
                                                    <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        @if ($psvdatamaster->psv_capacityunit)
                                                            <div class="form-control form-control-solid">{{ $psvdatamaster->psv_capacityunit}}</div>
                                                        @else
                                                            <div class="form-control form-control-solid">N/A</div>
                                                        @endif
                                                    </div>
                                            </div>
                                            <div class="sm:w-1/4 w-full sm:pr-2">
                                                <label for="bonnet"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bonnet Type</label>
                                                    <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        @if ($psvdatamaster->bonnet)
                                                            <div class="form-control form-control-solid">{{ $psvdatamaster->bonnet}}</div>
                                                        @else
                                                            <div class="form-control form-control-solid">N/A</div>
                                                        @endif
                                                    </div>
                                            </div>
                                            <div class="sm:w-1/4 w-full sm:pr-2">
                                                <label for="seat"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seat Type</label>
                                                    <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        @if ($psvdatamaster->seat)
                                                            <div class="form-control form-control-solid">{{ $psvdatamaster->seat}}</div>
                                                        @else
                                                            <div class="form-control form-control-solid">N/A</div>
                                                        @endif
                                                    </div>
                                            </div>
                                            <div class="sm:w-1/4 w-full sm:pr-2">
                                                <label for="CAP"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CAP Type</label>
                                                    <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        @if ($psvdatamaster->CAP)
                                                            <div class="form-control form-control-solid">{{ $psvdatamaster->CAP}}</div>
                                                        @else
                                                            <div class="form-control form-control-solid">N/A</div>
                                                        @endif
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex">
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="body_bonnet"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body Bonnet Material</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->body_bonnet)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->body_bonnet}}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="disc_material"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Disc Material</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->disc_material)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->disc_material}}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="spring_material"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Spring Material</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->spring_material)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->spring_material}}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="guide_material"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Guide Material</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->guide_material)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->guide_material}}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <div class="row sm:flex">
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="resilient_seat"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Resilient Seat</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->resilient_seat)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->resilient_seat}}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="bellow_material"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bellow Material</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->bellow_material)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->bellow_material}}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="year_build"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year Build</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <div class="relative max-w-sm">
                                                        @if ($psvdatamaster->year_build)
                                                            <div class="form-control form-control-solid">{{ $psvdatamaster->year_build}}</div>
                                                        @else
                                                            <div class="form-control form-control-solid">N/A</div>
                                                        @endif
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="year_install"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year Install</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <div class="relative max-w-sm">
                                                        @if ($psvdatamaster->year_install)
                                                            <div class="form-control form-control-solid">{{ $psvdatamaster->year_install}}</div>
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
                        
                        <!-- PROCESS CONDITION -->
                        <div class id="process" role="tab" aria-labelledby="process-tab">
                            <div class="space-y-6">
                                <div class="mb-6">
                                    <label class="block mb-2 text-sm font-medium text-blue-900 dark:text-white">PROCESS CONDITION</label>
                                <div class="mb-6">
                                    <div class="row sm:flex">
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="service"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->service)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->service }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="equip_number"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Equipment Number</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->equip_number)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->equip_number }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="pid"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">P&ID</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->pid)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->pid }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="size_basic"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size Basic</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->size_basic)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->size_basic }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <div class="row sm:flex">
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="size_code"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size Code</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->size_code)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->size_code }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="fluid"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fluid</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->fluid)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->fluid }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="required"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Required Capacity</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->required)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->required }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="capacity_unit"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Capacity Unit</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->capacity_unit)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->capacity_unit }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <div class="row sm:flex">
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="mawp"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MAWP (psi)</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->mawp)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->mawp }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                                <label for="operating_psi"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Operating Pressure (psi)</label>
                                                    <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        @if ($psvdatamaster->operating_psi)
                                                            <div class="form-control form-control-solid">{{ $psvdatamaster->operating_psi }}</div>
                                                        @else
                                                            <div class="form-control form-control-solid">N/A</div>
                                                        @endif
                                                    </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                            <label for="back_psi"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Back Pressure (psi)</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->back_psi)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->back_psi }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/4 w-full sm:pr-2">
                                                <label for="operating_temp"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Operating Temp. (°F)</label>
                                                    <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        @if ($psvdatamaster->operating_temp)
                                                            <div class="form-control form-control-solid">{{ $psvdatamaster->operating_temp }}</div>
                                                        @else
                                                            <div class="form-control form-control-solid">N/A</div>
                                                        @endif
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <div class="row sm:flex">
                                        <div class="sm:w-1/2 w-full sm:pr-2">
                                            <label for="cold_diff"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cold Diff. Test Press (psi)</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->cold_diff)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->cold_diff }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/2 w-full sm:pr-2">
                                            <label for="allowable"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Allowable Over Press. (%)</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->allowable)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->allowable }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CONDITION REPLACEMENT -->
                        <div class id="condi" role="tab" aria-labelledby="condi-tab">
                            <div class="space-y-6">
                                <div class="mb-6">
                                    <label class="block mb-2 text-sm font-medium text-blue-900 dark:text-white">CONDITION REPLACEMENT</label>
                                <div class="mb-6">
                                    <div class="row sm:flex">
                                        <div class="sm:w-1/2 w-full sm:pr-2">
                                            <label for="shutdown"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Shutdown Category</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->shutdown)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->shutdown }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/2 w-full sm:pl-2 sm:pt-0 pt-6">
                                            <label for="valve_upstream"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isolation Valve Upstream</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->valve_upstream)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->valve_upstream }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <div class="row sm:flex">
                                        <div class="sm:w-1/2 w-full sm:pr-2">
                                            <label for="condi_upstream"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Condition Upstream BV</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->condi_upstream)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->condi_upstream }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/2 w-full sm:pr-2">
                                            <label for="valve_downstream"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isolation Valve Downstrm</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->valve_downstream)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->valve_downstream }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <div class="row sm:flex">
                                        <div class="sm:w-1/2 w-full sm:pr-2">
                                            <label for="condi_downstream"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Condition Downstrm BV</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->condi_downstream)
                                                            <div class="form-control form-control-solid">{{ $psvdatamaster->condi_downstream }}</div>
                                                        @else
                                                            <div class="form-control form-control-solid">N/A</div>
                                                        @endif
                                                    </div>
                                        </div>
                                        <div class="sm:w-1/2 w-full sm:pr-2">
                                            <label for="scaffolding"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Scaffolding Req.</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        @if ($psvdatamaster->scaffolding)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->scaffolding }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <div class="row sm:flex">
                                        <div class="sm:w-1/2 w-full sm:pr-2">
                                            <label for="spacer_inlet"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Use Spacer Inlet</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        @if ($psvdatamaster->spacer_inlet)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->spacer_inlet }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="sm:w-1/2 w-full sm:pr-2">
                                            <label for="spacer_outlet"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Use Spacer Outlet</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($psvdatamaster->spacer_outlet)
                                                        <div class="form-control form-control-solid">{{ $psvdatamaster->spacer_outlet }}</div>
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
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/datepicker.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
    <script type="text/javascript" src="{{ asset('core/js/customerasset_psv/psvdatamaster-custom.js') }}"></script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#area').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                
            });
            $('#platform').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                
            });

            $('#flow').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                
            });

            $('#status').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                
            });

            $('#demolish').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                
            });

            $('#relief').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                
            });

            $('#size_in').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                
            });

            $('#rating_in').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                
            });

            $('#size_out').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                
            });

            $('#rating_out').select2({
                allowClear: true,
                width: 'resolve',
                placeholder: 'Select here..',
                dropdownCssClass: 'bigdrop',
                
            });

            $('#newBtn').on('click', function(e) {
                e.preventDefault();

                $('.modal-title').text('New PSV Data Master');
            });
    </script>
@endsection