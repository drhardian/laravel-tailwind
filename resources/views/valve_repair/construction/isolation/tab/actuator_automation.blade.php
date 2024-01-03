<div class="flex items-center">
    <input id="checkbox_actuator_automation" type="checkbox" name="aa_checkbox" value="1"
        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="checked-checkbox" class="ml-2 text-md font-medium text-gray-900 dark:text-gray-300">Data Not
        Available</label>
</div>
<div class="mb-6 mt-6">
    <div class="row sm:flex">
        <div id="actuator_automation_found" class=" {{ 1 == 2 ? 'sm:w-2/2' : 'sm:w-1/2' }} w-full sm:pr-2">
            <h5 class="mb-4 text-sm font-medium leading-none text-gray-900 dark:text-white">
                CONSTRUCTION (AS FOUND)</h5>

            <label for="aa_actuated_automation_type_found"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Actuated Automation Type</label>
            <select id="aa_actuated_automation_type_found" name="aa_actuated_automation_type_found" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Actuated Automation Type</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'actuated_automation_type')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>

            <label for="aa_type_found" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
            <select id="aa_type_found" name="aa_type_found" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Type</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'actuator_automation_type')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>

            <label for="aa_brand_found" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
            <select id="aa_brand_found" name="aa_brand_found" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Brand</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'actuator_automation_brand')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>

            <label for="aa_size_found" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size</label>
            <select id="aa_size_found" name="aa_size_found" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'actuator_automation_size')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>

            <label for="aa_fail_mode_found" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">fail_mode</label>
            <select id="aa_fail_mode_found" name="aa_fail_mode_found" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Fail Mode</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'actuator_automation_fail_mode')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="aa_model_found" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
            <input type="text" id="aa_model_found" name="aa_model_found"
                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required placeholder="Model">
            <label for="aa_serial_number_found" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial
                Number</label>
            <input type="text" id="aa_serial_number_found" name="aa_serial_number_found"
                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required placeholder="Serial">
        </div>

        <div id="actuator_automation_left" class=" sm:w-1/2 w-full sm:pr-2">
            <h5 class="mb-4 text-sm font-medium leading-none text-gray-900 dark:text-white">
                CONSTRUCTION (AS LEFT)</h5>

            <label for="aa_actuated_automation_type_left"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Actuated Automation Type</label>
            <select id="aa_actuated_automation_type_left" name="aa_actuated_automation_type_left" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Actuated Automation Type</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'actuated_automation_type')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>

            <label for="aa_type_left" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
            <select id="aa_type_left" name="aa_type_left" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Type</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'actuator_automation_type')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>

            <label for="aa_brand_left" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
            <select id="aa_brand_left" name="aa_brand_left" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Brand</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'actuator_automation_brand')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>

            <label for="aa_size_left" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size</label>
            <select id="aa_size_left" name="aa_size_left" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'actuator_automation_size')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>

            <label for="aa_fail_mode_left" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fail Mode</label>
            <select id="aa_fail_mode_left" name="aa_fail_mode_left" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Fail Mode</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'actuator_automation_fail_mode')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="aa_model_left" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
            <input type="text" id="aa_model_left" name="aa_model_left"
                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required placeholder="Model">
            <label for="aa_serial_number_left" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial
                Number</label>
            <input type="text" id="aa_serial_number_left" name="aa_serial_number_left"
                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required placeholder="Serial">
        </div>


    </div>
    <div id="automation_note_div" class="row sm:flex mt-3">
        <div class="w-full sm:pr-2">
            <label for="aa_note"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
            <textarea
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Write note here..." id="aa_note" name="aa_note"></textarea>
        </div>
    </div>
</div>
