<header class="flex justify-between">

    <div class="overflow-hidden flex">
        <img src="{{ $product->thumb_1 }}" class="h-24 w-auto object-cover block mr-8">
        <div>
            <div class="flex">
                <h2 class="font-semibold text-3xl text-gray-600">{{ $product->name }}</h2>
                <a href="{{route('product.details', $product->slug)}}" target="_blank" class="ml-4">
                    <i class="bx bx-link-external text-2xl"></i>
                </a>
            </div>

            <div class="flex space-x-6 mt-4">
                @include('admin.products._product-actions')
            </div>
        </div>
    </div>

    <div class="">
        @isset($slot)
            {{ $slot }}
        @endisset
    </div>

</header>
