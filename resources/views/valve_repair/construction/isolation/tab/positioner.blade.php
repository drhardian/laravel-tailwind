<div class="flex items-center">
    <input id="checkbox_positioner_isolation" type="checkbox" name="pc_checkbox" value="1"
        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="checked-checkbox" class="ml-2 text-md font-medium text-gray-900 dark:text-gray-300">Data Not
        Available</label>
</div>
<div class="mb-6 mt-6">
    <div class="row sm:flex">
        <div id="isolation_positioner_found" class=" {{ 1 == 2 ? 'sm:w-2/2' : 'sm:w-1/2' }} w-full sm:pr-2">
            <h5 class="mb-4 text-sm font-medium leading-none text-gray-900 dark:text-white">
                CONSTRUCTION (AS FOUND)</h5>

            <label for="pc_brand_found"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
            <select id="pc_brand_found" name="pc_brand_found" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Brand</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'positioner_brand')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>

            <label for="pc_model_found"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
            <input type="text" id="pc_model_found" name="pc_model_found"
                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required placeholder="Model">
            <label for="pc_serial_number_found"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial
                Number</label>
            <input type="text" id="pc_serial_number_found" name="pc_serial_number_found"
                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required placeholder="Serial">


            <label for="pc_action_found"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Action</label>
            <select id="pc_action_found" name="pc_action_found" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Action</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'positioner_action')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>

        <div id="isolation_positioner_left" class=" {{ 1 == 2 ? 'sm:w-2/2' : 'sm:w-1/2' }} w-full sm:pr-2">
            <h5 class="mb-4 text-sm font-medium leading-none text-gray-900 dark:text-white">
                CONSTRUCTION (AS LEFT)</h5>
            <label for="pc_brand_left"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
            <select id="pc_brand_left" name="pc_brand_left" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Brand</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'positioner_brand')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>

            <label for="pc_model_left"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
            <input type="text" id="pc_model_left" name="pc_model_left"
                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required placeholder="Model">
            <label for="pc_serial_number_left"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial
                Number</label>
            <input type="text" id="pc_serial_number_left" name="pc_serial_number_left"
                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required placeholder="Serial">


            <label for="pc_action_left"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Action</label>
            <select id="pc_action_left" name="pc_action_left" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Action</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'positioner_action')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>


    </div>
    <div id="isolation_positioner_note_div" class="row sm:flex mt-3">
        <div class="w-full sm:pr-2">
            <label for="pc_note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
            <textarea
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Write note here..." id="pc_note" name="pc_note"></textarea>
        </div>
    </div>
</div>
