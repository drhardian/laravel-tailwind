<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2">
        @foreach ($breadcrumbs as $breadcrumb)
            <li class="inline-flex items-center">
                @if ($breadcrumb['status'] === 'active')
                    <a href="{{ $breadcrumb['url'] }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        @if ($breadcrumb['icon'])
                            <i class="{{ $breadcrumb['icon'] }} mr-2"></i>
                        @else
                            <svg aria-hidden="true" class="w-6 h-6 mr-1 text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        @endif
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
                        class="ml-1 text-sm font-medium text-gray-500 md:ml-1 dark:text-gray-400">{{ $breadcrumb['title'] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>