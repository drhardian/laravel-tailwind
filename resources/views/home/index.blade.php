@extends('layout.index')

@section('css')
@endsection

@section('content')
    <div id="controls-carousel" class="relative w-full h-screen" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden md:h-screen">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('theme/assets/images/bg-1.jpg') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <div class="absolute inset-0 bg-black/70"></div>
                <div class="flex h-full items-center justify-center">
                    <div class="text-center max-w-2xl mx-auto relative">
                        <div class="flex justify-center">
                            <div class="w-32 h-w-32 flex items-center justify-center">
                                <img src="{{ asset('theme/assets/images/ptcs.png') }}" alt="PTCS Logo">
                            </div>
                        </div>
                        <h1 class="md:text-3xl/snug text-xl font-semibold text-white mt-10">Simplify Valve and Instrument Asset Management: Streamline, Track, and Ensure Safety</h1>
                        <p class="text-base font-normal text-white/50 mt-5">At vero eos et accusamus et iusto
                            odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atqued
                            corrupti quos dolores et quas molestias excepturi sintoccaecati cupiditate.</p>
                    </div>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                <img src="{{ asset('theme/assets/images/bg-2.jpg') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <div class="absolute inset-0 bg-black/70"></div>
                <div class="flex h-full items-center justify-center">
                    <div class="text-center max-w-2xl mx-auto relative">
                        <div class="flex justify-center">
                            <div class="w-32 h-w-32 flex items-center justify-center">
                                <img src="{{ asset('theme/assets/images/ptcs.png') }}" alt="PTCS Logo">
                            </div>
                        </div>
                        <h1 class="md:text-3xl/snug text-xl font-semibold text-white mt-10">Redefine Valve and Instrument Tracking: Efficiency, Transparency, and Safety</h1>
                        <p class="text-base font-normal text-white/50 mt-5">At vero eos et accusamus et iusto
                            odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atqued
                            corrupti quos dolores et quas molestias excepturi sintoccaecati cupiditate.</p>
                    </div>
                </div>
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('theme/assets/images/bg-3.jpg') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <div class="absolute inset-0 bg-black/70"></div>
                <div class="flex h-full items-center justify-center">
                    <div class="text-center max-w-2xl mx-auto relative">
                        <div class="flex justify-center">
                            <div class="w-32 h-w-32 flex items-center justify-center">
                                <img src="{{ asset('theme/assets/images/ptcs.png') }}" alt="PTCS Logo">
                            </div>
                        </div>
                        <h1 class="md:text-3xl/snug text-xl font-semibold text-white mt-10">Empower Your Facility: Effortless Valve and Instrument Asset Oversight
                        </h1>
                        <p class="text-base font-normal text-white/50 mt-5">At vero eos et accusamus et iusto
                            odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atqued
                            corrupti quos dolores et quas molestias excepturi sintoccaecati cupiditate.</p>
                    </div>
                </div>
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('theme/assets/images/bg-4.jpg') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <div class="absolute inset-0 bg-black/70"></div>
                <div class="flex h-full items-center justify-center">
                    <div class="text-center max-w-2xl mx-auto relative">
                        <div class="flex justify-center">
                            <div class="w-32 h-w-32 flex items-center justify-center">
                                <img src="{{ asset('theme/assets/images/ptcs.png') }}" alt="PTCS Logo">
                            </div>
                        </div>
                        <h1 class="md:text-3xl/snug text-xl font-semibold text-white mt-10">Master Asset Management: Enhance Performance, Ensure Safety
                        </h1>
                        <p class="text-base font-normal text-white/50 mt-5">At vero eos et accusamus et iusto
                            odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atqued
                            corrupti quos dolores et quas molestias excepturi sintoccaecati cupiditate.</p>
                    </div>
                </div>
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('theme/assets/images/bg-5.jpg') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <div class="absolute inset-0 bg-black/70"></div>
                <div class="flex h-full items-center justify-center">
                    <div class="text-center max-w-2xl mx-auto relative">
                        <div class="flex justify-center">
                            <div class="w-32 h-w-32 flex items-center justify-center">
                                <img src="{{ asset('theme/assets/images/ptcs.png') }}" alt="PTCS Logo">
                            </div>
                        </div>
                        <h1 class="md:text-3xl/snug text-xl font-semibold text-white mt-10">Simplify your valve and instrument management: Effortlessly track, maintain, and monitor your assets.</h1>
                        <p class="text-base font-normal text-white/50 mt-5">At vero eos et accusamus et iusto
                            odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atqued
                            corrupti quos dolores et quas molestias excepturi sintoccaecati cupiditate.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
@endsection

@section('js')
@endsection
