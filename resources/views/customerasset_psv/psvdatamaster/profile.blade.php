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
                <button type="button" id="newBtn" onclick="openForm(`{{ route('psvdatamaster.store') }}`)"
                    class="text-white bg-blue-700 hidden sm:block hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="fa-solid fa-print mr-2"></i>Print
                </button>
            </div>
        </div>

        <div class="flex flex-wrap text-sm font-medium text-center text-blue-500 border-b border-blue-200 rounded-t-lg bg-blue-50 dark:border-blue-700 dark:text-blue-400 dark:bg-blue-800 w-full"
            id="defaultTab">GENERAL INFORMATION
        </div>   
        <!-- LOCATION INFORMATION -->
            <div class="mb-6">
                <div class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
                id="defaultTab">LOCATION INFORMATION
                </div>
                <div class="row sm:flex">
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="area"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Area</label>
                            @if ($psvdatamaster->area)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->area }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="flow"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Flow Station</label>
                            @if ($psvdatamaster->flow)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->flow }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="platform"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Platform</label>
                            @if ($psvdatamaster->platform)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->platform }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="tag_number"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tag Number</label>
                            @if ($psvdatamaster->tag_number)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->tag_number }}</div>
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
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="operational"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Operational</label>
                            @if ($psvdatamaster->operational)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->operational }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="integrity"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Integrity Status</label>
                            @if ($psvdatamaster->integrity)
                            <div class="form-control form-control-solid">{{ $psvdatamaster->integrity }}</div>
                        @else
                            <div class="form-control form-control-solid">N/A</div>
                        @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="cert_date"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cert
                            Date</label>
                            <div class="relative max-w-sm">
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
                        <div class="relative max-w-sm">
                            @if ($psvdatamaster->exp_date)
                            <div class="form-control form-control-solid">{{ $psvdatamaster->exp_date }}</div>
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
                            @if ($psvdatamaster->valve_number)
                            <div class="form-control form-control-solid">{{ $psvdatamaster->valve_number }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                        </div>
                </div>
            </div>

        <!-- VALVE HISTORY -->
            <div class="mb-6">
                <div class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
                id="defaultTab">VALVE HISTORY
                </div>
                <div class="row sm:flex">
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="status"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Update</label>
                            @if ($psvdatamaster->status)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->status }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="deferal"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deferal</label>
                            @if ($psvdatamaster->deferal)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->deferal }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="resetting"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Resetting</label>
                            @if ($psvdatamaster->resetting)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->resetting }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pl-2">
                        <label for="resize"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Resize</label>
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
                            @if ($psvdatamaster->demolish)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->demolish }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="relief"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Relief Header</label>
                            @if ($psvdatamaster->relief)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->relief }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="note"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
                            @if ($psvdatamaster->note)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->note }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="cert_package"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cert Package</label>
                            @if ($psvdatamaster->cert_package)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->cert_package }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                </div>
                <div class="row sm:flex">
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="klarifikasi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Klarifikasi</label>
                            @if ($psvdatamaster->klarifikasi)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->klarifikasi }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pl-2">
                        <label for="by"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">By</label>
                            @if ($psvdatamaster->by)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->by }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                </div>


        <div class="flex flex-wrap text-sm font-medium text-center text-blue-500 border-b border-blue-200 rounded-t-lg bg-blue-50 dark:border-blue-700 dark:text-blue-400 dark:bg-blue-800 w-full"
            id="defaultTab">VALVE INFORMATION
        </div> 
        {{-- VALVE INFORMATION --}}
            <div class="mb-6"> 
                <div class="row sm:flex">
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="manufacture"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Manufacture</label>
                            @if ($psvdatamaster->manufacture)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->manufacture }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pl-2">
                        <label for="model_number"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model Number</label>
                            @if ($psvdatamaster->model_number)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->model_number }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="serial_number"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial Number</label>
                            @if ($psvdatamaster->serial_number)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->serial_number }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="size_in"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size In</label>
                            @if ($psvdatamaster->size_in)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->size_in }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                </div>
            </div>
            <div class="mb-6"> 
                <div class="row sm:flex">
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="rating_in"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating In</label>
                            @if ($psvdatamaster->rating_in)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->rating_in }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="size_out"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size Out</label>
                            @if ($psvdatamaster->size_out)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->size_out }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="rating_out"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating Out</label>
                            @if ($psvdatamaster->rating_out)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->rating_out }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="press"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Press. Setting (psi)</label>
                            @if ($psvdatamaster->press)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->press }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                </div>
            </div>
            <div class="mb-6">
                <div class="row sm:flex">
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="vacuum"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vacuum Setting (psi)</label>
                            @if ($psvdatamaster->vacuum)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->vacuum }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="psv"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PSV Style</label>
                            @if ($psvdatamaster->psv)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->psv }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="design"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Orifice Design</label>
                            @if ($psvdatamaster->design)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->design }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="selection"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Orifice Selection</label>
                            @if ($psvdatamaster->selection)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->selection}}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                </div>
            </div>
            <div class="mb-6">
                <div class="row sm:flex">
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="psv_capacity"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PSV Capacity</label>
                            @if ($psvdatamaster->psv_capacity)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->psv_capacity}}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="psv_capacityunit"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PSV Capacity Unit</label>
                            @if ($psvdatamaster->psv_capacityunit)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->psv_capacityunit}}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="bonnet"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bonnet Type</label>
                            @if ($psvdatamaster->bonnet)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->bonnet}}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="seat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seat Type</label>
                            @if ($psvdatamaster->seat)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->Seat}}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                </div>
            </div>
            <div class="mb-6">
                <div class="row sm:flex">
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="CAP"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CAP Type</label>
                            @if ($psvdatamaster->CAP)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->CAP}}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="body_bonnet"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body Bonnet Material</label>
                            @if ($psvdatamaster->body_bonnet)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->body_bonnet}}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="disc_material"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Disc Material</label>
                            @if ($psvdatamaster->disc_material)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->disc_material}}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="spring_material"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Spring Material</label>
                            @if ($psvdatamaster->spring_material)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->spring_material}}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                </div>
            </div>
            <div class="mb-6">
                <div class="row sm:flex">
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="guide_material"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Guide Material</label>
                            @if ($psvdatamaster->guide_material)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->guide_material}}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="resilient_seat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Resilient Seat</label>
                            @if ($psvdatamaster->resilient_seat)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->resilient_seat}}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="bellow_material"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bellow Material</label>
                            @if ($psvdatamaster->bellow_material)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->bellow_material}}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                    </div>
                </div>
            </div>
            <div class="mb-6">
                <div class="row sm:flex">
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="year_build"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year Build</label>
                            <div class="relative max-w-sm">
                                @if ($psvdatamaster->year_build)
                                    <div class="form-control form-control-solid">{{ $psvdatamaster->year_build}}</div>
                                @else
                                    <div class="form-control form-control-solid">N/A</div>
                                @endif
                            </div>
                    </div>
                    <div class="sm:w-1/4 w-full sm:pr-2">
                        <label for="year_install"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year Install</label>
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

        <div class="flex flex-wrap text-sm font-medium text-center text-blue-500 border-b border-blue-200 rounded-t-lg bg-blue-50 dark:border-blue-700 dark:text-blue-400 dark:bg-blue-800 w-full"
            id="defaultTab">PROCESS CONDITION
        </div> 
        {{-- PROCESS CONDITION --}}
        <div class="mb-6">
            <div class="row sm:flex">
                <div class="sm:w-1/4 w-full sm:pr-2">
                    <label for="service"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service</label>
                        @if ($psvdatamaster->service)
                             <div class="form-control form-control-solid">{{ $psvdatamaster->service }}</div>
                         @else
                             <div class="form-control form-control-solid">N/A</div>
                         @endif
                 </div>
                <div class="sm:w-1/4 w-full sm:pl-2">
                    <label for="equip_number"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Equipment Number</label>
                        @if ($psvdatamaster->equip_number)
                             <div class="form-control form-control-solid">{{ $psvdatamaster->equip_number }}</div>
                         @else
                             <div class="form-control form-control-solid">N/A</div>
                         @endif
                </div>
                <div class="sm:w-1/4 w-full sm:pr-2">
                    <label for="pid"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">P&ID</label>
                        @if ($psvdatamaster->pid)
                             <div class="form-control form-control-solid">{{ $psvdatamaster->pid }}</div>
                         @else
                             <div class="form-control form-control-solid">N/A</div>
                         @endif
                </div>
                <div class="sm:w-1/4 w-full sm:pr-2">
                    <label for="size_basic"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size Basic</label>
                        @if ($psvdatamaster->size_basic)
                             <div class="form-control form-control-solid">{{ $psvdatamaster->size_basic }}</div>
                         @else
                             <div class="form-control form-control-solid">N/A</div>
                         @endif
                </div>
            </div>
        </div>
        <div class="mb-6">
            <div class="row sm:flex">
                <div class="sm:w-1/4 w-full sm:pr-2">
                    <label for="size_code"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size Code</label>
                        @if ($psvdatamaster->size_code)
                            <div class="form-control form-control-solid">{{ $psvdatamaster->size_code }}</div>
                        @else
                            <div class="form-control form-control-solid">N/A</div>
                        @endif
                </div>
                <div class="sm:w-1/4 w-full sm:pr-2">
                    <label for="fluid"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fluid</label>
                        @if ($psvdatamaster->fluid)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->fluid }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                </div>
                <div class="sm:w-1/4 w-full sm:pr-2">
                    <label for="required"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Required Capacity</label>
                        @if ($psvdatamaster->required)
                            <div class="form-control form-control-solid">{{ $psvdatamaster->required }}</div>
                        @else
                            <div class="form-control form-control-solid">N/A</div>
                        @endif
                </div>
                <div class="sm:w-1/4 w-full sm:pr-2">
                    <label for="capacity_unit"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Capacity Unit</label>
                        @if ($psvdatamaster->capacity_unit)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->capacity_unit }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                </div>
            </div>
        </div>
        <div class="mb-6">
            <div class="row sm:flex">
                <div class="sm:w-1/4 w-full sm:pr-2">
                    <label for="mawp"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MAWP (psi)</label>
                        @if ($psvdatamaster->mawp)
                            <div class="form-control form-control-solid">{{ $psvdatamaster->mawp }}</div>
                        @else
                            <div class="form-control form-control-solid">N/A</div>
                        @endif
                </div>
                <div class="sm:w-1/4 w-full sm:pr-2">
                    <label for="operating_psi"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Operating Pressure (psi)</label>
                        @if ($psvdatamaster->operating_psi)
                            <div class="form-control form-control-solid">{{ $psvdatamaster->operating_psi }}</div>
                        @else
                            <div class="form-control form-control-solid">N/A</div>
                        @endif
                </div>
                <div class="sm:w-1/4 w-full sm:pr-2">
                    <label for="back_psi"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Back Pressure (psi)</label>
                            @if ($psvdatamaster->back_psi)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->back_psi }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                </div>
                <div class="sm:w-1/4 w-full sm:pr-2">
                    <label for="operating_temp"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Operating Temp. (°F)</label>
                            @if ($psvdatamaster->operating_temp)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->operating_temp }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                </div>
            </div>
        </div>
        <div class="mb-6">
            <div class="row sm:flex">
                <div class="sm:w-1/4 w-full sm:pr-2">
                    <label for="cold_diff"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cold Diff. Test Press (psi)</label>
                            @if ($psvdatamaster->cold_diff)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->cold_diff }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                </div>
                <div class="sm:w-1/4 w-full sm:pr-2">
                    <label for="allowable"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Allowable Over Press. (%)</label>
                        @if ($psvdatamaster->allowable)
                            <div class="form-control form-control-solid">{{ $psvdatamaster->allowable }}</div>
                        @else
                            <div class="form-control form-control-solid">N/A</div>
                        @endif
                </div>
            </div>
        </div>

        <div class="flex flex-wrap text-sm font-medium text-center text-blue-500 border-b border-blue-200 rounded-t-lg bg-blue-50 dark:border-blue-700 dark:text-blue-400 dark:bg-blue-800 w-full"
            id="defaultTab">CONDITION REPLACEMENT
        </div> 
        {{-- CONDITION REPLACEMENT --}}
        <div class="mb-6">
            <div class="row sm:flex">
                <div class="sm:w-1/4 w-full sm:pr-2">
                    <label for="shutdown"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Shutdown Category</label>
                         @if ($psvdatamaster->shutdown)
                             <div class="form-control form-control-solid">{{ $psvdatamaster->shutdown }}</div>
                         @else
                             <div class="form-control form-control-solid">N/A</div>
                         @endif
                </div>
                <div class="sm:w-1/4 w-full sm:pl-2">
                    <label for="valve_upstream"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isolation Valve Upstream</label>
                         @if ($psvdatamaster->valve_upstream)
                             <div class="form-control form-control-solid">{{ $psvdatamaster->valve_upstream }}</div>
                         @else
                             <div class="form-control form-control-solid">N/A</div>
                         @endif
                </div>
                <div class="sm:w-1/4 w-full sm:pr-2">
                    <label for="psvdatamaster_upstream"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Condition Upstream BV</label>
                         @if ($psvdatamaster->psvdatamaster_upstream)
                             <div class="form-control form-control-solid">{{ $psvdatamaster->psvdatamaster_upstream }}</div>
                         @else
                             <div class="form-control form-control-solid">N/A</div>
                         @endif
                </div>
                <div class="sm:w-1/4 w-full sm:pr-2">
                    <label for="valve_downstream"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isolation Valve Downstrm</label>
                         @if ($psvdatamaster->valve_downstream)
                             <div class="form-control form-control-solid">{{ $psvdatamaster->valve_downstream }}</div>
                         @else
                             <div class="form-control form-control-solid">N/A</div>
                         @endif
                </div>
            </div>
        </div>
        <div class="mb-6">
            <div class="row sm:flex">
                <div class="sm:w-1/4 w-full sm:pr-2">
                    <label for="psvdatamaster_downstream"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Condition Downstrm BV</label>
                         @if ($psvdatamaster->psvdatamaster_downstream)
                             <div class="form-control form-control-solid">{{ $psvdatamaster->psvdatamaster_downstream }}</div>
                         @else
                             <div class="form-control form-control-solid">N/A</div>
                         @endif
                </div>
                <div class="sm:w-1/4 w-full sm:pr-2">
                    <label for="scaffolding"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Scaffolding Req.</label>
                            @if ($psvdatamaster->scaffolding)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->scaffolding }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                </div>
                <div class="sm:w-1/4 w-full sm:pr-2">
                    <label for="spacer_inlet"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Use Spacer Inlet</label>
                            @if ($psvdatamaster->spacer_inlet)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->spacer_inlet }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                </div>
                <div class="sm:w-1/4 w-full sm:pr-2">
                    <label for="spacer_outlet"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Use Spacer Outlet</label>
                            @if ($psvdatamaster->spacer_outlet)
                                <div class="form-control form-control-solid">{{ $psvdatamaster->spacer_outlet }}</div>
                            @else
                                <div class="form-control form-control-solid">N/A</div>
                            @endif
                </div>
            </div>
        </div>
    </div>
@endsection
