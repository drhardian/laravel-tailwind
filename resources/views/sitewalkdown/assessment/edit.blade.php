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
                                class="tab2menu  text-white p-4 border-b-2 rounded-t-lg hover:text-blue-600 hover:border-gray-300 dark:hover:text-blue-300"
                                id="tabMenu2" data-tabs-target="#tab2" type="button" role="tab"
                                aria-controls="dashboard" aria-selected="false">General Information</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button
                                class=" tab3menu p-4 border-b-2 rounded-t-lg text-white hover:text-blue-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="tabMenu3" data-tabs-target="#tab3" type="button" role="tab"
                                aria-controls="settings" aria-selected="false">Valve Information</button>
                        </li>
                        <li role="presentation">
                            <button
                                class=" tab4menu p-4 border-b-2 rounded-t-lg text-white hover:text-blue-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="tabMenu4" data-tabs-target="#tab4" type="button" role="tab"
                                aria-controls="contacts" aria-selected="false">Valve Assessment</button>
                        </li>
                    </ul>
                </div>
                {{-- tab Content --}}
                <div class=" p-2 bg-white rounded-lg md:p-3 dark:bg-gray-800">
                    <div id="errors"></div>

                    <input type="hidden" id="urlGetImage" name="urlGetImage" value="{{ route('swd.file.download') }}">
                    <input type="hidden" id="urlRemoveImage" name="urlRemoveImage"
                        value="{{ route('swd.file.remove', ':image') }}">
                    <input type="hidden" id="title-table-url" value="">
                    <input type="hidden" id="tags-table-url" value="{{ route('swd.products.tagsbyinstruction') }}">
                    <input type="hidden" id="urlUpdateAssessment" name="urlUpdateAssessment"
                        value="{{ route('swd.assessments.update', $assessment->id) }}">
                    <input type="hidden" id="urlGetSubjects" name="urlGetSubjects"
                        value="{{ route('swd.assessments.getSubjects') }}">
                    <input type="hidden" id="urlGetAssessmentImage" name="urlGetAssessmentImage"
                        value="{{ route('swd.assessmentimages.show') }}">
                    <input type="hidden" id="id" name="id" value="{{ $assessment->id }}">

                    <form id="assessmentForm" action="#">
                        @csrf
                        @method('PUT')

                        <div id="default-tab-content">
                            <div class=" p-1 rounded-lg bg-white dark:bg-gray-800" id="initial-information" role="tabpanel"
                                aria-labelledby="initial-information-tab">
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
                                            value="{{ $assessment->instruction->instruction_num }}" readonly
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            readonly />
                                    </div>
                                    <div class="w-full mb-4 md:basis-1/2 md:ml-4">
                                        <label for="company_name"
                                            class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Company</label>
                                        <input type="hidden" id="company_id" name="company_id" class="form-control"
                                            value="{{ $assessment->instruction->company_id }}" readonly>
                                        <input type="text" id="company_name" name="company_name"
                                            value="{{ $assessment->instruction->company->name }}"
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
                                            <option value="{{ $assessment->location_type_id }}" selected>
                                                {{ $assessment->locationType->title }}</option>
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
                                            <option value="{{ $assessment->location_detail_id }}" selected>
                                                {{ $assessment->locationDetail->title }}</option>
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
                                            data-reload="true" data-alias="{{ route('swd.devicetypes.getalias') }}"
                                            disabled>
                                            <option value="{{ $assessment->device_type_id }}" selected>
                                                {{ $assessment->deviceType->title }}</option>
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
                                    @if (count($responsiblePeople) !== 0)
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($responsiblePeople as $person)
                                            <div class="flex flex-col md:flex-row"
                                                id="persons_group_{{ $i }}">
                                                <input type="hidden" name="persons_id[]" value="{{ $person['id'] }}">
                                                <div class="w-full mb-4 md:basis-1/3">
                                                    <input type="text" id="persons_name" name="persons_name[]"
                                                        placeholder="Name" value="{{ $person['name'] }}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                </div>
                                                <div class="w-full mb-4 md:basis-1/3 md:ml-4">
                                                    <input type="text" id="persons_title_{{ $i }}"
                                                        name="persons_title[]" placeholder="Title" readonly
                                                        onclick="openTitleList(1)" value="{{ $person['title'] }}"
                                                        class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                </div>
                                                <div class="w-full mb-4 md:basis-1/3 md:ml-4">
                                                    <div class="flex">
                                                        <input type="text" id="persons_email" name="persons_email[]"
                                                            placeholder="Email Address" value="{{ $person['email'] }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-s-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                        <button id="{{ $i }}"
                                                            class="persons_btn_{{ $i }} inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-s-0 border-gray-300 rounded-e-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600"
                                                            onclick="addMorePerson(event, $(this).attr('id'))">
                                                            @if ($i === count($responsiblePeople))
                                                                <i class="fa fa-plus persons_ico_{{ $i }}"></i>
                                                            @else
                                                                <i
                                                                    class="fa fa-trash-can persons_ico_{{ $i }}"></i>
                                                            @endif
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                    @else
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
                                    @endif

                                </div>
                                <div class="flex  justify-end rounded-t border-t-4  dark:border-gray-600">
                                    <button type="button"
                                        class="text-white bg-[#FF9119] mt-3 hover:bg-[#FF9119]/80 focus:ring-4 focus:outline-none focus:ring-[#FF9119]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#FF9119]/80 dark:focus:ring-[#FF9119]/40 me-2 mb-2"
                                        onclick="goToNextPage(event,'1','2','forward')">Next<i
                                            class="fa-solid fa-circle-right ml-2"></i>
                                    </button>
                                </div>

                            </div>
                            <div class=" p-1 rounded-lg bg-white dark:bg-gray-800" id="tab2" role="tabpanel"
                                aria-labelledby="tab2-tab">

                                <div class="flex flex-col md:flex-row">
                                    <div class="w-full mb-4 md:basis-1/2">
                                        <label
                                            class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Serial
                                            Number</label>
                                        <select id="serial_number" name="serial_number"
                                            class="select2-dropdown-ajax bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                            data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                            data-form="serial_number" data-alias="SRLNMB" data-scope="specific"
                                            data-change="false">
                                            <option value="{{ $assessment->serial_number }}" selected>
                                                {{ $assessment->serial_number }}</option>
                                        </select>

                                    </div>
                                    <div class="w-full mb-4 md:basis-1/2 md:ml-4">
                                        <label class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Tag
                                            Number</label>
                                        <div class="flex">
                                            <input type="text" id="tagnum" name="tagnum"
                                                placeholder="Email Address" value="{{ $assessment->product->tagnum }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-s-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />

                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col md:flex-row">
                                    <div class="w-full mb-4 md:basis-1/2">
                                        <label for="location_type_id"
                                            class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Application</label>
                                        <select id="application" name="application"
                                            class="select2-dropdown-ajax bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                            data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                            data-form="application" data-alias="DVCAPP" data-scope=""
                                            data-change="false">
                                            <option value="{{ $assessment->application }}" selected>
                                                {{ $assessment->application }}</option>
                                        </select>
                                    </div>
                                    <div class="w-full mb-4 md:basis-1/2 md:ml-4">
                                        <label for="location_detail_id"
                                            class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Name
                                            Plate</label>
                                        <select id="name_plate" name="name_plate"
                                            class="select2-dropdown-ajax bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                            data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                            data-form="name_plate" data-alias="NMEPLT" data-scope=""
                                            data-change="false">
                                            <option value="{{ $assessment->product->name_plate }}" selected>
                                                {{ $assessment->product->name_plate }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="flex flex-col md:flex-row">
                                    <div class="w-full mb-4 md:basis-1/2">
                                        <label class="form-label">Criticality Level</label>
                                        <select id="criticality_level_id" name="criticality_level_id"
                                            class="select2-dropdown-ajax bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            data-show="{{ route('swd.criticalitylevels.showdropdowns') }}" data-store=""
                                            data-form="criticality_level_id" data-alias="" data-scope=""
                                            data-change="false">
                                            <option value="{{ $assessment->criticality_level_id }}" selected>
                                                {{ $assessment->criticalityLevel->title }}</option>
                                        </select>
                                    </div>
                                    <div class="w-full mb-4 md:basis-1/2 md:ml-4">
                                        <label class="form-label">Last Status</label>
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
                                <div class="flex-auto p-6 mx-0">
                                    <div class="flex flex-wrap  border-t py-3">
                                        <div class="md:w-1/2 ">
                                            <button
                                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-lg px-5 py-2.5 leading-normal no-underline bg-gray-900 text-white hover:bg-gray-900"
                                                onclick="goToNextPage(event,'1','2','backward')"><i
                                                    class="fa-solid fa-circle-left mr-2"></i>Prev</button>
                                        </div>
                                        <div class="md:w-1/2 pr-4 pl-4 text-right">
                                            <button
                                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-lg px-5 py-2.5 leading-normal no-underline btn-orange"
                                                onclick="goToNextPage(event,'2','3','forward')">Next<i
                                                    class="fa-solid fa-circle-right ml-2"></i></button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class=" p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="tab3" role="tabpanel"
                                aria-labelledby="settings-tab">
                                <div id="valveInformationFormByDeviceType">
                                    @if ($deviceTypeInitial === 'REG')
                                        @include('sitewalkdown.assessment.valveinformation.edit.edit-reg')
                                    @endif
                                    Please select device type
                                </div>
                                <div class="flex-auto p-6 mx-0">
                                    <div class="flex flex-wrap  border-t py-3">
                                        <div class="md:w-1/2 ">
                                            <button
                                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-lg px-5 py-2.5 leading-normal no-underline bg-gray-900 text-white hover:bg-gray-900"
                                                onclick="goToNextPage(event,'2','3','backward')"><i
                                                    class="fa-solid fa-circle-left mr-2"></i>Prev</button>
                                        </div>
                                        <div class="md:w-1/2 pr-4 pl-4 text-right">
                                            <button
                                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-lg px-5 py-2.5 leading-normal no-underline btn-orange"
                                                onclick="goToNextPage(event,'3','4','forward')">Next<i
                                                    class="fa-solid fa-circle-right ml-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" p-4 rounded-lg bg-white dark:bg-gray-800" id="tab4" role="tabpanel"
                                aria-labelledby="contacts-tab">
                                <div id="accordion-collapse" data-accordion="collapse">
                                    <h2 id="accordion-collapse-heading-1">
                                        <button type="button"
                                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                                            data-accordion-target="#accordion-collapse-body-1" aria-expanded="false"
                                            aria-controls="accordion-collapse-body-1">
                                            <span>Valve Condition</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-collapse-body-1" class="hidden"
                                        aria-labelledby="accordion-collapse-heading-1">
                                        <div class="border border-b-0">
                                            <div id="assessmentFormByDeviceType" class="">
                                                @switch($deviceTypeInitial)
                                                    @case('COV')
                                                        @include('sitewalkdown.assessment.edit-valve-condition.edit-cond-cov')
                                                    @break

                                                    @case('REG')
                                                        @include('sitewalkdown.assessment.edit-valve-condition.edit-cond-reg')
                                                    @break

                                                    @case('CKV')
                                                        @include('sitewalkdown.assessment.edit-valve-condition.edit-cond-ckv')
                                                    @break

                                                    @case('ISV')
                                                        @include('sitewalkdown.assessment.edit-valve-condition.edit-cond-isv')
                                                    @break

                                                    @case('PRV')
                                                        @include('sitewalkdown.assessment.edit-valve-condition.edit-cond-prv')
                                                    @break

                                                    @case('MAV')
                                                        @include('sitewalkdown.assessment.edit-valve-condition.edit-cond-mav')
                                                    @break

                                                    @default
                                                @endswitch
                                            </div>
                                            <!-- Final Recommendation -->
                                            <div class="flex flex-wrap mt-5">
                                                <div class="md:w-full pr-4 pl-4 mb-5">
                                                    <div
                                                        class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                        <div class="p-3">
                                                            <div class="flex flex-wrap ">
                                                                <div class="lg:w-1/2 pr-4 pl-4 md:w-full sm:w-full">
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Valve Health
                                                                            Rating</label>
                                                                        <input type="text"
                                                                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                                                            id="health_level_rating"
                                                                            name="health_level_rating" readonly
                                                                            value="{{ $assessment->healthRating->title }}">
                                                                    </div>
                                                                </div>
                                                                <div class="lg:w-1/2 pr-4 pl-4 md:w-full sm:w-full">
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Priority Rating</label>
                                                                        <div class="relative flex items-stretch w-full">
                                                                            <div class="input-group-prepend">
                                                                                <span
                                                                                    class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-4 px-3 leading-normal no-underline"
                                                                                    id="health_priority_rating_color"
                                                                                    name="health_priority_rating_color"
                                                                                    @if (!empty($assessment->health_level_color)) style="background-color:{{ $assessment->health_level_color }}" @endif></span>
                                                                            </div>
                                                                            <input type="text"
                                                                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                                                                id="health_priority_rating"
                                                                                name="health_priority_rating" readonly
                                                                                value="{{ $assessment->priorityRating->title }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex flex-wrap ">
                                                                <div class="md:w-full pr-4 pl-4">
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Final
                                                                            Recommendation</label>
                                                                        <textarea
                                                                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                                                            id="final_recommendation" name="final_recommendation" rows="3">{{ $assessment->final_recommendation }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 id="accordion-collapse-heading-2">
                                        <button type="button"
                                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                                            data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                                            aria-controls="accordion-collapse-body-2">
                                            <span>Leak Detector</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-collapse-body-2" class="hidden"
                                        aria-labelledby="accordion-collapse-heading-2">
                                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                                            <!-- Ultrasonic -->
                                            <div class="flex flex-wrap mb-5">
                                                <div class="md:w-full pr-4 pl-4">
                                                    <div
                                                        class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                        <div
                                                            class="flex flex-wrap mb-3 px-3 py-3 text-sm font-medium text-center border-b border-gray-200 rounded-t-lg bg-gray-800 dark:border-gray-700 dark:text-blue-400 dark:bg-gray-800">
                                                            <h3 class="expanel-title text-white">Ultrasonic Leak Detector
                                                            </h3>
                                                        </div>
                                                        <div class="expanel-body">
                                                            <div class="flex flex-wrap ">
                                                                <div class="md:w-full pr-4 pl-4">
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Select passing detection
                                                                            method</label>
                                                                        <select id="leak_detection_method"
                                                                            name="leak_detection_method"
                                                                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2">
                                                                            <option value="" @if (empty($assessment->leak_detection_method))
                                                                                selected
                                                                            @endif></option>
                                                                            <option value="0" @if ($assessment->leak_detection_method === 0)
                                                                                selected
                                                                            @endif>2 Point</option>
                                                                            <option value="1" @if ($assessment->leak_detection_method === 1)
                                                                                selected
                                                                            @endif>4 Point</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex flex-wrap ">
                                                                <div class="md:w-1/4 pr-4 pl-4">
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Value - B</label>
                                                                        <input type="text" id="value_b"
                                                                            name="value_b"
                                                                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                                                            placeholder="Input here.." value="{{ $assessment->value_b }}">
                                                                    </div>
                                                                </div>
                                                                <div class="md:w-1/4 pr-4 pl-4">
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Value - C</label>
                                                                        <input type="text" id="value_c"
                                                                            name="value_c"
                                                                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                                                            placeholder="Input here.." value="{{ $assessment->value_c }}">
                                                                    </div>
                                                                </div>
                                                                <div class="md:w-1/4 pr-4 pl-4">
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Value - A</label>
                                                                        <input type="text" id="value_a"
                                                                            name="value_a"
                                                                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                                                            placeholder="Input here.." value="{{ $assessment->value_a }}">
                                                                    </div>
                                                                </div>
                                                                <div class="md:w-1/4 pr-4 pl-4">
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Value - D</label>
                                                                        <input type="text" id="value_d"
                                                                            name="value_d"
                                                                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                                                            placeholder="Input here.." value="{{ $assessment->value_d }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex flex-wrap ">
                                                                <div class="md:w-1/3 pr-4 pl-4">
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Passing detection
                                                                            result</label>
                                                                        <input type="text"
                                                                            id="passing_detection_result"
                                                                            name="passing_detection_result"
                                                                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                                                            placeholder="Input here.." value="{{ $assessment->passing_detection_result }}">
                                                                    </div>
                                                                </div>
                                                                <div class="md:w-1/3 pr-4 pl-4">
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Leak Out value</label>
                                                                        <input type="text" id="leak_out_value"
                                                                            name="leak_out_value"
                                                                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                                                            placeholder="Input here.." value="{{ $assessment->leak_out_value }}">
                                                                    </div>
                                                                </div>
                                                                <div class="md:w-1/3 pr-4 pl-4">
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Leak Out detection
                                                                            result</label>
                                                                        <input type="text" id="leak_out_result"
                                                                            name="leak_out_result"
                                                                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                                                            placeholder="Input here.." value="{{ $assessment->leak_out_result }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- VOC -->
                                            <div class="flex flex-wrap ">
                                                <div class="md:w-full pr-4 pl-4">
                                                    <div
                                                        class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                        <div
                                                            class="flex flex-wrap mb-3 px-3 py-3 text-sm font-medium text-center border-b border-gray-200 rounded-t-lg bg-gray-800 dark:border-gray-700 dark:text-blue-400 dark:bg-gray-800">
                                                            <h3 class="expanel-title text-white">VOC Leak Detector</h3>
                                                        </div>
                                                        <div class="expanel-body">
                                                            <div class="flex flex-wrap ">
                                                                <div class="md:w-full pr-4 pl-4">
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Value</label>
                                                                        <input type="text" id="voc_leak_value"
                                                                            name="voc_leak_value"
                                                                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                                                            placeholder="Input here.." value="{{ $assessment->voc_leak_value }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 id="accordion-collapse-heading-3">
                                        <button type="button"
                                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border  border-gray-200 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                                            data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                                            aria-controls="accordion-collapse-body-3">
                                            <span>Access Point</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-collapse-body-3" class="hidden"
                                        aria-labelledby="accordion-collapse-heading-3">
                                        <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                                            <div>
                                                <div class="flex flex-wrap ">
                                                    <div class="md:w-1/3 pr-4 pl-4">
                                                        <div class="mb-4">
                                                            <label class="form-label">Rigging Point Needed</label>
                                                            <select id="rigging_point_needed" name="rigging_point_needed"
                                                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2">
                                                                <option value="" @if (empty($assessment->rigging_point_needed))
                                                                    selected
                                                                @endif></option>
                                                                <option value="Yes" @if ($assessment->rigging_point_needed === "Yes")
                                                                    selected
                                                                @endif>Yes</option>
                                                                <option value="No" @if ($assessment->rigging_point_needed === "No")
                                                                    selected
                                                                @endif>No</option>
                                                                <option value="Data Not Available" @if ($assessment->rigging_point_needed === "Data Not Available")
                                                                    selected
                                                                @endif>Data Not Available</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="md:w-1/3 pr-4 pl-4">
                                                        <div class="mb-4">
                                                            <label class="form-label">Rigging Point Available</label>
                                                            <select id="rigging_point_available"
                                                                name="rigging_point_available"
                                                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2">
                                                                <option value="" @if (empty($assessment->rigging_point_available))
                                                                    selected
                                                                @endif></option>
                                                                <option value="Yes" @if ($assessment->rigging_point_available === "Yes")
                                                                    selected
                                                                @endif>Yes</option>
                                                                <option value="No" @if ($assessment->rigging_point_available === "No")
                                                                    selected
                                                                @endif>No</option>
                                                                <option value="Data Not Available" @if ($assessment->rigging_point_available === "Data Not Available")
                                                                    selected
                                                                @endif>Data Not Available</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="md:w-1/3 pr-4 pl-4">
                                                        <div class="mb-4">
                                                            <label class="form-label">Scaffolding Required</label>
                                                            <select id="scaffolding_required" name="scaffolding_required"
                                                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2">
                                                                <option value="" @if (empty($assessment->scaffolding_required))
                                                                    selected
                                                                @endif></option>
                                                                <option value="Yes" @if ($assessment->scaffolding_required === "Yes")
                                                                    selected
                                                                @endif>Yes</option>
                                                                <option value="No" @if ($assessment->scaffolding_required === "No")
                                                                    selected
                                                                @endif>No</option>
                                                                <option value="Data Not Available" @if ($assessment->scaffolding_required === "Data Not Available")
                                                                    selected
                                                                @endif>Data Not Available</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex flex-wrap ">
                                                    <div class="md:w-full pr-4 pl-4">
                                                        <div class="mb-4">
                                                            <label class="form-label">Upload Image</label>
                                                            <div class="relative flex items-stretch w-full">
                                                                <input type="file" id="upload_ap" name="upload_ap"
                                                                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                                                    accept=".png,.jpg,.jpeg">
                                                                <span class="input-group-append">
                                                                    <button type="button"
                                                                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-3 px-3 leading-normal no-underline btn-gray"
                                                                        onclick="uploadImage('upload_ap','AP','{{ route('swd.file.upload') }}')">Upload</button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex flex-wrap ">
                                                    <div class="md:w-full pr-4 pl-4">
                                                        <div class="mb-4">
                                                            <label class="form-label">Images</label>
                                                            <div class="justified-gallery-AP"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-auto p-0 mx-0">
                                    <div class="flex flex-wrap  border-t py-3">
                                        <div class="md:w-1/2 pr-4 pl-4">
                                            <button
                                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-2.5 px-3 leading-normal no-underline bg-gray-900 text-white hover:bg-gray-900"
                                                onclick="goToNextPage(event,'2','3','backward')"><i
                                                    class="fa-solid fa-circle-left mr-2"></i>Prev</button>
                                        </div>
                                        <div class="md:w-1/2 pr-2 pl-2 text-right">
                                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                                class="text-white bg-[#FF9119] mt-3 hover:bg-[#FF9119]/80 focus:ring-4 focus:outline-none focus:ring-[#FF9119]/50 font-medium rounded-lg text-sm px-7 py-2.5 text-center inline-flex items-center dark:hover:bg-[#FF9119]/80 dark:focus:ring-[#FF9119]/40 me-2 mb-2"
                                                type="button"><i class="fas fa-check mr-1"></i>Save
                                            </button>
                                            <!-- Dropdown menu -->
                                            <div id="dropdown"
                                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                    aria-labelledby="dropdownDefaultButton">
                                                    <li>
                                                        <a href="#"
                                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                            onclick="saveAssessment(1)"><i
                                                                class="fa-solid fa-check-double mr-2"></i>Complete</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                            onclick="saveAssessment(0)"><i
                                                                class="fa-brands fa-firstdraft mr-2"></i>Draft</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            {{-- <div class="relative inline-flex align-middle mb-0">
                                                <button type="button"
                                                    class="align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-orange  inline-block w-0 h-0 ml-1 align border-b-0 border-t-1 border-r-1 border-l-1"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                        class="fas fa-check mr-1"></i>Save</button>
                                                <div
                                                    class=" absolute left-0 z-50 float-left hidden list-reset	 py-2 mt-1 text-base bg-white border border-gray-300 rounded">
                                                    <a class="block w-full py-1 px-6 font-normal text-gray-900 whitespace-no-wrap border-0"
                                                        href="#" onclick="saveAssessment(0)"><i
                                                            class="fa-brands fa-firstdraft mr-2"></i>Draft</a>
                                                    <div class="h-0 my-2 overflow-hidden border-t-1 border-gray-300"></div>
                                                    <a class="block w-full py-1 px-6 font-normal text-gray-900 whitespace-no-wrap border-0"
                                                        href="#" onclick="saveAssessment(1)"><i
                                                            class="fa-solid fa-check-double mr-2"></i>Complete</a>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
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
                    </div>
                    <!-- Modal footer -->
                </div>
            </div>
        </div>
        {{-- END --}}

        <!-- Main modal Tag -->
        <div id="taglistmodal" tabindex="-1" aria-hidden="true"
            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
            <div class="relative max-h-full w-full max-w-md">
                <!-- Modal content -->
                <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between rounded-t border-b p-3 dark:border-gray-600">
                        <h6 class="text-sm font-semibold text-gray-900 dark:text-white lg:text-base ">
                            Tag Number
                        </h6>
                        <button type="button" onclick="openTagList(0)"
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
                    <div class="space-y-2 p-2">
                        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                                data-tabs-toggle="#default-tab-content" role="tablist">
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab"
                                        data-tabs-target="#profile" type="button" role="tab"
                                        onclick="$('#tags-instruction-table').DataTable().ajax.reload()"
                                        aria-controls="profile" aria-selected="false">Browse from instructions</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                                        aria-controls="dashboard" aria-selected="false"
                                        onclick="$('#tags-product-table').DataTable().ajax.reload()">Browse from
                                        products</button>
                                </li>
                            </ul>
                        </div>
                        <div id="default-tab-content">
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
                                aria-labelledby="profile-tab">
                                <input type="hidden" id="instruction-id">
                                <table id="tags-instruction-table" class="table table-striped table-bordered"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p text-center">Tag#</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                                aria-labelledby="dashboard-tab">
                                <table id="tags-product-table" class="table table-striped table-bordered"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p text-center">Tag#</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <!-- Modal footer -->
                </div>
            </div>
        </div>
        {{-- END Modal tag --}}
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script defer src="{{ asset('themes/core/pages/instruction/js/create-validation.js') }}"></script> --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    {{-- <script src="{{ asset('themes/core/pages/instruction/js/general-params.js') }}"></script> --}}
    <script src="{{ asset('core/js/sitewalkdown/assessment/select2-custom.js') }}?v=1.0"></script>
    <script src="{{ asset('core/js/sitewalkdown/assessment/edit-functions.js') }}?v=1.0"></script>
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

        $(function() {
            loadAreaSelectbox(@json($selectBoxData['area_sbx']));
            loadOtherAreaSelectbox(@json($selectBoxData['otherarea_sbx']));
        });
    </script>
@endsection
