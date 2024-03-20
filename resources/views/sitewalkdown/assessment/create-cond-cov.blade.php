<!-- Packing -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix" data-toggle="collapse" data-target="#collapseAS1" aria-expanded="false"
                aria-controls="collapseAS1">
                Packing
                {{-- <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div> --}}
            </div>
            <div class="expanel-body collapse" id="collapseAS1">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Valve Condition</label>
                                    <select id="valve_condition_1" name="valve_condition_1"
                                        class="form-control select2-dropdown-ajax"
                                        data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                        data-form="valve_condition_1" data-alias="AS1" data-scope=""
                                        data-reff-reset="true" data-reff="health_rating_1" data-change="false">
                                        <option value="" disabled selected></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Health Rating</label>
                                    <select id="health_rating_1" name="health_rating_1"
                                        class="form-control select2-dropdown-ajax"
                                        data-show="{{ route('swd.healthratings.showdropdowns') }}" data-store=""
                                        data-form="health_rating_1" data-alias="" data-scope="" data-change="false">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Potensial Cause</label>
                                    <select id="potensial_cause_1" name="potensial_cause_1[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                        data-form="potensial_cause_1" data-alias="AS1" data-scope=""
                                        data-change="false" multiple>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Recommendation</label>
                                    <select id="recommendation_1" name="recommendation_1[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                        data-form="recommendation_1" data-alias="AS1" data-scope="" data-change="false"
                                        multiple>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Upload Image</label>
                                    <div class="input-group">
                                        <input type="file" id="upload_1" name="upload_1" class="form-control"
                                            accept=".png,.jpg,.jpeg">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-gray"
                                                onclick="uploadImage('upload_1','AS1','{{ route('swd.file.upload') }}')">Upload</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
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
    </div>
</div>
<!-- Bonnet -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix" data-toggle="collapse" data-target="#collapseAS2"
                aria-expanded="false" aria-controls="collapseAS2">
                Bonnet
                {{-- <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div> --}}
            </div>
            <div class="expanel-body collapse" id="collapseAS2">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Valve Condition</label>
                                    <select id="valve_condition_2" name="valve_condition_2"
                                        class="form-control select2-dropdown-ajax select2-dropdown-ajax-new"
                                        data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                        data-form="valve_condition_2" data-alias="AS2" data-scope=""
                                        data-reff-reset="true" data-reff="health_rating_2" data-change="false">
                                        <option value="" disabled selected></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Health Rating</label>
                                    <select id="health_rating_2" name="health_rating_2"
                                        class="form-control select2-dropdown-ajax"
                                        data-show="{{ route('swd.healthratings.showdropdowns') }}" data-store=""
                                        data-form="health_rating_2" data-alias="" data-scope=""
                                        data-change="false">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Potensial Cause</label>
                                    <select id="potensial_cause_2" name="potensial_cause_2[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                        data-form="potensial_cause_2" data-alias="AS2" data-scope=""
                                        data-change="false" multiple>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Recommendation</label>
                                    <select id="recommendation_2" name="recommendation_2[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                        data-form="recommendation_2" data-alias="AS2" data-scope=""
                                        data-change="false" multiple>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Upload Image</label>
                                    <div class="input-group">
                                        <input type="file" id="upload_2" name="upload_2" class="form-control"
                                            accept=".png,.jpg,.jpeg">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-gray"
                                                onclick="uploadImage('upload_2','AS2','{{ route('swd.file.upload') }}')">Upload</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
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
    </div>
