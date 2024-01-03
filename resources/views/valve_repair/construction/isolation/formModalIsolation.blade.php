           <!-- Modal header -->
           <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
               <h3 class="text-xl font-semibold text-gray-900 dark:text-white modal-title-contraction">CONSTRUCTION</h3>
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
                               data-url={{ route('valverepair.scopeofwork.store.constructionbody') }}
                               data-form="mainFormConstructionBody" type="button" role="tab"
                               aria-controls="BodyIsolation" aria-selected="false">Body</button>
                       </li>
                       <li class="mr-2" role="presentation">
                           <button
                               class="inline-block p-4 border-b-2  rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                               id="actuatorHandwheel-tab"
                               data-url={{ route('valverepair.scopeofwork.get.constructionactuatorwheel', ['consIsolValve' => $valverepair->id, 'scopeofworkid' => $scopeofwork->id]) }}
                               data-form="mainFormConstructionActuatorHandWheel" data-tabs-target="#actuatorHandwheel"
                               type="button" role="tab" aria-controls="actuatorHandwheel"
                               aria-selected="false">Actuator
                               Handwheel</button>
                       </li>
                       <li class="mr-2" role="presentation">
                           <button
                               class="inline-block p-4 border-b-2  rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                               id="ActuatorAutomation-tab"
                               data-url={{ route('valverepair.scopeofwork.get.constructionactuatorautomation', ['consIsolValve' => $valverepair->id, 'scopeofworkid' => $scopeofwork->id]) }}
                               data-tabs-target="#ActuatorAutomation" type="button"
                               data-form="mainFormActuatorAutomation" data-tabs-target="#ActuatorAutomation"
                               role="tab" aria-controls="ActuatorAutomation" aria-selected="false">Actuator
                               Automation</button>
                       </li>
                       <li class="mr-2" role="presentation">
                           <button
                               class="inline-block p-4 border-b-2  rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                               id="PositionerIsolationValve-tab"
                               data-url={{ route('valverepair.scopeofwork.get.constructionpositionerisolation', ['consIsolValve' => $valverepair->id, 'scopeofworkid' => $scopeofwork->id]) }}
                               data-tabs-target="#PositionerIsolationValve" type="button"
                               data-form="mainFormPositionerIsolationValve" data-tabs-target="#PositionerIsolationValve"
                               role="tab" aria-controls="PositionerIsolationValve"
                               aria-selected="false">Positioner</button>
                       </li>
                       <li class="mr-2" role="presentation">
                           <button
                               class="inline-block p-4 border-b-2  rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                               id="AccessoriesIsolationValve-tab"
                               data-url={{ route('valverepair.scopeofwork.get.constructionaccesoriesisolation', ['consIsolValve' => $valverepair->id, 'scopeofworkid' => $scopeofwork->id]) }}
                               data-tabs-target="#AccessoriesIsolationValve" type="button"
                               data-form="mainFormAccessoriesIsolationValve"
                               data-tabs-target="#AccessoriesIsolationValve" role="tab"
                               aria-controls="AccessoriesIsolationValve" aria-selected="false">Accessories</button>
                       </li>
                   </ul>
               </div>
               <div id="myTabContent">
                   {{-- Start Body Information --}}
                   <div class="hidden p-4 rounded-lg bg-gray-0 dark:bg-gray-800" id="BodyIsolation" role="tabpanel"
                       aria-labelledby="BodyIsolation-tab">
                       <form id="mainFormConstructionBody" method="post" enctype="multipart/form-data">
                           @csrf
                           @include('valve_repair.construction.isolation.tab.body')
                       </form>
                   </div>
                   {{-- Start Actuator Wheel --}}
                   <div class="hidden p-4 rounded-lg bg-gray-0 dark:bg-gray-800" id="actuatorHandwheel"
                       role="tabpanel" aria-labelledby="actuatorHandwheel-tab">
                       <form id="mainFormConstructionActuatorHandWheel" method="post" enctype="multipart/form-data">
                           @include('valve_repair.construction.isolation.tab.actuator_handwheel')
                       </form>
                   </div>

                   <div class="hidden p-4 rounded-lg bg-gray-0 dark:bg-gray-800" id="ActuatorAutomation"
                       role="tabpanel" aria-labelledby="ActuatorAutomation-tab">
                       <form id="mainFormActuatorAutomation" method="post" enctype="multipart/form-data">
                           @csrf
                           @include('valve_repair.construction.isolation.tab.actuator_automation')
                       </form>
                   </div>
                   <div class="hidden p-4 rounded-lg bg-gray-0 dark:bg-gray-800" id="PositionerIsolationValve"
                       role="tabpanel" aria-labelledby="PositionerIsolationValve-tab">
                       <form id="mainFormPositionerIsolationValve" method="post" enctype="multipart/form-data">
                           @csrf
                           @include('valve_repair.construction.isolation.tab.positioner')
                       </form>
                   </div>
                   <div class="hidden p-4 rounded-lg bg-gray-0 dark:bg-gray-800" id="AccessoriesIsolationValve"
                       role="tabpanel" aria-labelledby="AccessoriesIsolationValve-tab">
                       <form id="mainFormAccessoriesIsolationValve" method="post" enctype="multipart/form-data">
                           @csrf
                           @include('valve_repair.construction.isolation.tab.accessories')
                       </form>
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

                       {{-- <button type="button" onClick="goToDeviceInfo()" id="deviceDetailButton"
                           class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                           Next : Actuator Handwheel
                       </button> --}}
                       <button type="button" id="saveButtonAction" onClick="saveRecordIsolation()"
                           class="ml-5  text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                   </div>
               </div>
            </div>

