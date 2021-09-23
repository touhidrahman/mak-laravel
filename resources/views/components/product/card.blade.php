@php
use App\Models\Color;
use Illuminate\Support\Facades\Cache;

$colors = Cache::remember('colors', 3600 * 24, function () {
    return Color::all();
});
@endphp

@props(['product', 'colors' => $colors])

<div class="w-full relative group lg:last:hidden xl:last:block">
    <div class="relative rounded flex justify-center items-center">
        <div class="w-full h-68 bg-center bg-no-repeat bg-cover" style="background-image:url({{ $product->thumb_1 }})">
        </div>
        <span
            class="absolute top-0 right-0 bg-white px-5 py-1 mt-4 mr-4 rounded-full font-hk font-bold  text-primary-light text-sm uppercase tracking-wide">25%</span>

        <div
            class="absolute opacity-0 transition-opacity group-hover:opacity-100 flex justify-center items-center py-28 inset-0 group bg-secondary bg-opacity-85">
            <a href="/cart"
                class="bg-white hover:bg-primary-light rounded-full px-3 py-3 flex items-center transition-all mr-3">
                <img src="/assets/img/icons/icon-cart.svg " class="h-6 w-6" alt="icon cart" />
            </a>
            <a href="/product"
                class="bg-white hover:bg-primary-light rounded-full px-3 py-3 flex items-center transition-all mr-3">
                <img src="/assets/img/icons/icon-search.svg" class="h-6 w-6" alt="icon search" />
            </a>
            <a href="/account/wishlist/"
                class="bg-white hover:bg-primary-light  rounded-full px-3 py-3 flex items-center transition-all ">
                <img src="/assets/img/icons/icon-heart.svg" class="h-6 w-6" alt="icon heart" />
            </a>
        </div>
    </div>
    <div class="flex justify-between items-center pt-6">
        <div>
            <h3 class="font-hk text-base text-secondary">{{ $product->name }}</h3>
            <div class="flex items-center mb-2">
                @foreach (collect($product->color)->pluck('color_id') as $colorId)
                    @foreach ($colors as $color)
                        @if ($color->id == $colorId)
                            <i class="bx bxs-circle mr-1" style="color: {{ $color->hex }}"></i>
                        @endif
                    @endforeach
                @endforeach
            </div>

            <x-product.size-letters :product="$product"></x-product.size-letters>
        </div>
        <span class="font-hk font-bold text-primary text-xl">€{{ $product->selling_price / 100 }}</span>
    </div>
</div>
