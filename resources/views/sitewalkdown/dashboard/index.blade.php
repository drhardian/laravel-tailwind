@extends('layout.index')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.tailwindcss.css">
@endsection

@section('content')
    <style>
        #chart-container {
            margin-top: -40px;
            /* Adjust this value to change the top padding */
        }
        .justify-self-end{
            float:right;
        }
    </style>
    <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl ">
        <div class="p-4 mt-2 ">
            {{-- <h3 class="mb-2 hidden md:block text-2xl font-medium text-gray-900 dark:text-white">{{ $title }}</h3>

            <div class="flex justify-between mb-7">
                @unless (count($breadcrumbs) === 0)
                    @include('layout.breadcrumbs')
                @endunless
            </div> --}}

            {{-- Card Header --}}
            <div class="flex flex-wrap md:flex-nowrap bg-gray-100 p-3 rounded-xl  ">
                <div class="w-full">
                    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                                <div class="flex-auto p-4">
                                    <div class="flex flex-wrap">
                                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                            <h5 class="text-gray-500 uppercase font-bold text-xs">
                                                High Criticality
                                            </h5>
                                            <span class="font-semibold text-xl text-gray-800">
                                                350,897
                                            </span>
                                        </div>
                                        <div class="relative w-auto pl-4 flex-initial">
                                            <div
                                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-500 mt-4">
                                        <span class="text-green-500 mr-2">
                                            <i class="fas fa-arrow-up"></i> 3.48%
                                        </span>
                                        <span class="whitespace-no-wrap">

                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                                <div class="flex-auto p-4">
                                    <div class="flex flex-wrap">
                                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                            <h5 class="text-gray-500 uppercase font-bold text-xs">
                                                Medium Criticality
                                            </h5>
                                            <span class="font-semibold text-xl text-gray-800">
                                                350,897
                                            </span>
                                        </div>
                                        <div class="relative w-auto pl-4 flex-initial">
                                            <div
                                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-500 mt-4">
                                        <span class="text-green-500 mr-2">
                                            <i class="fas fa-arrow-up"></i> 3.48%
                                        </span>
                                        <span class="whitespace-no-wrap">

                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                                <div class="flex-auto p-4">
                                    <div class="flex flex-wrap">
                                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                            <h5 class="text-gray-500 uppercase font-bold text-xs">
                                                Low Criticality
                                            </h5>
                                            <span class="font-semibold text-xl text-gray-800">
                                                350,897
                                            </span>
                                        </div>
                                        <div class="relative w-auto pl-4 flex-initial">
                                            <div
                                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-500 mt-4">
                                        <span class="text-green-500 mr-2">
                                            <i class="fas fa-arrow-up"></i> 3.48%
                                        </span>
                                        <span class="whitespace-no-wrap">

                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="w-full ml-4">
                    <div class="w-full grid grid-cols-3 gap-4">
                        <div class="col-start-1 col-end-4">
                            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                                <div class="flex-auto p-4  h-32">
                                    <div class="flex flex-wrap mb-5">
                                        <h5 class="text-gray-500 uppercase font-bold text-xs">Customer Details</h5>
                                    </div>
                                    <div class="grid grid-cols-3 gap-1">
                                        <div>
                                            <div class="flex widget-text">
                                                <!-- Total Company -->
                                                <div class="flex-1">
                                                    <div class="flex items-center">
                                                        <div class="w-7/12">
                                                            <h3 class="font-semibold text-xl text-gray-800">870</h3>
                                                            <span class="mb-0 text-xs text-muted font-semibold">Total
                                                                Company</span>
                                                        </div>
                                                        <div class="w-5/12 float-right ml-2">
                                                            <p class="data-attributes mt-3 mb-1 pr-4"
                                                                style="font-size: 2.2rem">
                                                                <i class="fa-solid fa-building-circle-check text-gray"></i>

                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="flex widget-text">
                                                <!-- Total Company -->
                                                <div class="flex-1 border-r">
                                                    <div class="flex items-center">
                                                        <div class="w-7/12">
                                                            <h3 class="font-semibold text-xl text-gray-800">870</h3>
                                                            <span class="mb-0 text-xs text-muted font-semibold">Total
                                                                Company</span>
                                                        </div>
                                                        <div class="w-5/12 float-right ml-2">
                                                            <p class="data-attributes mt-3 mb-1 pr-4"
                                                                style="font-size: 2.2rem">
                                                                <i class="fa-solid fa-map-location-dot text-gray"></i>

                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div>
                                            <div class="flex widget-text">
                                                <!-- Total Company -->
                                                <div class="flex-1 border-r">
                                                    <div class="flex items-center">
                                                        <div class="w-7/12">
                                                            <h3 class="font-semibold text-xl text-gray-800">870</h3>
                                                            <span class="mb-0 text-xs text-muted font-semibold">Total
                                                                Company</span>
                                                        </div>
                                                        <div class="w-5/12 float-right ml-2">
                                                            <p class="data-attributes mt-3 mb-1 pr-4"
                                                                style="font-size: 2.2rem">
                                                                <i class="fa-solid fa-location-dot text-gray"></i>

                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="flex flex-wrap mt-4 bg-gray-100 p-3 rounded-xl">
                {{-- 3 Column --}}
                <div class="w-full grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-4 ">
                    <div class="">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                            <div class="rounded-t mb-0 px-4 py-3 border-0">
                                <div class="flex flex-wrap items-center">
                                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                        <h3 class="font-semibold text-base text-gray-800">
                                            INSTRUCTIONS
                                        </h3>
                                    </div>
                                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                        <button
                                            class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                                            type="button" style="transition:all .15s ease">
                                            See all
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="block w-full overflow-y-auto h-96 border-t-4">
                                <!-- Projects table -->
                                <table class="items-center w-full bg-transparent border-collapse">
                                    <thead class="thead-light hidden">
                                        <tr>
                                            <th
                                                class="px-6 bg-gray-100 text-gray-600 align-middle border border-solid border-gray-200 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left">
                                                Referral
                                            </th>
                                            <th
                                                class="px-6 bg-gray-100 text-gray-600 align-middle border border-solid border-gray-200 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left">
                                                Visitors
                                            </th>
                                            <th class="px-6 bg-gray-100 text-gray-600 align-middle border border-solid border-gray-200 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left"
                                                style="min-width:140px"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4 text-left">
                                                Facebook
                                                <p class="mb-0 text-xs text-gray-500">
                                                    Company A (01/03/2023)
                                                </p>
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4">
                                                1,480
                                            </td>

                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4 text-left">
                                                Facebook
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4">
                                                5,480
                                            </td>

                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4 text-left">
                                                Google
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4">
                                                4,807
                                            </td>

                                        </tr>
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4 text-left">
                                                Instagram
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4">
                                                3,678
                                            </td>

                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4 text-left">
                                                twitter
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4">
                                                2,645
                                            </td>

                                        </tr>
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4 text-left">
                                                twitter
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4">
                                                2,645
                                            </td>

                                        </tr>
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4 text-left">
                                                twitter
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4">
                                                2,645
                                            </td>

                                        </tr>
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4 text-left">
                                                twitter
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4">
                                                2,645
                                            </td>

                                        </tr>
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4 text-left">
                                                twitter
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4">
                                                2,645
                                            </td>

                                        </tr>
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4 text-left">
                                                twitter
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4">
                                                2,645
                                            </td>

                                        </tr>
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4 text-left">
                                                twitter
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4">
                                                2,645
                                            </td>

                                        </tr>
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4 text-left">
                                                twitter
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4">
                                                2,645
                                            </td>

                                        </tr>
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4 text-left">
                                                twitter
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4">
                                                2,645
                                            </td>

                                        </tr>
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4 text-left">
                                                twitter
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4">
                                                2,645
                                            </td>

                                        </tr>
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4 text-left">
                                                twitter
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-no-wrap p-4">
                                                2,645
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                            <div class="rounded-t mb-0 px-4 py-3 border-0">
                                <div class="flex flex-wrap items-center">
                                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                        <h3 class="font-semibold text-base text-gray-800">
                                            VALVE TYPES
                                        </h3>
                                    </div>
                                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                        <button
                                            class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                                            type="button" style="transition:all .15s ease">
                                            See all
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="block w-full overflow-y-auto h-96 border-t-4">
                                <div id="chart-container" style="width:100%; height:432px; max-width: 600px;"></div>

                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                            <div class="rounded-t mb-0 px-4 py-3 border-0">
                                <div class="flex flex-wrap items-center  ">
                                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                        <h3 style="font-size: 12px" class="font-semibold text-base text-gray-800">
                                            CRITICALITY CATEGORIES
                                        </h3>
                                    </div>
                                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                        <button
                                            class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                                            type="button" style="transition:all .15s ease">
                                            See all
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="block w-full overflow-y-auto h-96 border-t-4">
                                <!-- Projects table -->

                            </div>
                        </div>
                    </div>
                </div>

                {{-- Table  --}}
                <div class="relative w-full overflow-x-auto shadow-lg  p-8 bg-white rounded-lg">
                    <table id="dataTables"
                        class="w-full text-sm shadow-lg rounded-lg text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-blue-200 dark:bg-gray-700 dark:text-gray-400 rounded-lg">
                            <tr>
                                <th scope="col" class="px-6 py-3 rounded-tl-lg ">
                                    Product name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Color
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price
                                </th>
                                <th scope="col" class="px-6 py-3 rounded-tr-lg">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Apple MacBook Pro 17"
                                </th>
                                <td class="px-6 py-4">
                                    Silver
                                </td>
                                <td class="px-6 py-4">
                                    Laptop
                                </td>
                                <td class="px-6 py-4">
                                    $2999
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Microsoft Surface Pro
                                </th>
                                <td class="px-6 py-4">
                                    White
                                </td>
                                <td class="px-6 py-4">
                                    Laptop PC
                                </td>
                                <td class="px-6 py-4">
                                    $1999
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Magic Mouse 2
                                </th>
                                <td class="px-6 py-4">
                                    Black
                                </td>
                                <td class="px-6 py-4">
                                    Accessories
                                </td>
                                <td class="px-6 py-4">
                                    $99
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Magic Mouse 2
                                </th>
                                <td class="px-6 py-4">
                                    Black
                                </td>
                                <td class="px-6 py-4">
                                    Accessories
                                </td>
                                <td class="px-6 py-4">
                                    $99
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Magic Mouse 2
                                </th>
                                <td class="px-6 py-4">
                                    Black
                                </td>
                                <td class="px-6 py-4">
                                    Accessories
                                </td>
                                <td class="px-6 py-4">
                                    $99
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Magic Mouse 2
                                </th>
                                <td class="px-6 py-4">
                                    Black
                                </td>
                                <td class="px-6 py-4">
                                    Accessories
                                </td>
                                <td class="px-6 py-4">
                                    $99
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Magic Mouse 2
                                </th>
                                <td class="px-6 py-4">
                                    Black
                                </td>
                                <td class="px-6 py-4">
                                    Accessories
                                </td>
                                <td class="px-6 py-4">
                                    $99
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Magic Mouse 2
                                </th>
                                <td class="px-6 py-4">
                                    Black
                                </td>
                                <td class="px-6 py-4">
                                    Accessories
                                </td>
                                <td class="px-6 py-4">
                                    $99
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Magic Mouse 2
                                </th>
                                <td class="px-6 py-4">
                                    Black
                                </td>
                                <td class="px-6 py-4">
                                    Accessories
                                </td>
                                <td class="px-6 py-4">
                                    $99
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Magic Mouse 2
                                </th>
                                <td class="px-6 py-4">
                                    Black
                                </td>
                                <td class="px-6 py-4">
                                    Accessories
                                </td>
                                <td class="px-6 py-4">
                                    $99
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Magic Mouse 2
                                </th>
                                <td class="px-6 py-4">
                                    Black
                                </td>
                                <td class="px-6 py-4">
                                    Accessories
                                </td>
                                <td class="px-6 py-4">
                                    $99
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Magic Mouse 2
                                </th>
                                <td class="px-6 py-4">
                                    Black
                                </td>
                                <td class="px-6 py-4">
                                    Accessories
                                </td>
                                <td class="px-6 py-4">
                                    $99
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Magic Mouse 2
                                </th>
                                <td class="px-6 py-4">
                                    Black
                                </td>
                                <td class="px-6 py-4">
                                    Accessories
                                </td>
                                <td class="px-6 py-4">
                                    $99
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>


            </div>

        </div>
    </div>
@endsection


@section('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.tailwindcss.js"></script>


    <script>
        $('#dataTables').DataTable();
        Highcharts.chart('chart-container', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 38
                },
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '<b>{point.y}</b> Tags'
            },
            plotOptions: {
                pie: {
                    innerSize: 150,
                    depth: 50,
                    size: 400,
                    dataLabels: {
                        enabled: true,
                        distance: '5%',
                        style: {
                            textOverflow: 'clip'
                        },
                        format: '{point.name}:<br><b>{point.y}</b> tags'
                    }
                }
            },
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        plotOptions: {
                            pie: {
                                innerSize: 70,
                                depth: 50,
                                size: 330,
                                dataLabels: {
                                    enabled: true,
                                    distance: '-35%',
                                    style: {
                                        textOverflow: 'clip'
                                    },
                                }
                            }
                        }
                    }
                }]
            },
            series: [{
                name: 'Tags',
                data: [
                    ['PSV', 16],
                    ['CONTROL VALVE', 12],
                    ['MANUAL VALVE', 8],
                    ['REGULATOR', 8],
                    ['CHECK VALVE', 8],

                ]
            }],
            credits: {
                enabled: false
            }
        });
    </script>
@endsection
