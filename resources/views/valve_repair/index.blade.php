@extends('layout.index')

@section('content')
    <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl">
        <div class="p-4 mt-2">
            <h3 class="mb-2 hidden md:block text-2xl font-medium text-gray-900 dark:text-white">{{ $title }}</h3>

            <div class="flex justify-between mb-7">
                @unless (count($breadcrumbs) === 0)
                    @include('layout.breadcrumbs')
                @endunless

                <button type="button" onclick="openForm(`{{ route('valverepair.store') }}`)"
                    class="text-white bg-blue-700 hidden sm:block hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="fa-solid fa-plus mr-2"></i>New
                </button>
            </div>

            <div>
                <table id="main-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Prefix</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Last Update</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    @include('valve_repair.component.newadd')
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('core/js/valve_repair/custom.js') }}"></script>
    <script>
        var CSRF_TOKEN = $('[name="csrf-token"]').attr('content');
        var array_dropdown = @json($vrr_dropdown);
    </script>
    {{-- <script>

        $(document).ready(function() {
            $('#main-table').DataTable({
                language: {
                    processing: "Loading. Please wait..."
                },
                responsive: true,
                processing: true,
                serverSide: true,
                deferRender: true,
                bAutoWidth: false,
                ajax: {
                    url: "{{ route('tablemap.main.table') }}",
                },
                columns: [
                    {
                        data: 'prefix_title',
                        name: 'prefix_title',
                        className: 'all'
                    },
                    {
                        data: 'category',
                        name: 'category',
                        className: 'all'
                    },
                    {
                        data: 'description',
                        name: 'description',
                        class: ['text-center', 'min-tablet']
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                        class: ['text-center', 'min-tablet']
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        class: ['text-center', 'min-tablet'],
                        orderable: false,
                        sortable: false,
                    },
                ],
                columnDefs: [
                    {
                        className: "dt-body-center",
                        target: [0,1,3,4]
                    },
                    {
                        target: [3],
                        width: "15%",
                    },
                    {
                        target: [0,1],
                        width: "20%",
                    },
                    {
                        target: [4],
                        width: "5%",
                    },
                ]
            });
        });
    </script> --}}
@endsection
