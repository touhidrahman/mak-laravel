@extends('layouts.shop')

@section('body')

    <div id="main">
        <x-shop.navbar></x-shop.navbar>

        <div>
            <div class="container" x-data x-init="collectionSliders">
                <x-shop.hero-slider></x-shop.hero-slider>

                {{-- <x-shop.feature></x-shop.feature>
                <x-product.grid></x-product.grid> --}}

                <div class="py-20 md:py-24 lg:py-32">
                    <div class="flex flex-col sm:flex-row justify-between items-center sm:pb-4 lg:pb-0 mb-12 sm:mb-10">
                        <div class="text-center sm:text-left">
                            <h2 class=" font-butler  text-secondary text-3xl md:text-4xl lg:text-4.5xl">New Arrivals!
                            </h2>
                            <p class="font-hk text-secondary-lighter text-lg md:text-xl pt-2">Be stylish, no matter the season!</p>
                        </div>
                        <a href="/shop"
                            class="flex items-center group pt-1 sm:pt-0 border-b border-primary transition-colors hover:border-primary-light font-hk text-xl text-primary">
                            Show more
                            <i class="bx bx-chevron-right text-primary transition-colors group-hover:text-primary-light pl-3 pt-2 text-xl"></i>
                        </a>
                    </div>

                    <x-product.slider :products="$trendingProducts"></x-product.slider>
                </div>
            </div>

            {{-- <x-shop.slider-with-grid></x-shop.slider-with-grid> --}}

            <div class="container">
                {{-- <x-product.new-arrival></x-product.new-arrival> --}}

                <div class="pb-20 md:pb-32">
                    <x-product.slider-title>
                        Trending

                        <x-slot name="subtitle">Our trending collection!</x-slot>
                    </x-product.slider-title>

                    <x-product.slider :products="$trendingProducts"></x-product.slider>
                </div>
            </div>




        </div>


        <x-footer></x-footer>

    </div>

@endsection
