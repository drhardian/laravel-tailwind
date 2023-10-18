<div class="flex items-center">
    <input id="id_ahc_checkbox" name="ahc_checkbox" type="checkbox"
        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="checked-checkbox" class="ml-2 text-md font-medium text-gray-900 dark:text-gray-300">Data Not
        Available</label>
</div>
<div class="row sm:flex mb-6 mt-6">
    <div id="actuator_construction_found" class=" {{ 1 == 2 ? 'sm:w-2/2' : 'sm:w-1/2' }} w-full sm:pr-2">
        <h5 class="mb-4 text-sm font-medium leading-none text-gray-900 dark:text-white">
            CONSTRUCTION (AS FOUND)</h5>
        <label for="ahc_type_found" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
        <select id="ahc_type_found" name="ahc_type_found" required
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected value="" disabled>Choose a type</option>
            @foreach ($vrr_dropdown as $value)
                @if ($value->dropdown_category == 'type_actuator_construction')
                    <option value="{{ $value->id }}">
                        {{ $value->dropdown_label }}
                    </option>
                @endif
            @endforeach
        </select>
        <label for="ahc_size_found" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size</label>
        <select id="ahc_size_found" name="ahc_size_found" required
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected value="" disabled>Choose a Size</option>
            @foreach ($vrr_dropdown as $value)
                @if ($value->dropdown_category == 'size_actuator')
                    <option value="{{ $value->id }}">
                        {{ $value->dropdown_label }}
                    </option>
                @endif
            @endforeach
        </select>
        <label for="ahc_mounting_found"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mounting</label>

        <select id="ahc_mounting_found" name="ahc_mounting_found" required
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected value="" disabled>Choose a Mounting</option>
            @foreach ($vrr_dropdown as $value)
                @if ($value->dropdown_category == 'mounting_actuator')
                    <option value="{{ $value->id }}">
                        {{ $value->dropdown_label }}
                    </option>
                @endif
            @endforeach
        </select>
        <label for="ahc_action_found"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Action</label>
        <select id="ahc_action_found" name="ahc_action_found" required
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected value="" disabled>Choose a Mounting</option>
            @foreach ($vrr_dropdown as $value)
                @if ($value->dropdown_category == 'action_actuator')
                    <option value="{{ $value->id }}">
                        {{ $value->dropdown_label }}
                    </option>
                @endif
            @endforeach
        </select>
        <label for="ahc_model_found" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
        <input type="text" id="ahc_model_found" name="ahc_model_found"
            class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required placeholder="Model">
        <label for="ahc_serial_found" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial
            Number</label>
        <input type="text" id="ahc_serial_found" name="ahc_serial_found"
            class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required placeholder="Serial">
    </div>
    <div id="actuator_construction_left" class="sm:w-1/2 w-full sm:pr-2">
        <h5 class="mb-4 text-sm font-medium leading-none text-gray-900 dark:text-white">
            CONSTRUCTION (AS LEFT)</h5>
        <label for="ahc_type_left" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
        <select id="ahc_type_left" name="ahc_type_left" required
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected value="" disabled>Choose a type</option>
            @foreach ($vrr_dropdown as $value)
                @if ($value->dropdown_category == 'type_actuator_construction')
                    <option value="{{ $value->id }}">
                        {{ $value->dropdown_label }}
                    </option>
                @endif
            @endforeach
        </select>
        <label for="ahc_size_left" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size</label>
        <select id="ahc_size_left" name="ahc_size_left" required
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected value="" disabled>Choose a Size</option>
            @foreach ($vrr_dropdown as $value)
                @if ($value->dropdown_category == 'size_actuator')
                    <option value="{{ $value->id }}">
                        {{ $value->dropdown_label }}
                    </option>
                @endif
            @endforeach
        </select>
        <label for="ahc_mounting_left"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mounting</label>

        <select id="ahc_mounting_left" name="ahc_mounting_left" required
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected value="" disabled>Choose a Mounting</option>
            @foreach ($vrr_dropdown as $value)
                @if ($value->dropdown_category == 'mounting_actuator')
                    <option value="{{ $value->id }}">
                        {{ $value->dropdown_label }}
                    </option>
                @endif
            @endforeach
        </select>
        <label for="ahc_action_left" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Action</label>
        <select id="ahc_action_left" name="ahc_action_left" required
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected value="" disabled>Choose a Mounting</option>
            @foreach ($vrr_dropdown as $value)
                @if ($value->dropdown_category == 'action_actuator')
                    <option value="{{ $value->id }}">
                        {{ $value->dropdown_label }}
                    </option>
                @endif
            @endforeach
        </select>
        <label for="ahc_model_left" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
        <input type="text" id="ahc_model_left" name="ahc_model_left"
            class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required placeholder="Model">
        <label for="ahc_serial_left" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial
            Number</label>
        <input type="text" id="ahc_serial_left" name="ahc_serial_left"
            class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required placeholder="Serial">
    </div>
</div>
<div id="actuator_construction_note_div" class="row sm:flex mt-3">
    <div class="w-full sm:pr-2">
        <label for="ahc_note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
        <textarea
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Write note here..." id="ahc_note" name="ahc_note"></textarea>
    </div>
</div>
