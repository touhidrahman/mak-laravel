@php
use Illuminate\Support\Facades\Storage;
use App\Models\FeaturedImage;
use Illuminate\Support\Facades\Cache;

$featuredImages = Cache::remember('featuredimages', 3600, function () {
    return FeaturedImage::all();
});
@endphp

@props([
    'featuredImages' => $featuredImages,
])

<div class="hero-slider relative" x-data
    x-init="new Glide('.hero-slider', { autoplay: 3000, type: 'carousel' }).mount()">
    <div class="glide__track" data-glide-el="track">
        <div class="glide__slides">

            @foreach ($featuredImages as $featuredImage)
                <div class="glide__slide">
                    <div class="bg-left sm:bg-center bg-no-repeat bg-cover"
                        style="background-image:url({{ Illuminate\Support\Facades\Storage::disk('s3')->url($featuredImage->image_url) }})">
                        <div
                            class="py-48 px-5 sm:px-10 md:px-12 xl:px-24 text-center sm:text-left sm:w-5/6 lg:w-3/4 xl:w-2/3">
                            <h3 class="font-butler font-medium text-3xl sm:text-4xl md:text-5xl lg:text-6xl mb-8">
                                <span @class([ 'text-white'=> $featuredImage->title_color == 'light',
                                    'text-secondary' => $featuredImage->title_color == 'dark' ])>
                                    {{ $featuredImage->title }}
                                </span>
                            </h3>
                            <a href="{{ $featuredImage->page_path }}"
                                class="bg-primary hover:bg-primary-light font-hk font-semibold transition-colors text-sm text-white px-5 md:px-8 py-4 md:py-5 rounded uppercase focus:outline-none inline-block tracking-wide">
                                {{ $featuredImage->button_label }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="absolute bottom-0 inset-x-0 mb-6 z-30 text-center" data-glide-el="controls[nav]">

            @php
                $i = 0;
            @endphp
        @foreach ($featuredImages as $featuredImage)
            <span
                class="inline-block border border-primary transition-colors hover:bg-secondary-lighter p-1 rounded-full mr-1 focus:outline-none cursor-pointer"
                data-glide-dir="={{ $i }}"></span>
            @php
                $i++;
            @endphp
        @endforeach

    </div>
</div>
