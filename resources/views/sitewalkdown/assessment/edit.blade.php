@extends('layout.index')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" type="text/css" rel="stylesheet" />
    <style>
        .dropdown-custom-btn {
            background-color: #fc7303;
        }

        .dropdown-custom-btn>a {
            color: white;
        }

        .swal2-popup .swal2-styled.swal2-cancel {
            border: 1px solid #647E68 !important;
        }
    </style>
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




            <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div
                    class="flex flex-wrap text-sm font-medium text-center text-gray-700 border-b border-gray-200 rounded-t-lg bg-gray-200 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                    <div
                        class="inline-block p-4 font-bold text-gray-800 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">
                        EDIT
                        INSTRUCTION
                    </div>
                </div>

                <div class=" p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800">
                    <div id="errors"></div>
                    <input type="hidden" id="instruction_update_url" name="instruction_update_url"
                        value="{{ route('swd.instructions.update', $instruction->id) }}">
                    <form id="instructionForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col md:flex-row">
                            <div class="md:w-full lg:w-2/5">
                                <div class="mb-5">
                                    <label for="date_activity"
                                        class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Activity
                                        Start</label>
                                    <input type="text" id="date_activity" name="date_activity"
                                        placeholder="Activity Start"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>
                            </div>
                            <div class="md:w-full lg:w-3/5">
                                <div class="mb-5 ml-0 md:ml-4">
                                    <label for="company_id"
                                        class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Company</label>
                                    <select id="company_id" name="company_id"
                                        class="select2-option-ajax bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required data-show="{{ route('swd.companies.indexonselectbox') }}"
                                        data-store="{{ route('swd.companies.storefromselectbox') }}" data-form="company_id"
                                        data-reff="" data-change="true" required>
                                        <option value="" selected disabled></option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="mb-5 w-full">
                                <label for="area_id"
                                    class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white"> Area</label>
                                <select id="area_id" name="area_id"
                                    class="select2-option-ajax bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    data-show="{{ route('swd.areas.indexonselectbox') }}"
                                    data-store="{{ route('swd.areas.storefromselectbox') }}" data-form="area_id"
                                    data-reff="company_id;" data-change="true">
                                    <option value="" selected disabled></option>
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="mb-5 w-full">
                                <label for="area_others"
                                    class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Other
                                    Area</label>
                                <select id="area_others" name="area_others[]"
                                    class="select2-option-ajax bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    data-show="{{ route('swd.otherareas.indexonselectbox') }}"
                                    data-store="{{ route('swd.otherareas.storefromselectbox') }}" data-form="area_others"
                                    data-reff="company_id;area_id;" data-change="false" multiple="multiple">
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="mb-5 w-full">
                                <label for="tag_numbers"
                                    class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Tag#</label>
                                <select id="tag_numbers" name="tag_numbers[]"
                                    class="select2-tagnum bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    data-show="{{ route('swd.products.tagsonselectbox') }}" data-form="tag_numbers"
                                    data-change="true" multiple="multiple">
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="mb-5 w-full">
                                <label for="engineers"
                                    class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Engineers</label>
                                <select id="engineers" name="engineers[]"
                                    class="select2-engineer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    data-show="{{ route('swd.instructions.usersonselectbox') }}" data-form="engineers"
                                    data-change="true" multiple="multiple">
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="mb-5 w-full">
                                <label for="notes"
                                    class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Instructions</label>
                                <textarea id="notes" name="notes" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Instructions...">{{ $instruction->notes }}</textarea>
                            </div>
                        </div>

                        <div class="border-t-2">
                            <div class="flex flex-row-reverse">
                                <div class=" mt-3">

                                    <a href="{{ route('swd.instructions.index') }}"
                                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"><i
                                            class="fas fa-times mr-1"></i>Cancel</a>

                                    <a href="#" onclick="updateInstruction()"
                                        class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-orange-500 dark:hover:bg-orange-600 dark:focus:ring-blue-800"><i
                                            class="fa-solid fa-floppy-disk mr-1"></i>Save</a>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>
            </div>


            {{-- END --}}
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script defer src="{{ asset('themes/core/pages/instruction/js/create-validation.js') }}"></script> --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    {{-- <script src="{{ asset('themes/core/pages/instruction/js/general-params.js') }}"></script> --}}
    <script src="{{ asset('core/js/sitewalkdown/instruction/select2-custom.js') }}"></script>
    <script src="{{ asset('core/js/sitewalkdown/instruction/edit-functions.js') }}"></script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('input[name="date_activity"]').daterangepicker({
            locale: {
                format: 'DD/MM/YYYY'
            },
            startDate: @json($dateRange['startDate']),
            endDate: @json($dateRange['endDate'])
        });
        $(function() {
            loadCompanySelectbox(@json($company));
            loadAreaSelectbox(@json($area));
            loadOtherAreaSelectbox(@json($otherarea));
            loadTagNumberSelectbox(@json($tagnums));
            loadEngineerSelectbox(@json($engineers));
        });
    </script>
@endsection
