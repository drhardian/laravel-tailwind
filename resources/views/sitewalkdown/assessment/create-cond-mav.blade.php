<!-- Packing -->
<div class="flex flex-wrap ">
    <div class="md:w-full pr-4 pl-4">
        <details class="border mt-4 rounded-t-sm">
            <summary
                class="question py-3 px-4 rounded-t-sm bg-blue-100 cursor-pointer focus:ring-4 focus:ring-blue-200 hover:bg-blue-400 dark:hover:bg-gray-800 gap-3 select-none w-full outline-none text-gray-700 font-semibold border-gray-200">
                Packing
            </summary>
            <div class="expanel-body" id="collapseAS1">
                <div class="flex flex-wrap ">
                    <div class="md:w-1/2 pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Valve Condition</label>
                            <select id="valve_condition_1" name="valve_condition_1"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                data-form="valve_condition_1" data-alias="AS1" data-scope="" data-reff-reset="true"
                                data-reff="health_rating_1" data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="md:w-1/2 pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Health Rating</label>
                            <select id="health_rating_1" name="health_rating_1"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.healthratings.showdropdowns') }}" data-store=""
                                data-form="health_rating_1" data-alias="" data-scope="" data-change="false">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="lg:w-1/2 pr-4 pl-4 md:w-full pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Potensial Cause</label>
                            <select id="potensial_cause_1" name="potensial_cause_1[]"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                data-form="potensial_cause_1" data-alias="AS1" data-scope="" data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                    <div class="lg:w-1/2 pr-4 pl-4 md:w-full pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Recommendation</label>
                            <select id="recommendation_1" name="recommendation_1[]"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                data-form="recommendation_1" data-alias="AS1" data-scope="" data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="md:w-full pr-4 pl-4">
                        <div class="mb-4">
                            <label class="form-label">Upload Image</label>
                            <div class="relative flex items-stretch w-full">
                                <input type="file" id="upload_1" name="upload_1"
                                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                    accept=".png,.jpg,.jpeg">
                                <span class="input-group-append">
                                    <button type="button"
                                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-3 px-3 bg-gray-800 text-white leading-normal no-underline btn-gray"
                                        onclick="uploadImage('upload_1','AS1','{{ route('swd.file.upload') }}')">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="md:w-full pr-4 pl-4">
                        <div class="mb-4">
                            <label class="form-label">Images</label>
                            <div class="justified-gallery-AS1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </details>
    </div>
</div>
<!-- Pressure Seal Gasket Area -->
<div class="flex flex-wrap ">
    <div class="md:w-full pr-4 pl-4">
        <details class="border mt-4 rounded-t-sm">
            <summary
                class="question py-3 px-4 rounded-t-sm bg-blue-100 cursor-pointer focus:ring-4 focus:ring-blue-200 hover:bg-blue-400 dark:hover:bg-gray-800 gap-3 select-none w-full outline-none text-gray-700 font-semibold border-gray-200">
                Pressure Seal Gasket Area
            </summary>
            <div class="expanel-body" id="collapseAS2">
                <div class="flex flex-wrap ">
                    <div class="md:w-1/2 pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Valve Condition</label>
                            <select id="valve_condition_2" name="valve_condition_2"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax select2-dropdown-ajax-new"
                                data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                data-form="valve_condition_2" data-alias="AS2" data-scope="" data-reff-reset="true"
                                data-reff="health_rating_2" data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="md:w-1/2 pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Health Rating</label>
                            <select id="health_rating_2" name="health_rating_2"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.healthratings.showdropdowns') }}" data-store=""
                                data-form="health_rating_2" data-alias="" data-scope="" data-change="false">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="lg:w-1/2 pr-4 pl-4 md:w-full pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Potensial Cause</label>
                            <select id="potensial_cause_2" name="potensial_cause_2[]"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                data-form="potensial_cause_2" data-alias="AS2" data-scope="" data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                    <div class="lg:w-1/2 pr-4 pl-4 md:w-full pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Recommendation</label>
                            <select id="recommendation_2" name="recommendation_2[]"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                data-form="recommendation_2" data-alias="AS2" data-scope="" data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="md:w-full pr-4 pl-4">
                        <div class="mb-4">
                            <label class="form-label">Upload Image</label>
                            <div class="relative flex items-stretch w-full">
                                <input type="file" id="upload_2" name="upload_2"
                                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                    accept=".png,.jpg,.jpeg">
                                <span class="input-group-append">
                                    <button type="button"
                                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-3 px-3 bg-gray-800 text-white leading-normal no-underline btn-gray"
                                        onclick="uploadImage('upload_2','AS2','{{ route('swd.file.upload') }}')">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="md:w-full pr-4 pl-4">
                        <div class="mb-4">
                            <label class="form-label">Images</label>
                            <div class="justified-gallery-AS2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </details>
    </div>
