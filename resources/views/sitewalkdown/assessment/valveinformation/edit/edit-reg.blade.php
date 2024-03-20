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
                @if (!empty($assessment->product->body_mfc))
                    <option value="{{ $assessment->product->body_mfc }}" selected>{{ $assessment->product->body_mfc }}</option>
                @else
                    <option value="" disabled selected></option>
                @endif
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
                @if (!empty($assessment->product->body_sn))
                    <option value="{{ $assessment->product->body_sn }}" selected>{{ $assessment->product->body_sn }}</option>
                @else
                    <option value="" disabled selected></option>
                @endif
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
                @if (!empty($assessment->product->body_model))
                    <option value="{{ $assessment->product->body_model }}" selected>{{ $assessment->product->body_model }}</option>
                @else
                    <option value="" disabled selected></option>
                @endif
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
                data-scope="specific"
                data-change="false">
                @if (!empty($assessment->product->body_size))
                    <option value="{{ $assessment->product->body_size }}" selected>{{ $assessment->product->body_size }}</option>
                @else
                    <option value="" disabled selected></option>
                @endif
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
                @if (!empty($assessment->product->body_material))
                    <option value="{{ $assessment->product->body_material }}" selected>{{ $assessment->product->body_material }}</option>
                @else
                    <option value="" disabled selected></option>
                @endif
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
                @if (!empty($assessment->product->class_rating))
                    <option value="{{ $assessment->product->class_rating }}" selected>{{ $assessment->product->class_rating }}</option>
                @else
                    <option value="" disabled selected></option>
                @endif
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
                @if ($assessment->product->end_connection !== null)
                    <option value="{{ $assessment->product->end_connection }}" selected>{{ $assessment->product->end_connection }}</option>
                @else
                    <option value="" disabled selected></option>
                @endif
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
                @if ($productDetail->orifice_size !== null)
                    <option value="{{ $productDetail->orifice_size }}" selected>{{ $productDetail->orifice_size }}</option>
                @else
                    <option value="" disabled selected></option>
                @endif
            </select>
        </div>
    </div>
    <!-- Spring Range -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Spring Range</label>
            <select id="spring_range" name="spring_range" class="form-control select2-dropdown-ajax"
                data-show="{{ route('dropdowns.showdropdowns') }}" 
                data-store="{{ route('dropdowns.storenewdropdown') }}"
                data-form="spring_range" 
                data-alias="SPRRNG" 
                data-scope="specific"
                data-change="false">
                @if ($productDetail->spring_range !== null)
                    <option value="{{ $productDetail->spring_range }}" selected>{{ $productDetail->spring_range }}</option>
                @else
                    <option value="" disabled selected></option>
                @endif
            </select>
        </div>
    </div>
    <!-- Spring Color -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Spring Color</label>
            <select id="spring_color" name="spring_color" class="form-control select2-dropdown-ajax"
                data-show="{{ route('dropdowns.showdropdowns') }}" 
                data-store="{{ route('dropdowns.storenewdropdown') }}"
                data-form="spring_color" 
                data-alias="SPRCLR" 
                data-scope="specific"
                data-change="false">
                @if ($productDetail->spring_color !== null)
                    <option value="{{ $productDetail->spring_color }}" selected>{{ $productDetail->spring_color }}</option>
                @else
                    <option value="" disabled selected></option>
                @endif
            </select>
        </div>
    </div>
    <!-- Setpoint -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Setpoint</label>
            <select id="setpoint" name="setpoint" class="form-control select2-dropdown-ajax"
                data-show="{{ route('dropdowns.showdropdowns') }}" 
                data-store="{{ route('dropdowns.storenewdropdown') }}"
                data-form="setpoint" 
                data-alias="SETPNT" 
                data-scope="specific"
                data-change="false">
                @if ($productDetail->setpoint !== null)
                    <option value="{{ $productDetail->setpoint }}" selected>{{ $productDetail->setpoint }}</option>
                @else
                    <option value="" disabled selected></option>
                @endif
            </select>
        </div>
    </div>
    <!-- Pilot Manufacturer -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Pilot Manufacturer</label>
            <select id="pilot_mfc" name="pilot_mfc" class="form-control select2-dropdown-ajax"
                data-show="{{ route('dropdowns.showdropdowns') }}" 
                data-store="{{ route('dropdowns.storenewdropdown') }}"
                data-form="pilot_mfc" 
                data-alias="PLTMFC" 
                data-scope="specific"
                data-change="false">
                @if ($productDetail->pilot_mfc !== null)
                    <option value="{{ $productDetail->pilot_mfc }}" selected>{{ $productDetail->pilot_mfc }}</option>
                @else
                    <option value="" disabled selected></option>
                @endif
            </select>
        </div>
    </div>
    <!-- Pilot Model -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Pilot Model</label>
            <select id="pilot_model" name="pilot_model" class="form-control select2-dropdown-ajax"
                data-show="{{ route('dropdowns.showdropdowns') }}" 
                data-store="{{ route('dropdowns.storenewdropdown') }}"
                data-form="pilot_model" 
                data-alias="PLTMDL" 
                data-scope="specific"
                data-change="false">
                @if ($productDetail->pilot_model !== null)
                    <option value="{{ $productDetail->pilot_model }}" selected>{{ $productDetail->pilot_model }}</option>
                @else
                    <option value="" disabled selected></option>
                @endif
            </select>
        </div>
    </div>
    <!-- Pilot Spring Range -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Pilot Spring Range</label>
            <select id="pilot_springrange" name="pilot_springrange" class="form-control select2-dropdown-ajax"
                data-show="{{ route('dropdowns.showdropdowns') }}" 
                data-store="{{ route('dropdowns.storenewdropdown') }}"
                data-form="pilot_springrange" 
                data-alias="PLTSPR" 
                data-scope="specific"
                data-change="false">
                @if ($productDetail->pilot_springrange !== null)
                    <option value="{{ $productDetail->pilot_springrange }}" selected>{{ $productDetail->pilot_springrange }}</option>
                @else
                    <option value="" disabled selected></option>
                @endif
            </select>
        </div>
    </div>
    <!-- Size -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Size</label>
            <select id="valve_size" name="valve_size" class="form-control select2-dropdown-ajax"
                data-show="{{ route('dropdowns.showdropdowns') }}" 
                data-store="{{ route('dropdowns.storenewdropdown') }}"
                data-form="valve_size" 
                data-alias="VLVSZE" 
                data-scope="specific"
                data-change="false">
                @if ($productDetail->valve_size !== null)
                    <option value="{{ $productDetail->valve_size }}" selected>{{ $productDetail->valve_size }}</option>
                @else
                    <option value="" disabled selected></option>
                @endif
            </select>
        </div>
    </div>
    <!-- Manual Override -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label">Manual Override</label>
            <select id="manual_override" name="manual_override" class="form-control select2-static">
                <option value="" @if (empty($assessment->product->manual_override))
                    selected
                @endif ></option>
                <option value="Yes" @if ($assessment->product->manual_override === "Yes")
                    selected
                @endif>Yes</option>
                <option value="No" @if ($assessment->product->manual_override === "No")
                    selected
                @endif>No</option>
            </select>
        </div>
    </div>
</div>