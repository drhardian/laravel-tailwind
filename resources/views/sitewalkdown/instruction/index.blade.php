@extends('layout.index')
@section('content')
    <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl">
        <div class="p-4 mt-2">
            <h3 class="mb-2 hidden md:block text-2xl font-medium text-gray-900 dark:text-white">{{ $title }}</h3>

            <div class="flex justify-between mb-7">
                @unless (count($breadcrumbs) === 0)
                    @include('layout.breadcrumbs')
                @endunless

                {{-- <button type="button" id="newBtn" onclick="openForm(`{{ route('requestorder.store') }}`)"
                    class="text-white bg-blue-700 hidden sm:block hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="fa-solid fa-plus mr-2"></i>New
                </button> --}}

                <div class="flex items-center"> <!-- Mulai dari sini -->
                    <div class="mr-4">

                        <span class="sparkline_bar mr-2 float-left h-4 bg-gray-300"></span>
                        <!-- Ubah menjadi kelas Tailwind CSS -->
                        <span class="float-left text-gray-500"> <!-- Ubah menjadi kelas Tailwind CSS -->
                            <span class="mb-0 mt-1 mr-2">2,978</span><small class="mb-0 mr-3">( Complete )</small>
                        </span>
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
                            <a href="{{ route('swd.instructions.create') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa fa-plus mr-2"></i>New
                                Instruction</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-file-excel mr-2"></i> Export</a>
                        </li>

                    </ul>
                </div>

            </div>

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow p-3 overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <input type="hidden" id="instruction-table-url" value="{{ route('swd.instructions.instructionDatatable') }}">
                            <table id="instruction-table" class="min-w-full border divide-y divide-gray-200">
                                <thead class="bg-gray-800">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Instruction#</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Company</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Area</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Sub-area</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Tag Numbers</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Engineers</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200"></tbody>
                            </table>
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
<script src="{{ asset('core/js/sitewalkdown/instruction/index-functions.js') }}"></script>

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
