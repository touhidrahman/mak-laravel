@props(['label', 'url'])

<a class="hover:text-gray-800 hover:bg-gray-100 flex items-center p-2 my-6 transition-colors dark:hover:text-white dark:hover:bg-gray-600 duration-200  text-gray-200 dark:text-gray-400 rounded-lg "
    href="{{ $url }}">
    <svg width="20" height="20" fill="currentColor" class="m-auto" viewBox="0 0 2048 1792"
        xmlns="http://www.w3.org/2000/svg">
        <path
            d="M960 0l960 384v128h-128q0 26-20.5 45t-48.5 19h-1526q-28 0-48.5-19t-20.5-45h-128v-128zm-704 640h256v768h128v-768h256v768h128v-768h256v768h128v-768h256v768h59q28 0 48.5 19t20.5 45v64h-1664v-64q0-26 20.5-45t48.5-19h59v-768zm1595 960q28 0 48.5 19t20.5 45v128h-1920v-128q0-26 20.5-45t48.5-19h1782z">
        </path>
    </svg>
    <span class="mx-4 text-lg font-normal">
        {{ $label }}
    </span>
    <span class="flex-grow text-right">
        @isset($slot)
            {{ $slot }}
        @endisset
    </span>
</a>
