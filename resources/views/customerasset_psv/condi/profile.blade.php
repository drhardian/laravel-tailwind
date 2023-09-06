@extends('layout.index')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css">
@endsection

@section('content')
    <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl">
        <div class="p-4 mt-2">
            <h3 class="mb-2 hidden md:block text-2xl font-medium text-gray-900 dark:text-white">{{ $title }}</h3>

            <div class="flex justify-between mb-7">
                @unless (count($breadcrumbs) === 0)
                    @include('layout.breadcrumbs')
                @endunless
                <button type="button" id="newBtn" onclick="openForm"
                    class="text-white bg-green-700 hidden sm:block hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    <i class="fa-solid fa-file-import"></i> Import
                </button>
                <button type="button" id="newBtn" onclick="openForm"
                    class="text-white bg-yellow-400 hidden sm:block hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                    <i class="fa-solid fa-file-export"></i> Export
                </button>
                <button type="button" id="newBtn" onclick="openForm(`{{ route('condi.store') }}`)"
                    class="text-white bg-blue-700 hidden sm:block hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="fa-solid fa-plus"></i> New
                </button>
            </div>
         </div>
         <!-- CONDITION REPLACEMENT -->
         <div class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
         id="defaultTab">CONDITION REPLACEMENT
         </div>
               
                   <div class="mb-6">
                       <div class="row sm:flex">
                           <div class="sm:w-1/2 w-full sm:pr-2">
                               <label for="shutdown"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Shutdown Category</label>
                               <input type="text" id="shutdown" name="shutdown"
                                   class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   required placeholder="shutdown">
                           </div>
                           <div class="sm:w-1/2 w-full sm:pl-2 sm:pt-0 pt-6">
                               <label for="valve_upstream"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isolation Valve Upstream</label>
                               <input type="text" id="valve_upstream" name="valve_upstream"
                                   class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   required placeholder="valve upstream">
                           </div>
                       </div>
                   </div>
                   <div class="mb-6">
                       <div class="row sm:flex">
                           <div class="sm:w-1/2 w-full sm:pr-2">
                               <label for="condi_upstream"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Condition Upstream BV</label>
                                   <input type="text" id="condi_upstream" name="condi_upstream"
                                   class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   required placeholder="condi upstream">
                           </div>
                           <div class="sm:w-1/2 w-full sm:pr-2">
                               <label for="valve_downstream"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isolation Valve Downstrm</label>
                               <input type="text" id="valve_downstream" name="valve_downstream"
                                   class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   required placeholder="valve downstream">
                           </div>
                       </div>
                   </div>
                   <div class="mb-6">
                       <div class="row sm:flex">
                           <div class="sm:w-1/2 w-full sm:pr-2">
                               <label for="condi_downstream"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Condition Downstrm BV</label>
                                   <input type="text" id="condi_downstream" name="condi_downstream"
                                   class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   required placeholder="condi downstream">
                           </div>
                               <div class="sm:w-1/2 w-full sm:pr-2">
                                   <label for="scaffolding"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Scaffolding Req.</label>
                                       <input type="text" id="scaffolding" name="scaffolding"
                                       class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       required placeholder="scaffolding">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6">
                                <div class="row sm:flex">
                               <div class="sm:w-1/2 w-full sm:pr-2">
                                   <label for="spacer_inlet"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Use Spacer Inlet</label>
                                   <input type="text" id="spacer_inlet" name="spacer_inlet"
                                   class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   required placeholder="spacer inlet">
                               </div>
                                   <div class="sm:w-1/2 w-full sm:pr-2">
                                       <label for="spacer_outlet"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Use Spacer Outlet</label>
                                           <input type="text" id="spacer_outlet" name="spacer_outlet"
                                           class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                           required placeholder="spacer outlet">
                                        </div>
                                    </div>
                                </div>
                           </form>
                       </div>
           <!-- Modal footer -->
           <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 py-4">
               <button type="button"
                   class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                   onClick="saveRecord()">Save</button>
               <button id="cancelBtn" type="button"
                   class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
           </div>
       </div>
   </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js">
</script>
    <script type="text/javascript" src="{{ asset('core/js/customerasset_psv/condi-custom.js') }}"></script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        
        $(document).ready(function() {
            $('#main-table').DataTable({
                language: {
                    processing: "Loading. Please wait..."
                },
                responsive: true,
                processing: true,
                serverSide: true,
                deferRender: true,
                ajax: {
                    url: "{{ route('condi.main.table') }}",
                },
                columns: [{
                        data: 'shutdown',
                        name: 'shutdown',
                        className: 'all'
                    },
                    {
                    //     data: 'valve_upstream',
                    //     name: 'valve_upstream',
                    //     className: 'all'
                    // },
                    // {
                    //     data: 'condi_upstream',
                    //     name: 'condi_upstream',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'valve_downstream',
                    //     name: 'valve_downstream',
                    //     class: 'all'
                    // },
                    // {
                    //     data: 'condi_downstream',
                    //     name: 'condi_downstream',
                    //     class: 'all'
                    // },
                    // {
                        data: 'scaffolding',
                        name: 'scaffolding',
                        class: 'all'
                    },
                    {
                        data: 'spacer_inlet',
                        name: 'spacer_inlet',
                        class: 'all'
                    },
                    {
                        data: 'spacer_outlet',
                        name: 'spacer_outlet',
                        class: 'all'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                        class: ['text-center', 'min-tablet']
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        class: ['text-center', 'min-tablet'],
                        orderable: false,
                        sortable: false,
                    },
                ],
                columnDefs: [{
                        target: [0, 1, 2, 3, 4, 5, 6],
                        className: "dt-head-center",
                    },
                    {
                        target: [6],
                        width: "5%",
                    },
                    {
                        target: [0, 1, 3, 5, 6],
                        className: "dt-center",
                    },
                ]
            });

            $('#newBtn').on('click', function(e) {
                e.preventDefault();

                $('.modal-title').text('New Condition Replacement');
            });
        });
    </script>
@endsection