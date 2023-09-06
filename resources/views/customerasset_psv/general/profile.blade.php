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
                <button type="button" id="newBtn" onclick="openForm(`{{ route('general.store') }}`)"
                    class="text-white bg-blue-700 hidden sm:block hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="fa-solid fa-print mr-2"></i>Print
                </button>
            </div>

                        <!-- LOCATION INFORMATION -->
                            <div class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
                            id="defaultTab">LOCATION INFORMATION
                            </div>
                            <div class="mb-6">
                            <div class="row sm:flex">
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="area"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Area</label>
                                        @if ($general->area)
                                            <div class="form-control form-control-solid">{{ $general->area }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                </div>
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="flow"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Flow Station</label>
                                        @if ($general->flow)
                                            <div class="form-control form-control-solid">{{ $general->flow }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                </div>
                            </div>
                            <div class="row sm:flex">
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="platform"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Platform</label>
                                        @if ($general->platform)
                                            <div class="form-control form-control-solid">{{ $general->platform }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                </div>
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="tag_number"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tag Number</label>
                                        @if ($general->tag_number)
                                            <div class="form-control form-control-solid">{{ $general->tag_number }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                </div>
                            </div>
                        </div>

                        <!-- CERTIFICATION INFORMATION -->
                        <div class="mb-6">
                            <div class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
                            id="defaultTab">CERTIFICATION INFORMATION
                            </div>
                            <div class="row sm:flex">
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="operational"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Operational</label>
                                        @if ($general->operational)
                                            <div class="form-control form-control-solid">{{ $general->operational }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                </div>
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="integrity"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Integrity Status</label>
                                        @if ($general->integrity)
                                        <div class="form-control form-control-solid">{{ $general->integrity }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                                </div>
                            </div>
                            <div class="row sm:flex">
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="cert_date"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cert
                                        Date</label>
                                        <div class="relative max-w-sm">
                                            @if ($general->cert_date)
                                                <div class="form-control form-control-solid">{{ $general->cert_date }}</div>
                                            @else
                                                <div class="form-control form-control-solid">N/A</div>
                                            @endif
                                        </div>

                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="exp_date"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Expired
                                        Date</label>
                                    <div class="relative max-w-sm">
                                        @if ($general->exp_date)
                                        <div class="form-control form-control-solid">{{ $general->exp_date }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="valve_number"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valve Number</label>
                                    <div class="relative max-w-sm">
                                        @if ($general->valve_number)
                                        <div class="form-control form-control-solid">{{ $general->valve_number }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- VALVE HISTORY -->
                        <div class="mb-6">
                            <div class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
                            id="defaultTab">VALVE HISTORY
                            </div>
                        </div>
                        <div class="row sm:flex">
                            <div class="sm:w-1/2 w-full sm:pr-2">
                                <label for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Update</label>
                                    @if ($general->status)
                                        <div class="form-control form-control-solid">{{ $general->status }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                            </div>
                            <div class="sm:w-1/2 w-full sm:pr-2">
                                <label for="deferal"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deferal</label>
                                    @if ($general->deferal)
                                    <div class="form-control form-control-solid">{{ $general->deferal }}</div>
                                @else
                                    <div class="form-control form-control-solid">N/A</div>
                                @endif
                            </div>
                        </div>
                        <div class="row sm:flex">
                            <div class="sm:w-1/2 w-full sm:pr-2">
                                <label for="resetting"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Resetting</label>
                                    @if ($general->resetting)
                                    <div class="form-control form-control-solid">{{ $general->resetting }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                                </div>
                            <div class="sm:w-1/2 w-full sm:pl-2 sm:pt-0 pt-6">
                                <label for="resize"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Resize</label>
                                    @if ($general->resize)
                                        <div class="form-control form-control-solid">{{ $general->resize }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                                </div>
                            </div>
                            <div class="row sm:flex">
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="demolish"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Demolish, Decomm, Inactive</label>
                                        @if ($general->demolish)
                                            <div class="form-control form-control-solid">{{ $general->demolish }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                    </div>
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="relief"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Relief Header</label>
                                        @if ($general->relief)
                                            <div class="form-control form-control-solid">{{ $general->relief }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                </div>
                            </div>
                            <div class="row sm:flex">
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="note"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
                                        @if ($general->note)
                                            <div class="form-control form-control-solid">{{ $general->note }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                </div>
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="cert_package"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cert Package</label>
                                        @if ($general->cert_package)
                                            <div class="form-control form-control-solid">{{ $general->cert_package }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                </div>
                            </div>
                            <div class="row sm:flex">
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="klarifikasi"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Klarifikasi</label>
                                        @if ($general->klarifikasi)
                                            <div class="form-control form-control-solid">{{ $general->klarifikasi }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                </div>
                                <div class="sm:w-1/2 w-full sm:pl-2 sm:pt-0 pt-6">
                                    <label for="by"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">By</label>
                                        @if ($general->by)
                                            <div class="form-control form-control-solid">{{ $general->by }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