</div>
<!-- Bonnet Gasket -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix" data-toggle="collapse" data-target="#collapseAS3"
                aria-expanded="false" aria-controls="collapseAS3">
                Bonnet Gasket
                {{-- <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div> --}}
            </div>
            <div class="expanel-body collapse" id="collapseAS3">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Valve Condition</label>
                                    <select id="valve_condition_3" name="valve_condition_3"
                                        class="form-control select2-dropdown-ajax select2-dropdown-ajax-new"
                                        data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                        data-form="valve_condition_3" data-alias="AS3" data-scope=""
                                        data-reff-reset="true" data-reff="health_rating_3" data-change="false">
                                        <option value="" disabled selected></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Health Rating</label>
                                    <select id="health_rating_3" name="health_rating_3"
                                        class="form-control select2-dropdown-ajax"
                                        data-show="{{ route('swd.healthratings.showdropdowns') }}" data-store=""
                                        data-form="health_rating_3" data-alias="" data-scope=""
                                        data-change="false">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Potensial Cause</label>
                                    <select id="potensial_cause_3" name="potensial_cause_3[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                        data-form="potensial_cause_3" data-alias="AS3" data-scope=""
                                        data-change="false" multiple>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Recommendation</label>
                                    <select id="recommendation_3" name="recommendation_3[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                        data-form="recommendation_3" data-alias="AS3" data-scope=""
                                        data-change="false" multiple>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Upload Image</label>
                                <div class="input-group">
                                    <input type="file" id="upload_3" name="upload_3" class="form-control"
                                        accept=".png,.jpg,.jpeg">
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-gray"
                                            onclick="uploadImage('upload_3','AS3','{{ route('swd.file.upload') }}')">Upload</button>
                                    </span>
                                </div>
                            </div>
                        </div>
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
</div>
<!-- Valve Body -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix" data-toggle="collapse" data-target="#collapseAS4"
                aria-expanded="false" aria-controls="collapseAS4">
                Valve Body
                {{-- <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div> --}}
            </div>
            <div class="expanel-body collapse" id="collapseAS4">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Valve Condition</label>
                                    <select id="valve_condition_4" name="valve_condition_4"
                                        class="form-control select2-dropdown-ajax select2-dropdown-ajax-new"
                                        data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                        data-form="valve_condition_4" data-alias="AS4" data-scope=""
                                        data-reff-reset="true" data-reff="health_rating_4" data-change="false">
                                        <option value="" disabled selected></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Health Rating</label>
                                    <select id="health_rating_4" name="health_rating_4"
                                        class="form-control select2-dropdown-ajax"
                                        data-show="{{ route('swd.healthratings.showdropdowns') }}" data-store=""
                                        data-form="health_rating_4" data-alias="" data-scope=""
                                        data-change="false">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Potensial Cause</label>
                                    <select id="potensial_cause_4" name="potensial_cause_4[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                        data-form="potensial_cause_4" data-alias="AS4" data-scope=""
                                        data-change="false" multiple>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Recommendation</label>
                                    <select id="recommendation_4" name="recommendation_4[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                        data-form="recommendation_4" data-alias="AS4" data-scope=""
                                        data-change="false" multiple>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Upload Image</label>
                                    <div class="input-group">
                                        <input type="file" id="upload_4" name="upload_4" class="form-control"
                                            accept=".png,.jpg,.jpeg">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-gray"
                                                onclick="uploadImage('upload_4','AS4','{{ route('swd.file.upload') }}')">Upload</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
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
    </div>
</div>
<!-- Valve Trim -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix" data-toggle="collapse" data-target="#collapseAS5"
                aria-expanded="false" aria-controls="collapseAS5">
                Valve Trim
                {{-- <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div> --}}
            </div>
            <div class="expanel-body collapse" id="collapseAS5">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Valve Condition</label>
                                    <select id="valve_condition_5" name="valve_condition_5"
                                        class="form-control select2-dropdown-ajax select2-dropdown-ajax-new"
                                        data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                        data-form="valve_condition_5" data-alias="AS5" data-scope=""
                                        data-reff-reset="true" data-reff="health_rating_5" data-change="false">
                                        <option value="" disabled selected></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Health Rating</label>
                                    <select id="health_rating_5" name="health_rating_5"
                                        class="form-control select2-dropdown-ajax"
                                        data-show="{{ route('swd.healthratings.showdropdowns') }}" data-store=""
                                        data-form="health_rating_5" data-alias="" data-scope=""
                                        data-change="false">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Potensial Cause</label>
                                    <select id="potensial_cause_5" name="potensial_cause_5[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                        data-form="potensial_cause_5" data-alias="AS5" data-scope=""
                                        data-change="false" multiple>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Recommendation</label>
                                    <select id="recommendation_5" name="recommendation_5[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                        data-form="recommendation_5" data-alias="AS5" data-scope=""
                                        data-change="false" multiple>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Upload Image</label>
                                    <div class="input-group">
                                        <input type="file" id="upload_5" name="upload_5" class="form-control"
                                            accept=".png,.jpg,.jpeg">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-gray"
                                                onclick="uploadImage('upload_5','AS5','{{ route('swd.file.upload') }}')">Upload</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
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
    </div>
