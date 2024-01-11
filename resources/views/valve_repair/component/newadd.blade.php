    <!-- New modal -->
    <div id="newModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" role="dialog" aria-modal="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-7xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white modal-title"></h3>
                    <button type="button" id="closeIco"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="px-6 space-y-6">
                    <!-- Alert Message Area -->
                    <div id="alert-frame">
                        <div id="warning-alert"
                            class="hidden items-center p-4 my-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium warning-alert-title"></span>
                                <ul class="mt-1.5 ml-4 list-disc list-inside warning-alert-message"></ul>
                            </div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                                onclick="$('#warning-alert').removeClass('flex').addClass('hidden')" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <!-- URL Area -->
                    <input type="hidden" id="form_url" readonly>
                    <!-- Form Area -->
                    <form id="mainForm" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                                data-tabs-toggle="#myTabContent" role="tablist">
                                <li class="mr-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="generalInformation-tab"
                                        data-tabs-target="#generalInformation" type="button" role="tab"
                                        aria-controls="generalInformation" aria-selected="false">GENERAL
                                        INFORMATION</button>
                                </li>
                                <li class="mr-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2  rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="deviceDetail-tab" data-tabs-target="#deviceDetail" type="button"
                                        role="tab" aria-controls="deviceDetail" aria-selected="false">DEVICE
                                        DETAIL</button>
                                </li>
                            </ul>
                        </div>
                        <div id="myTabContent">
                            {{-- Content general Information --}}
                            <div class="hidden p-4 rounded-lg bg-gray-0 dark:bg-gray-800" id="generalInformation"
                                role="tabpanel" aria-labelledby="generalInformation-tab">
                                <div class="mb-6">
                                    <div class="row sm:flex">
                                        <div class="sm:w-1/2 w-full sm:pr-2">
                                            <label for="customer"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer*</label>
                                            <input type="text" id="customer" name="customer"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required placeholder="Customer Name">
                                            <label for="contact_person"
                                                class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Contact
                                                Person</label>
                                            <input type="text" id="contact_person" name="contact_person"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Contact Person">
                                            <label for="title"
                                                class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                            <input type="text" id="title" name="title"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Contact Person">
                                            <label for="email_address"
                                                class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Email
                                                Address</label>
                                            <input type="text" id="email_address" name="email_address"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Email Address">
                                            <label for="end_user"
                                                class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">End
                                                User*</label>
                                            <input type="text" id="end_user" name="end_user"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required placeholder="End User">
                                            <label for="so_reference"
                                                class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">SO/Ref.*</label>
                                            <input type="text" id="so_reference" name="so_reference"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required placeholder="SO/Ref.">
                                            <label for="project"
                                                class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Project</label>
                                            <input type="text" id="project" name="project"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Project">
                                        </div>
                                        <div class="sm:w-1/2 w-full sm:pl-2 sm:pt-0 pt-6">
                                            <label for="work_type"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work
                                                Type*</label>
                                            <select id="work_type" name="work_type" required
                                                class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected value="" disabled>Choose a order type</option>
                                                @foreach ($vrr_dropdown as $workType)
                                                    @if ($workType->dropdown_category == 'work_type')
                                                        <option value="{{ $workType->id }}">
                                                            {{ $workType->dropdown_label }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <label for="order_type"
                                                class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Order
                                                Type*</label>
                                            <select id="order_type" name="order_type" onchange="showHideDiv()"
                                                class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected value="" disabled>Choose a order type</option>
                                                @foreach ($vrr_dropdown as $workType)
                                                    @if ($workType->dropdown_category == 'order_type')
                                                        <option value="{{ $workType->id }}">
                                                            {{ $workType->dropdown_label }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <label for="scope_of_work"
                                                class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Scope
                                                of
                                                Work</label>
                                            <select id="scope_of_work" name="scope_of_work"
                                                onchange="scope_of_workDiv()"
                                                class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected value="" disabled>Choose a order type</option>
                                                @foreach ($vrr_dropdown as $workType)
                                                    @if ($workType->dropdown_category == 'sow')
                                                        <option value="{{ $workType->id }}">
                                                            {{ $workType->dropdown_label }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <div id="repair_type_div" class="hidden">
                                                <label for="repair_type"
                                                    class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Repair
                                                    Type</label>

                                                    <select id="repair_type" name="repair_type"
                                                    class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option selected value="" disabled>Choose a order type</option>
                                                    @foreach ($vrr_dropdown as $workType)
                                                        @if ($workType->dropdown_category == 'repair_type')
                                                            <option value="{{ $workType->id }}">
                                                                {{ $workType->dropdown_label }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div
                                                class="max-w-full pl-3 mt-3 pb-3 pr-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                                                <label for="performed_by"
                                                    class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Performed
                                                    by*</label>
                                                <input type="text" id="performed_by" name="performed_by"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="Performed By">
                                                <label for="title_performed"
                                                    class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Title
                                                    Performed</label>
                                                <input type="text" id="title_performed" name="title_performed"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Title Performed">
                                                <label for="email_address_performed"
                                                    class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Email
                                                    Address Performed</label>
                                                <input type="text" id="email_address_performed"
                                                    name="email_address_performed"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Email Address Performed">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <div
                                        class="max-w-full pl-3 pt-3 mt-3 pb-3 pr-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                                        <div class="row sm:flex">
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="start_date"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start
                                                    Date*</label>
                                                <input type="date" id="start_date" name="start_date"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="Work Type">
                                            </div>
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <label for="estimate_end_date"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estimate
                                                    end date*</label>
                                                <input type="date" id="estimate_end_date" name="estimate_end_date"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required placeholder="Estimate end Date">
                                            </div>

                                        </div>
                                        <label for="field_diagnostic_only_job"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Field
                                            Diagnostic
                                            only job</label>
                                        <select id="field_diagnostic_only_job" name="field_diagnostic_only_job"
                                            class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected value="" disabled>Choose a Option</option>
                                            <option value=1>Yes</option>
                                            <option value=0>No</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- LTSA Information Card --}}
                                <div id="ltsa_div"
                                    class="hidden max-w-full pl-3 mt-3 mb-3 pb-3 pr-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                    <div class="mb-6 block mt-3">
                                        <div class="row sm:flex">
                                            <div class="sm:w-1/2 w-full sm:pr-2">
                                                <h5
                                                    class="mb-4 text-sm font-medium leading-none text-gray-900 dark:text-white">
                                                    LTSA Information</h5>
                                                <label for="ltsa_title"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LTSA
                                                    Title</label>
                                                <input type="text" id="ltsa_title" name="ltsa_title"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="LTSA Title">
                                                <label for="ltsa_ref"
                                                    class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">LTSA
                                                    Ref.</label>
                                                <input type="text" id="ltsa_ref" name="ltsa_ref"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Contact Person">
                                                <label for="ro_number"
                                                    class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">RO
                                                    Number</label>
                                                <input type="text" id="ro_number" name="ro_number"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="RO Number">
                                                <label for="ro_date"
                                                    class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">RO Date</label>
                                                <input type="date" id="ro_date" name="ro_date"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="RO Date">
                                                <label for="ex_station_p_f"
                                                    class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Ex
                                                    Station P/F</label>
                                                <input type="text" id="ex_station_p_f" name="ex_station_p_f"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Ex Station  P/F">
                                                <label for="ltsa_project"
                                                    class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Project</label>
                                                <input type="text" id="ltsa_project" name="ltsa_project"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="ltsa_project">
                                            </div>
                                            <div class="sm:w-1/2 w-full sm:pl-2 sm:pt-0 pt-6">
                                                <h5
                                                    class="mb-4 text-sm font-medium leading-none text-gray-900 dark:text-white">
                                                    LTSA PIC Information</h5>
                                                <label for="ltsa_manager"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LTSA
                                                    Manager*</label>
                                                <input type="text" id="ltsa_manager" name="ltsa_manager"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="LTSA Manager">
                                                <label for="workshop_lead"
                                                    class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Workshop
                                                    Lead</label>
                                                <input type="text" id="workshop_lead" name="workshop_lead"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Workshop Lead">
                                                <label for="engineering_lead"
                                                    class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Engineering
                                                    Lead</label>
                                                <input type="text" id="engineering_lead" name="engineering_lead"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Engineering Lead">
                                                <label for="qc_inspector"
                                                    class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">QC
                                                    Inspector</label>
                                                <input type="text" id="qc_inspector" name="qc_inspector"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="QC Insepector">

                                                <label for="painting_operator"
                                                    class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Painting
                                                    Operator</label>
                                                <input type="text" id="painting_operator" name="painting_operator"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Painting Operator">

                                                <label for="ndt_level"
                                                    class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">NDT
                                                    Level II </label>
                                                <input type="text" id="ndt_level" name="ndt_level"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="NDT Level II ">
                                                <label for="other_ptcs_personel"
                                                    class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Add
                                                    Other PTCS personel</label>
                                                <input type="text" id="other_ptcs_personel"
                                                    name="other_ptcs_personel"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Add Other PTCS personel">

                                                <label for="qc_representative"
                                                    class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Customer
                                                    QC Representative</label>
                                                <input type="text" id="qc_representative" name="qc_representative"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Customer QC Representative">

                                                <label for="other_customer_personel"
                                                    class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Add
                                                    Other customer personel</label>
                                                <input type="text" id="other_customer_personel"
                                                    name="other_customer_personel"
                                                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Add Other customer personel">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-6">
                                    <label for="note"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
                                    <textarea
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Write note here..." id="note" name="note"></textarea>
                                </div>

                            </div>
                            <div class="hidden p-4 rounded-lg bg-gray-0 dark:bg-gray-800" id="deviceDetail"
                                role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="mb-6">
                                    <div class="row sm:flex">
                                        <div class="sm:w-1/2 w-full sm:pr-2">
                                            <label for="device_type"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device
                                                Type*</label>
                                            <select id="device_type" name="device_type" required onchange="onChangeDeviceType()"
                                                class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected value="" disabled>Choose a Device Type</option>
                                                @foreach ($vrr_dropdown as $workType)
                                                    @if ($workType->dropdown_category == 'device_type')
                                                        <option value="{{ $workType->id }}">
                                                            {{ $workType->dropdown_label }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <label for="selected_device_type"
                                                class="block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">"Selected
                                                Device" Type</label>
                                            <select id="selected_device_type" name="selected_device_type" required
                                                class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected value="0" disabled>Choose a device type</option>
                                                @foreach ($vrr_dropdown as $workType)
                                                    @if ($workType->dropdown_category == 'selected_device_type')
                                                        <option value="{{ $workType->id }}">
                                                            {{ $workType->dropdown_label }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <label for="tag_number"
                                                class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Tag
                                                Number</label>
                                            <input type="text" id="tag_number" name="tag_number"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Add Other customer personel">
                                            <label for="serial_number"
                                                class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Serial
                                                Number</label>
                                            <input type="text" id="serial_number" name="serial_number"
                                                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Serial Number">
                                            <label for="process"
                                                class="block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">Process</label>
                                            <select id="process" name="process" required
                                                class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected value="" disabled>Choose a Process</option>
                                                @foreach ($vrr_dropdown as $workType)
                                                    @if ($workType->dropdown_category == 'process_device_detail')
                                                        <option value="{{ $workType->id }}">
                                                            {{ $workType->dropdown_label }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="sm:w-1/2 w-full sm:pr-2">

                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Upload multiple files</label>
                                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="photo_devices" name="photo_devices[]" type="file" onchange="preview_image();" multiple>
                                            <div id="image_preview" class="grid grid-cols-4 gap-4">


                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>

                    </form>
                </div>
                <!-- Modal footer -->
                <div
                    class="flex flex-row hiddenflex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 py-4">
                    <div class="basis-2/4 flex justify-start">
                        <button type="button" onClick="goToGeneralInformation()" id="generalInformationButton"
                            class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Back Step: General Information
                        </button>
                        <button id="cancelBtn" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                    </div>
                    <div class="basis-2/4 flex justify-end">
                        <button type="button" onClick="goToDeviceInfo()" id="deviceDetailButton"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Next Step: Device Detail
                        </button>
                        <button type="button" id="saveButtonAction"
                            class=" hidden ml-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            onClick="saveRecord()">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
