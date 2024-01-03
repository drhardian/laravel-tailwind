<div class="flex items-center">
    <input id="material_verification_checkbox" type="checkbox" name="material_verification_checkbox" value="1"
        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="checked-checkbox" class="ml-2 text-md font-medium text-gray-900 dark:text-gray-300">Data Not
        Available</label>
</div>
<div class="" id="materialverificationcontent">
    <div class="mb-6 mt-6">
        <div class="row sm:flex">
            <div id="actuator_automation_found" class=" {{ 1 == 2 ? 'sm:w-2/2' : 'sm:w-1/2' }} w-full sm:pr-2">
                <h5 class="mb-4 text-sm font-medium leading-none text-gray-900 dark:text-white">
                    MATERIAL VERIFICATION (AS FOUND)</h5>

                <label for="mv_body_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                <select id="mv_body_found" name="mv_body_found" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    @foreach ($vrr_dropdown as $value)
                        @if ($value->dropdown_category == 'actuated_automation_type')
                            <option value="{{ $value->id }}">
                                {{ $value->dropdown_label }}
                            </option>
                        @endif
                    @endforeach
                </select>

                <label for="mv_pdb_found" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plug /
                    Disc /
                    Ball</label>
                <select id="mv_pdb_found" name="mv_pdb_found" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    @foreach ($vrr_dropdown as $value)
                        @if ($value->dropdown_category == 'actuator_automation_type')
                            <option value="{{ $value->id }}">
                                {{ $value->dropdown_label }}
                            </option>
                        @endif
                    @endforeach
                </select>

                <label for="mv_stem_shaft_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stem /
                    Shaft</label>
                <select id="mv_stem_shaft_found" name="mv_stem_shaft_found" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    @foreach ($vrr_dropdown as $value)
                        @if ($value->dropdown_category == 'actuator_automation_brand')
                            <option value="{{ $value->id }}">
                                {{ $value->dropdown_label }}
                            </option>
                        @endif
                    @endforeach
                </select>

                <label for="mv_cage_found" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cage /
                    Retainer</label>
                <select id="mv_cage_found" name="mv_cage_found" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    @foreach ($vrr_dropdown as $value)
                        @if ($value->dropdown_category == 'actuator_automation_size')
                            <option value="{{ $value->id }}">
                                {{ $value->dropdown_label }}
                            </option>
                        @endif
                    @endforeach
                </select>

                <label for="mv_seat_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seat</label>
                <select id="mv_seat_found" name="mv_seat_found" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    @foreach ($vrr_dropdown as $value)
                        @if ($value->dropdown_category == 'actuator_automation_fail_mode')
                            <option value="{{ $value->id }}">
                                {{ $value->dropdown_label }}
                            </option>
                        @endif
                    @endforeach
                </select>

                <label for="mv_bushing_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bushings /
                    Bearings</label>
                <select id="mv_bushing_found" name="mv_bushing_found" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    @foreach ($vrr_dropdown as $value)
                        @if ($value->dropdown_category == 'actuator_automation_fail_mode')
                            <option value="{{ $value->id }}">
                                {{ $value->dropdown_label }}
                            </option>
                        @endif
                    @endforeach
                </select>

                <label for="mv_body_bonnet_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body /
                    Bonnet / Bolting</label>
                <select id="mv_body_bonnet_found" name="mv_body_bonnet_found" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    @foreach ($vrr_dropdown as $value)
                        @if ($value->dropdown_category == 'actuator_automation_fail_mode')
                            <option value="{{ $value->id }}">
                                {{ $value->dropdown_label }}
                            </option>
                        @endif
                    @endforeach
                </select>


                <label for="mv_gasket_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gaskets</label>
                <select id="mv_gasket_found" name="mv_gasket_found" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    @foreach ($vrr_dropdown as $value)
                        @if ($value->dropdown_category == 'actuator_automation_fail_mode')
                            <option value="{{ $value->id }}">
                                {{ $value->dropdown_label }}
                            </option>
                        @endif
                    @endforeach
                </select>
                <button type="button" onclick="copyDropdownValues()"
                    class="mt-4 px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Copy
                    As Found to As Left</button>


            </div>

            <div id="actuator_automation_left" class=" sm:w-1/2 w-full sm:pr-2">
                <h5 class="mb-4 text-sm font-medium leading-none text-gray-900 dark:text-white">
                    CONSTRUCTION (AS LEFT)</h5>

                <label for="mv_body_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                <select id="mv_body_left" name="mv_body_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    @foreach ($vrr_dropdown as $value)
                        @if ($value->dropdown_category == 'actuated_automation_type')
                            <option value="{{ $value->id }}">
                                {{ $value->dropdown_label }}
                            </option>
                        @endif
                    @endforeach
                </select>

                <label for="mv_pdb_left" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plug /
                    Disc /
                    Ball</label>
                <select id="mv_pdb_left" name="mv_pdb_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    @foreach ($vrr_dropdown as $value)
                        @if ($value->dropdown_category == 'actuator_automation_type')
                            <option value="{{ $value->id }}">
                                {{ $value->dropdown_label }}
                            </option>
                        @endif
                    @endforeach
                </select>

                <label for="mv_stem_shaft_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stem /
                    Shaft</label>
                <select id="mv_stem_shaft_left" name="mv_stem_shaft_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    @foreach ($vrr_dropdown as $value)
                        @if ($value->dropdown_category == 'actuator_automation_brand')
                            <option value="{{ $value->id }}">
                                {{ $value->dropdown_label }}
                            </option>
                        @endif
                    @endforeach
                </select>

                <label for="mv_cage_left" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cage /
                    Retainer</label>
                <select id="mv_cage_left" name="mv_cage_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    @foreach ($vrr_dropdown as $value)
                        @if ($value->dropdown_category == 'actuator_automation_size')
                            <option value="{{ $value->id }}">
                                {{ $value->dropdown_label }}
                            </option>
                        @endif
                    @endforeach
                </select>

                <label for="mv_seat_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seat</label>
                <select id="mv_seat_left" name="mv_seat_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    @foreach ($vrr_dropdown as $value)
                        @if ($value->dropdown_category == 'actuator_automation_fail_mode')
                            <option value="{{ $value->id }}">
                                {{ $value->dropdown_label }}
                            </option>
                        @endif
                    @endforeach
                </select>

                <label for="mv_bushing_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bushings /
                    Bearings</label>
                <select id="mv_bushing_left" name="mv_bushing_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    @foreach ($vrr_dropdown as $value)
                        @if ($value->dropdown_category == 'actuator_automation_fail_mode')
                            <option value="{{ $value->id }}">
                                {{ $value->dropdown_label }}
                            </option>
                        @endif
                    @endforeach
                </select>

                <label for="mv_body_bonnet_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body /
                    Bonnet / Bolting</label>
                <select id="mv_body_bonnet_left" name="mv_body_bonnet_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    @foreach ($vrr_dropdown as $value)
                        @if ($value->dropdown_category == 'actuator_automation_fail_mode')
                            <option value="{{ $value->id }}">
                                {{ $value->dropdown_label }}
                            </option>
                        @endif
                    @endforeach
                </select>


                <label for="mv_gasket_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gaskets</label>
                <select id="mv_gasket_left" name="mv_gasket_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    @foreach ($vrr_dropdown as $value)
                        @if ($value->dropdown_category == 'actuator_automation_fail_mode')
                            <option value="{{ $value->id }}">
                                {{ $value->dropdown_label }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div id="materialverification_note_div" class="row sm:flex mt-3">
            <div class="w-full sm:pr-2">
                <label for="mv_note"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
                <textarea
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write note here..." id="mv_note" name="mv_note"></textarea>
            </div>
        </div>
    </div>
</div>