</div>
<!-- Bonnet Gasket -->
<div class="flex flex-wrap ">
    <div class="md:w-full pr-4 pl-4">
        <details class="border mt-4 rounded-t-sm">
            <summary
                class="question py-3 px-4 rounded-t-sm bg-blue-100 cursor-pointer focus:ring-4 focus:ring-blue-200 hover:bg-blue-400 dark:hover:bg-gray-800 gap-3 select-none w-full outline-none text-gray-700 font-semibold border-gray-200">
                Bonnet Gasket
            </summary>
            <div class="expanel-body" id="collapseAS3">
                <div class="flex flex-wrap ">
                    <div class="md:w-1/2 pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Valve Condition</label>
                            <select id="valve_condition_3" name="valve_condition_3"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax select2-dropdown-ajax-new"
                                data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                data-form="valve_condition_3" data-alias="AS3" data-scope="" data-reff-reset="true"
                                data-reff="health_rating_3" data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="md:w-1/2 pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Health Rating</label>
                            <select id="health_rating_3" name="health_rating_3"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.healthratings.showdropdowns') }}" data-store=""
                                data-form="health_rating_3" data-alias="" data-scope="" data-change="false">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="lg:w-1/2 pr-4 pl-4 md:w-full pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Potensial Cause</label>
                            <select id="potensial_cause_3" name="potensial_cause_3[]"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                data-form="potensial_cause_3" data-alias="AS3" data-scope="" data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                    <div class="lg:w-1/2 pr-4 pl-4 md:w-full pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Recommendation</label>
                            <select id="recommendation_3" name="recommendation_3[]"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                data-form="recommendation_3" data-alias="AS3" data-scope="" data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="md:w-full pr-4 pl-4">
                        <div class="mb-4">
                            <label class="form-label">Upload Image</label>
                            <div class="relative flex items-stretch w-full">
                                <input type="file" id="upload_3" name="upload_3"
                                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                    accept=".png,.jpg,.jpeg">
                                <span class="input-group-append">
                                    <button type="button"
                                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-3 px-3 bg-gray-800 text-white leading-normal no-underline btn-gray"
                                        onclick="uploadImage('upload_3','AS3','{{ route('swd.file.upload') }}')">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="md:w-full pr-4 pl-4">
                        <div class="mb-4">
                            <label class="form-label">Images</label>
                            <div class="justified-gallery-AS3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </details>
    </div>
