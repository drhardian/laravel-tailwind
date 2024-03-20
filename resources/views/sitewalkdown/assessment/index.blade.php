@extends('layout.index')
@section('content')
    <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl">
        <div class="p-4 mt-2">
            <h3 class="mb-2 hidden md:block text-2xl font-medium text-gray-900 dark:text-white">{{ $title }}</h3>

            <div class="flex justify-between mb-7">
                @unless (count($breadcrumbs) === 0)
                    @include('layout.breadcrumbs')
                @endunless
                <div class="flex items-center"> <!-- Mulai dari sini -->
                    <div class="mr-4">
                        <span class="sparkline_bar mr-2 float-left h-4 bg-gray-300"></span>
                        <!-- Ubah menjadi kelas Tailwind CSS -->
                        <span class="sparkline_bar1 mr-2 float-left h-4 bg-red-500"></span>
                        <!-- Ubah menjadi kelas Tailwind CSS -->
                        <span class="float-left text-red-500"> <!-- Ubah menjadi kelas Tailwind CSS -->
                            <span class="mb-0 mt-1 mr-2">6,453</span><small class="mb-0">( On-progress )</small>
                        </span>
                    </div>

                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="text-black ring-2 ring-black bg-white-100 hover:bg-white-200 focus:ring-4 focus:outline-none focus:ring-blue-400 font-medium rounded-sm text-sm px-7 py-2 text-center inline-flex items-center dark:bg-white-100 dark:hover:bg-gray-200 dark:focus:ring-blue-800"
                        type="button"><i class="fa-solid fa-list-check mr-2"></i>Actions <svg class="w-2.5 h-2.5 ms-3"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                </div>
                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-black dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="#" onclick="browseInstructions()" data-modal-target="default-modal"
                                data-modal-toggle="default-modal"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                <i class="fa-solid fa-magnifying-glass-plus mr-2"></i>Browse Instructions</a>
                        </li>

                    </ul>
                </div>

            </div>

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow p-3 overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <input type="hidden" id="assessment-table-url"
                                value="{{ route('swd.assessments.assessmentDatatable') }}">
                            <table id="assessment-table" class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-800">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Date</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Tag#</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Serial#</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Instruction#</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Company</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Service Location</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Health Status</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Inspected By</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            {{-- Modals --}}



            <!-- Main modal -->
            <div id="default-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-7xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Terms of Service
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="default-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4 overflow-x-auto">
                            <div class="overflow-x-auto">
                                <input type="hidden" id="instruction-table-url"
                                    value="{{ route('swd.instructions.instructionDatatable') }}">
                                <table id="instruction-table" class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-800">
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Instruction#</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Status</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Period</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Company</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Area</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Sub-area</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Tag Numbers</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Assigned To</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Notes</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200"></tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            {{-- End --}}
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('core/js/sitewalkdown/assessment/index-functions.js') }}"></script>

    <script>
        @if (Session::has('success'))
            toastr.success("{{ session('success') }}", '', {
                "showMethod": "slideDown",
                "hideMethod": "slideUp",
                "progressBar": true,
                "positionClass": "toast-top-full-width",
                "closeButton": true
            });
        @endif
    </script>
@endsection
