<div class="flex flex-wrap ">
    <!-- Body Manufacturer -->
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Body Manufacturer</label>
            <select id="body_mfc" name="body_mfc" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                data-form="body_mfc"
                data-alias="BDYMFC"
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Body Serial Number -->
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Body Serial Number</label>
            <select id="body_sn" name="body_sn" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                data-form="body_sn"
                data-alias="BDYSNM"
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Body Model -->
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Body Model</label>
            <select id="body_model" name="body_model" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                data-form="body_model"
                data-alias="BDYMDL"
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Body Material -->
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Body Material</label>
            <select id="body_material" name="body_material" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                data-form="body_material"
                data-alias="BDYMTR"
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Class Rating -->
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Class Rating</label>
            <select id="class_rating" name="class_rating" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                data-form="class_rating"
                data-alias="CLSRTG"
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Manual Override -->
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Manual Override</label>
            <select id="manual_override" name="manual_override" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-static">
                <option value="" selected></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <!-- Code -->
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Code</label>
            <select id="code" name="code" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                data-form="code"
                data-alias="VLVCDE"
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Inlet -->
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Inlet</label>
            <select id="inlet" name="inlet" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                data-form="inlet"
                data-alias="VLVINL"
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Inlet Choose -->
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Inlet Choose</label>
            <select id="inlet_choose" name="inlet_choose" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                data-form="inlet_choose"
                data-alias="INLCHE"
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Outlet -->
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Outlet</label>
            <select id="outlet" name="outlet" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                data-form="outlet"
                data-alias="VLVOUL"
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Outlet Choose -->
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Outlet Choose</label>
            <select id="outlet_choose" name="outlet_choose" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                data-form="outlet_choose"
                data-alias="OULCHE"
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Orifice Size -->
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Orifice Size</label>
            <select id="orifice_size" name="orifice_size" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                data-form="orifice_size"
                data-alias="ORFSZE"
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Set -->
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Set</label>
            <select id="set" name="set" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                data-form="set"
                data-alias="VLVSET"
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Capacity -->
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Capacity</label>
            <select id="capacity" name="capacity" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                data-form="capacity"
                data-alias="VLVCAP"
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
    <!-- Pilot Operated -->
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Pilot Operated</label>
            <select id="pilot_operated" name="pilot_operated" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-static">
                <option value="" selected></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <!-- Choose -->
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Choose</label>
            <select id="choose" name="choose" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
                data-show="{{ route('swd.dropdowns.showdropdowns') }}"
                data-store="{{ route('swd.dropdowns.storenewdropdown') }}"
                data-form="choose"
                data-alias="VLVCHE"
                data-scope="specific"
                data-change="false">
                <option value="" disabled selected></option>
            </select>
        </div>
    </div>
</div>
