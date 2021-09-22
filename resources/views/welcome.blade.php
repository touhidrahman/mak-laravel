@extends('layouts.shop')

@section('body')

    <div id="main">
        <x-navbar></x-navbar>


        <div class="absolute inset-x-0 opacity-0 pointer-events-none z-50"
            :class="{ 'opacity-100 pointer-events-auto': mobileCart }">
            <div class="w-full sm:w-1/2 absolute right-0 top-0 px-6 py-6 z-10 bg-white shadow-sm rounded">
                <div class="flex justify-between items-center border-b border-grey-dark pb-2">
                    <div class="flex items-center">
                        <i class="bx bx-x text-grey-darkest text-2xl sm:text-3xl mr-2 cursor-pointer"></i>
                        <div class="w-20 mx-0 h-20 rounded flex items-center justify-center">
                            <div class="w-16 h-16 mx-auto bg-center bg-no-repeat bg-cover"
                                style="background-image: url(/img/unlicensed/backpack-1.png);">
                            </div>
                        </div>
                        <div class="pl-2">
                            <span class="font-hk text-grey-darkest text-base block">Winter Bag</span>
                            <span class="font-hk text-secondary text-base mt-2">$19</span>
                        </div>
                    </div>
                    <div class="flex pl-3 items-center">
                        <span class="border border-primary rounded-full h-6 w-6 flex items-center justify-center"><i
                                class="bx bx-minus text-primary"></i></span>
                        <span class="font-hkbold text-primary text-lg block px-2">1</span>
                        <span class="border border-primary rounded-full h-6 w-6 flex items-center justify-center"><i
                                class="bx bx-plus text-primary"></i></span>
                    </div>
                </div>
                <div class="flex justify-between items-center border-b border-grey-dark pb-2">
                    <div class="flex items-center">
                        <i class="bx bx-x text-grey-darkest text-2xl sm:text-3xl mr-2 cursor-pointer"></i>
                        <div class="w-20 mx-0 h-20 rounded flex items-center justify-center">
                            <div class="w-16 h-16 mx-auto bg-center bg-no-repeat bg-cover"
                                style="background-image: url(/img/unlicensed/backpack-1.png);">
                            </div>
                        </div>
                        <div class="pl-2">
                            <span class="font-hk text-grey-darkest text-base block">Winter Bag</span>
                            <span class="font-hk text-secondary text-base mt-2">$19</span>
                        </div>
                    </div>
                    <div class="flex pl-3 items-center">
                        <span class="border border-primary rounded-full h-6 w-6 flex items-center justify-center"><i
                                class="bx bx-minus text-primary"></i></span>
                        <span class="font-hkbold text-primary text-lg block px-2">1</span>
                        <span class="border border-primary rounded-full h-6 w-6 flex items-center justify-center"><i
                                class="bx bx-plus text-primary"></i></span>
                    </div>
                </div>
                <div class="flex justify-between pt-4">
                    <span class="font-hkbold text-secondary text-lg">Total</span>
                    <span class="font-hkbold text-secondary text-lg">$38</span>
                </div>
                <button type="submit" class="btn btn-primary w-full mt-5" aria-label="Login button">Checkout</button>
                <a href="/cart" class="font-hk text-secondary md:text-lg pl-3 underline text-center block mt-4">Go to cart
                    page</a>
            </div>
        </div>

        <div>
            <div class="container" x-data x-init="collectionSliders">
                <x-shop.hero-slider></x-shop.hero-slider>

                <x-shop.feature></x-shop.feature>


                <x-product.grid></x-product.grid>

                <div class="pb-20 md:pb-24 lg:pb-32">
                    <div class="flex flex-col sm:flex-row justify-between items-center sm:pb-4 lg:pb-0 mb-12 sm:mb-10">
                        <div class="text-center sm:text-left">
                            <h2 class=" font-butler  text-secondary text-3xl md:text-4xl lg:text-4.5xl">Elyssi’s trends
                            </h2>
                            <p class="font-hk text-secondary-lighter text-lg md:text-xl pt-2">Be styling, no matter the
                                season!</p>
                        </div>
                        <a href="/collection-grid"
                            class="flex items-center group pt-1 sm:pt-0 border-b border-primary transition-colors hover:border-primary-light font-hk text-xl text-primary">
                            Show more
                            <i
                                class="bx bx-chevron-right text-primary transition-colors group-hover:text-primary-light pl-3 pt-2 text-xl"></i>
                        </a>
                    </div>

                    <x-product.slider></x-product.slider>

                </div>
            </div>

            <x-shop.slider-with-grid></x-shop.slider-with-grid>

            <div class="container">
                <x-product.new-arrival></x-product.new-arrival>

                <div class="pb-20 md:pb-32">
                    <div class="text-center pb-12">
                        <h2 class=" font-butler  text-secondary text-3xl md:text-4xl lg:text-4.5xl">On sale, only today
                        </h2>
                        <p class="font-hk text-secondary-lighter text-lg md:text-xl">Get it while they last!</p>
                    </div>

                    <x-product.slider></x-product.slider>
                </div>
            </div>




        </div>


        <x-footer></x-footer>

    </div>

@endsection