</div>
<!-- Valve Body -->
<div class="flex flex-wrap ">
    <div class="md:w-full pr-4 pl-4">
        <details class="border mt-4 rounded-t-sm">
            <summary
                class="question py-3 px-4 rounded-t-sm bg-blue-100 cursor-pointer focus:ring-4 focus:ring-blue-200 hover:bg-blue-400 dark:hover:bg-gray-800 gap-3 select-none w-full outline-none text-gray-700 font-semibold border-gray-200">
                Valve Body
            </summary>
            <div class="expanel-body" id="collapseAS4">
                <div class="flex flex-wrap ">
                    <div class="md:w-1/2 pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Valve Condition</label>
                            <select id="valve_condition_4" name="valve_condition_4"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax select2-dropdown-ajax-new"
                                data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                data-form="valve_condition_4" data-alias="AS4" data-scope="" data-reff-reset="true"
                                data-reff="health_rating_4" data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="md:w-1/2 pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Health Rating</label>
                            <select id="health_rating_4" name="health_rating_4"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.healthratings.showdropdowns') }}" data-store=""
                                data-form="health_rating_4" data-alias="" data-scope="" data-change="false">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="lg:w-1/2 pr-4 pl-4 md:w-full pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Potensial Cause</label>
                            <select id="potensial_cause_4" name="potensial_cause_4[]"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                data-form="potensial_cause_4" data-alias="AS4" data-scope="" data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                    <div class="lg:w-1/2 pr-4 pl-4 md:w-full pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Recommendation</label>
                            <select id="recommendation_4" name="recommendation_4[]"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                data-form="recommendation_4" data-alias="AS4" data-scope="" data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="md:w-full pr-4 pl-4">
                        <div class="mb-4">
                            <label class="form-label">Upload Image</label>
                            <div class="relative flex items-stretch w-full">
                                <input type="file" id="upload_4" name="upload_4"
                                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                    accept=".png,.jpg,.jpeg">
                                <span class="input-group-append">
                                    <button type="button"
                                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-3 px-3 bg-gray-800 text-white leading-normal no-underline btn-gray"
                                        onclick="uploadImage('upload_4','AS4','{{ route('swd.file.upload') }}')">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="md:w-full pr-4 pl-4">
                        <div class="mb-4">
                            <label class="form-label">Images</label>
                            <div class="justified-gallery-AS4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </details>
    </div>
</div>
<!-- Valve Trim -->
<div class="flex flex-wrap ">
    <div class="md:w-full pr-4 pl-4">
        <details class="border mt-4 rounded-t-sm">
            <summary
                class="question py-3 px-4 rounded-t-sm bg-blue-100 cursor-pointer focus:ring-4 focus:ring-blue-200 hover:bg-blue-400 dark:hover:bg-gray-800 gap-3 select-none w-full outline-none text-gray-700 font-semibold border-gray-200">
                Valve Trim
            </summary>
            <div class="expanel-body" id="collapseAS5">
                <div class="flex flex-wrap ">
                    <div class="md:w-1/2 pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Valve Condition</label>
                            <select id="valve_condition_5" name="valve_condition_5"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax select2-dropdown-ajax-new"
                                data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                data-form="valve_condition_5" data-alias="AS5" data-scope="" data-reff-reset="true"
                                data-reff="health_rating_5" data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="md:w-1/2 pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Health Rating</label>
                            <select id="health_rating_5" name="health_rating_5"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.healthratings.showdropdowns') }}" data-store=""
                                data-form="health_rating_5" data-alias="" data-scope="" data-change="false">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="lg:w-1/2 pr-4 pl-4 md:w-full pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Potensial Cause</label>
                            <select id="potensial_cause_5" name="potensial_cause_5[]"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                data-form="potensial_cause_5" data-alias="AS5" data-scope="" data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                    <div class="lg:w-1/2 pr-4 pl-4 md:w-full pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Recommendation</label>
                            <select id="recommendation_5" name="recommendation_5[]"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                data-form="recommendation_5" data-alias="AS5" data-scope="" data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="md:w-full pr-4 pl-4">
                        <div class="mb-4">
                            <label class="form-label">Upload Image</label>
                            <div class="relative flex items-stretch w-full">
                                <input type="file" id="upload_5" name="upload_5"
                                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                    accept=".png,.jpg,.jpeg">
                                <span class="input-group-append">
                                    <button type="button"
                                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-3 px-3 bg-gray-800 text-white leading-normal no-underline btn-gray"
                                        onclick="uploadImage('upload_5','AS5','{{ route('swd.file.upload') }}')">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="md:w-full pr-4 pl-4">
                        <div class="mb-4">
                            <label class="form-label">Images</label>
                            <div class="justified-gallery-AS5"></div>
                        </div>
                    </div>
                </div>
            </div>
        </details>
    </div>
