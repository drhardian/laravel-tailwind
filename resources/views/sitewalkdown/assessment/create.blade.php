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
                    class="flex justify-center text-sm font-medium text-center text-blue-700 border-b border-gray-200 rounded-t-lg bg-gray-800 dark:border-gray-700 dark:text-blue-400 dark:bg-gray-800">
                    <ul class="flex flex-wrap mb-2 text-sm font-medium text-center assessment-panels" id="default-tab"
                        data-tabs-toggle="#default-tab-content" role="tablist">
                        <li class="me-2" role="presentation">
                            <button class="inline-block text-white p-4 border-b-2 rounded-t-lg" id="tabMenu1"
                                data-tabs-target="#initial-information" type="button" role="tab"
                                aria-controls="initial-information" aria-selected="false">Initial Information</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button
                                class="tab2menu hidden text-white p-4 border-b-2 rounded-t-lg hover:text-blue-600 hover:border-gray-300 dark:hover:text-blue-300"
                                id="tabMenu2" data-tabs-target="#tab2" type="button" role="tab"
                                aria-controls="dashboard" aria-selected="false">General Information</button>
                        </li>
                        {{-- <li class="me-2" role="presentation">
                            <button
                                class="inline-block text-white p-4 border-b-2 rounded-t-lg hover:text-blue-600 hover:border-gray-300 dark:hover:text-blue-300"
                                id="tabMenu2" data-tabs-target="#dashboard" type="button" role="tab"
                                aria-controls="dashboard" aria-selected="false">Dashboard</button>
                        </li> --}}
                        {{--
                        <li class="me-2" role="presentation">
                            <button class="inline-block text-white p-4 border-b-2 rounded-t-lg hover:text-blue-600 hover:border-gray-300 dark:hover:text-blue-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Settings</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block text-white p-4 border-b-2 rounded-t-lg hover:text-blue-600 hover:border-gray-300 dark:hover:text-blue-300" id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Contacts</button>
                        </li> --}}
                    </ul>
                </div>
                {{-- tab Content --}}
                <div class=" p-2 bg-white rounded-lg md:p-3 dark:bg-gray-800">
                    <div id="errors"></div>
                    <input type="hidden" id="urlGetImage" name="urlGetImage" value="{{ route('swd.file.download') }}">
                    <input type="hidden" id="urlRemoveImage" name="urlRemoveImage"
                        value="{{ route('swd.file.remove', ':image') }}">
                    <input type="hidden" id="title-table-url" value="">
                    <input type="hidden" id="tags-instruction-table-url"
                        value="{{ route('swd.products.tagsbyinstruction') }}">
                    <input type="hidden" id="tags-product-table-url" value="{{ route('swd.products.tagsbyproduct') }}">
                    <input type="hidden" id="urlStoreAssessment" name="urlStoreAssessment"
                        value="{{ route('swd.assessments.store') }}">
                    <input type="hidden" id="urlGetSubjects" name="urlGetSubjects"
                        value="{{ route('swd.assessments.getSubjects') }}">

                    <form id="assessmentForm" action="#">
                        @csrf
                        <input type="hidden" id="instruction_id" name="instruction_id"
                            value="{{ old('instruction_id', $instruction->id) }}">
                        <input type="hidden" id="id" name="id" value="{{ old('id', $assessmentId) }}">
                        <input type="hidden" id="productid" name="productid" value="{{ old('productid') }}">
                        <div id="default-tab-content">
                            <div class="hidden p-1 rounded-lg bg-white dark:bg-gray-800" id="initial-information"
                                role="tabpanel" aria-labelledby="initial-information-tab">
                                {{-- tab Content Intial Information --}}
                                <div class="flex flex-col md:flex-row">
                                    <div class="w-full mb-4 md:basis-1/4">
                                        <label for="activity_date"
                                            class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Date
                                            Activity</label>
                                        <input type="text" id="activity_date" name="activity_date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            readonly />
                                    </div>
                                    <div class="w-full mb-4 md:basis-1/4 md:ml-4">
                                        <label for="instruction_num"
                                            class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Instruction
                                            Number</label>
                                        <input type="text" id="instruction_num" name="instruction_num"
                                            value="{{ $instruction->instruction_num }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            readonly />
                                    </div>
                                    <div class="w-full mb-4 md:basis-1/2 md:ml-4">
                                        <label for="company_name"
                                            class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Company</label>
                                        <input type="hidden" id="company_id" name="company_id" class="form-control"
                                            value="{{ $instruction->company_id }}" readonly>
                                        <input type="text" id="company_name" name="company_name"
                                            value="{{ $instruction->company->name }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            readonly />
                                    </div>
                                </div>

                                <div class="flex flex-col md:flex-row">
                                    <div class="w-full mb-4 md:basis-1/4">
                                        <label for="location_type_id"
                                            class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Location
                                            Type</label>
                                        <select id="location_type_id" name="location_type_id"
                                            class="select2-option-ajax bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            data-show="{{ route('swd.locationtype.list') }}" data-store=""
                                            data-form="location_type_id" data-reff=""
                                            data-reset-reff="location_detail_id" data-change="true">
                                            <option value="" disabled selected></option>
                                        </select>
                                    </div>
                                    <div class="w-full mb-4 md:basis-1/4 md:ml-4">
                                        <label for="location_detail_id"
                                            class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Location</label>
                                        <select id="location_detail_id" name="location_detail_id"
                                            class="select2-option-ajax bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            data-show="{{ route('swd.locationdetail.list') }}"
                                            data-store="{{ route('swd.locationdetail.new') }}"
                                            data-form="location_detail_id" data-reff="location_type_id;"
                                            data-change="true">
                                            <option value="" disabled selected></option>
                                        </select>
                                    </div>
                                    <div class="w-full mb-4 md:basis-1/2 md:ml-4">
                                        <label for="device_type_id"
                                            class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Valve
                                            Type</label>
                                        <select id="device_type_id" name="device_type_id"
                                            class="select2-option-ajax bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            data-show="{{ route('swd.devicetypes.devicetypeonselectbox') }}"
                                            data-store="" data-form="device_type_id" data-reff="" data-change="true"
                                            data-reload="true" data-alias="{{ route('swd.devicetypes.getalias') }}">
                                        </select>
                                    </div>
                                </div>
                                <div class="flex flex-col md:flex-row">
                                    <div class="w-full md-5">
                                        <label for="contact_person"
                                            class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Contact
                                            Persons</label>
                                    </div>
                                </div>
                                <div class="persons-container">
                                    <div class="flex flex-col md:flex-row" id="persons_group_1">
                                        <div class="w-full mb-4 md:basis-1/3">
                                            <input type="text" id="persons_name" name="persons_name[]"
                                                placeholder="Name"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                        </div>
                                        <div class="w-full mb-4 md:basis-1/3 md:ml-4">
                                            <input type="text" id="persons_title_1" name="persons_title[]"
                                                placeholder="Title" readonly onclick="openTitleList(1)"
                                                class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                        </div>
                                        <div class="w-full mb-4 md:basis-1/3 md:ml-4">
                                            <div class="flex">
                                                <input type="text" id="persons_email" name="persons_email[]"
                                                    placeholder="Email Address"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-s-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                <button id="1"
                                                    class="persons_btn_1 inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-s-0 border-gray-300 rounded-e-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600"
                                                    onclick="addMorePerson(event, $(this).attr('id'))"><i
                                                        class="fa fa-plus persons_ico_1"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex  justify-end rounded-t border-t-4  dark:border-gray-600">
                                    <button type="button"
                                        class="text-white bg-[#FF9119] mt-3 hover:bg-[#FF9119]/80 focus:ring-4 focus:outline-none focus:ring-[#FF9119]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#FF9119]/80 dark:focus:ring-[#FF9119]/40 me-2 mb-2"
                                        onclick="goToNextPage(event,'1','2','forward')">Next<i
                                            class="fa-solid fa-circle-right ml-2"></i>
                                    </button>
                                </div>

                            </div>

                            <div class="hidden p-1 rounded-lg bg-white dark:bg-gray-800" id="tab2" role="tabpanel"
                                aria-labelledby="tab2-tab">

                                <div class="flex flex-col md:flex-row">
                                    <div class="w-full mb-4 md:basis-1/2">
                                        <label
                                            class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Serial
                                            Number</label>
                                        <select id="serial_number" name="serial_number"
                                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                            data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                            data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                            data-form="serial_number" data-alias="SRLNMB" data-scope="specific"
                                            data-change="false">
                                            <option value="" disabled selected></option>
                                        </select>
                                    </div>
                                    <div class="w-full mb-4 md:basis-1/2 ml-4 md:me-4">
                                        <label class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Tag
                                            Number</label>
                                        <div class="flex">
                                            <input type="text" id="tagnum" name="tagnum"
                                                placeholder="Email Address"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-s-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                            <button
                                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-e-lg py-1 px-3 leading-normal no-underline bg-gray-900 text-white hover:bg-gray-900"
                                                onclick="openTagList({{ $instruction->id }})"><i
                                                    class="fa-solid fa-magnifying-glass-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col md:flex-row">
                                    <div class="w-full mb-4 md:basis-1/2">
                                        <label for="location_type_id"
                                            class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Application</label>
                                        <select id="application" name="application"
                                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                            data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                            data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                            data-form="application" data-alias="DVCAPP" data-scope=""
                                            data-change="false">
                                            <option value="" disabled selected></option>
                                        </select>
                                    </div>
                                    <div class="w-full mb-4 md:basis-1/2 md:ml-4">
                                        <label for="location_detail_id"
                                            class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Name
                                            Plate</label>
                                        <select id="name_plate" name="name_plate"
                                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                            data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                            data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                            data-form="name_plate" data-alias="NMEPLT" data-scope=""
                                            data-change="false">
                                            <option value="" disabled selected></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="flex flex-col md:flex-row">
                                    <div class="w-full mb-4 md:basis-1/2">
                                        <label class="form-label">Criticality Level</label>
                                        <select id="criticality_level_id" name="criticality_level_id"
                                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                            data-show="{{ route('swd.criticalitylevels.showdropdowns') }}" data-store=""
                                            data-form="criticality_level_id" data-alias="" data-scope=""
                                            data-change="false">
                                            <option value="" disabled selected></option>
                                        </select>
                                    </div>
                                    <div class="w-full mb-4 md:basis-1/2 md:ml-4">
                                        <label class="form-label">Current Status</label>
                                        <span id="current-status">-</span>
                                    </div>
                                </div>
                                <div class="flex flex-row ">
                                    <div class="w-full mb-4">
                                        <label class="form-label">Area</label>
                                        <select id="area_id" name="area_id"
                                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-option-ajax"
                                            data-show="{{ route('swd.areas.indexonselectbox') }}"
                                            data-store="{{ route('swd.areas.storefromselectbox') }}" data-form="area_id"
                                            data-reff="company_id;" data-change="true">
                                            <option value="" disabled selected></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex flex-row ">
                                    <div class="w-full mb-4">
                                        <label class="form-label">Other Area</label>
                                        <select id="area_others" name="area_others[]"
                                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-option-ajax"
                                            data-show="{{ route('swd.otherareas.indexonselectbox') }}"
                                            data-store="{{ route('swd.otherareas.storefromselectbox') }}"
                                            data-form="area_others" data-reff="company_id;area_id;" data-change="false"
                                            multiple="multiple">
                                        </select>
                                    </div>
                                </div>
                                <div class="flex-auto p-6 p-0 mx-0">
                                    <div class="flex flex-wrap  border-t py-3">
                                        <div class="md:w-1/2 ">
                                            <button
                                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-gray-900 text-white hover:bg-gray-900"
                                                onclick="goToNextPage(event,'1','2','backward')"><i
                                                    class="fa-solid fa-circle-left mr-2"></i>Prev</button>
                                        </div>
                                        <div class="md:w-1/2 pr-4 pl-4 text-right">
                                            <button
                                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-orange"
                                                onclick="goToNextPage(event,'2','3','forward')">Next<i
                                                    class="fa-solid fa-circle-right ml-2"></i></button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- <div id="assessmentFormByDeviceType">
                            </div> --}}
                    </form>
                    {{--
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                        </div>
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                        </div> --}}
                </div>

            </div>
        </div>

        <!-- Main modal -->
        <div id="modalEl" tabindex="-1" aria-hidden="true"
            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
            <div class="relative max-h-full w-full max-w-md">
                <!-- Modal content -->
                <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between rounded-t border-b p-3 dark:border-gray-600">
                        <h6 class="text-sm font-semibold text-gray-900 dark:text-white lg:text-base ">
                            Job Title
                        </h6>
                        <button type="button" onclick="openTitleList(0)"
                            class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="space-y-6 p-6">

                        <input type="hidden" id="selected-person-id">


                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                                <tbody>

                                    @php
                                        $arrayJobTitle = [
                                            'Valve Engineer',
                                            'Lifecycle Solution Engineer',
                                            'Account Sales',
                                        ];
                                    @endphp
                                    @foreach ($arrayJobTitle as $jobtitle)
                                        <tr onclick="setSelectedPerson('{{ $jobtitle }}')"
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $jobtitle }}
                                            </th>
                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>


                        {{-- <table id="title-table" class="table card-table table-vcenter text-nowrap table-hover">
                            <tbody class="table-group-divider">
                                @php
                                    $arrayJobTitle = ['Valve Engineer', 'Lifecycle Solution Engineer', 'Account Sales'];
                                @endphp
                                @foreach ($arrayJobTitle as $jobtitle)
                                    <tr onclick="setSelectedPerson('{{ $jobtitle }}')">
                                        <th class="text-muted">{{ $jobtitle }}</th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> --}}
                    </div>
                    <!-- Modal footer -->

                </div>
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
    <script src="{{ asset('core/js/sitewalkdown/assessment/select2-custom.js') }}"></script>
    <script src="{{ asset('core/js/sitewalkdown/assessment/create-functions.js') }}"></script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $('input[name="activity_date"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'), 10),
            locale: {
                format: 'DD/MM/YYYY'
            },
            startDate: @json($dateActivity['minDate']),
            minDate: @json($dateActivity['minDate']),
            maxDate: @json($dateActivity['maxDate'])
        });
    </script>
@endsection
