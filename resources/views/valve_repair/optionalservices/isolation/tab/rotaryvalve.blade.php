<div class="flex items-center">
    <input id="roatry_valve_checkbox" type="checkbox" name="material_verification_checkbox" value="1"
        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="checked-checkbox" class="ml-2 text-md font-medium text-gray-900 dark:text-gray-300">Data Not
        Available</label>
</div>
<div class="row sm:w-1/2 mt-5">
    <label for="roatry_valve_uom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UOM</label>
    <select id="roatry_valve_uom" name="roatry_valve_uom" required
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected value="" disabled>Choose a Option</option>
        <option value="Inch">Inch</option>
        <option value="mm">mm</option>
    </select>
</div>

<div class="" id="slidingstemcontent">
    <div class="mb-6 mt-6">
        <div class="row sm:flex">
            <div id="actuator_automation_found" class=" {{ 1 == 2 ? 'sm:w-2/2' : 'sm:w-1/2' }} w-full sm:pr-2">
                <h5 class="mb-4 text-sm font-medium leading-none text-gray-900 dark:text-white">
                    ROTARY VALVE DIMENSIONAL DATA (AS FOUND)</h5>

                <label for="packing_box_bore_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Packing Box Bore</label>
                <input type="text" id="packing_box_bore_found" name="packing_box_bore_found"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">
                <label for="shaft_diameter_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Shaft Diameter</label>
                <input type="text" id="shaft_diameter_found" name="shaft_diameter_found"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">
                <label for="upper_guide_bushing_id_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upper Guide Bushing ID</label>
                <input type="text" id="upper_guide_bushing_id_found" name="upper_guide_bushing_id_found"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">
                <label for="upper_guide_post_od_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upper Guide Post OD</label>
                <input type="text" id="upper_guide_post_od_found" name="upper_guide_post_od_found"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">
                <label for="lower_guide_bushing_id_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lower Guide Bushing ID</label>
                <input type="text" id="lower_guide_bushing_id_found" name="lower_guide_bushing_id_found"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">
                <label for="lower_guide_post_od_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lower Guide Post OD</label>
                <input type="text" id="lower_guide_post_od_found" name="lower_guide_post_od_found"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">
                <label for="seat_seal_id_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seat/Seal ID</label>
                <input type="text" id="seat_seal_id_found" name="seat_seal_id_found"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">
                <label for="packing_box_depth_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Packing Box Depth</label>
                <input type="text" id="packing_box_depth_found" name="packing_box_depth_found"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">
                <label for="bushing_retainer_oal_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bushing Retainer OAL</label>
                <input type="text" id="bushing_retainer_oal_found" name="bushing_retainer_oal_found"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">
            </div>

            <div id="actuator_automation_left" class=" sm:w-1/2 w-full sm:pr-2">
                <h5 class="mb-4 text-sm font-medium leading-none text-gray-900 dark:text-white">
                    ROTARY VALVE DIMENSIONAL DATA (AS LEFT)</h5>


                <label for="packing_box_bore_left"
                    class="block mb-2 text-sm f ont-medium text-gray-900 dark:text-white">Packing Box Bore</label>
                <select id="packing_box_bore_left" name="packing_box_bore_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    <option value="Pass">Pass</option>
                    <option value="Fail">Fail</option>
                </select>

                <label for="shaft_diameter_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Shaft Diameter</label>
                <select id="shaft_diameter_left" name="shaft_diameter_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    <option value="Pass">Pass</option>
                    <option value="Fail">Fail</option>
                </select>

                <label for="upper_guide_bushing_id_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upper Guide Bushing ID</label>
                <select id="upper_guide_bushing_id_left" name="upper_guide_bushing_id_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    <option value="Pass">Pass</option>
                    <option value="Fail">Fail</option>
                </select>

                <label for="upper_guide_post_od_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upper Guide Post OD</label>
                <select id="upper_guide_post_od_left" name="upper_guide_post_od_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    <option value="Pass">Pass</option>
                    <option value="Fail">Fail</option>
                </select>

                <label for="lower_guide_bushing_id_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lower Guide Bushing ID</label>
                <select id="lower_guide_bushing_id_left" name="lower_guide_bushing_id_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    <option value="Pass">Pass</option>
                    <option value="Fail">Fail</option>
                </select>

                <label for="lower_guide_post_od_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lower Guide Post OD</label>
                <select id="lower_guide_post_od_left" name="lower_guide_post_od_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    <option value="Pass">Pass</option>
                    <option value="Fail">Fail</option>
                </select>

                <label for="seat_seal_id_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seat/Seal ID</label>
                <select id="seat_seal_id_left" name="seat_seal_id_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    <option value="Pass">Pass</option>
                    <option value="Fail">Fail</option>
                </select>

                <label for="packing_box_depth_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Packing Box Depth</label>
                <select id="packing_box_depth_left" name="packing_box_depth_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    <option value="Pass">Pass</option>
                    <option value="Fail">Fail</option>
                </select>

                <label for="bushing_retainer_oal_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bushing Retainer OAL</label>
                <select id="bushing_retainer_oal_left" name="bushing_retainer_oal_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    <option value="Pass">Pass</option>
                    <option value="Fail">Fail</option>
                </select>
            </div>


        </div>

        <div id="rotary_valve_note_div" class="row sm:flex mt-3">
            <div class="w-full sm:pr-2">
                <label for="rotary_valve_note"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
                <textarea
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write note here..." id="rotary_valve_note" name="rotary_valve_note"></textarea>
            </div>
        </div>
    </div>
</div>
