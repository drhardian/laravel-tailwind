<div class="flex items-center">
    <input id="valvepretest_checkbox" type="checkbox" name="valvepretest_checkbox" value="1"
        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="vp_checked-checkbox" class="ml-2 text-md font-medium text-gray-900 dark:text-gray-300">Data Not
        Available</label>
</div>
<div class="" id="valvepretest">
    <div class="mb-6 mt-6 ">
        <div class="row sm:flex bg-gray-300 p-4  rounded-lg">
            <div id="valve_pretest_data_kiri" class="sm:w-1/2 w-full sm:pr-2">
                <label for="vp_test_technician" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Test
                    Technician/Engineer</label>
                <input type="text" id="vp_test_technician" name="vp_test_technician"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="Test Technician/Engineer">

                <label for="vp_test_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Test
                    Date</label>
                <input type="date" id="vp_test_date" name="vp_test_date"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="Test Technician/Engineer">
            </div>
            <div id="valve_pretest_data_kanan" class="sm:w-1/2 w-full sm:pr-2">
                <label for="vp_test_witnessed_by" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Test
                    Witnessed by</label>
                <input type="text" id="vp_test_witnessed_by" name="vp_test_witnessed_by"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="Test Witnessed by">
            </div>
        </div>


        <div class="row sm:flex mt-10">
            <div id="valve_pretest_data_kiri" class="sm:w-1/2 w-full sm:pr-2">
                <h4 class="font-bold">Seat</h4>
                <label for="vp_seak_leak_class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Test
                    Seak Leak Class</label>
                <select id="vp_seak_leak_class" name="vp_seak_leak_class" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Size</option>
                    @foreach ($vrr_dropdown as $value)
                        @if ($value->dropdown_category == 'seat_material')
                            <option value="{{ $value->id }}">
                                {{ $value->dropdown_label }}
                            </option>
                        @endif
                    @endforeach
                </select>

                <label for="vp_seat_test_pressure"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Test
                    Seat Test Pressure</label>
                <select id="vp_seat_test_pressure" name="vp_seat_test_pressure" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Size</option>
                    @foreach ($vrr_dropdown as $value)
                        @if ($value->dropdown_category == 'seat_material')
                            <option value="{{ $value->id }}">
                                {{ $value->dropdown_label }}
                            </option>
                        @endif
                    @endforeach
                </select>

                <label for="vp_seat_test_pressure_uom"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Test
                    Seat Test Pressure UOM</label>
                <select id="vp_seat_test_pressure_uom" name="vp_seat_test_pressure_uom" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Size</option>
                    @foreach ($vrr_dropdown as $value)
                        @if ($value->dropdown_category == 'seat_material')
                            <option value="{{ $value->id }}">
                                {{ $value->dropdown_label }}
                            </option>
                        @endif
                    @endforeach
                </select>
                <div id="valve_pretest_data_kiri" class="mt-4">
                    <h4 class="font-bold">Pressure</h4>
                    <label for="vp_pressure_class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pressure
                        Class</label>
                    <select id="vp_pressure_class" name="vp_pressure_class" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="" disabled>Choose a Size</option>
                        @foreach ($vrr_dropdown as $value)
                            @if ($value->dropdown_category == 'seat_material')
                                <option value="{{ $value->id }}">
                                    {{ $value->dropdown_label }}
                                </option>
                            @endif
                        @endforeach
                    </select>


                    <label for="vp_hydro_test_pressure"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hydro Test Pressure</label>
                    <input type="text" id="vp_hydro_test_pressure" name="vp_hydro_test_pressure"
                        class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required placeholder="">

                    <label for="vp_hydro_test_pressure_uom"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hydro Test Pressure
                        UOM</label>
                    <select id="vp_hydro_test_pressure_uom" name="vp_hydro_test_pressure_uom" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="" disabled>Choose a Size</option>
                        @foreach ($vrr_dropdown as $value)
                            @if ($value->dropdown_category == 'seat_material')
                                <option value="{{ $value->id }}">
                                    {{ $value->dropdown_label }}
                                </option>
                            @endif
                        @endforeach
                    </select>

                    <label for="vp_hydro_test_duration"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hydro Test Duration</label>
                    <select id="vp_hydro_test_duration" name="vp_hydro_test_duration" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="" disabled>Choose a Size</option>
                        @foreach ($vrr_dropdown as $value)
                            @if ($value->dropdown_category == 'seat_material')
                                <option value="{{ $value->id }}">
                                    {{ $value->dropdown_label }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="valve_pretest_data_kanan" class="sm:w-1/2 w-full sm:pr-2">
                <h4 class="font-bold">Leakage</h4>

                <label for="vp_allowable_leakage"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Allowable Leakage</label>
                <input type="text" id="vp_allowable_leakage" name="vp_allowable_leakage"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">

                <label for="vp_allowable_leakage_uom"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Allowable Leakage UOM</label>
                <select id="vp_allowable_leakage_uom" name="vp_allowable_leakage_uom" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Size</option>
                    @foreach ($vrr_dropdown as $value)
                        @if ($value->dropdown_category == 'seat_material')
                            <option value="{{ $value->id }}">
                                {{ $value->dropdown_label }}
                            </option>
                        @endif
                    @endforeach
                </select>

                <label for="vp_actual_leakage"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Actual
                    Leakage</label>
                <input type="text" id="vp_actual_leakage" name="vp_actual_leakage"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">

                <label for="vp_actual_leakage_uom"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Actual Leakage UOM</label>
                <select id="vp_actual_leakage_uom" name="vp_actual_leakage_uom" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Size</option>
                    @foreach ($vrr_dropdown as $value)
                        @if ($value->dropdown_category == 'seat_material')
                            <option value="{{ $value->id }}">
                                {{ $value->dropdown_label }}
                            </option>
                        @endif
                    @endforeach
                </select>

                <label for="vp_bc_note"
                    class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Note</label>
                <textarea
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write note here..." id="vp_bc_note" name="vp_bc_note"></textarea>
            </div>
        </div>
    </div>
</div>
