@extends('layout.index')

@section('content')
    <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl">
        <div class="p-4 mt-2">
            <h3 class="mb-2 hidden md:block text-2xl font-medium text-gray-900 dark:text-white">{{ $title }}</h3>

            <div class="flex justify-between mb-7">
                @unless (count($breadcrumbs) === 0)
                    @include('layout.breadcrumbs')
                @endunless
            </div>
            <div class="flex flex-col md:flex-row ">
                <div
                    class="w-full h-auto p-3 mr-4 basis-3/5 mb-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="flex flex-row justify-between">
                        <div class="justify-start">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">General
                                information</h5>
                        </div>
                        <div class="justify-end px-4">
                            <i class="fa-solid fa-pen hover:text-blue-500"
                                onclick="editRecord(`{{ route('valverepair.edit', ['valverepair' => $valverepair->id]) }}`)"></i>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row space-x-4">
                        <div class="grid grid-cols-1 gap-x-20 gap-y-1 md:grid-cols-3">
                            <div class="text-sm">
                                <p class="font-semibold">Customer :</p>
                                <p>{{ $valverepair->customer }}</p>
                            </div>
                            <div class="text-sm">
                                <p class="font-semibold">Contact Center :</p>
                                <p>{{ $valverepair->contact_person }}</p>
                            </div>
                            <div class="text-sm">
                                <p class="font-semibold">Title :</p>
                                <p>{{ $valverepair->title }}</p>
                            </div>
                            <div class="text-sm">
                                <p class="font-semibold">Email Address :</p>
                                <p>{{ $valverepair->email_address }}</p>
                            </div>
                            <div class="text-sm">
                                <p class="font-semibold">End User* :</p>
                                <p>{{ $valverepair->end_user }}</p>
                            </div>
                            <div class="text-sm">
                                <p class="font-semibold">SO/Ref.* :</p>
                                <p>{{ $valverepair->so_reference }}</p>
                            </div>
                            <div class="text-sm">
                                <p class="font-semibold">Project :</p>
                                <p>{{ $valverepair->project }}</p>
                            </div>
                            <div class="text-sm">
                                <p class="font-semibold">Work Type* :</p>
                                <p>{{ $valverepair->workType->dropdown_label }}</p>
                            </div>
                            <div class="text-sm">
                                <p class="font-semibold">Order Type* :</p>
                                <p>{{ $valverepair->orderType->dropdown_label }}</p>
                            </div>
                            <div class="text-sm">
                                <p class="font-semibold">Scope of Work :</p>
                                <p>{{ $valverepair->scopeOfWork->dropdown_label }}</p>
                            </div>
                            <div class="text-sm">
                                <p class="font-semibold">Repair Type :</p>
                                <p>{{ isset($valverepair->repairType->dropdown_label) ? $valverepair->repairType->dropdown_label : '' }}
                                </p>
                            </div>
                            <div class="text-sm">
                                <p class="font-semibold">Performed by* :</p>
                                <p>{{ $valverepair->performed_by }}</p>
                            </div>
                            <div class="text-sm">
                                <p class="font-semibold">Title Performed :</p>
                                <p>{{ $valverepair->title_performed }}</p>
                            </div>
                            <div class="text-sm">
                                <p class="font-semibold">Email Address Performed :</p>
                                <p>{{ $valverepair->email_address_performed }}</p>
                            </div>
                            <div class="text-sm">
                                <p class="font-semibold">Title Performed :</p>
                                <p>{{ $valverepair->title_performed }}</p>
                            </div>
                            <div class="text-sm">
                                <p class="font-semibold">Email Address Performed :</p>
                                <p>{{ $valverepair->email_address_performed }}</p>
                            </div>
                            <div class="text-sm">
                                <p class="font-semibold">Start Date :</p>
                                <p>{{ $valverepair->email_address_performed }}</p>
                            </div>
                            <div class="text-sm">
                                <p class="font-semibold">Estimated End Date :</p>
                                <p>{{ $valverepair->email_address_performed }}</p>
                            </div>
                            <div class="text-sm">
                                <p class="font-semibold">Field Diagnostic Only Job :</p>
                                <p>{{ $valverepair->email_address_performed }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="text-sm mt-4 bg-gray-400 rounded-md p-3">
                        <p class="font-semibold">Catatan :</p>
                        <p>{{ $valverepair->note }}</p>
                    </div>

                </div>
                <div
                    class="w-full h-auto mb-4 p-3 basis-2/5 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                    <div class="flex flex-row justify-between">
                        <div class="justify-start">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Device
                                Information</h5>
                        </div>
                        <div class="justify-end px-4">
                            <i class="fa-solid fa-pen hover:text-blue-500"></i>
                        </div>
                    </div>

                    <div class="flex flex-col items-center">
                        <div id="indicators-carousel" class="relative w-96" data-carousel="static">
                            <!-- Carousel wrapper -->
                            <div class="relative h-11 overflow-hidden rounded-lg md:h-48">
                                @foreach ($valverepair->Files as $images)
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                                        <img src="{{ asset('images/ValveRepair/' . $valverepair->id . '/' . $images->name) }}"
                                            class="absolute block w-36 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                            alt="{{ $images->name }}">
                                    </div>
                                @endforeach
                                <!-- Item 1 -->
                            </div>
                            <!-- Slider controls -->
                            <button type="button"
                                class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-prev>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-blue-200 dark:bg-gray-800/30 group-hover:bg-blue-300 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-blue-400 dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-blue-500 dark:text-gray-800" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 1 1 5l4 4" />
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button"
                                class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-next>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-blue-200 dark:bg-gray-800/30 group-hover:bg-blue-300 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-blue-400 dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-blue-500 dark:text-gray-800" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>

                    </div>
                    <div class="grid grid-cols-1 mt-8 gap-x-2 gap-y-1.5 md:grid-cols-2">
                        <div class="text-sm">
                            <p class="font-semibold">Device Type :</p>
                            <p>{{ $valverepair->deviceDetail->deviceType->dropdown_label }}</p>
                        </div>
                        <div class="text-sm">
                            <p class="font-semibold">"Selected Device" Type :</p>
                            <p>{{ $valverepair->deviceDetail->deviceTypeSelected->dropdown_label }}</p>
                        </div>
                        <div class="text-sm">
                            <p class="font-semibold">Tag Number :</p>
                            <p>{{ $valverepair->deviceDetail->tag_number }}</p>
                        </div>
                        <div class="text-sm">
                            <p class="font-semibold">Serial Number :</p>
                            <p>{{ $valverepair->deviceDetail->serial_number }}</p>
                        </div>
                        <div class="text-sm">
                            <p class="font-semibold">Process :</p>
                            <p>{{ $valverepair->deviceDetail->Process->dropdown_label }}</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="flex justify-center mb-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-10">
                {{-- <x-card-menu :onclick="openFormContent({{ route('valverepair.store') }}, 'isolationValveModal', 'New CONSTRUCTION - ACTUATOR ISOLATION VALVE')" :image="asset('theme/assets/images/menu.png')" :title="'Construction'" /> --}}

                {{-- <x-card-menu :onclick="openFormContent(1,'isolationValveModal', 'New CONSTRUCTION - ACTUATOR ISOLATION VALVE')" :image="asset('theme/assets/images/menu.png')" :title="'Construction'" />
                <x-card-menu :image="asset('theme/assets/images/menu.png')" :title="'Calibration'" />
                <x-card-menu :image="asset('theme/assets/images/menu.png')" :title="'Optional Services'" />
                <x-card-menu :image="asset('theme/assets/images/menu.png')" :title="'Finding and Corrective Action'" />
                <x-card-menu :image="asset('theme/assets/images/menu.png')" :title="'PHE - Penetrant'" />
                <x-card-menu :image="asset('theme/assets/images/menu.png')" :title="'PHE - Testing'" />
                <x-card-menu :image="asset('theme/assets/images/menu.png')" :title="'Painting'" />
                <x-card-menu :image="asset('theme/assets/images/menu.png')" :title="'PHE - Packaging'" /> --}}
                <div onclick="openFormConstruction('{{ route('valverepair.store') }}')">
                    <div
                        class="w-72 max-w-sm hover:bg-gray-100 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-end px-4 pt-4">
                        </div>
                        <div class="flex flex-col items-center ">
                            <img class="w-24 h-24 mb-3 shadow-lg rounded-full" src="{{asset('theme/assets/images/menu.png')}}" alt="Bonnie image" />
                            <h6 class="p-4 text-center mb-1 text-md font-medium text-gray-900 dark:text-white">Construction</h6>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>

    @include('valve_repair.component.edit')
    @include('valve_repair.construction.modal')

@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('core/js/valve_repair/custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('core/js/valve_repair/construction/custom.js') }}"></script>
    <script>
        var CSRF_TOKEN = $('[name="csrf-token"]').attr('content');
        var array_dropdown = @json($vrr_dropdown);
        var valveRepair = @json($valverepair);
        var updateUrls = "{{ route('valverepair.update', ['valverepair' => $valverepair->id]) }}";
    </script>
@endsection
