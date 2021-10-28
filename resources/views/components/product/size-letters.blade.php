@props(['product'])

@php
    $sizeSorted = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
    $productSizes = collect($product->available_sizes)->pluck('size')->toArray();
    $sizes = array_intersect($sizeSorted, $productSizes);
@endphp

<p class="space-x-1 font-hk text-sm text-gray-400">
    @foreach ($sizes as $size)

            <span class="">{{$size}}</span>

    @endforeach
</p>
