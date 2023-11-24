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
                {{-- <a href="{{ route('eprocitemcode.pdf', ['id' => $eprocitemcode->id]) }}" class="text-white bg-blue-700 hidden sm:block hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="fa-solid fa-print mr-2"></i>
                    Print
                </a> --}}
            </div>
        </div>

        <div>
            <div class="flex justify-center mt-5">
                <div
                    class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <!-- Tab Panel -->
                    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                            data-tabs-toggle="#myTabContent" role="tablist">
                            <li class="mr-2" role="presentation">
                                <button
                                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    id="general-tab" data-tabs-target="#general" type="button" role="tab"
                                    aria-controls="general" aria-selected="false">e-Procurement Item Code</button>
                            </li>
                            {{-- <li class="mr-2" role="presentation">
                                <button
                                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    id="valve-tab" data-tabs-target="#valve" type="button" role="tab"
                                    aria-controls="valve" aria-selected="false">VALVE INFORMATION</button>
                            </li>
                            <li class="mr-2" role="presentation">
                                <button
                                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    id="process-tab" data-tabs-target="#process" type="button" role="tab"
                                    aria-controls="process" aria-selected="false">PROCESS CONDITION</button>
                            </li>
                            <li class="mr-2" role="presentation">
                                <button
                                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    id="condi-tab" data-tabs-target="#condi" type="button" role="tab"
                                    aria-controls="condi" aria-selected="false">CONDITION REPLACEMENT</button>
                            </li> --}}
                        </ul>
                    </div>

                    <div id="myTabContent">
                        <!-- GENERAL INFORMATION -->
                        <div class id="general" role="tab" aria-labelledby="general-tab">
                            <div class="space-y-6">
                                <div class="mb-6">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ITEM CODE</label>
                                    <div class="row sm:flex">
                                        <div class="w-1/4">
                                            <label for="main_code"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Main Code</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($eprocitemcode->main_code)
                                                        <div class="form-control form-control-solid">{{ $eprocitemcode->main_code }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="w-3/4">
                                            <label for="titlemain_code"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title Main Code</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($eprocitemcode->titlemain_code)
                                                        <div class="form-control form-control-solid">{{ $eprocitemcode->titlemain_code }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row sm:flex">
                                        <div class="w-1/4">
                                            <label for="code"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($eprocitemcode->code)
                                                        <div class="form-control form-control-solid">{{ $eprocitemcode->code }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="w-3/4">
                                            <label for="title_code"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title Code</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($eprocitemcode->title_code)
                                                        <div class="form-control form-control-solid">{{ $eprocitemcode->title_code }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row sm:flex">
                                        <div class="w-1/4">
                                            <label for="sub_code"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sub Code</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($eprocitemcode->sub_code)
                                                        <div class="form-control form-control-solid">{{ $eprocitemcode->sub_code }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="w-3/4">
                                            <label for="titlesub_code"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title Sub Code</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($eprocitemcode->titlesub_code)
                                                        <div class="form-control form-control-solid">{{ $eprocitemcode->titlesub_code }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row sm:flex">
                                        <div class="w-1/4">
                                            <label for="group_code"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Group Code</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($eprocitemcode->group_code)
                                                        <div class="form-control form-control-solid">{{ $eprocitemcode->group_code }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="w-3/4">
                                            <label for="titlegroup_code"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title Group Code</label>
                                                <div class="bg-gray-50 sm:p-2 p-1.5 border border-gray-300 text-gray-900 sm:text-base text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @if ($eprocitemcode->titlegroup_code)
                                                        <div class="form-control form-control-solid">{{ $eprocitemcode->titlegroup_code }}</div>
                                                    @else
                                                        <div class="form-control form-control-solid">N/A</div>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection