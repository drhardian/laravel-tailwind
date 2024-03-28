<div class="flex flex-wrap ">
    <!-- Body Manufacturer -->
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Body Manufacturer</label>
            <select id="body_mfc" name="body_mfc" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
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
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Body Serial Number</label>
            <select id="body_sn" name="body_sn" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
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
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Body Model</label>
            <select id="body_model" name="body_model" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
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
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Body Size</label>
            <select id="body_size" name="body_size" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
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
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Body Material</label>
            <select id="body_material" name="body_material" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
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
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Class Rating</label>
            <select id="class_rating" name="class_rating" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
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
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">End Connection</label>
            <select id="end_connection" name="end_connection" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
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
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Design</label>
            <select id="valve_design" name="valve_design" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
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
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Seat Material</label>
            <select id="seat_material" name="seat_material" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-dropdown-ajax"
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
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Air Assisted</label>
            <select id="air_assisted" name="air_assisted" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-static">
                <option value="" selected></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <!-- Dampener -->
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Dampener</label>
            <select id="dampener" name="dampener" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-static">
                <option value="" selected></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <!-- Counter Weight -->
    <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4">
        <div class="mb-4">
            <label class="form-label">Counter Weight</label>
            <select id="counter_weight" name="counter_weight" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded select2-static">
                <option value="" selected></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
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
</div>
