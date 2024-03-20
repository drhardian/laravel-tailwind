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
                data-scope="specific"
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
    <!-- Design -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Design</label>
            <select id="valve_design" name="valve_design" class="form-control select2-dropdown-ajax"
                data-show="{{ route('dropdowns.showdropdowns') }}" 
                data-store="{{ route('dropdowns.storenewdropdown') }}"
                data-form="valve_design" 
                data-alias="VLVDSG" 
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Seat Material -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Seat Material</label>
            <select id="seat_material" name="seat_material" class="form-control select2-dropdown-ajax"
                data-show="{{ route('dropdowns.showdropdowns') }}" 
                data-store="{{ route('dropdowns.storenewdropdown') }}"
                data-form="seat_material" 
                data-alias="SETMTR" 
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Air Assisted -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Air Assisted</label>
            <select id="air_assisted" name="air_assisted" class="form-control select2-static">
                <option value="" selected></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <!-- Dampener -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Dampener</label>
            <select id="dampener" name="dampener" class="form-control select2-static">
                <option value="" selected></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <!-- Counter Weight -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Counter Weight</label>
            <select id="counter_weight" name="counter_weight" class="form-control select2-static">
                <option value="" selected></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
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