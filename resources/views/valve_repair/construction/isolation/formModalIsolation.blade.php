           <!-- Modal header -->
           <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
               <h3 class="text-xl font-semibold text-gray-900 dark:text-white modal-title-contraction">CONSTRUCTION -
                   ACTUATOR [ISOLATION VALVE ]</h3>
               <button type="button" id="closeIcoConstruction"
                   class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                   <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                       viewBox="0 0 14 14">
                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                   </svg>
                   <span class="sr-only">Close modal</span>
               </button>
           </div>
           <!-- Modal body -->
           <div class="px-6">
               <!-- Alert Message Area -->
               <div id="alert-frame">
                   <div id="warning-alert"
                       class="hidden items-center p-4 my-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                       role="alert">
                       <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                           xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                           <path
                               d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                       </svg>
                       <span class="sr-only">Info</span>
                       <div>
                           <span class="font-medium warning-alert-title"></span>
                           <ul class="mt-1.5 ml-4 list-disc list-inside warning-alert-message"></ul>
                       </div>
                       <button type="button"
                           class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                           onclick="$('#warning-alert').removeClass('flex').addClass('hidden')" aria-label="Close">
                           <span class="sr-only">Close</span>
                           <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                               viewBox="0 0 14 14">
                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                   stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                           </svg>
                       </button>
                   </div>
               </div>
               <!-- URL Area -->
               <input type="hidden" id="form_url_construction" readonly>
               <input type="hidden" id="form_id_construction" readonly>


               <!-- Form Area -->

               <div class="border-b border-gray-200 dark:border-gray-700">
                   <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                       data-tabs-toggle="#myTabContent" role="tablist">
                       <li class="mr-2" role="presentation">
                           <button class="inline-block p-4 border-b-2 rounded-t-lg" id="BodyIsolation-tab"
                               data-tabs-target="#BodyIsolation"
                               data-url={{ route('valverepair.store.constructionbody') }}
                               data-form="mainFormConstructionBody" type="button" role="tab"
                               aria-controls="BodyIsolation" aria-selected="false">Body</button>
                       </li>
                       <li class="mr-2" role="presentation">
                           <button
                               class="inline-block p-4 border-b-2  rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                               id="actuatorHandwheel-tab" data-url={{ route('valverepair.store') }}
                               data-tabs-target="#actuatorHandwheel" type="button" role="tab"
                               aria-controls="actuatorHandwheel" aria-selected="false">Actuator
                               Handwheel</button>
                       </li>
                       <li class="mr-2" role="presentation">
                           <button
                               class="inline-block p-4 border-b-2  rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                               id="ActuatorAutomation-tab" data-tabs-target="#ActuatorAutomation" type="button"
                               role="tab" aria-controls="ActuatorAutomation" aria-selected="false">Actuator
                               Automation</button>
                       </li>
                   </ul>
               </div>
               <div id="myTabContent">
                   {{-- Content general Information --}}
                   <div class="hidden p-4 rounded-lg bg-gray-0 dark:bg-gray-800" id="BodyIsolation" role="tabpanel"
                       aria-labelledby="BodyIsolation-tab">
                       <form id="mainFormConstructionBody" method="post" enctype="multipart/form-data">
                           @csrf
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
                       </form>
                   </div>
                   {{-- Start Actuator Wheel --}}
                   <div class="hidden p-4 rounded-lg bg-gray-0 dark:bg-gray-800" id="actuatorHandwheel"
                       role="tabpanel" aria-labelledby="actuatorHandwheel-tab">
                       <div class="flex items-center">
                           <input id="checkbox_actuator_isolation_valve" type="checkbox"
                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                           <label for="checked-checkbox"
                               class="ml-2 text-md font-medium text-gray-900 dark:text-gray-300">Data Not
                               Available</label>
                       </div>
                       <div class="row sm:flex mb-6 mt-6">
                           <div id="actuator_construction_found"
                               class=" {{ 1 == 2 ? 'sm:w-2/2' : 'sm:w-1/2' }} w-full sm:pr-2">
                               <h5 class="mb-4 text-sm font-medium leading-none text-gray-900 dark:text-white">
                                   CONSTRUCTION (AS FOUND)</h5>
                               <label for="actuator_construction_type_found"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                               <select id="actuator_construction_type_found" name="actuator_construction_type_found"
                                   required
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                   <option selected value="" disabled>Choose a type</option>
                                   @foreach ($vrr_dropdown as $value)
                                       @if ($value->dropdown_category == 'type_actuator_construction')
                                           <option value="{{ $value->id }}">
                                               {{ $value->dropdown_label }}
                                           </option>
                                       @endif
                                   @endforeach
                               </select>
                               <label for="actuator_construction_size_found"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size</label>
                               <select id="actuator_construction_size_found" name="actuator_construction_size_found"
                                   required
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                   <option selected value="" disabled>Choose a Size</option>
                                   @foreach ($vrr_dropdown as $value)
                                       @if ($value->dropdown_category == 'size_actuator')
                                           <option value="{{ $value->id }}">
                                               {{ $value->dropdown_label }}
                                           </option>
                                       @endif
                                   @endforeach
                               </select>
                               <label for="actuator_construction_mounting_found"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mounting</label>

                               <select id="actuator_construction_mounting_found"
                                   name="actuator_construction_mounting_found" required
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                   <option selected value="" disabled>Choose a Mounting</option>
                                   @foreach ($vrr_dropdown as $value)
                                       @if ($value->dropdown_category == 'mounting_actuator')
                                           <option value="{{ $value->id }}">
                                               {{ $value->dropdown_label }}
                                           </option>
                                       @endif
                                   @endforeach
                               </select>
                               <label for="actuator_construction_action_found"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Action</label>
                               <select id="actuator_construction_action_found"
                                   name="actuator_construction_action_found" required
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                   <option selected value="" disabled>Choose a Mounting</option>
                                   @foreach ($vrr_dropdown as $value)
                                       @if ($value->dropdown_category == 'action_actuator')
                                           <option value="{{ $value->id }}">
                                               {{ $value->dropdown_label }}
                                           </option>
                                       @endif
                                   @endforeach
                               </select>
                               <label for="actuator_construction_model_found"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
                               <input type="text" id="actuator_construction_model_found"
                                   name="actuator_construction_model_found"
                                   class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   required placeholder="Model">
                               <label for="actuator_construction_serial_found"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial
                                   Number</label>
                               <input type="text" id="actuator_construction_serial_found"
                                   name="actuator_construction_serial_found"
                                   class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   required placeholder="Serial">
                           </div>
                           <div id="actuator_construction_left" class="sm:w-1/2 w-full sm:pr-2">
                               <h5 class="mb-4 text-sm font-medium leading-none text-gray-900 dark:text-white">
                                   CONSTRUCTION (AS LEFT)</h5>
                               <label for="actuator_construction_type_left"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                               <select id="actuator_construction_type_left" name="actuator_construction_type_left"
                                   required
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                   <option selected value="" disabled>Choose a type</option>
                                   @foreach ($vrr_dropdown as $value)
                                       @if ($value->dropdown_category == 'type_actuator_construction')
                                           <option value="{{ $value->id }}">
                                               {{ $value->dropdown_label }}
                                           </option>
                                       @endif
                                   @endforeach
                               </select>
                               <label for="actuator_construction_size_left"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size</label>
                               <select id="actuator_construction_size_left" name="actuator_construction_size_left"
                                   required
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                   <option selected value="" disabled>Choose a Size</option>
                                   @foreach ($vrr_dropdown as $value)
                                       @if ($value->dropdown_category == 'size_actuator')
                                           <option value="{{ $value->id }}">
                                               {{ $value->dropdown_label }}
                                           </option>
                                       @endif
                                   @endforeach
                               </select>
                               <label for="actuator_construction_mounting_left"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mounting</label>
                               <input type="text" id="actuator_construction_mounting_left"
                                   name="actuator_construction_mounting_left"
                                   class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   required placeholder="Mounting">
                               <label for="actuator_construction_action_left"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Action</label>
                               <input type="text" id="actuator_construction_action_left"
                                   name="actuator_construction_action_left"
                                   class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   required placeholder="Action">
                               <label for="actuator_construction_model_left"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
                               <input type="text" id="actuator_construction_model_left"
                                   name="actuator_construction_model_left"
                                   class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   required placeholder="Model">
                               <label for="actuator_construction_serial_left"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial
                                   Number</label>
                               <input type="text" id="actuator_construction_serial_left"
                                   name="actuator_construction_serial_left"
                                   class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   required placeholder="Serial">
                           </div>
                       </div>
                       <div id="actuator_construction_note_div" class="row sm:flex mt-3">
                           <div class="w-full sm:pr-2">
                               <label for="actuator_construction_note"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
                               <textarea
                                   class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="Write note here..." id="actuator_construction_note" name="actuator_construction_note"></textarea>
                           </div>
                       </div>

                   </div>

                   <div class="hidden p-4 rounded-lg bg-gray-0 dark:bg-gray-800" id="ActuatorAutomation"
                       role="tabpanel" aria-labelledby="ActuatorAutomation-tab">
                       <p>Masuk 3</p>
                   </div>
               </div>
               <!-- Modal footer -->
               <div
                   class="flex flex-row  items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 py-4">
                   <div class="basis-2/4 flex justify-start">
                       {{-- <button type="button" onClick="goToGeneralInformation()" id="generalInformationButton"
                       class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                       Back Step: General Information
                   </button> --}}
                       <button id="cancelBtnConstruction" type="button"
                           class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                   </div>
                   <div class="basis-2/4 flex justify-end">

                       <button type="button" onClick="goToDeviceInfo()" id="deviceDetailButton"
                           class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                           Next : Actuator Handwheel
                       </button>
                       <button type="button" id="saveButtonAction" onClick="saveRecordIsolation()"
                           class="ml-5  text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                   </div>
               </div>
