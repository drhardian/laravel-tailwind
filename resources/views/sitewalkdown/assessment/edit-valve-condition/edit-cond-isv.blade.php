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
                                @if (!empty($assessmentDetail->packing_condition))
                                    <option value="{{ $assessmentDetail->packing_condition }}" selected>{{ $assessmentDetail->packing_condition }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
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
                                @if (!empty($assessmentDetail->packing_condition_level))
                                    <option value="{{ $assessmentDetail->packing_condition_level }}" selected>{{ $healthRatingByDevice->packing }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
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
                                @if (!empty($assessmentDetail->packing_cause))
                                    @foreach (explode("|", $assessmentDetail->packing_cause) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
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
                                @if (!empty($assessmentDetail->packing_recommendation))
                                    @foreach (explode("|", $assessmentDetail->packing_recommendation) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
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
                                @if (!empty($assessmentDetail->sealgasket_condition))
                                    <option value="{{ $assessmentDetail->sealgasket_condition }}" selected>{{ $assessmentDetail->sealgasket_condition }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
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
                                @if (!empty($assessmentDetail->sealgasket_condition_level))
                                    <option value="{{ $assessmentDetail->sealgasket_condition_level }}" selected>{{ $healthRatingByDevice->sealgasket }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
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
                                @if (!empty($assessmentDetail->sealgasket_cause))
                                    @foreach (explode("|", $assessmentDetail->sealgasket_cause) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
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
                                @if (!empty($assessmentDetail->sealgasket_recommendation))
                                    @foreach (explode("|", $assessmentDetail->sealgasket_recommendation) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
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
                                @if (!empty($assessmentDetail->bonnetgasket_condition))
                                    <option value="{{ $assessmentDetail->bonnetgasket_condition }}" selected>{{ $assessmentDetail->bonnetgasket_condition }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
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
                                @if (!empty($assessmentDetail->bonnetgasket_condition_level))
                                    <option value="{{ $assessmentDetail->bonnetgasket_condition_level }}" selected>{{ $healthRatingByDevice->bonnetgasket }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
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
                                @if (!empty($assessmentDetail->bonnetgasket_cause))
                                    @foreach (explode("|", $assessmentDetail->bonnetgasket_cause) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
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
                                @if (!empty($assessmentDetail->bonnetgasket_recommendation))
                                    @foreach (explode("|", $assessmentDetail->bonnetgasket_recommendation) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
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
                                @if (!empty($assessmentDetail->valvebody_condition))
                                    <option value="{{ $assessmentDetail->valvebody_condition }}" selected>{{ $assessmentDetail->valvebody_condition }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
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
                                @if (!empty($assessmentDetail->valvebody_condition_level))
                                    <option value="{{ $assessmentDetail->valvebody_condition_level }}" selected>{{ $healthRatingByDevice->valvebody }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
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
                                @if (!empty($assessmentDetail->valvebody_cause))
                                    @foreach (explode("|", $assessmentDetail->valvebody_cause) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
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
                                @if (!empty($assessmentDetail->valvebody_recommendation))
                                    @foreach (explode("|", $assessmentDetail->valvebody_recommendation) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
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
                                @if (!empty($assessmentDetail->valvetrim_condition))
                                    <option value="{{ $assessmentDetail->valvetrim_condition }}" selected>{{ $assessmentDetail->valvetrim_condition }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
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
                                @if (!empty($assessmentDetail->valvetrim_condition_level))
                                    <option value="{{ $assessmentDetail->valvetrim_condition_level }}" selected>{{ $healthRatingByDevice->valvetrim }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
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
                                @if (!empty($assessmentDetail->valvetrim_cause))
                                    @foreach (explode("|", $assessmentDetail->valvetrim_cause) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
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
                                @if (!empty($assessmentDetail->valvetrim_recommendation))
                                    @foreach (explode("|", $assessmentDetail->valvetrim_recommendation) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
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
                                @if (!empty($assessmentDetail->boltnut_condition))
                                    <option value="{{ $assessmentDetail->boltnut_condition }}" selected>{{ $assessmentDetail->boltnut_condition }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
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
                                @if (!empty($assessmentDetail->boltnut_condition_level))
                                    <option value="{{ $assessmentDetail->boltnut_condition_level }}" selected>{{ $healthRatingByDevice->boltnut }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
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
                                @if (!empty($assessmentDetail->boltnut_cause))
                                    @foreach (explode("|", $assessmentDetail->boltnut_cause) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
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
                                @if (!empty($assessmentDetail->boltnut_recommendation))
                                    @foreach (explode("|", $assessmentDetail->boltnut_recommendation) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
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
<!-- Actuator External Condition -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix">
                Actuator External Condition
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
                                @if (!empty($assessmentDetail->actexternal_condition))
                                    <option value="{{ $assessmentDetail->actexternal_condition }}" selected>{{ $assessmentDetail->actexternal_condition }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
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
                                @if (!empty($assessmentDetail->actexternal_condition_level))
                                    <option value="{{ $assessmentDetail->actexternal_condition_level }}" selected>{{ $healthRatingByDevice->actexternal }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
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
                                @if (!empty($assessmentDetail->actexternal_cause))
                                    @foreach (explode("|", $assessmentDetail->actexternal_cause) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
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
                                @if (!empty($assessmentDetail->actexternal_recommendation))
                                    @foreach (explode("|", $assessmentDetail->actexternal_recommendation) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
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
<!-- Electrical Enclosure -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix">
                Electrical Enclosure
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
                                @if (!empty($assessmentDetail->electricenclosure_condition))
                                    <option value="{{ $assessmentDetail->electricenclosure_condition }}" selected>{{ $assessmentDetail->electricenclosure_condition }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
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
                                @if (!empty($assessmentDetail->electricenclosure_condition_level))
                                    <option value="{{ $assessmentDetail->electricenclosure_condition_level }}" selected>{{ $healthRatingByDevice->electricenclosure }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
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
                                @if (!empty($assessmentDetail->electricenclosure_cause))
                                    @foreach (explode("|", $assessmentDetail->electricenclosure_cause) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
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
                                @if (!empty($assessmentDetail->electricenclosure_recommendation))
                                    @foreach (explode("|", $assessmentDetail->electricenclosure_recommendation) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
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
<!-- Seals -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix">
                Seals
                <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button" data-toggle="collapse" data-target="#collapseAS9" aria-expanded="false" aria-controls="collapseAS9">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
            <div class="expanel-body collapse" id="collapseAS9">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Valve Condition</label>
                            <select id="valve_condition_9" name="valve_condition_9" class="form-control select2-dropdown-ajax select2-dropdown-ajax-new"
                                data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                data-form="valve_condition_9"
                                data-alias="AS9"
                                data-scope=""
                                data-reff-reset="true"
                                data-reff="health_rating_9"
                                data-change="false">
                                @if (!empty($assessmentDetail->seal_condition))
                                    <option value="{{ $assessmentDetail->seal_condition }}" selected>{{ $assessmentDetail->seal_condition }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Health Rating</label>
                            <select id="health_rating_9" name="health_rating_9" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('swd.healthratings.showdropdowns') }}"
                                data-store=""
                                data-form="health_rating_9"
                                data-alias=""
                                data-scope=""
                                data-change="false">
                                @if (!empty($assessmentDetail->seal_condition_level))
                                    <option value="{{ $assessmentDetail->seal_condition_level }}" selected>{{ $healthRatingByDevice->seal }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Potensial Cause</label>
                            <select id="potensial_cause_9" name="potensial_cause_9[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                data-form="potensial_cause_9"
                                data-alias="AS9"
                                data-scope=""
                                data-change="false"
                                multiple>
                                @if (!empty($assessmentDetail->seal_cause))
                                    @foreach (explode("|", $assessmentDetail->seal_cause) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Recommendation</label>
                            <select id="recommendation_9" name="recommendation_9[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                data-form="recommendation_9"
                                data-alias="AS9"
                                data-scope=""
                                data-change="false"
                                multiple>
                                @if (!empty($assessmentDetail->seal_recommendation))
                                    @foreach (explode("|", $assessmentDetail->seal_recommendation) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Upload Image</label>
                            <div class="input-group">
                                <input type="file" id="upload_9" name="upload_9" class="form-control" accept=".png,.jpg,.jpeg">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-gray" onclick="uploadImage('upload_9','AS9','{{ route('swd.file.upload') }}')">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
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
<!-- Oil Leak -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix">
                Oil Leak
                <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button" data-toggle="collapse" data-target="#collapseAS10" aria-expanded="false" aria-controls="collapseAS10">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
            <div class="expanel-body collapse" id="collapseAS10">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Valve Condition</label>
                            <select id="valve_condition_10" name="valve_condition_10" class="form-control select2-dropdown-ajax select2-dropdown-ajax-new"
                                data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                data-form="valve_condition_10"
                                data-alias="AS10"
                                data-scope=""
                                data-reff-reset="true"
                                data-reff="health_rating_10"
                                data-change="false">
                                @if (!empty($assessmentDetail->oilleak_condition))
                                    <option value="{{ $assessmentDetail->oilleak_condition }}" selected>{{ $assessmentDetail->oilleak_condition }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Health Rating</label>
                            <select id="health_rating_10" name="health_rating_10" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('swd.healthratings.showdropdowns') }}"
                                data-store=""
                                data-form="health_rating_10"
                                data-alias=""
                                data-scope=""
                                data-change="false">
                                @if (!empty($assessmentDetail->oilleak_condition_level))
                                    <option value="{{ $assessmentDetail->oilleak_condition_level }}" selected>{{ $healthRatingByDevice->oilleak }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Potensial Cause</label>
                            <select id="potensial_cause_10" name="potensial_cause_10[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                data-form="potensial_cause_10"
                                data-alias="AS10"
                                data-scope=""
                                data-change="false"
                                multiple>
                                @if (!empty($assessmentDetail->oilleak_cause))
                                    @foreach (explode("|", $assessmentDetail->oilleak_cause) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Recommendation</label>
                            <select id="recommendation_10" name="recommendation_10[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                data-form="recommendation_10"
                                data-alias="AS10"
                                data-scope=""
                                data-change="false"
                                multiple>
                                @if (!empty($assessmentDetail->oilleak_recommendation))
                                    @foreach (explode("|", $assessmentDetail->oilleak_recommendation) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Upload Image</label>
                            <div class="input-group">
                                <input type="file" id="upload_10" name="upload_10" class="form-control" accept=".png,.jpg,.jpeg">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-gray" onclick="uploadImage('upload_10','AS10','{{ route('swd.file.upload') }}')">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
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
<!-- Gear Box -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix">
                Gear Box
                <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button" data-toggle="collapse" data-target="#collapseAS11" aria-expanded="false" aria-controls="collapseAS11">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
            <div class="expanel-body collapse" id="collapseAS11">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Valve Condition</label>
                            <select id="valve_condition_11" name="valve_condition_11" class="form-control select2-dropdown-ajax select2-dropdown-ajax-new"
                                data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                data-form="valve_condition_11"
                                data-alias="AS11"
                                data-scope=""
                                data-reff-reset="true"
                                data-reff="health_rating_11"
                                data-change="false">
                                @if (!empty($assessmentDetail->gearbox_condition))
                                    <option value="{{ $assessmentDetail->gearbox_condition }}" selected>{{ $assessmentDetail->gearbox_condition }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Health Rating</label>
                            <select id="health_rating_11" name="health_rating_11" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('swd.healthratings.showdropdowns') }}"
                                data-store=""
                                data-form="health_rating_11"
                                data-alias=""
                                data-scope=""
                                data-change="false">
                                @if (!empty($assessmentDetail->gearbox_condition_level))
                                    <option value="{{ $assessmentDetail->gearbox_condition_level }}" selected>{{ $healthRatingByDevice->gearbox }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Potensial Cause</label>
                            <select id="potensial_cause_11" name="potensial_cause_11[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                data-form="potensial_cause_11"
                                data-alias="AS11"
                                data-scope=""
                                data-change="false"
                                multiple>
                                @if (!empty($assessmentDetail->gearbox_cause))
                                    @foreach (explode("|", $assessmentDetail->gearbox_cause) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Recommendation</label>
                            <select id="recommendation_11" name="recommendation_11[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                data-form="recommendation_11"
                                data-alias="AS11"
                                data-scope=""
                                data-change="false"
                                multiple>
                                @if (!empty($assessmentDetail->gearbox_recommendation))
                                    @foreach (explode("|", $assessmentDetail->gearbox_recommendation) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Upload Image</label>
                            <div class="input-group">
                                <input type="file" id="upload_11" name="upload_11" class="form-control" accept=".png,.jpg,.jpeg">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-gray" onclick="uploadImage('upload_11','AS11','{{ route('swd.file.upload') }}')">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
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
<!-- Manual Override -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix">
                Manual Override
                <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button" data-toggle="collapse" data-target="#collapseAS12" aria-expanded="false" aria-controls="collapseAS12">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
            <div class="expanel-body collapse" id="collapseAS12">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Valve Condition</label>
                            <select id="valve_condition_12" name="valve_condition_12" class="form-control select2-dropdown-ajax select2-dropdown-ajax-new"
                                data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                data-form="valve_condition_12"
                                data-alias="AS12"
                                data-scope=""
                                data-reff-reset="true"
                                data-reff="health_rating_12"
                                data-change="false">
                                @if (!empty($assessmentDetail->manualoverride_condition))
                                    <option value="{{ $assessmentDetail->manualoverride_condition }}" selected>{{ $assessmentDetail->manualoverride_condition }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Health Rating</label>
                            <select id="health_rating_12" name="health_rating_12" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('swd.healthratings.showdropdowns') }}"
                                data-store=""
                                data-form="health_rating_12"
                                data-alias=""
                                data-scope=""
                                data-change="false">
                                @if (!empty($assessmentDetail->manualoverride_condition_level))
                                    <option value="{{ $assessmentDetail->manualoverride_condition_level }}" selected>{{ $healthRatingByDevice->manualoverride }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Potensial Cause</label>
                            <select id="potensial_cause_12" name="potensial_cause_12[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                data-form="potensial_cause_12"
                                data-alias="AS12"
                                data-scope=""
                                data-change="false"
                                multiple>
                                @if (!empty($assessmentDetail->manualoverride_cause))
                                    @foreach (explode("|", $assessmentDetail->manualoverride_cause) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Recommendation</label>
                            <select id="recommendation_12" name="recommendation_12[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                data-form="recommendation_12"
                                data-alias="AS12"
                                data-scope=""
                                data-change="false"
                                multiple>
                                @if (!empty($assessmentDetail->manualoverride_recommendation))
                                    @foreach (explode("|", $assessmentDetail->manualoverride_recommendation) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Upload Image</label>
                            <div class="input-group">
                                <input type="file" id="upload_12" name="upload_12" class="form-control" accept=".png,.jpg,.jpeg">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-gray" onclick="uploadImage('upload_12','AS12','{{ route('swd.file.upload') }}')">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
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
<!-- Instrument/Accessories Condition -->
<div class="row">
    <div class="col-md-12">
        <div class="expanel expanel-default">
            <div class="expanel-heading clearfix">
                Instrument/Accessories Condition
                <div class="float-right">
                    <button class="btn btn-sm btn-light" type="button" data-toggle="collapse" data-target="#collapseAS13" aria-expanded="false" aria-controls="collapseAS13">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
            <div class="expanel-body collapse" id="collapseAS13">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Valve Condition</label>
                            <select id="valve_condition_13" name="valve_condition_13" class="form-control select2-dropdown-ajax select2-dropdown-ajax-new"
                                data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                data-form="valve_condition_13"
                                data-alias="AS13"
                                data-scope=""
                                data-reff-reset="true"
                                data-reff="health_rating_13"
                                data-change="false">
                                @if (!empty($assessmentDetail->accessories_condition))
                                    <option value="{{ $assessmentDetail->accessories_condition }}" selected>{{ $assessmentDetail->accessories_condition }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Health Rating</label>
                            <select id="health_rating_13" name="health_rating_13" class="form-control select2-dropdown-ajax"
                                data-show="{{ route('swd.healthratings.showdropdowns') }}"
                                data-store=""
                                data-form="health_rating_13"
                                data-alias=""
                                data-scope=""
                                data-change="false">
                                @if (!empty($assessmentDetail->accessories_condition_level))
                                    <option value="{{ $assessmentDetail->accessories_condition_level }}" selected>{{ $healthRatingByDevice->accessories }}</option>
                                @else
                                    <option value="" disabled selected></option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Potensial Cause</label>
                            <select id="potensial_cause_13" name="potensial_cause_13[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                data-form="potensial_cause_13"
                                data-alias="AS13"
                                data-scope=""
                                data-change="false"
                                multiple>
                                @if (!empty($assessmentDetail->accessories_cause))
                                    @foreach (explode("|", $assessmentDetail->accessories_cause) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Recommendation</label>
                            <select id="recommendation_13" name="recommendation_13[]" class="form-control select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                data-form="recommendation_13"
                                data-alias="AS13"
                                data-scope=""
                                data-change="false"
                                multiple>
                                @if (!empty($assessmentDetail->accessories_recommendation))
                                    @foreach (explode("|", $assessmentDetail->accessories_recommendation) as $item)
                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Upload Image</label>
                            <div class="input-group">
                                <input type="file" id="upload_13" name="upload_13" class="form-control" accept=".png,.jpg,.jpeg">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-gray" onclick="uploadImage('upload_13','AS13','{{ route('swd.file.upload') }}')">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Images</label>
                            <div class="justified-gallery-AS13"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
