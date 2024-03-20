<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-1 bg-gray-dark-lighter">
                <div class="text-white m-2">
                    <h4 class="mb-0">Body</h4>
                </div>
            </div>
            <div class="card-body p-3 pb-0">
                <div class="row">
                    <!-- Body Manufacturer -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Body Manufacturer</label>
                            <select id="body_mfc" name="body_mfc" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="body_mfc" 
                                data-alias="BDYMFC" 
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Body Serial Number -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Body Serial Number</label>
                            <select id="body_sn" name="body_sn" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="body_sn" 
                                data-alias="BDYSNM" 
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Body Model -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Body Model</label>
                            <select id="body_model" name="body_model" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="body_model" 
                                data-alias="BDYMDL" 
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Body Size -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Body Size</label>
                            <select id="body_size" name="body_size" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="body_size" 
                                data-alias="BDYSZE" 
                                data-scope=""
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Body Material -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Body Material</label>
                            <select id="body_material" name="body_material" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="body_material" 
                                data-alias="BDYMTR" 
                                data-scope=""
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Class Rating -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Class Rating</label>
                            <select id="class_rating" name="class_rating" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="class_rating" 
                                data-alias="CLSRTG" 
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- End Connection -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">End Connection</label>
                            <select id="end_connection" name="end_connection" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="end_connection" 
                                data-alias="ENDCON" 
                                data-scope=""
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Insulation -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Insulation</label>
                            <select id="insulation" name="insulation" class="form-control select2-static">
                                <option value="" selected></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <!-- Leakage Class -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Leakage Class</label>
                            <select id="leakage_class" name="leakage_class" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="leakage_class" 
                                data-alias="LKGCLS" 
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Flow Direction -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Flow Direction</label>
                            <select id="flow_direction" name="flow_direction" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="flow_direction" 
                                data-alias="FLWDRC" 
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
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-1 bg-gray-dark-lighter">
                <div class="text-white m-2">
                    <h4 class="mb-0">Actuator</h4>
                </div>
            </div>
            <div class="card-body p-3 pb-0">
                <div class="row">
                    <!-- Actuator Manufacturer -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Actuator Manufacturer</label>
                            <select id="actuator_mfc" name="actuator_mfc" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="actuator_mfc" 
                                data-alias="ACTMFC" 
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Actuator Serial Number -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Actuator Serial Number</label>
                            <select id="actuator_sn" name="actuator_sn" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="actuator_sn" 
                                data-alias="ACTSNM" 
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Actuator Model -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Actuator Model</label>
                            <select id="actuator_model" name="actuator_model" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="actuator_model" 
                                data-alias="ACTMDL" 
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Actuator Size -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Actuator Size</label>
                            <select id="actuator_size" name="actuator_size" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="actuator_size" 
                                data-alias="ACTSZE" 
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Fail Position -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Fail Position</label>
                            <select id="fail_position" name="fail_position" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="fail_position" 
                                data-alias="FILPOS" 
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Manual Override -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Manual Override</label>
                            <select id="manual_override" name="manual_override" class="form-control select2-static">
                                <option value="" selected></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-1 bg-gray-dark-lighter">
                <div class="text-white m-2">
                    <h4 class="mb-0">Gear Type</h4>
                </div>
            </div>
            <div class="card-body p-3 pb-0">
                <div class="row">
                    <!-- Gear Manufacturer -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Gear Manufacturer</label>
                            <select id="gear_mfc" name="gear_mfc" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="gear_mfc" 
                                data-alias="GERMFC" 
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Gear Model -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Gear Model</label>
                            <select id="gear_model" name="gear_model" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="gear_model" 
                                data-alias="GERMDL" 
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Gear Size -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Gear Size</label>
                            <select id="gear_size" name="gear_size" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
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
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-1 bg-gray-dark-lighter">
                <div class="text-white m-2">
                    <h4 class="mb-0">Positioner & Instrument/Accessories</h4>
                </div>
            </div>
            <div class="card-body p-3 pb-0">
                <div class="row">
                    <!-- Positioner Manufacturer -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Positioner Manufacturer</label>
                            <select id="positioner_mfc" name="positioner_mfc" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="positioner_mfc" 
                                data-alias="POSMFC" 
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Positioner Serial Number -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Positioner Serial Number</label>
                            <select id="positioner_sn" name="positioner_sn" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="positioner_sn" 
                                data-alias="POSSNM" 
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Positioner Model -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Positioner Model</label>
                            <select id="positioner_model" name="positioner_model" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="positioner_model" 
                                data-alias="POSMDL" 
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Communication Protocol -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Communication Protocol</label>
                            <select id="communication_protocol" name="communication_protocol" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="communication_protocol" 
                                data-alias="COMPRO" 
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Instrument/Accessory -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Instrument/Accessory</label>
                            <select id="instrument_acc" name="instrument_acc" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="instrument_acc" 
                                data-alias="INSACC" 
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Instrument/Accessory Serial Number -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Instrument/Accessory Serial Number</label>
                            <select id="instrument_acc_sn" name="instrument_acc_sn" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
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
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-1 bg-gray-dark-lighter">
                <div class="text-white m-2">
                    <h4 class="mb-0">Other Information</h4>
                </div>
            </div>
            <div class="card-body p-3 pb-0">
                <div class="row">
                    <!-- Rating -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Rating</label>
                            <select id="info_rating" name="info_rating" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="info_rating" 
                                data-alias="VLVRTG" 
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Plug -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Plug</label>
                            <select id="info_plug" name="info_plug" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="info_plug" 
                                data-alias="VLVPLG" 
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Stem -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Stem</label>
                            <select id="info_stem" name="info_stem" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="info_stem" 
                                data-alias="VLVSTM" 
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Body -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Body</label>
                            <select id="info_body" name="info_body" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="info_body" 
                                data-alias="VLVBDY" 
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Seat -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Seat</label>
                            <select id="info_seat" name="info_seat" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
                                data-form="info_seat" 
                                data-alias="VLVSAT" 
                                data-scope="specific"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <!-- Face to Face Dimension -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Face to Face Dimension</label>
                            <select id="facetoface_dimension" name="facetoface_dimension" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('dropdowns.showdropdowns') }}" 
                                data-store="{{ route('dropdowns.storenewdropdown') }}"
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
