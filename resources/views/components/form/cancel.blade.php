@props(['route'])

<a href="{{ $route }}" type="button"
    class="hover:bg-gray-50 bg-white rounded-2xl uppercase font-semibold text-xs py-2 px-10 text-indigo-600">
    {{ $slot }}
</a>
