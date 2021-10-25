@props(['url'])

<a href="{{ $url }}"
    {{ $attributes(['class' => 'block text-indigo-500 hover:text-indigo-600 hover:underline']) }}>
    {{ $slot }}
</a>
