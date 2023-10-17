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
            </div>
            <div class="flex justify-center mb-10 p-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-10">
                    <div onclick="openFormConstruction('{{ route('valverepair.store') }}')">
                        <div
                            class="w-72 max-w-sm hover:bg-gray-100 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex justify-end px-4 pt-4">
                            </div>
                            <div class="flex flex-col items-center ">
                                <img class="w-24 h-24 mb-3 shadow-lg rounded-full" src="{{ asset('theme/assets/images/menu.png') }}"
                                    alt="Bonnie image" />
                                <h6 class="p-4 text-center mb-1 text-md font-medium text-gray-900 dark:text-white">Construction
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div onclick="openFormConstruction('{{ route('valverepair.store') }}')">
                        <div
                            class="w-72 max-w-sm hover:bg-gray-100 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex justify-end px-4 pt-4">
                            </div>
                            <div class="flex flex-col items-center ">
                                <img class="w-24 h-24 mb-3 shadow-lg rounded-full" src="{{ asset('theme/assets/images/menu.png') }}"
                                    alt="Bonnie image" />
                                <h6 class="p-4 text-center mb-1 text-md font-medium text-gray-900 dark:text-white">Calibration
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('valve_repair.construction.modal')
@endsection

@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js">
    </script>
    <script type="text/javascript" src="{{ asset('core/js/valve_repair/construction/custom.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('core/js/valve_repair/custom.js') }}"></script> --}}

    <script>
        var CSRF_TOKEN = $('[name="csrf-token"]').attr('content');
        var array_dropdown = @json($vrr_dropdown);
        var valveRepair = @json($valverepair);
        var scopeofwork = @json($scopeofwork);
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Select here..'
            });
        });
    </script>
@endsection
