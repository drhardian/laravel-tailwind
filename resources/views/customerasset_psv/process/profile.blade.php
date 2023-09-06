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
                <button type="button" id="newBtn" onclick="openForm(`{{ route('process.store') }}`)"
                    class="text-white bg-blue-700 hidden sm:block hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="fa-solid fa-plus mr-2"></i>Print
                </button>
            </div>
        </div>
   <!-- PROCESS CONDITION -->
            <div class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
            id="defaultTab">PROCESS CONDITION
            </div>
                   <div class="mb-6">
                       <div class="row sm:flex">
                           <div class="sm:w-1/2 w-full sm:pr-2">
                               <label for="service"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service</label>
                                   @if ($process->service)
                                        <div class="form-control form-control-solid">{{ $process->service }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                            </div>
                           <div class="sm:w-1/2 w-full sm:pl-2 sm:pt-0 pt-6">
                               <label for="equip_number"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Equipment Number</label>
                                   @if ($process->equip_number)
                                        <div class="form-control form-control-solid">{{ $process->equip_number }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                           </div>
                       </div>
                   </div>
                   <div class="mb-6">
                       <div class="row sm:flex">
                           <div class="sm:w-1/2 w-full sm:pr-2">
                               <label for="pid"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">P&ID</label>
                                   @if ($process->pid)
                                        <div class="form-control form-control-solid">{{ $process->pid }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                           </div>
                           <div class="sm:w-1/2 w-full sm:pr-2">
                               <label for="size_basic"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size Basic</label>
                                   @if ($process->size_basic)
                                        <div class="form-control form-control-solid">{{ $process->size_basic }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                           </div>
                       </div>
                   </div>
                   <div class="mb-6">
                       <div class="row sm:flex">
                           <div class="sm:w-1/2 w-full sm:pr-2">
                               <label for="size_code"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size Code</label>
                                   @if ($process->size_code)
                                        <div class="form-control form-control-solid">{{ $process->size_code }}</div>
                                    @else
                                        <div class="form-control form-control-solid">N/A</div>
                                    @endif
                           </div>
                               <div class="sm:w-1/2 w-full sm:pr-2">
                                   <label for="fluid"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fluid</label>
                                       @if ($process->fluid)
                                            <div class="form-control form-control-solid">{{ $process->fluid }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6">
                                <div class="row sm:flex">
                               <div class="sm:w-1/2 w-full sm:pr-2">
                                   <label for="required"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Required Capacity</label>
                                       @if ($process->required)
                                            <div class="form-control form-control-solid">{{ $process->required }}</div>
                                        @else
                                            <div class="form-control form-control-solid">N/A</div>
                                        @endif
                               </div>
                                   <div class="sm:w-1/2 w-full sm:pr-2">
                                       <label for="capacity_unit"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Capacity Unit</label>
                                           @if ($process->capacity_unit)
                                                <div class="form-control form-control-solid">{{ $process->capacity_unit }}</div>
                                            @else
                                                <div class="form-control form-control-solid">N/A</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <div class="row sm:flex">
                                   <div class="sm:w-1/2 w-full sm:pr-2">
                                       <label for="mawp"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MAWP (psi)</label>
                                           @if ($process->mawp)
                                                <div class="form-control form-control-solid">{{ $process->mawp }}</div>
                                            @else
                                                <div class="form-control form-control-solid">N/A</div>
                                            @endif
                                   </div>
                                       <div class="sm:w-1/2 w-full sm:pr-2">
                                           <label for="operating_psi"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Operating Pressure (psi)</label>
                                               @if ($process->operating_psi)
                                                    <div class="form-control form-control-solid">{{ $process->operating_psi }}</div>
                                                @else
                                                    <div class="form-control form-control-solid">N/A</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <div class="row sm:flex">
                                       <div class="sm:w-1/2 w-full sm:pr-2">
                                           <label for="back_psi"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Back Pressure (psi)</label>
                                                @if ($process->back_psi)
                                                    <div class="form-control form-control-solid">{{ $process->back_psi }}</div>
                                                @else
                                                    <div class="form-control form-control-solid">N/A</div>
                                                @endif
                                       </div>
                                           <div class="sm:w-1/2 w-full sm:pr-2">
                                               <label for="operating_temp"
                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Operating Temp. (°F)</label>
                                                    @if ($process->operating_temp)
                                                        <div class="form-control form-control-solid">{{ $process->operating_temp }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <div class="row sm:flex">
                                           <div class="sm:w-1/2 w-full sm:pr-2">
                                               <label for="cold_diff"
                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cold Diff. Test Press (psi)</label>
                                                    @if ($process->cold_diff)
                                                        <div class="form-control form-control-solid">{{ $process->cold_diff }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                           </div>
                                       <div class="sm:w-1/2 w-full sm:pr-2">
                                           <label for="allowable"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Allowable Over Press. (%)</label>
                                               @if ($process->allowable)
                                                    <div class="form-control form-control-solid">{{ $process->allowable }}</div>
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