</div>
<!-- Body Bolts & Nuts -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix" data-toggle="collapse" data-target="#collapseAS6"
                aria-expanded="false" aria-controls="collapseAS6">
                Body Bolts & Nuts
                {{-- <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div> --}}
            </div>
            <div class="expanel-body collapse" id="collapseAS6">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Valve Condition</label>
                                    <select id="valve_condition_6" name="valve_condition_6"
                                        class="form-control select2-dropdown-ajax select2-dropdown-ajax-new"
                                        data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                        data-form="valve_condition_6" data-alias="AS6" data-scope=""
                                        data-reff-reset="true" data-reff="health_rating_6" data-change="false">
                                        <option value="" disabled selected></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Health Rating</label>
                                    <select id="health_rating_6" name="health_rating_6"
                                        class="form-control select2-dropdown-ajax"
                                        data-show="{{ route('swd.healthratings.showdropdowns') }}" data-store=""
                                        data-form="health_rating_6" data-alias="" data-scope=""
                                        data-change="false">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Potensial Cause</label>
                                    <select id="potensial_cause_6" name="potensial_cause_6[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                        data-form="potensial_cause_6" data-alias="AS6" data-scope=""
                                        data-change="false" multiple>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Recommendation</label>
                                    <select id="recommendation_6" name="recommendation_6[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                        data-form="recommendation_6" data-alias="AS6" data-scope=""
                                        data-change="false" multiple>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Upload Image</label>
                                    <div class="input-group">
                                        <input type="file" id="upload_6" name="upload_6" class="form-control"
                                            accept=".png,.jpg,.jpeg">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-gray"
                                                onclick="uploadImage('upload_6','AS6','{{ route('swd.file.upload') }}')">Upload</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
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
    </div>
</div>
<!-- Actuator External Condition -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix" data-toggle="collapse" data-target="#collapseAS7"
                aria-expanded="false" aria-controls="collapseAS7">
                Actuator External Condition
                {{-- <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div> --}}
            </div>
            <div class="expanel-body collapse" id="collapseAS7">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Valve Condition</label>
                                    <select id="valve_condition_7" name="valve_condition_7"
                                        class="form-control select2-dropdown-ajax select2-dropdown-ajax-new"
                                        data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                        data-form="valve_condition_7" data-alias="AS7" data-scope=""
                                        data-reff-reset="true" data-reff="health_rating_7" data-change="false">
                                        <option value="" disabled selected></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Health Rating</label>
                                    <select id="health_rating_7" name="health_rating_7"
                                        class="form-control select2-dropdown-ajax"
                                        data-show="{{ route('swd.healthratings.showdropdowns') }}" data-store=""
                                        data-form="health_rating_7" data-alias="" data-scope=""
                                        data-change="false">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Potensial Cause</label>
                                    <select id="potensial_cause_7" name="potensial_cause_7[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                        data-form="potensial_cause_7" data-alias="AS7" data-scope=""
                                        data-change="false" multiple>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Recommendation</label>
                                    <select id="recommendation_7" name="recommendation_7[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                        data-form="recommendation_7" data-alias="AS7" data-scope=""
                                        data-change="false" multiple>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Upload Image</label>
                                    <div class="input-group">
                                        <input type="file" id="upload_7" name="upload_7" class="form-control"
                                            accept=".png,.jpg,.jpeg">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-gray"
                                                onclick="uploadImage('upload_7','AS7','{{ route('swd.file.upload') }}')">Upload</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
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
    </div>
