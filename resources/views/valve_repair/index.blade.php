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

                <button type="button" onclick="openForm(`{{ route('valverepair.store') }}`)"
                    class="text-white bg-blue-700 hidden sm:block hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="fa-solid fa-plus mr-2"></i>New
                </button>
            </div>

            <div>
                <table id="main-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>LTSA Ref.</th>
                            <th>Ro Number</th>
                            <th>Ro Date</th>
                            <th>SOW</th>
                            <th>Tag Number</th>
                            <th>Start Date</th>
                            <th>Complated Date</th>
                            <th>Status</th>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js">
    </script>
    <script>
        var CSRF_TOKEN = $('[name="csrf-token"]').attr('content');
        var array_dropdown = @json($vrr_dropdown);
    </script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Select here..'
            });
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
                    url: "{{ route('valverepair.main.table') }}",
                },
                columns: [{
                        data: 'customer',
                        name: 'customer',
                        className: 'desktop'
                    },
                    {
                        data: 'ltsa.ltsa_ref',
                        name: 'ltsa.ltsa_ref',
                        className: 'desktop'
                    },
                    {
                        data: 'ltsa.ro_number',
                        name: 'ltsa.ro_number',
                        className: 'desktop'
                    },
                    {
                        data: 'ltsa.ro_date',
                        name: 'ltsa.ro_date',
                        className: 'desktop'
                    },
                    {
                        data: 'ltsa.ro_date',
                        name: 'ltsa.ro_date',
                        className: 'desktop'
                    },
                    {
                        data: 'device_detail.tag_number',
                        name: 'device_detail.tag_number',
                        className: 'desktop'
                    },
                    {
                        data: 'start_date',
                        name: 'start_date',
                        className: 'desktop'
                    }, {
                        data: 'estimate_end_date',
                        name: 'estimate_end_date',
                        className: 'desktop'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        class: ['text-center', 'min-tablet'],
                        orderable: false,
                        sortable: false,
                    },
                ],
                search: {
                    "regex": true
                },
                columnDefs: [{
                        className: "dt-body-center",
                        target: [0, 1, 3, 4]
                    },
                    {
                        target: [3, 6, 7],
                        width: "15%",
                    },
                    {
                        target: [0, 1],
                        width: "20%",
                    },
                    {
                        target: [4],
                        width: "5%",
                    },
                ]
            });
        });
    </script>
@endsection
