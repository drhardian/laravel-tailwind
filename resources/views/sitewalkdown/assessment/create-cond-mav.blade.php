<!-- Packing -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix">
                Packing
                <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button" data-toggle="collapse" data-target="#collapseAS1" aria-expanded="false" aria-controls="collapseAS1">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
            <div class="expanel-body collapse" id="collapseAS1">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Valve Condition</label>
                            <select id="valve_condition_1" name="valve_condition_1" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                data-form="valve_condition_1"
                                data-alias="AS1"
                                data-scope=""
                                data-reff-reset="true"
                                data-reff="health_rating_1"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Health Rating</label>
                            <select id="health_rating_1" name="health_rating_1" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('swd.healthratings.showdropdowns') }}"
                                data-store=""
                                data-form="health_rating_1"
                                data-alias=""
                                data-scope=""
                                data-change="false">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Potensial Cause</label>
                            <select id="potensial_cause_1" name="potensial_cause_1[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                data-form="potensial_cause_1"
                                data-alias="AS1"
                                data-scope=""
                                data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Recommendation</label>
                            <select id="recommendation_1" name="recommendation_1[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                data-form="recommendation_1"
                                data-alias="AS1"
                                data-scope=""
                                data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Upload Image</label>
                            <div class="input-group">
                                <input type="file" id="upload_1" name="upload_1" class="form-control" accept=".png,.jpg,.jpeg">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-gray" onclick="uploadImage('upload_1','AS1','{{ route('swd.file.upload') }}')">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Images</label>
                            <div class="justified-gallery-AS1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pressure Seal Gasket Area -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix">
                Pressure Seal Gasket Area
                <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button" data-toggle="collapse" data-target="#collapseAS2" aria-expanded="false" aria-controls="collapseAS2">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
            <div class="expanel-body collapse" id="collapseAS2">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Valve Condition</label>
                            <select id="valve_condition_2" name="valve_condition_2" class="form-control select2-dropdown-ajax select2-dropdown-ajax-new"
                                data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                data-form="valve_condition_2"
                                data-alias="AS2"
                                data-scope=""
                                data-reff-reset="true"
                                data-reff="health_rating_2"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Health Rating</label>
                            <select id="health_rating_2" name="health_rating_2" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('swd.healthratings.showdropdowns') }}"
                                data-store=""
                                data-form="health_rating_2"
                                data-alias=""
                                data-scope=""
                                data-change="false">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Potensial Cause</label>
                            <select id="potensial_cause_2" name="potensial_cause_2[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                data-form="potensial_cause_2"
                                data-alias="AS2"
                                data-scope=""
                                data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Recommendation</label>
                            <select id="recommendation_2" name="recommendation_2[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                data-form="recommendation_2"
                                data-alias="AS2"
                                data-scope=""
                                data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Upload Image</label>
                            <div class="input-group">
                                <input type="file" id="upload_2" name="upload_2" class="form-control" accept=".png,.jpg,.jpeg">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-gray" onclick="uploadImage('upload_2','AS2','{{ route('swd.file.upload') }}')">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Images</label>
                            <div class="justified-gallery-AS2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bonnet Gasket -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix">
                Bonnet Gasket
                <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button" data-toggle="collapse" data-target="#collapseAS3" aria-expanded="false" aria-controls="collapseAS3">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
            <div class="expanel-body collapse" id="collapseAS3">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Valve Condition</label>
                            <select id="valve_condition_3" name="valve_condition_3" class="form-control select2-dropdown-ajax select2-dropdown-ajax-new"
                                data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                data-form="valve_condition_3"
                                data-alias="AS3"
                                data-scope=""
                                data-reff-reset="true"
                                data-reff="health_rating_3"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Health Rating</label>
                            <select id="health_rating_3" name="health_rating_3" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('swd.healthratings.showdropdowns') }}"
                                data-store=""
                                data-form="health_rating_3"
                                data-alias=""
                                data-scope=""
                                data-change="false">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Potensial Cause</label>
                            <select id="potensial_cause_3" name="potensial_cause_3[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                data-form="potensial_cause_3"
                                data-alias="AS3"
                                data-scope=""
                                data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Recommendation</label>
                            <select id="recommendation_3" name="recommendation_3[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                data-form="recommendation_3"
                                data-alias="AS3"
                                data-scope=""
                                data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Upload Image</label>
                            <div class="input-group">
                                <input type="file" id="upload_3" name="upload_3" class="form-control" accept=".png,.jpg,.jpeg">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-gray" onclick="uploadImage('upload_3','AS3','{{ route('swd.file.upload') }}')">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Images</label>
                            <div class="justified-gallery-AS3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Valve Body -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix">
                Valve Body
                <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button" data-toggle="collapse" data-target="#collapseAS4" aria-expanded="false" aria-controls="collapseAS4">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
            <div class="expanel-body collapse" id="collapseAS4">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Valve Condition</label>
                            <select id="valve_condition_4" name="valve_condition_4" class="form-control select2-dropdown-ajax select2-dropdown-ajax-new"
                                data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                data-form="valve_condition_4"
                                data-alias="AS4"
                                data-scope=""
                                data-reff-reset="true"
                                data-reff="health_rating_4"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Health Rating</label>
                            <select id="health_rating_4" name="health_rating_4" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('swd.healthratings.showdropdowns') }}"
                                data-store=""
                                data-form="health_rating_4"
                                data-alias=""
                                data-scope=""
                                data-change="false">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Potensial Cause</label>
                            <select id="potensial_cause_4" name="potensial_cause_4[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                data-form="potensial_cause_4"
                                data-alias="AS4"
                                data-scope=""
                                data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Recommendation</label>
                            <select id="recommendation_4" name="recommendation_4[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                data-form="recommendation_4"
                                data-alias="AS4"
                                data-scope=""
                                data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Upload Image</label>
                            <div class="input-group">
                                <input type="file" id="upload_4" name="upload_4" class="form-control" accept=".png,.jpg,.jpeg">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-gray" onclick="uploadImage('upload_4','AS4','{{ route('swd.file.upload') }}')">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Images</label>
                            <div class="justified-gallery-AS4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Valve Trim -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix">
                Valve Trim
                <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button" data-toggle="collapse" data-target="#collapseAS5" aria-expanded="false" aria-controls="collapseAS5">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
            <div class="expanel-body collapse" id="collapseAS5">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Valve Condition</label>
                            <select id="valve_condition_5" name="valve_condition_5" class="form-control select2-dropdown-ajax select2-dropdown-ajax-new"
                                data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                data-form="valve_condition_5"
                                data-alias="AS5"
                                data-scope=""
                                data-reff-reset="true"
                                data-reff="health_rating_5"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Health Rating</label>
                            <select id="health_rating_5" name="health_rating_5" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('swd.healthratings.showdropdowns') }}"
                                data-store=""
                                data-form="health_rating_5"
                                data-alias=""
                                data-scope=""
                                data-change="false">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Potensial Cause</label>
                            <select id="potensial_cause_5" name="potensial_cause_5[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                data-form="potensial_cause_5"
                                data-alias="AS5"
                                data-scope=""
                                data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Recommendation</label>
                            <select id="recommendation_5" name="recommendation_5[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                data-form="recommendation_5"
                                data-alias="AS5"
                                data-scope=""
                                data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Upload Image</label>
                            <div class="input-group">
                                <input type="file" id="upload_5" name="upload_5" class="form-control" accept=".png,.jpg,.jpeg">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-gray" onclick="uploadImage('upload_5','AS5','{{ route('swd.file.upload') }}')">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Images</label>
                            <div class="justified-gallery-AS5"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Body Bolts & Nuts -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix">
                Body Bolts & Nuts
                <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button" data-toggle="collapse" data-target="#collapseAS6" aria-expanded="false" aria-controls="collapseAS6">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
            <div class="expanel-body collapse" id="collapseAS6">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Valve Condition</label>
                            <select id="valve_condition_6" name="valve_condition_6" class="form-control select2-dropdown-ajax select2-dropdown-ajax-new"
                                data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                data-form="valve_condition_6"
                                data-alias="AS6"
                                data-scope=""
                                data-reff-reset="true"
                                data-reff="health_rating_6"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Health Rating</label>
                            <select id="health_rating_6" name="health_rating_6" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('swd.healthratings.showdropdowns') }}"
                                data-store=""
                                data-form="health_rating_6"
                                data-alias=""
                                data-scope=""
                                data-change="false">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Potensial Cause</label>
                            <select id="potensial_cause_6" name="potensial_cause_6[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                data-form="potensial_cause_6"
                                data-alias="AS6"
                                data-scope=""
                                data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Recommendation</label>
                            <select id="recommendation_6" name="recommendation_6[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                data-form="recommendation_6"
                                data-alias="AS6"
                                data-scope=""
                                data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Upload Image</label>
                            <div class="input-group">
                                <input type="file" id="upload_6" name="upload_6" class="form-control" accept=".png,.jpg,.jpeg">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-gray" onclick="uploadImage('upload_6','AS6','{{ route('swd.file.upload') }}')">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Images</label>
                            <div class="justified-gallery-AS6"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Gear Box -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix">
                Gear Box
                <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button" data-toggle="collapse" data-target="#collapseAS7" aria-expanded="false" aria-controls="collapseAS7">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
            <div class="expanel-body collapse" id="collapseAS7">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Valve Condition</label>
                            <select id="valve_condition_7" name="valve_condition_7" class="form-control select2-dropdown-ajax select2-dropdown-ajax-new"
                                data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                data-form="valve_condition_7"
                                data-alias="AS7"
                                data-scope=""
                                data-reff-reset="true"
                                data-reff="health_rating_7"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Health Rating</label>
                            <select id="health_rating_7" name="health_rating_7" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('swd.healthratings.showdropdowns') }}"
                                data-store=""
                                data-form="health_rating_7"
                                data-alias=""
                                data-scope=""
                                data-change="false">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Potensial Cause</label>
                            <select id="potensial_cause_7" name="potensial_cause_7[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                data-form="potensial_cause_7"
                                data-alias="AS7"
                                data-scope=""
                                data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Recommendation</label>
                            <select id="recommendation_7" name="recommendation_7[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                data-form="recommendation_7"
                                data-alias="AS7"
                                data-scope=""
                                data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Upload Image</label>
                            <div class="input-group">
                                <input type="file" id="upload_7" name="upload_7" class="form-control" accept=".png,.jpg,.jpeg">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-gray" onclick="uploadImage('upload_7','AS7','{{ route('swd.file.upload') }}')">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Images</label>
                            <div class="justified-gallery-AS7"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Manual Override -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix">
                Manual Override
                <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button" data-toggle="collapse" data-target="#collapseAS8" aria-expanded="false" aria-controls="collapseAS8">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
            <div class="expanel-body collapse" id="collapseAS8">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Valve Condition</label>
                            <select id="valve_condition_8" name="valve_condition_8" class="form-control select2-dropdown-ajax select2-dropdown-ajax-new"
                                data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                data-form="valve_condition_8"
                                data-alias="AS8"
                                data-scope=""
                                data-reff-reset="true"
                                data-reff="health_rating_8"
                                data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Health Rating</label>
                            <select id="health_rating_8" name="health_rating_8" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('swd.healthratings.showdropdowns') }}"
                                data-store=""
                                data-form="health_rating_8"
                                data-alias=""
                                data-scope=""
                                data-change="false">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Potensial Cause</label>
                            <select id="potensial_cause_8" name="potensial_cause_8[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                data-form="potensial_cause_8"
                                data-alias="AS8"
                                data-scope=""
                                data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Recommendation</label>
                            <select id="recommendation_8" name="recommendation_8[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                data-form="recommendation_8"
                                data-alias="AS8"
                                data-scope=""
                                data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Upload Image</label>
                            <div class="input-group">
                                <input type="file" id="upload_8" name="upload_8" class="form-control" accept=".png,.jpg,.jpeg">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-gray" onclick="uploadImage('upload_8','AS8','{{ route('swd.file.upload') }}')">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Images</label>
                            <div class="justified-gallery-AS8"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
