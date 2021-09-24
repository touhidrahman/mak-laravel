@props(['products'])

<div class="product-slider relative" x-data x-init="
new Glide($el, {
    type: 'carousel',
    startAt: 1,
    perView: 4,
    gap: 0,
    peek: {
        before: 50,
        after: 50,
    },
    breakpoints: {
        1024: {
            perView: 3,
            peek: {
                before: 20,
                after: 20,
            },
        },
        768: {
            perView: 2,
            peek: {
                before: 10,
                after: 10,
            },
        },
        600: {
            perView: 1,
            peek: {
                before: 0,
                after: 0,
            },
        },
    },
})
.mount();
">
    <div class="glide__track" data-glide-el="track">
        <div class="pt-12 relative glide__slides">

            @foreach ($products as $product)
            <div class="relative group glide__slide pt-16 md:pt-0">
                <div class="sm:px-5 lg:px-4">
                    <x-product.card :product="$product"></x-product.card>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <div data-glide-el="controls">
        <div class="transition-all shadow-md rounded-full absolute left-25 sm:left-35 md:left-0 top-0 md:top-50 transform -translate-y-1/2 bg-grey hover:bg-primary border border-grey-dark z-30 cursor-pointer group"
            data-glide-dir="<">
            <div class="h-12 w-12 flex items-center justify-center">
                <i
                    class="bx bx-chevron-left text-primary transition-colors group-hover:text-white text-3xl leading-none"></i>
            </div>
        </div>
        <div class="transition-all shadow-md rounded-full absolute right-25 sm:right-35 md:right-0 top-0 md:top-50 transform -translate-y-1/2 bg-grey hover:bg-primary border border-grey-dark z-30 cursor-pointer group"
            data-glide-dir=">">
            <div class="h-12 w-12 flex items-center justify-center">
                <i
                    class="bx bx-chevron-right text-primary transition-colors group-hover:text-white text-3xl leading-none"></i>
            </div>
        </div>
    </div>
</div>
