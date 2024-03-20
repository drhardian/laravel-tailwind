<!-- Body/Base -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix" data-toggle="collapse" data-target="#collapseAS1" aria-expanded="false" aria-controls="collapseAS1">
                Body/Base
                {{-- <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button" data-toggle="collapse" data-target="#collapseAS1" aria-expanded="false" aria-controls="collapseAS1">
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
                            <div class="col-lg-6 col-md-12">
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
                            <div class="col-md-12">
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
                            <div class="col-md-12">
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
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-lg-12">
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
                            <div class="col-lg-12">
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
<!-- Body Bolts & Nuts -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix" data-toggle="collapse" data-target="#collapseAS2" aria-expanded="false" aria-controls="collapseAS2">
                Body Bolts & Nuts
                {{-- <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button" data-toggle="collapse" data-target="#collapseAS2" aria-expanded="false" aria-controls="collapseAS2">
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
                            <div class="col-lg-6 col-md-12">
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
                            <div class="col-md-12">
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
                            <div class="col-md-12">
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
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-lg-12">
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
                            <div class="col-lg-12">
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
<!-- Bonnet -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix" data-toggle="collapse" data-target="#collapseAS3" aria-expanded="false" aria-controls="collapseAS3">
                Bonnet
                {{-- <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button" data-toggle="collapse" data-target="#collapseAS3" aria-expanded="false" aria-controls="collapseAS3">
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
                            <div class="col-lg-6 col-md-12">
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
                            <div class="col-md-12">
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
                            <div class="col-md-12">
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
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-lg-12">
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
                            <div class="col-lg-12">
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
</div>
<!-- Pilot -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix" data-toggle="collapse" data-target="#collapseAS4" aria-expanded="false" aria-controls="collapseAS4">
                Pilot
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
                            <div class="col-lg-6 col-md-12">
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
                            <div class="col-md-12">
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
                            <div class="col-md-12">
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
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-lg-12">
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
                            <div class="col-lg-12">
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
<!-- Manual Override -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix" data-toggle="collapse" data-target="#collapseAS5" aria-expanded="false" aria-controls="collapseAS5">
                Manual Override
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
                            <div class="col-lg-6 col-md-12">
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
                            <div class="col-md-12">
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
                            <div class="col-md-12">
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
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-lg-12">
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
                            <div class="col-lg-12">
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
