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
    <!-- Code -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Code</label>
            <select id="code" name="code" class="form-control select2-dropdown-ajax"
                data-show="{{ route('dropdowns.showdropdowns') }}" 
                data-store="{{ route('dropdowns.storenewdropdown') }}"
                data-form="code" 
                data-alias="VLVCDE" 
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Inlet -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Inlet</label>
            <select id="inlet" name="inlet" class="form-control select2-dropdown-ajax"
                data-show="{{ route('dropdowns.showdropdowns') }}" 
                data-store="{{ route('dropdowns.storenewdropdown') }}"
                data-form="inlet" 
                data-alias="VLVINL" 
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Inlet Choose -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Inlet Choose</label>
            <select id="inlet_choose" name="inlet_choose" class="form-control select2-dropdown-ajax"
                data-show="{{ route('dropdowns.showdropdowns') }}" 
                data-store="{{ route('dropdowns.storenewdropdown') }}"
                data-form="inlet_choose" 
                data-alias="INLCHE" 
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Outlet -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Outlet</label>
            <select id="outlet" name="outlet" class="form-control select2-dropdown-ajax"
                data-show="{{ route('dropdowns.showdropdowns') }}" 
                data-store="{{ route('dropdowns.storenewdropdown') }}"
                data-form="outlet" 
                data-alias="VLVOUL" 
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Outlet Choose -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Outlet Choose</label>
            <select id="outlet_choose" name="outlet_choose" class="form-control select2-dropdown-ajax"
                data-show="{{ route('dropdowns.showdropdowns') }}" 
                data-store="{{ route('dropdowns.storenewdropdown') }}"
                data-form="outlet_choose" 
                data-alias="OULCHE" 
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Orifice Size -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Orifice Size</label>
            <select id="orifice_size" name="orifice_size" class="form-control select2-dropdown-ajax"
                data-show="{{ route('dropdowns.showdropdowns') }}" 
                data-store="{{ route('dropdowns.storenewdropdown') }}"
                data-form="orifice_size" 
                data-alias="ORFSZE" 
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Set -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Set</label>
            <select id="set" name="set" class="form-control select2-dropdown-ajax"
                data-show="{{ route('dropdowns.showdropdowns') }}" 
                data-store="{{ route('dropdowns.storenewdropdown') }}"
                data-form="set" 
                data-alias="VLVSET" 
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Capacity -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Capacity</label>
            <select id="capacity" name="capacity" class="form-control select2-dropdown-ajax"
                data-show="{{ route('dropdowns.showdropdowns') }}" 
                data-store="{{ route('dropdowns.storenewdropdown') }}"
                data-form="capacity" 
                data-alias="VLVCAP" 
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Pilot Operated -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Pilot Operated</label>
            <select id="pilot_operated" name="pilot_operated" class="form-control select2-static">
                <option value="" selected></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <!-- Choose -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Choose</label>
            <select id="choose" name="choose" class="form-control select2-dropdown-ajax"
                data-show="{{ route('dropdowns.showdropdowns') }}" 
                data-store="{{ route('dropdowns.storenewdropdown') }}"
                data-form="choose" 
                data-alias="VLVCHE" 
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
</div>