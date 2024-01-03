           <!-- Modal header -->
           <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
               <h3 class="text-xl font-semibold text-gray-900 dark:text-white modal-title-contraction">CALIBRATION ISOL
                   ATION VALVE</h3>
               <button type="button" id="closeIcoCalibration"
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
               <input type="hidden" id="form_url_calibration" readonly>
               <input type="hidden" id="form_id_calibration" readonly>

               <!-- Form Area -->
               <div class="p-4">
                   <div class="mb-6 mt-2">
                       <form id="form_calibration" method="post" enctype="multipart/form-data">

                           <div class="row sm:flex">
                               <div id="isolation_calibration_found"
                                   class=" {{ 1 == 2 ? 'sm:w-2/2' : 'sm:w-1/2' }} w-full sm:pr-2 mb-4">
                                   <h5 class="mb-4 text-sm font-medium leading-none text-gray-900 dark:text-white">
                                       CALIBRATION (AS FOUND)</h5>

                                   <label for="calibration_travel_found"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Travel</label>
                                   <input type="text" id="calibration_travel_found" name="calibration_travel_found"
                                       class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       required placeholder="">
                                   <label for="calibration_travel_uom_found"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Travel
                                       UOM</label>
                                   <select id="calibration_travel_uom_found" name="calibration_travel_uom_found"
                                       required
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                       <option selected value="" disabled>Choose a UOM</option>
                                       @foreach ($vrr_dropdown as $value)
                                           @if ($value->dropdown_category == 'calibration_travel_uom')
                                               <option value="{{ $value->id }}">
                                                   {{ $value->dropdown_label }}
                                               </option>
                                           @endif
                                       @endforeach
                                   </select>
                                   <label for="calibration_bench_set_found"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bench
                                       Set</label>
                                   <input type="text" id="calibration_bench_set_found"
                                       name="calibration_bench_set_found"
                                       class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       required placeholder="">

                                   <label for="calibration_bench_set_uom_found"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bench Set
                                       UOM</label>
                                   <select id="calibration_bench_set_uom_found" name="calibration_bench_set_uom_found"
                                       required
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                       <option selected value="" disabled>Choose a UOM</option>
                                       @foreach ($vrr_dropdown as $value)
                                           @if ($value->dropdown_category == 'calibration_bench_set_uom')
                                               <option value="{{ $value->id }}">
                                                   {{ $value->dropdown_label }}
                                               </option>
                                           @endif
                                       @endforeach
                                   </select>

                                   <label for="calibration_signal_open_found"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Signal
                                       Open</label>
                                   <input type="text" id="calibration_signal_open_found"
                                       name="calibration_signal_open_found"
                                       class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       required placeholder="">

                                   <label for="calibration_signal_open_uom_found"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Signal Open
                                       UOM</label>
                                   <select id="calibration_signal_open_uom_found"
                                       name="calibration_signal_open_uom_found" required
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                       <option selected value="" disabled>Choose a UOM</option>
                                       @foreach ($vrr_dropdown as $value)
                                           @if ($value->dropdown_category == 'calibration_signal')
                                               <option value="{{ $value->id }}">
                                                   {{ $value->dropdown_label }}
                                               </option>
                                           @endif
                                       @endforeach
                                   </select>

                                   <label for="calibration_signal_close_found"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Signal
                                       Close</label>
                                   <input type="text" id="calibration_signal_close_found"
                                       name="calibration_signal_close_found"
                                       class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       required placeholder="">

                                   <label for="calibration_signal_close_uom_found"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Signal
                                       Close
                                       UOM</label>
                                   <select id="calibration_signal_close_uom_found"
                                       name="calibration_signal_close_uom_found" required
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                       <option selected value="" disabled>Choose a UOM</option>
                                       @foreach ($vrr_dropdown as $value)
                                           @if ($value->dropdown_category == 'calibration_signal')
                                               <option value="{{ $value->id }}">
                                                   {{ $value->dropdown_label }}
                                               </option>
                                           @endif
                                       @endforeach
                                   </select>

                                   <label for="calibration_supply_found"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supply</label>
                                   <input type="text" id="calibration_supply_found"
                                       name="calibration_supply_found"
                                       class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       required placeholder="">

                                   <label for="calibration_supply_uom_found"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supply
                                       UOM</label>
                                   <select id="calibration_supply_uom_found" name="calibration_supply_uom_found"
                                       required
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                       <option selected value="" disabled>Choose UOM</option>
                                       @foreach ($vrr_dropdown as $value)
                                           @if ($value->dropdown_category == 'calibration_supply_uom')
                                               <option value="{{ $value->id }}">
                                                   {{ $value->dropdown_label }}
                                               </option>
                                           @endif
                                       @endforeach
                                   </select>
                                   <label for="calibration_fail_action_found"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fail
                                       Action</label>
                                   <select id="calibration_fail_action_found" name="calibration_fail_action_found"
                                       required
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                       <option selected value="" disabled>Choose Fail Action</option>
                                       @foreach ($vrr_dropdown as $value)
                                           @if ($value->dropdown_category == 'calibration_fail_action')
                                               <option value="{{ $value->id }}">
                                                   {{ $value->dropdown_label }}
                                               </option>
                                           @endif
                                       @endforeach
                                   </select>
                               </div>
                               <div id="isolation_calibration_left" class=" sm:w-1/2 w-full sm:pr-2 ">
                                   <h5 class="mb-4 text-sm font-medium leading-none text-gray-900 dark:text-white">
                                       CALIBRATION (AS LEFT)</h5>
                                   <label for="calibration_travel_left"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Travel</label>
                                   <input type="text" id="calibration_travel_left"
                                       name="calibration_travel_left"
                                       class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       required placeholder="">
                                   <label for="calibration_travel_uom_left"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Travel
                                       UOM</label>
                                   <select id="calibration_travel_uom_left" name="calibration_travel_uom_left"
                                       required
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                       <option selected value="" disabled>Choose a UOM</option>
                                       @foreach ($vrr_dropdown as $value)
                                           @if ($value->dropdown_category == 'calibration_travel_uom')
                                               <option value="{{ $value->id }}">
                                                   {{ $value->dropdown_label }}
                                               </option>
                                           @endif
                                       @endforeach
                                   </select>
                                   <label for="calibration_bench_set_left"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bench
                                       Set</label>
                                   <input type="text" id="calibration_bench_set_left"
                                       name="calibration_bench_set_left"
                                       class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       required placeholder="">

                                   <label for="calibration_bench_set_uom_left"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Travel
                                       UOM</label>
                                   <select id="calibration_bench_set_uom_left" name="calibration_bench_set_uom_left"
                                       required
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                       <option selected value="" disabled>Choose a UOM</option>
                                       @foreach ($vrr_dropdown as $value)
                                           @if ($value->dropdown_category == 'calibration_bench_set_uom')
                                               <option value="{{ $value->id }}">
                                                   {{ $value->dropdown_label }}
                                               </option>
                                           @endif
                                       @endforeach
                                   </select>

                                   <label for="calibration_signal_open_left"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Signal
                                       Open</label>
                                   <input type="text" id="calibration_signal_open_left"
                                       name="calibration_signal_open_left"
                                       class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       required placeholder="">

                                   <label for="calibration_signal_open_uom_left"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Signal Open
                                       UOM</label>
                                   <select id="calibration_signal_open_uom_left"
                                       name="calibration_signal_open_uom_left" required
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                       <option selected value="" disabled>Choose a UOM</option>
                                       @foreach ($vrr_dropdown as $value)
                                           @if ($value->dropdown_category == 'calibration_signal')
                                               <option value="{{ $value->id }}">
                                                   {{ $value->dropdown_label }}
                                               </option>
                                           @endif
                                       @endforeach
                                   </select>

                                   <label for="calibration_signal_close_left"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Signal
                                       Close</label>
                                   <input type="text" id="calibration_signal_close_left"
                                       name="calibration_signal_close_left"
                                       class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       required placeholder="">

                                   <label for="calibration_signal_close_uom_left"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Signal
                                       Close
                                       UOM</label>
                                   <select id="calibration_signal_close_uom_left"
                                       name="calibration_signal_close_uom_left" required
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                       <option selected value="" disabled>Choose a UOM</option>
                                       @foreach ($vrr_dropdown as $value)
                                           @if ($value->dropdown_category == 'calibration_signal')
                                               <option value="{{ $value->id }}">
                                                   {{ $value->dropdown_label }}
                                               </option>
                                           @endif
                                       @endforeach
                                   </select>

                                   <label for="calibration_supply_left"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supply</label>
                                   <input type="text" id="calibration_supply_left"
                                       name="calibration_supply_left"
                                       class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       required placeholder="">

                                   <label for="calibration_supply_uom_left"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supply
                                       UOM</label>
                                   <select id="calibration_supply_uom_left" name="calibration_supply_uom_left"
                                       required
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                       <option selected value="" disabled>Choose UOM</option>
                                       @foreach ($vrr_dropdown as $value)
                                           @if ($value->dropdown_category == 'calibration_supply_uom')
                                               <option value="{{ $value->id }}">
                                                   {{ $value->dropdown_label }}
                                               </option>
                                           @endif
                                       @endforeach
                                   </select>
                                   <label for="calibration_fail_action_left"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fail
                                       Action</label>
                                   <select id="calibration_fail_action_left" name="calibration_fail_action_left"
                                       required
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                       <option selected value="" disabled>Choose Fail Action</option>
                                       @foreach ($vrr_dropdown as $value)
                                           @if ($value->dropdown_category == 'calibration_fail_action')
                                               <option value="{{ $value->id }}">
                                                   {{ $value->dropdown_label }}
                                               </option>
                                           @endif
                                       @endforeach
                                   </select>
                               </div>
                           </div>
                   </div>
               </div>
               </form>

               <!-- Modal footer -->
               <div
                   class="flex flex-row  items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 py-4">
                   <div class="basis-2/4 flex justify-start">

                       <button id="cancelBtnCalibration" type="button"
                           class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                   </div>
                   <div class="basis-2/4 flex justify-end">

                       <button type="button" id="saveButtonAction" onClick="saveRecordIsolationCalibration()"
                           class="ml-5  text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                   </div>
               </div>
           </div>
