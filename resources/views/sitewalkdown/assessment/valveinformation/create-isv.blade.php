<div class="flex flex-wrap ">
    <div class="w-full mb-5">
        <div class="relative flex flex-col min-w-0  rounded-t-lg rounded break-words border bg-white border-1 border-gray-300">
            <div class="py-3 px-6 mb-0 bg-gray-600 rounded-t-lg border-b-1 border-gray-300 text-gray-900 p-1 bg-gray-dark-lighter">
                <div class="text-white m-2">
                    <h4 class="mb-0">Body</h4>
                </div>
            </div>
            <div class="flex-auto p-6 pb-0">
                <div class="flex flex-wrap ">
                    <!-- Body Manufacturer -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Body Manufacturer</label>
                            <select id="body_mfc" name="body_mfc" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="body_mfc"
                                data-alias="BDYMFC"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Body Serial Number -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Body Serial Number</label>
                            <select id="body_sn" name="body_sn" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="body_sn"
                                data-alias="BDYSNM"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Body Model -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Body Model</label>
                            <select id="body_model" name="body_model" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="body_model"
                                data-alias="BDYMDL"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Body Size -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Body Size</label>
                            <select id="body_size" name="body_size" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="body_size"
                                data-alias="BDYSZE"
                                data-scope=""
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Body Material -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Body Material</label>
                            <select id="body_material" name="body_material" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="body_material"
                                data-alias="BDYMTR"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Class Rating -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Class Rating</label>
                            <select id="class_rating" name="class_rating" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="class_rating"
                                data-alias="CLSRTG"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- End Connection -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">End Connection</label>
                            <select id="end_connection" name="end_connection" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="end_connection"
                                data-alias="ENDCON"
                                data-scope=""
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Plug/Wegde/Gate Material -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Plug/Wegde/Gate Material</label>
                            <select id="plug_material" name="plug_material" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="plug_material"
                                data-alias="PLGMTR"
                                data-scope=""
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Seat Material -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Seat Material</label>
                            <select id="seat_material" name="seat_material" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="seat_material"
                                data-alias="SETMTR"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Stem Material -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Stem Material</label>
                            <select id="stem_material" name="stem_material" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="stem_material"
                                data-alias="STMMTR"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Operator -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Operator</label>
                            <select id="operator" name="operator" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-static">
                                <option value="" selected></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <!-- Manual Override -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Manual Override</label>
                            <select id="manual_override" name="manual_override" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-static">
                                <option value="" selected></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <!-- Double Block & Bleed -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Double Block & Bleed</label>
                            <select id="doubleblock_bleed" name="doubleblock_bleed" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-static">
                                <option value="" selected></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <!-- Leakage Class -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Leakage Class</label>
                            <select id="leakage_class" name="leakage_class" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="leakage_class"
                                data-alias="LKGCLS"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="flex flex-wrap ">
    <div class="w-full mb-5">
        <div class="relative flex flex-col min-w-0  rounded-t-lg rounded break-words border bg-white border-1 border-gray-300">
            <div class="py-3 px-6 mb-0 bg-gray-600 rounded-t-lg border-b-1 border-gray-300 text-gray-900 p-1 bg-gray-dark-lighter">
                <div class="text-white m-2">
                    <h4 class="mb-0">Actuator</h4>
                </div>
            </div>
            <div class="flex-auto p-6 pb-0">
                <div class="flex flex-wrap ">
                    <!-- Actuator Manufacturer -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Actuator Manufacturer</label>
                            <select id="actuator_mfc" name="actuator_mfc" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="actuator_mfc"
                                data-alias="ACTMFC"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Actuator Serial Number -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Actuator Serial Number</label>
                            <select id="actuator_sn" name="actuator_sn" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="actuator_sn"
                                data-alias="ACTSNM"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Actuator Model -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Actuator Model</label>
                            <select id="actuator_model" name="actuator_model" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="actuator_model"
                                data-alias="ACTMDL"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Actuator Size -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Actuator Size</label>
                            <select id="actuator_size" name="actuator_size" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="actuator_size"
                                data-alias="ACTSZE"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Multi-Turn -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Multi-Turn</label>
                            <select id="multi_turn" name="multi_turn" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-static">
                                <option value="" selected></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <!-- Torque Seated -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Torque Seated</label>
                            <select id="torque_seated" name="torque_seated" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-static">
                                <option value="" selected></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <!-- Quarter Turn -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Quarter Turn</label>
                            <select id="quarter_turn" name="quarter_turn" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-static">
                                <option value="" selected></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <!-- Position Seated -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Position Seated</label>
                            <select id="position_seated" name="position_seated" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-static">
                                <option value="" selected></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <!-- Local Control -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Local Control</label>
                            <select id="local_control" name="local_control" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-static">
                                <option value="" selected></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <!-- Remote Control -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Remote Control</label>
                            <select id="remote_control" name="remote_control" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-static">
                                <option value="" selected></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <!-- Ratio -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Ratio</label>
                            <select id="actuator_ratio" name="actuator_ratio" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-static">
                                <option value="" selected></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <!-- Fail Position -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Fail Position</label>
                            <select id="fail_position" name="fail_position" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="fail_position"
                                data-alias="FILPOS"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="flex flex-wrap ">
    <div class="w-full mb-5">
        <div class="relative flex flex-col min-w-0  rounded-t-lg rounded break-words border bg-white border-1 border-gray-300">
            <div class="py-3 px-6 mb-0 bg-gray-600 rounded-t-lg border-b-1 border-gray-300 text-gray-900 p-1 bg-gray-dark-lighter">
                <div class="text-white m-2">
                    <h4 class="mb-0">Gear Type</h4>
                </div>
            </div>
            <div class="flex-auto p-6 pb-0">
                <div class="flex flex-wrap ">
                    <!-- Gear Manufacturer -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Gear Manufacturer</label>
                            <select id="gear_mfc" name="gear_mfc" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="gear_mfc"
                                data-alias="GERMFC"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Gear Model -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Gear Model</label>
                            <select id="gear_model" name="gear_model" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="gear_model"
                                data-alias="GERMDL"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Gear Size -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Gear Size</label>
                            <select id="gear_size" name="gear_size" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="gear_size"
                                data-alias="GERSZE"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="flex flex-wrap ">
    <div class="w-full mb-5">
        <div class="relative flex flex-col min-w-0  rounded-t-lg rounded break-words border bg-white border-1 border-gray-300">
            <div class="py-3 px-6 mb-0 bg-gray-600 rounded-t-lg border-b-1 border-gray-300 text-gray-900 p-1 bg-gray-dark-lighter">
                <div class="text-white m-2">
                    <h4 class="mb-0">Instrument/Accessories</h4>
                </div>
            </div>
            <div class="flex-auto p-6 pb-0">
                <div class="flex flex-wrap ">
                    <!-- Instrument/Accessory -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Instrument/Accessory</label>
                            <select id="instrument_acc" name="instrument_acc" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="instrument_acc"
                                data-alias="INSACC"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Instrument/Accessory Serial Number -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Instrument/Accessory Serial Number</label>
                            <select id="instrument_acc_sn" name="instrument_acc_sn" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="instrument_acc_sn"
                                data-alias="INSACN"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="flex flex-wrap ">
    <div class="w-full mb-5">
        <div class="relative flex flex-col min-w-0  rounded-t-lg rounded break-words border bg-white border-1 border-gray-300">
            <div class="py-3 px-6 mb-0 bg-gray-600 rounded-t-lg border-b-1 border-gray-300 text-gray-900 p-1 bg-gray-dark-lighter">
                <div class="text-white m-2">
                    <h4 class="mb-0">Other Information</h4>
                </div>
            </div>
            <div class="flex-auto p-6 pb-0">
                <div class="flex flex-wrap ">
                    <!-- Rating -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Rating</label>
                            <select id="info_rating" name="info_rating" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="info_rating"
                                data-alias="VLVRTG"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Plug -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Plug</label>
                            <select id="info_plug" name="info_plug" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="info_plug"
                                data-alias="VLVPLG"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Stem -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Stem</label>
                            <select id="info_stem" name="info_stem" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="info_stem"
                                data-alias="VLVSTM"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Body -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Body</label>
                            <select id="info_body" name="info_body" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="info_body"
                                data-alias="VLVBDY"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Seat -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Seat</label>
                            <select id="info_seat" name="info_seat" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="info_seat"
                                data-alias="VLVSAT"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Face to Face Dimension -->
                    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Face to Face Dimension</label>
                            <select id="facetoface_dimension" name="facetoface_dimension" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                                data-form="facetoface_dimension"
                                data-alias="VLVFDM"
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