</div>
<!-- Electrical Enclosure -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix" data-toggle="collapse" data-target="#collapseAS8"
                aria-expanded="false" aria-controls="collapseAS8">
                Electrical Enclosure
                {{-- <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div> --}}
            </div>
            <div class="expanel-body collapse" id="collapseAS8">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Valve Condition</label>
                                    <select id="valve_condition_8" name="valve_condition_8"
                                        class="form-control select2-dropdown-ajax select2-dropdown-ajax-new"
                                        data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                        data-form="valve_condition_8" data-alias="AS8" data-scope=""
                                        data-reff-reset="true" data-reff="health_rating_8" data-change="false">
                                        <option value="" disabled selected></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Health Rating</label>
                                    <select id="health_rating_8" name="health_rating_8"
                                        class="form-control select2-dropdown-ajax"
                                        data-show="{{ route('swd.healthratings.showdropdowns') }}" data-store=""
                                        data-form="health_rating_8" data-alias="" data-scope=""
                                        data-change="false">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Potensial Cause</label>
                                    <select id="potensial_cause_8" name="potensial_cause_8[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                        data-form="potensial_cause_8" data-alias="AS8" data-scope=""
                                        data-change="false" multiple>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Recommendation</label>
                                    <select id="recommendation_8" name="recommendation_8[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                        data-form="recommendation_8" data-alias="AS8" data-scope=""
                                        data-change="false" multiple>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Upload Image</label>
                                    <div class="input-group">
                                        <input type="file" id="upload_8" name="upload_8" class="form-control"
                                            accept=".png,.jpg,.jpeg">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-gray"
                                                onclick="uploadImage('upload_8','AS8','{{ route('swd.file.upload') }}')">Upload</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
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
    </div>
