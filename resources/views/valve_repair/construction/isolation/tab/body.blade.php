<div class="flex items-center">
    <input id="checkbox_body_construction_isolation_valve" type="checkbox" name="bc_checkbox"
        value="1"
        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="checked-checkbox"
        class="ml-2 text-md font-medium text-gray-900 dark:text-gray-300">Data Not
        Available</label>
</div>
<div class="mb-6 mt-6">
    <div class="row sm:flex">
        <div id="body_construction_found"
            class=" {{ 1 == 2 ? 'sm:w-2/2' : 'sm:w-1/2' }} w-full sm:pr-2">
            <h5 class="mb-4 text-sm font-medium leading-none text-gray-900 dark:text-white">
                CONSTRUCTION (AS FOUND)</h5>
            <label for="bc_brand_found"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
            <select id="bc_brand_found" name="bc_brand_found" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a type</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'brand_isolation_valve')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="bc_model_found"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
            <input type="text" id="bc_model_found" name="bc_model_found"
                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required placeholder="Model">
            <label for="bc_serial_number_found"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial
                Number</label>
            <input type="text" id="bc_serial_number_found"
                name="bc_serial_number_found"
                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required placeholder="Serial Number">
            <label for="bc_type_found"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
            <select id="bc_type_found" name="bc_type_found" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a type</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'isolation_valve_device_type')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="bc_size_found"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size</label>
            <select id="bc_size_found" name="bc_size_found" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'body_size_isolation_valve')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="bc_port_found"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Port</label>
            <select id="bc_port_found" name="bc_port_found" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'body_port_isolation_valve')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="bc_pressure_class_found"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pressure
                Class</label>
            <select id="bc_pressure_class_found" name="bc_pressure_class_found" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'body_pressure_class_isolation_valve')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="bc_end_connection_found"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End
                Connection</label>
            <select id="bc_end_connection_found" name="bc_end_connection_found" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'body_end_connection_isolation_valve')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="bc_bonnet_style_found"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bonnet
                Style</label>
            <select id="bc_bonnet_style_found" name="bc_bonnet_style_found" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'bonnet_style')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>

            <label for="bc_packing_configuration_found"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Packing
                Configuration</label>
            <select id="bc_packing_configuration_found"
                name="bc_packing_configuration_found" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'body_packing_configuration_isolation_valve')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="bc_live_loaded_found"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Live
                Loaded</label>
            <select id="bc_live_loaded_found" name="bc_live_loaded_found" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'live_loaded')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="bc_body_material_found"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body
                Material</label>
            <select id="bc_body_material_found" name="bc_body_material_found" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'body_material')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="bc_pdb_material_found"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plug/Disc/Ball
                Material</label>
            <select id="bc_pdb_material_found" name="bc_pdb_material_found" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'plug_disc_ball_material')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="bc_steam_shaft_material_found"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Steam
                Shaft Material</label>
            <select id="bc_steam_shaft_material_found" name="bc_steam_shaft_material_found"
                required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'stem_shaft_material')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="bc_seat_material_found"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seat
                Material</label>
            <select id="bc_seat_material_found" name="bc_seat_material_found" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'seat_material')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>

        </div>

        {{-- Body Construction Left --}}
        <div id="body_construction_left" class="sm:w-1/2 w-full sm:pr-2">
            <h5 class="mb-4 text-sm font-medium leading-none text-gray-900 dark:text-white">
                CONSTRUCTION (AS LEFT)</h5>
            <label for="bc_brand_left"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
            <select id="bc_brand_left" name="bc_brand_left" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a type</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'brand_isolation_valve')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="bc_model_left"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
            <input type="text" id="bc_model_left" name="bc_model_left"
                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required placeholder="Model">
            <label for="bc_serial_number_left"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial
                Number</label>
            <input type="text" id="bc_serial_number_left" name="bc_serial_number_left"
                class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required placeholder="Serial Number">
            <label for="bc_type_left"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
            <select id="bc_type_left" name="bc_type_left" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a type</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'isolation_valve_device_type')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="bc_size_left"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size</label>
            <select id="bc_size_left" name="bc_size_left" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'body_size_isolation_valve')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="bc_port_left"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Port</label>
            <select id="bc_port_left" name="bc_port_left" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'body_port_isolation_valve')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="bc_pressure_class_left"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pressure
                Class</label>
            <select id="bc_pressure_class_left" name="bc_pressure_class_left" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'body_pressure_class_isolation_valve')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="bc_end_connection_left"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End
                Connection</label>
            <select id="bc_end_connection_left" name="bc_end_connection_left" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'body_end_connection_isolation_valve')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="bc_bonnet_style_left"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bonnet
                Style</label>
            <select id="bc_bonnet_style_left" name="bc_bonnet_style_left" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'bonnet_style')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>

            <label for="bc_packing_configuration_left"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Packing
                Configuration</label>
            <select id="bc_packing_configuration_left" name="bc_packing_configuration_left"
                required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'body_packing_configuration_isolation_valve')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="bc_live_loaded_left"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Live
                Loaded</label>
            <select id="bc_live_loaded_left" name="bc_live_loaded_left" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'live_loaded')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="bc_body_material_left"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body
                Material</label>
            <select id="bc_body_material_left" name="bc_body_material_left" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'body_material')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="bc_pdb_material_left"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plug/Disc/Ball
                Material</label>
            <select id="bc_pdb_material_left" name="bc_pdb_material_left" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'plug_disc_ball_material')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="bc_steam_shaft_material_left"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Steam
                Shaft Material</label>
            <select id="bc_steam_shaft_material_left" name="bc_steam_shaft_material_left"
                required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'stem_shaft_material')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="bc_seat_material_left"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seat
                Material</label>
            <select id="bc_seat_material_left" name="bc_seat_material_left" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="" disabled>Choose a Size</option>
                @foreach ($vrr_dropdown as $value)
                    @if ($value->dropdown_category == 'seat_material')
                        <option value="{{ $value->id }}">
                            {{ $value->dropdown_label }}
                        </option>
                    @endif
                @endforeach
            </select>

        </div>
    </div>
    <div id="body_construction_note_div" class="row sm:flex mt-3">
        <div class="w-full sm:pr-2">
            <label for="bc_note"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
            <textarea
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Write note here..." id="bc_note" name="bc_note"></textarea>
        </div>
    </div>
</div>
