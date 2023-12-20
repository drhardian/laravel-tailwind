<div class="flex items-center">
    <input id="sliding_stemcontent_checkbox" type="checkbox" name="material_verification_checkbox" value="1"
        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="checked-checkbox" class="ml-2 text-md font-medium text-gray-900 dark:text-gray-300">Data Not
        Available</label>
</div>
<div class="row sm:w-1/2 mt-5">
    <label for="sliding_stemcontent_uom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UOM</label>
    <select id="sliding_stemcontent_uom" name="sliding_stemcontent_uom" required
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
                    SLIDING STEM DIMENSIONAL DATA (AS FOUND)</h5>

                <label for="packing_box_bore_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Packing Box Bore</label>
                <input type="text" id="packing_box_bore" name="packing_box_bore"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">
                <label for="stem_diameter_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stem
                    Diameter</label>
                <input type="text" id="stem_diameter" name="stem_diameter"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">
                <label for="bonnet_guide_od_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bonnet
                    Guide OD</label>
                <input type="text" id="bonnet_guide_od" name="bonnet_guide_od"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">
                <label for="upper_body_guide_id_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upper Body Guide ID</label>
                <input type="text" id="upper_body_guide_id" name="upper_body_guide_id"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">
                <label for="packing_box_bore_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upper
                    Guide Bushing ID</label>
                <input type="text" id="packing_box_bore" name="packing_box_bore"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">
                <label for="upper_guide_post_id_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upper Guide Post OD</label>
                <input type="text" id="upper_guide_post_id" name="upper_guide_post_id"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">
                <label for="cage_id_found" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cage
                    ID</label>
                <input type="text" id="cage_id" name="cage_id"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">
                <label for="upper_plug_seat_od_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upper Plug Seat OD</label>
                <input type="text" id="upper_plug_seat_od" name="upper_plug_seat_od"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">
                <label for="lower_plug_seat_od_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lower Plug Seat OD</label>
                <input type="text" id="lower_plug_seat_od" name="lower_plug_seat_od"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">
                <label for="upper_seat_ring_id_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upper Seat Ring ID</label>
                <input type="text" id="upper_seat_ring_id" name="upper_seat_ring_id"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">
                <label for="lower_seat_ring_id_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lower Seat Ring ID</label>
                <input type="text" id="lower_seat_ring_id" name="lower_seat_ring_id"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">
                <label for="blind_flange_gide_od_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blind Flange Guide OD</label>
                <input type="text" id="blind_flange_gide_od" name="blind_flange_gide_od"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">
                <label for="lower_guide_bushing_id_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lower Guide Bushing ID</label>
                <input type="text" id="lower_guide_bushing_id" name="lower_guide_bushing_id"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">
                <label for="lower_body_guide_id_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lower Body Guide ID</label>
                <input type="text" id="lower_body_guide_id" name="lower_body_guide_id"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">
                <label for="lower_guide_post_od_found"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lower Guide Post OD</label>
                <input type="text" id="lower_guide_post_od" name="lower_guide_post_od"
                    class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required placeholder="">

            </div>

            <div id="actuator_automation_left" class=" sm:w-1/2 w-full sm:pr-2">
                <h5 class="mb-4 text-sm font-medium leading-none text-gray-900 dark:text-white">
                    SLIDING STEM DIMENSIONAL DATA (AS LEFT)</h5>

                <label for="packing_box_bore_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Packing Box Bore</label>
                <select id="packing_box_bore_left" name="packing_box_bore_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    <option value="Pass">Pass</option>
                    <option value="Fail">Fail</option>
                </select>
                <label for="stem_diameter_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stem
                    Diameter</label>
                <select id="stem_diameter_left" name="stem_diameter_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    <option value="Pass">Pass</option>
                    <option value="Fail">Fail</option>
                </select>
                <label for="bonnet_guide_od_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bonnet
                    Guide OD</label>
                <select id="bonnet_guide_od_left" name="bonnet_guide_od_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    <option value="Pass">Pass</option>
                    <option value="Fail">Fail</option>
                </select>
                <label for="upper_body_guide_id_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upper Body Guide ID</label>
                <select id="upper_body_guide_id_left" name="upper_body_guide_id_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    <option value="Pass">Pass</option>
                    <option value="Fail">Fail</option>
                </select>
                <label for="packing_box_bore_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upper
                    Guide Bushing ID</label>
                <select id="packing_box_bore_left" name="packing_box_bore_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    <option value="Pass">Pass</option>
                    <option value="Fail">Fail</option>
                </select>
                <label for="upper_guide_post_id_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upper Guide Post OD</label>
                <select id="upper_guide_post_id_left" name="upper_guide_post_id_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    <option value="Pass">Pass</option>
                    <option value="Fail">Fail</option>
                </select>
                <label for="cage_id_left" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cage
                    ID</label>
                <select id="cage_id_left" name="cage_id_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    <option value="Pass">Pass</option>
                    <option value="Fail">Fail</option>
                </select>
                <label for="upper_plug_seat_od_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upper Plug Seat OD</label>
                <select id="upper_plug_seat_od_left" name="upper_plug_seat_od_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    <option value="Pass">Pass</option>
                    <option value="Fail">Fail</option>
                </select>
                <label for="lower_plug_seat_od_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lower Plug Seat OD</label>
                <select id="lower_plug_seat_od_left" name="lower_plug_seat_od_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    <option value="Pass">Pass</option>
                    <option value="Fail">Fail</option>
                </select>
                <label for="upper_seat_ring_id_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upper Seat Ring ID</label>
                <select id="upper_seat_ring_id_left" name="upper_seat_ring_id_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    <option value="Pass">Pass</option>
                    <option value="Fail">Fail</option>
                </select>
                <label for="lower_seat_ring_id_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lower Seat Ring ID</label>
                <select id="lower_seat_ring_id_left" name="lower_seat_ring_id_left" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="" disabled>Choose a Option</option>
                    <option value="Pass">Pass</option>
                    <option value="Fail">Fail</option>
                </select>
                <label for="blind_flange_gide_od_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blind Flange Guide OD</label>
                <select id="blind_flange_gide_od_left" name="blind_flange_gide_od_left" required
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
                <label for="lower_body_guide_id_left"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lower Body Guide ID</label>
                <select id="lower_body_guide_id_left" name="lower_body_guide_id_left" required
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


            </div>


        </div>

        <div id="sliding_stem_note_div" class="row sm:flex mt-3">
            <div class="w-full sm:pr-2">
                <label for="sliding_stem_note"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
                <textarea
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write note here..." id="sliding_stem_note" name="sliding_stem_note"></textarea>
            </div>
        </div>
    </div>
</div>