</div>
<!-- Body Bolts & Nuts -->
<div class="flex flex-wrap ">
    <div class="md:w-full pr-4 pl-4">
        <details class="border mt-4 rounded-t-sm">
            <summary
                class="question py-3 px-4 rounded-t-sm bg-blue-100 cursor-pointer focus:ring-4 focus:ring-blue-200 hover:bg-blue-400 dark:hover:bg-gray-800 gap-3 select-none w-full outline-none text-gray-700 font-semibold border-gray-200">
                Body Bolts & Nuts
            </summary>
            <div class="expanel-body" id="collapseAS6">
                <div class="flex flex-wrap ">
                    <div class="md:w-1/2 pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Valve Condition</label>
                            <select id="valve_condition_6" name="valve_condition_6"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax select2-dropdown-ajax-new"
                                data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                data-form="valve_condition_6" data-alias="AS6" data-scope="" data-reff-reset="true"
                                data-reff="health_rating_6" data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="md:w-1/2 pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Health Rating</label>
                            <select id="health_rating_6" name="health_rating_6"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.healthratings.showdropdowns') }}" data-store=""
                                data-form="health_rating_6" data-alias="" data-scope="" data-change="false">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="lg:w-1/2 pr-4 pl-4 md:w-full pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Potensial Cause</label>
                            <select id="potensial_cause_6" name="potensial_cause_6[]"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                data-form="potensial_cause_6" data-alias="AS6" data-scope="" data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                    <div class="lg:w-1/2 pr-4 pl-4 md:w-full pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Recommendation</label>
                            <select id="recommendation_6" name="recommendation_6[]"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                data-form="recommendation_6" data-alias="AS6" data-scope="" data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="md:w-full pr-4 pl-4">
                        <div class="mb-4">
                            <label class="form-label">Upload Image</label>
                            <div class="relative flex items-stretch w-full">
                                <input type="file" id="upload_6" name="upload_6"
                                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                    accept=".png,.jpg,.jpeg">
                                <span class="input-group-append">
                                    <button type="button"
                                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-3 px-3 bg-gray-800 text-white leading-normal no-underline btn-gray"
                                        onclick="uploadImage('upload_6','AS6','{{ route('swd.file.upload') }}')">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="md:w-full pr-4 pl-4">
                        <div class="mb-4">
                            <label class="form-label">Images</label>
                            <div class="justified-gallery-AS6"></div>
                        </div>
                    </div>
                </div>
            </div>
        </details>
    </div>
</div>
<!-- Gear Box -->
<div class="flex flex-wrap ">
    <div class="md:w-full pr-4 pl-4">
        <details class="border mt-4 rounded-t-sm">
            <summary
                class="question py-3 px-4 rounded-t-sm bg-blue-100 cursor-pointer focus:ring-4 focus:ring-blue-200 hover:bg-blue-400 dark:hover:bg-gray-800 gap-3 select-none w-full outline-none text-gray-700 font-semibold border-gray-200">
                Gear Box
            </summary>
            <div class="expanel-body" id="collapseAS7">
                <div class="flex flex-wrap ">
                    <div class="md:w-1/2 pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Valve Condition</label>
                            <select id="valve_condition_7" name="valve_condition_7"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax select2-dropdown-ajax-new"
                                data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                data-form="valve_condition_7" data-alias="AS7" data-scope="" data-reff-reset="true"
                                data-reff="health_rating_7" data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="md:w-1/2 pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Health Rating</label>
                            <select id="health_rating_7" name="health_rating_7"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.healthratings.showdropdowns') }}" data-store=""
                                data-form="health_rating_7" data-alias="" data-scope="" data-change="false">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="lg:w-1/2 pr-4 pl-4 md:w-full pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Potensial Cause</label>
                            <select id="potensial_cause_7" name="potensial_cause_7[]"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                data-form="potensial_cause_7" data-alias="AS7" data-scope="" data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                    <div class="lg:w-1/2 pr-4 pl-4 md:w-full pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Recommendation</label>
                            <select id="recommendation_7" name="recommendation_7[]"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                data-form="recommendation_7" data-alias="AS7" data-scope="" data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="md:w-full pr-4 pl-4">
                        <div class="mb-4">
                            <label class="form-label">Upload Image</label>
                            <div class="relative flex items-stretch w-full">
                                <input type="file" id="upload_7" name="upload_7"
                                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                    accept=".png,.jpg,.jpeg">
                                <span class="input-group-append">
                                    <button type="button"
                                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-3 px-3 bg-gray-800 text-white leading-normal no-underline btn-gray"
                                        onclick="uploadImage('upload_7','AS7','{{ route('swd.file.upload') }}')">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="md:w-full pr-4 pl-4">
                        <div class="mb-4">
                            <label class="form-label">Images</label>
                            <div class="justified-gallery-AS7"></div>
                        </div>
                    </div>
                </div>
            </div>
        </details>
    </div>
