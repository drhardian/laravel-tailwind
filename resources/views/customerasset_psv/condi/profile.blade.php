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
                <button type="button" id="newBtn" onclick="openForm(`{{ route('condi.store') }}`)"
                    class="text-white bg-blue-700 hidden sm:block hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="fa-solid fa-plus"></i> Print
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
                                    @if ($condi->shutdown)
                                        <div class="form-control form-control-solid">{{ $condi->shutdown }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                           </div>
                           <div class="sm:w-1/2 w-full sm:pl-2 sm:pt-0 pt-6">
                               <label for="valve_upstream"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isolation Valve Upstream</label>
                                    @if ($condi->valve_upstream)
                                        <div class="form-control form-control-solid">{{ $condi->valve_upstream }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                           </div>
                       </div>
                   </div>
                   <div class="mb-6">
                       <div class="row sm:flex">
                           <div class="sm:w-1/2 w-full sm:pr-2">
                               <label for="condi_upstream"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Condition Upstream BV</label>
                                    @if ($condi->condi_upstream)
                                        <div class="form-control form-control-solid">{{ $condi->condi_upstream }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                           </div>
                           <div class="sm:w-1/2 w-full sm:pr-2">
                               <label for="valve_downstream"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isolation Valve Downstrm</label>
                                    @if ($condi->valve_downstream)
                                        <div class="form-control form-control-solid">{{ $condi->valve_downstream }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                           </div>
                       </div>
                   </div>
                   <div class="mb-6">
                       <div class="row sm:flex">
                           <div class="sm:w-1/2 w-full sm:pr-2">
                               <label for="condi_downstream"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Condition Downstrm BV</label>
                                    @if ($condi->condi_downstream)
                                        <div class="form-control form-control-solid">{{ $condi->condi_downstream }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                           </div>
                               <div class="sm:w-1/2 w-full sm:pr-2">
                                   <label for="scaffolding"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Scaffolding Req.</label>
                                        @if ($condi->scaffolding)
                                            <div class="form-control form-control-solid">{{ $condi->scaffolding }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6">
                                <div class="row sm:flex">
                               <div class="sm:w-1/2 w-full sm:pr-2">
                                   <label for="spacer_inlet"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Use Spacer Inlet</label>
                                        @if ($condi->spacer_inlet)
                                            <div class="form-control form-control-solid">{{ $condi->spacer_inlet }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                               </div>
                                   <div class="sm:w-1/2 w-full sm:pr-2">
                                       <label for="spacer_outlet"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Use Spacer Outlet</label>
                                            @if ($condi->spacer_outlet)
                                                <div class="form-control form-control-solid">{{ $condi->spacer_outlet }}</div>
                                            @else
                                                <div class="form-control form-control-solid">N/A</div>
                                            @endif
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