@extends('layout.index')

@section('content')
    <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl">
        <div class="p-4 mt-2">
            {{-- <aside
                class="p-4 my-8 bg-white border border-gray-200 rounded-lg shadow-md sm:p-6 lg:p-8 dark:bg-gray-800 dark:border-gray-700"> --}}
                <h3 class="mb-2 hidden md:block text-2xl font-medium text-gray-900 dark:text-white">{{ $title }}</h3>

                @unless (count($breadcrumbs) === 0)
                    <div class="flex justify-between">
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                                @foreach ($breadcrumbs as $breadcrumb)
                                    <li class="inline-flex items-center">
                                        @if ($breadcrumb['status'] === 'active')
                                            <a href="{{ $breadcrumb['url'] }}"
                                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                                <i class="{{ $breadcrumb['icon'] }} mr-2"></i>
                                                {{ $breadcrumb['title'] }}
                                            </a>
                                        @else
                                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span
                                                class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{ $breadcrumb['title'] }}</span>
                                        @endif
                                    </li>
                                @endforeach
                            </ol>
                        </nav>
                        <button type="button" class="text-white bg-blue-700 hidden sm:block hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <i class="fa-solid fa-plus mr-2"></i>New
                        </button>
                    </div>
                @endunless
                <div class="mt-7">
                    <table id="customer-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Last Update</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            {{-- </aside> --}}
        </div>
    </div>
    <button class="flex sm:hidden fixed z-50 bottom-10 right-8 bg-blue-700 w-12 h-12 rounded-full drop-shadow-lg justify-center items-center text-white text-xl hover:bg-blue-800 hover:drop-shadow-2xl animate-bounce duration-300">
        <i class="fa-solid fa-plus"></i>
    </button>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#customer-table').DataTable({
                language: {
                    processing: "Loading. Please wait..."
                },
                responsive: true,
                processing: true,
                serverSide: true,
                deferRender: true,
                ajax: {
                    url: "{{ route('client.main.table') }}",
                },
                columns: [
                    { data: 'name', name: 'name', className: 'all' },
                    { data: 'address', name: 'address', className: 'min-tablet' },
                    { data: 'phone_number', name: 'phone_number', class: ['text-center','min-tablet'] },
                    { data: 'email', name: 'email', className: 'min-tablet' },
                    { data: 'updated_at', name: 'updated_at', class: ['text-center','min-tablet'] },
                ]
            });
        });
    </script>
@endsection
