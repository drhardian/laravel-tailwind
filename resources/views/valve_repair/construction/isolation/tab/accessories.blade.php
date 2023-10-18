<div class="flex items-center">
    <input id="checkbox_accessories_isolation" type="checkbox" name="ac_checkbox" value="1"
        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="checked-checkbox" class="ml-2 text-md font-medium text-gray-900 dark:text-gray-300">Data Not
        Available</label>
</div>
<div class="mb-6 mt-6">
    <div class="row sm:flex">
        <div id="isolation_accessories_found" class=" {{ 1 == 2 ? 'sm:w-2/2' : 'sm:w-1/2' }} w-full sm:pr-2">
            <h5 class="mb-4 text-sm font-medium leading-none text-gray-900 dark:text-white">
                CONSTRUCTION (AS FOUND)</h5>
            <label for="pc_brandss_found" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                Accesories</label>
            <select id="ac_selected_found" name="ac_selected_found[]" multiple="multiple" required class="select2">
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'accessories_isolation')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
                <table id="accessoriesTableFound" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Accessories Name
                            </th>
                            {{-- <th scope="col" class="px-6 py-3">
                                Action
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>

        <div id="isolation_accessories_left" class=" {{ 1 == 2 ? 'sm:w-2/2' : 'sm:w-1/2' }} w-full sm:pr-2">
            <h5 class="mb-4 text-sm font-medium leading-none text-gray-900 dark:text-white">
                CONSTRUCTION (AS LEFT)</h5>
            <label for="pc_brand_left"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
            <select id="ac_selected_left" name="ac_selected_left[]" multiple="multiple" required class="select2">
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'accessories_isolation')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
                <table id="accessoriesTableLeft" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Accessories Name
                            </th>
                            {{-- <th scope="col" class="px-6 py-3">
                                Action
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <div id="isolation_accessories_note_div" class="row sm:flex mt-3">
        <div class="w-full sm:pr-2">
            <label for="ac_note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
            <textarea
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Write note here..." id="ac_note" name="ac_note"></textarea>
            <label for="ac_note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Construction
                Change?</label>
                <div class="flex items-center mb-4">
                    <input id="construction_change_radio_true" type="radio" value="1" name="construction_change_radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Yes</label>
                </div>
                <div class="flex items-center">
                    <input id="construction_change_radio_false" type="radio" value="0" name="construction_change_radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">No</label>
                </div>
        </div>
    </div>
</div>
