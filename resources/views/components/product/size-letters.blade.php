@props(['product'])

<p class="space-x-1 font-hk text-sm text-gray-400">
    @foreach (collect($product->available_sizes)->pluck('size') as $size)

            <span class="">{{$size}}</span>

    @endforeach
</p>
