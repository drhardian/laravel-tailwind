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
    <!-- Plug/Wegde/Gate Material -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Plug/Wegde/Gate Material</label>
            <select id="plug_material" name="plug_material" class="form-control select2-dropdown-ajax"
                data-show="{{ route('dropdowns.showdropdowns') }}" 
                data-store="{{ route('dropdowns.storenewdropdown') }}"
                data-form="plug_material" 
                data-alias="PLGMTR" 
                data-scope=""
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
    <!-- Stem Material -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Stem Material</label>
            <select id="stem_material" name="stem_material" class="form-control select2-dropdown-ajax"
                data-show="{{ route('dropdowns.showdropdowns') }}" 
                data-store="{{ route('dropdowns.storenewdropdown') }}"
                data-form="stem_material" 
                data-alias="STMMTR" 
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Operator -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Operator</label>
            <select id="operator" name="operator" class="form-control select2-static">
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