</div>
<!-- Seals -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix" data-toggle="collapse" data-target="#collapseAS9"
                aria-expanded="false" aria-controls="collapseAS9">
                Seals
                {{-- <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div> --}}
            </div>
            <div class="expanel-body collapse" id="collapseAS9">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Valve Condition</label>
                                    <select id="valve_condition_9" name="valve_condition_9"
                                        class="form-control select2-dropdown-ajax select2-dropdown-ajax-new"
                                        data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                        data-form="valve_condition_9" data-alias="AS9" data-scope=""
                                        data-reff-reset="true" data-reff="health_rating_9" data-change="false">
                                        <option value="" disabled selected></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Health Rating</label>
                                    <select id="health_rating_9" name="health_rating_9"
                                        class="form-control select2-dropdown-ajax"
                                        data-show="{{ route('swd.healthratings.showdropdowns') }}" data-store=""
                                        data-form="health_rating_9" data-alias="" data-scope=""
                                        data-change="false">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Potensial Cause</label>
                                    <select id="potensial_cause_9" name="potensial_cause_9[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                        data-form="potensial_cause_9" data-alias="AS9" data-scope=""
                                        data-change="false" multiple>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Recommendation</label>
                                    <select id="recommendation_9" name="recommendation_9[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                        data-form="recommendation_9" data-alias="AS9" data-scope=""
                                        data-change="false" multiple>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Upload Image</label>
                                    <div class="input-group">
                                        <input type="file" id="upload_9" name="upload_9" class="form-control"
                                            accept=".png,.jpg,.jpeg">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-gray"
                                                onclick="uploadImage('upload_9','AS9','{{ route('swd.file.upload') }}')">Upload</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Images</label>
                                    <div class="justified-gallery-AS9"></div>
                                </div>
                            </div>
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
            <div class="expanel-heading clearfix" data-toggle="collapse" data-target="#collapseAS10"
                aria-expanded="false" aria-controls="collapseAS10">
                Gear Box
                {{-- <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div> --}}
            </div>
            <div class="expanel-body collapse" id="collapseAS10">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Valve Condition</label>
                                    <select id="valve_condition_10" name="valve_condition_10"
                                        class="form-control select2-dropdown-ajax select2-dropdown-ajax-new"
                                        data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                        data-form="valve_condition_10" data-alias="AS10" data-scope=""
                                        data-reff-reset="true" data-reff="health_rating_10" data-change="false">
                                        <option value="" disabled selected></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Health Rating</label>
                                    <select id="health_rating_10" name="health_rating_10"
                                        class="form-control select2-dropdown-ajax"
                                        data-show="{{ route('swd.healthratings.showdropdowns') }}" data-store=""
                                        data-form="health_rating_10" data-alias="" data-scope=""
                                        data-change="false">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Potensial Cause</label>
                                    <select id="potensial_cause_10" name="potensial_cause_10[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                        data-form="potensial_cause_10" data-alias="AS10" data-scope=""
                                        data-change="false" multiple>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Recommendation</label>
                                    <select id="recommendation_10" name="recommendation_10[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                        data-form="recommendation_10" data-alias="AS10" data-scope=""
                                        data-change="false" multiple>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Upload Image</label>
                                    <div class="input-group">
                                        <input type="file" id="upload_10" name="upload_10" class="form-control"
                                            accept=".png,.jpg,.jpeg">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-gray"
                                                onclick="uploadImage('upload_10','AS10','{{ route('swd.file.upload') }}')">Upload</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Images</label>
                                    <div class="justified-gallery-AS10"></div>
                                </div>
                            </div>
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
            <div class="expanel-heading clearfix" data-toggle="collapse" data-target="#collapseAS11"
                aria-expanded="false" aria-controls="collapseAS11">
                Manual Override
                {{-- <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div> --}}
            </div>
            <div class="expanel-body collapse" id="collapseAS11">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Valve Condition</label>
                                    <select id="valve_condition_11" name="valve_condition_11"
                                        class="form-control select2-dropdown-ajax select2-dropdown-ajax-new"
                                        data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                        data-form="valve_condition_11" data-alias="AS11" data-scope=""
                                        data-reff-reset="true" data-reff="health_rating_11" data-change="false">
                                        <option value="" disabled selected></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Health Rating</label>
                                    <select id="health_rating_11" name="health_rating_11"
                                        class="form-control select2-dropdown-ajax"
                                        data-show="{{ route('swd.healthratings.showdropdowns') }}" data-store=""
                                        data-form="health_rating_11" data-alias="" data-scope=""
                                        data-change="false">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Potensial Cause</label>
                                    <select id="potensial_cause_11" name="potensial_cause_11[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                        data-form="potensial_cause_11" data-alias="AS11" data-scope=""
                                        data-change="false" multiple>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Recommendation</label>
                                    <select id="recommendation_11" name="recommendation_11[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                        data-form="recommendation_11" data-alias="AS11" data-scope=""
                                        data-change="false" multiple>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Upload Image</label>
                                    <div class="input-group">
                                        <input type="file" id="upload_11" name="upload_11" class="form-control"
                                            accept=".png,.jpg,.jpeg">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-gray"
                                                onclick="uploadImage('upload_11','AS11','{{ route('swd.file.upload') }}')">Upload</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Images</label>
                                    <div class="justified-gallery-AS11"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Positioner & Accessories -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix" data-toggle="collapse" data-target="#collapseAS12"
                aria-expanded="false" aria-controls="collapseAS12">
                Positioner & Accessories
                {{-- <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div> --}}
            </div>
            <div class="expanel-body collapse" id="collapseAS12">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Valve Condition</label>
                                    <select id="valve_condition_12" name="valve_condition_12"
                                        class="form-control select2-dropdown-ajax select2-dropdown-ajax-new"
                                        data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                        data-form="valve_condition_12" data-alias="AS12" data-scope=""
                                        data-reff-reset="true" data-reff="health_rating_12" data-change="false">
                                        <option value="" disabled selected></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Health Rating</label>
                                    <select id="health_rating_12" name="health_rating_12"
                                        class="form-control select2-dropdown-ajax"
                                        data-show="{{ route('swd.healthratings.showdropdowns') }}" data-store=""
                                        data-form="health_rating_12" data-alias="" data-scope=""
                                        data-change="false">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Potensial Cause</label>
                                    <select id="potensial_cause_12" name="potensial_cause_12[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                        data-form="potensial_cause_12" data-alias="AS12" data-scope=""
                                        data-change="false" multiple>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Recommendation</label>
                                    <select id="recommendation_12" name="recommendation_12[]"
                                        class="form-control select2-multiple select2-multiple-new"
                                        data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                        data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                        data-form="recommendation_12" data-alias="AS12" data-scope=""
                                        data-change="false" multiple>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Upload Image</label>
                                    <div class="input-group">
                                        <input type="file" id="upload_12" name="upload_12" class="form-control"
                                            accept=".png,.jpg,.jpeg">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-gray"
                                                onclick="uploadImage('upload_12','AS12','{{ route('swd.file.upload') }}')">Upload</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Images</label>
                                    <div class="justified-gallery-AS12"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

