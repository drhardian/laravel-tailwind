@extends('layout.index')

@section('content')
    <div class="min-h-screen w-full mx-auto max-w-4xl lg:max-w-7xl">
        <div class="pt-1">
            <aside
                class="p-4 my-8 bg-white border border-gray-200 rounded-lg shadow-md sm:p-6 lg:p-8 dark:bg-gray-800 dark:border-gray-700"
                aria-label="Subscribe to the Flowbite newsletter">
                <h3 class="mb-3 text-2xl font-medium text-gray-900 dark:text-white">{{ $title }}</h3>
                <p class="mb-5 text-sm font-medium text-gray-500 dark:text-gray-300">
                    @unless (count($breadcrumbs) === 0)
                        <div class="mt-4">
                            <nav class="flex" aria-label="Breadcrumb">
                                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                                    @foreach ($breadcrumbs as $breadcrumb)
                                        <li class="inline-flex items-center">
                                            @if ($breadcrumb['status'] === 'active')
                                                <a href="{{ $breadcrumb['url'] }}"
                                                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                                    <i class="{{ $breadcrumb['icon'] }} mr-2"></i>
                                                    {{ $breadcrumb['title'] }}
                                                </a>
                                            @else
                                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span
                                                    class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{ $breadcrumb['title'] }}</span>
                                            @endif
                                        </li>
                                    @endforeach
                                </ol>
                            </nav>
                        </div>
                    @endunless
                </p>
            </aside>
        </div>
    </div>
@endsection