</div>
<!-- Manual Override -->
<div class="flex flex-wrap ">
    <div class="md:w-full pr-4 pl-4">
        <details class="border mt-4 rounded-t-sm">
            <summary
                class="question py-3 px-4 rounded-t-sm bg-blue-100 cursor-pointer focus:ring-4 focus:ring-blue-200 hover:bg-blue-400 dark:hover:bg-gray-800 gap-3 select-none w-full outline-none text-gray-700 font-semibold border-gray-200">
                Manual Override
            </summary>
            <div class="expanel-body" id="collapseAS8">
                <div class="flex flex-wrap ">
                    <div class="md:w-1/2 pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Valve Condition</label>
                            <select id="valve_condition_8" name="valve_condition_8"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax select2-dropdown-ajax-new"
                                data-show="{{ route('swd.dropdowns.showvalveconditiondropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewvalveconditiondropdown') }}"
                                data-form="valve_condition_8" data-alias="AS8" data-scope="" data-reff-reset="true"
                                data-reff="health_rating_8" data-change="false">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="md:w-1/2 pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Health Rating</label>
                            <select id="health_rating_8" name="health_rating_8"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                                data-show="{{ route('swd.healthratings.showdropdowns') }}" data-store=""
                                data-form="health_rating_8" data-alias="" data-scope="" data-change="false">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="lg:w-1/2 pr-4 pl-4 md:w-full pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Potensial Cause</label>
                            <select id="potensial_cause_8" name="potensial_cause_8[]"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showpotensialcausedropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewpotensialcausedropdown') }}"
                                data-form="potensial_cause_8" data-alias="AS8" data-scope="" data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                    <div class="lg:w-1/2 pr-4 pl-4 md:w-full pr-4 pl-4 sm:w-full">
                        <div class="mb-4">
                            <label class="form-label">Recommendation</label>
                            <select id="recommendation_8" name="recommendation_8[]"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-multiple select2-multiple-new"
                                data-show="{{ route('swd.dropdowns.showrecommendationdropdowns') }}"
                                data-store="{{ route('swd.dropdowns.storenewrecommendationdropdown') }}"
                                data-form="recommendation_8" data-alias="AS8" data-scope="" data-change="false"
                                multiple>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="md:w-full pr-4 pl-4">
                        <div class="mb-4">
                            <label class="form-label">Upload Image</label>
                            <div class="relative flex items-stretch w-full">
                                <input type="file" id="upload_8" name="upload_8"
                                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                    accept=".png,.jpg,.jpeg">
                                <span class="input-group-append">
                                    <button type="button"
                                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-3 px-3 bg-gray-800 text-white leading-normal no-underline btn-gray"
                                        onclick="uploadImage('upload_8','AS8','{{ route('swd.file.upload') }}')">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap ">
                    <div class="md:w-full pr-4 pl-4">
                        <div class="mb-4">
                            <label class="form-label">Images</label>
                            <div class="justified-gallery-AS8"></div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
</div>
