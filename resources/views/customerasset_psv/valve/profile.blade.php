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
                    <i class="fa-solid fa-print mr-2"></i>New
                </button>
            </div>
            </div>
                <div class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
                id="defaultTab">VALVE INFORMATION
                </div>
                            <div class="mb-6">
                                <div class="row sm:flex">
                                    <div class="sm:w-1/2 w-full sm:pr-2">
                                        <label for="manufacture"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Manufacture</label>
                                            @if ($valve->manufacture)
                                            <div class="form-control form-control-solid">{{ $valve->manufacture }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                    </div>
                                    <div class="sm:w-1/2 w-full sm:pl-2 sm:pt-0 pt-6">
                                        <label for="model_number"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model Number</label>
                                            @if ($valve->model_number)
                                            <div class="form-control form-control-solid">{{ $valve->model_number }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        <div class="mb-6">
                            <div class="row sm:flex">
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="serial_number"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial Number</label>
                                        @if ($valve->serial_number)
                                            <div class="form-control form-control-solid">{{ $valve->serial_number }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                </div>
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="size_in"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size In</label>
                                        @if ($valve->size_in)
                                            <div class="form-control form-control-solid">{{ $valve->size_in }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <div class="row sm:flex">
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="rating_in"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating In</label>
                                        @if ($valve->rating_in)
                                            <div class="form-control form-control-solid">{{ $valve->rating_in }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                </div>
                                <div class="sm:w-1/2 w-full sm:pr-2">
                                    <label for="size_out"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size Out</label>
                                        @if ($valve->size_out)
                                            <div class="form-control form-control-solid">{{ $valve->size_out }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                </div>
                            </div>
                            <div class="mb-6">
                                <div class="row sm:flex">
                                    <div class="sm:w-1/2 w-full sm:pr-2">
                                        <label for="rating_out"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating Out</label>
                                            @if ($valve->rating_out)
                                                <div class="form-control form-control-solid">{{ $valve->rating_out }}</div>
                                            @else
                                                <div class="form-control form-control-solid">N/A</div>
                                            @endif
                                    </div>
                                    <div class="sm:w-1/2 w-full sm:pr-2">
                                        <label for="press"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Press. Setting (psi)</label>
                                            @if ($valve->press)
                                                <div class="form-control form-control-solid">{{ $valve->press }}</div>
                                            @else
                                                <div class="form-control form-control-solid">N/A</div>
                                            @endif
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <div class="row sm:flex">
                                        <div class="sm:w-1/2 w-full sm:pr-2">
                                            <label for="vacuum"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vacuum Setting (psi)</label>
                                                @if ($valve->vacuum)
                                                    <div class="form-control form-control-solid">{{ $valve->vacuum }}</div>
                                                @else
                                                    <div class="form-control form-control-solid">N/A</div>
                                                @endif
                                        </div>
                                        <div class="sm:w-1/2 w-full sm:pr-2">
                                            <label for="psv"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PSV Style</label>
                                                @if ($valve->psv)
                                                    <div class="form-control form-control-solid">{{ $valve->psv }}</div>
                                                @else
                                                    <div class="form-control form-control-solid">N/A</div>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex">
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="design"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Orifice Design</label>
                                                    @if ($valve->design)
                                                        <div class="form-control form-control-solid">{{ $valve->design }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                            </div>
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="selection"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Orifice Selection</label>
                                                    @if ($valve->selection)
                                                        <div class="form-control form-control-solid">{{ $valve->selection}}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <div class="row sm:flex">
                                                <div class="sm:w-1/2 w-full sm:pr-2">
                                                    <label for="psv_capacity"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PSV Capacity</label>
                                                        @if ($valve->psv_capacity)
                                                            <div class="form-control form-control-solid">{{ $valve->psv_capacity}}</div>
                                                        @else
                                                            <div class="form-control form-control-solid">N/A</div>
                                                        @endif
                                                </div>
                                                <div class="sm:w-1/2 w-full sm:pr-2">
                                                    <label for="psv_capacityunit"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PSV Capacity Unit</label>
                                                        @if ($valve->psv_capacityunit)
                                                            <div class="form-control form-control-solid">{{ $valve->psv_capacityunit}}</div>
                                                        @else
                                                            <div class="form-control form-control-solid">N/A</div>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="mb-6">
                                                <div class="row sm:flex">
                                                    <div class="sm:w-1/2 w-full sm:pr-2">
                                                        <label for="bonnet"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bonnet Type</label>
                                                            @if ($valve->bonnet)
                                                                <div class="form-control form-control-solid">{{ $valve->bonnet}}</div>
                                                            @else
                                                                <div class="form-control form-control-solid">N/A</div>
                                                            @endif
                                                    </div>
                                                    <div class="sm:w-1/2 w-full sm:pr-2">
                                                        <label for="seat"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seat Type</label>
                                                            @if ($valve->seat)
                                                                <div class="form-control form-control-solid">{{ $valve->Seat}}</div>
                                                            @else
                                                                <div class="form-control form-control-solid">N/A</div>
                                                            @endif
                                                    </div>
                                                </div>
                                                <div class="mb-6">
                                                    <div class="row sm:flex">
                                                        <div class="sm:w-1/2 w-full sm:pr-2">
                                                            <label for="CAP"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CAP Type</label>
                                                                @if ($valve->CAP)
                                                                    <div class="form-control form-control-solid">{{ $valve->CAP}}</div>
                                                                @else
                                                                    <div class="form-control form-control-solid">N/A</div>
                                                                @endif
                                                        </div>
                                                        <div class="sm:w-1/2 w-full sm:pr-2">
                                                            <label for="body_bonnet"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body Bonnet Material</label>
                                                                @if ($valve->body_bonnet)
                                                                    <div class="form-control form-control-solid">{{ $valve->body_bonnet}}</div>
                                                                @else
                                                                    <div class="form-control form-control-solid">N/A</div>
                                                                @endif
                                                        </div>
                                                    </div>
                                                        <div class="mb-6">
                                                            <div class="row sm:flex">
                                                                <div class="sm:w-1/2 w-full sm:pr-2">
                                                                    <label for="disc_material"
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Disc Material</label>
                                                                        @if ($valve->disc_material)
                                                                        <div class="form-control form-control-solid">{{ $valve->disc_material}}</div>
                                                                    @else
                                                                        <div class="form-control form-control-solid">N/A</div>
                                                                    @endif
                                                                </div>
                                                                <div class="sm:w-1/2 w-full sm:pr-2">
                                                                    <label for="spring_material"
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Spring Material</label>
                                                                        @if ($valve->spring_material)
                                                                            <div class="form-control form-control-solid">{{ $valve->spring_material}}</div>
                                                                        @else
                                                                            <div class="form-control form-control-solid">N/A</div>
                                                                        @endif
                                                                </div>
                                                            </div>
                                                            <div class="mb-6">
                                                                <div class="row sm:flex">
                                                                    <div class="sm:w-1/2 w-full sm:pr-2">
                                                                        <label for="guide_material"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Guide Material</label>
                                                                            @if ($valve->guide_material)
                                                                                <div class="form-control form-control-solid">{{ $valve->guide_material}}</div>
                                                                            @else
                                                                                <div class="form-control form-control-solid">N/A</div>
                                                                            @endif
                                                                    </div>
                                                                    <div class="sm:w-1/2 w-full sm:pr-2">
                                                                        <label for="resilient_seat"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Resilient Seat</label>
                                                                            @if ($valve->resilient_seat)
                                                                                <div class="form-control form-control-solid">{{ $valve->resilient_seat}}</div>
                                                                            @else
                                                                                <div class="form-control form-control-solid">N/A</div>
                                                                            @endif
                                                                    </div>
                                                                </div>
                                                                <div class="mb-6">
                                                                            <label for="bellow_material"
                                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bellow Material</label>
                                                                                @if ($valve->bellow_material)
                                                                                <div class="form-control form-control-solid">{{ $valve->bellow_material}}</div>
                                                                            @else
                                                                                <div class="form-control form-control-solid">N/A</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                <div class="row sm:flex">
                                                                    <div class="sm:w-1/2 w-full sm:pr-2">
                                                                        <label for="year_build"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year Build</label>
                                                                        <div class="relative max-w-sm">
                                                                            @if ($valve->year_build)
                                                                                <div class="form-control form-control-solid">{{ $valve->year_build}}</div>
                                                                            @else
                                                                                <div class="form-control form-control-solid">N/A</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="sm:w-1/2 w-full sm:pr-2">
                                                                        <label for="year_install"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year Install</label>
                                                                        <div class="relative max-w-sm">
                                                                            @if ($valve->year_install)
                                                                                <div class="form-control form-control-solid">{{ $valve->year_install}}</div>
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
                                        