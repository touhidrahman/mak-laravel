@extends('layouts.shop')

@section('body')

    <div id="main">
        <x-navbar></x-navbar>

        <div class="container">
            <div class="flex relative">
            <div class="bg-no-repeat bg-cover bg-center w-3/4 ml-auto h-32 lg:h-48" style="background-image:url(https://source.unsplash.com/1000x640/?ge-04)">
            </div>
            <div class="w-full h-32 lg:h-48 bg-no-repeat bg-cover absolute top-0 left-0 c-hero-gradient-bg">
                <div class="py-10 px-6 sm:px-12 lg:px-20">
                    <h1 class=" font-butler text-white text-2xl sm:text-3xl md:text-4.5xl lg:text-5xl">
                        Woodie Blake</h1>
                    <div class="flex pt-2">
                        <a href="/" class="font-hk text-white text-base hover:text-primary transition-colors">Home</a>
                        <span class="font-hk text-white text-base px-2">.</span>
                        <span class="font-hk text-white text-base">Woodie Blake</span>
                    </div>
                </div>
            </div>
        </div>


            <div class="pt-16 pb-24 flex flex-col lg:flex-row justify-between -mx-5">
                <div class="lg:w-1/2 flex flex-col-reverse sm:flex-row-reverse lg:flex-row justify-between px-5" x-data="{ selectedImage: 'https://source.unsplash.com/1000x640/?ack-2' }">
                    <div class="sm:pl-5 md:pl-4 lg:pl-0 lg:pr-2 xl:pr-3 flex flex-row sm:flex-col">

                        <div class="w-28 sm:w-32 lg:w-24 xl:w-28 relative pb-5 mr-3 sm:pr-0">
                            <div class="bg-v-pink border border-grey relative rounded flex items-center justify-center w-full">
                                <img class="cursor-pointer object-cover" @click="selectedImage = $event.target.src" alt="product image" src="https://source.unsplash.com/1000x640/?ack-2">
                            </div>
                        </div>

                        <div class="w-28 sm:w-32 lg:w-24 xl:w-28 relative pb-5 mr-3 sm:pr-0">
                            <div class="bg-v-pink border border-grey relative rounded flex items-center justify-center w-full">
                                <img class="cursor-pointer object-cover" @click="selectedImage = $event.target.src" alt="product image" src="https://source.unsplash.com/1000x640/?-03-1">
                            </div>
                        </div>

                        <div class="w-28 sm:w-32 lg:w-24 xl:w-28 relative pb-5 mr-3 sm:pr-0">
                            <div class="bg-v-pink border border-grey relative rounded flex items-center justify-center w-full">
                                <img class="cursor-pointer object-cover" @click="selectedImage = $event.target.src" alt="product image" src="https://source.unsplash.com/1000x640/?-03-2">
                            </div>
                        </div>

                    </div>
                    <div class="w-full relative pb-5 sm:pb-0">
                        <div class="bg-v-pink border border-grey relative rounded flex items-center justify-center aspect-w-1 aspect-h-1">
                            <img class="object-cover" alt="product image" :src="selectedImage" src="https://source.unsplash.com/1000x640/?ack-2">
                        </div>
                    </div>
                </div>

                <div class="lg:w-1/2 pt-8 lg:pt-0 px-5">
                    <div class="border-b border-grey-dark mb-8">
                        <div class="flex items-center">
                            <h2 class=" font-butler text-3xl md:text-4xl lg:text-4.5xl">Woodie Blake</h2>
                            <p class="bg-primary rounded-full ml-8 px-5 py-2 leading-none font-hk font-bold text-white uppercase text-sm">20% off</p>
                        </div>
                        <div class="flex items-center pt-3">
                            <span class="font-hk text-secondary text-2xl">$110.0</span>
                            <span class="font-hk text-grey-darker text-xl line-through pl-5">$35.0</span>
                        </div>
                        <div class="flex items-center pt-3 pb-8">
                            <div class="flex items-center">
                                <i class="bx bxs-star text-primary"></i>
                                <i class="bx bxs-star text-primary"></i>
                                <i class="bx bxs-star text-primary"></i>
                                <i class="bx bxs-star text-primary"></i>
                                <i class="bx bxs-star text-primary"></i>
                            </div>
                            <span class="font-hk text-sm text-secondary ml-2">(45)</span>
                        </div>
                    </div>
                    <div class="flex pb-5">
                        <p class="font-hk text-secondary">Availability:</p>
                        <p class="font-hkbold text-v-green pl-3">In Stock</p>
                    </div>
                    <p class="font-hk text-secondary pb-5">Versatile, comfortable, and chic! Three words that describe Blake by Elyssi.</p>
                    <div class="flex justify-between pb-4">
                        <div class="w-1/3 sm:w-1/5">
                            <p class="font-hk text-secondary">Color</p>
                        </div>
                        <div class="w-2/3 sm:w-5/6 flex items-center">
                            <div class="bg-primary px-2 py-2 rounded-full mr-2 border-2 border-transparent hover:border-black transition-colors cursor-pointer"></div>
                            <div class="bg-secondary-light px-2 py-2 rounded-full mr-2 border-2 border-transparent hover:border-black transition-colors cursor-pointer"></div>
                            <div class="bg-v-green px-2 py-2 rounded-full mr-2 border-2 border-transparent hover:border-black transition-colors cursor-pointer"></div>
                            <div class="bg-v-blue px-2 py-2 rounded-full border-2 border-transparent hover:border-black transition-colors cursor-pointer"></div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between pb-4">
                        <div class="w-1/3 sm:w-1/5">
                            <p class="font-hk text-secondary">Size</p>
                        </div>
                        <div class="w-2/3 sm:w-5/6">
                            <select class="w-2/3 form-select">
                                <option value="0">Small</option>
                                <option value="1">Medium</option>
                                <option value="2">Large</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center justify-between pb-8">
                        <div class="w-1/3 sm:w-1/5">
                            <p class="font-hk text-secondary">Quantity</p>
                        </div>
                        <div class="w-2/3 sm:w-5/6 flex" x-data="{ productQuantity: 1 }">
                            <label for="quantity-form" class="block relative h-0 w-0 overflow-hidden">Quantity form</label>
                            <input type="number" id="quantity-form" class="form-input form-quantity rounded-r-none w-16 py-0 px-2 text-center" x-model="productQuantity" min="1">
                            <div class="flex flex-col">
                                <span class="px-1 bg-white border border-l-0 border-grey-darker flex-1 rounded-tr cursor-pointer" @click="productQuantity++">
                                    <i class="bx bxs-up-arrow text-xs text-primary pointer-events-none"></i>
                                </span>
                                <span class="px-1 bg-white flex-1 border border-t-0 border-l-0 rounded-br border-grey-darker cursor-pointer" @click="productQuantity > 1 ? productQuantity-- : productQuantity = 1">
                                    <i class="bx bxs-down-arrow text-xs text-primary pointer-events-none"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="flex pb-8 group">
                        <a href="/cart" class="btn btn-outline mr-4 md:mr-6">Add to cart</a>
                        <a href="/cart" class="btn btn-primary">BUY NOW</a>
                    </div>
                    <div class="flex pb-2">
                        <p class="font-hk text-secondary">SKU:</p>
                        <p class="font-hkbold text-secondary pl-3">KH12345</p>
                    </div>
                    <p class="font-hk text-secondary">
                        <span class="pr-2">Categories:</span>Bag, Hand bag, Travel bag, Black
                    </p>
                </div>
            </div>

            <div class="pb-16 sm:pb-20 md:pb-24" x-data="{ activeTab: 'description' }">
                <div class="tabs flex flex-col sm:flex-row" role="tablist">

                    <span @click="activeTab = 'description'" class="tab-item bg-white hover:bg-grey-light px-10 py-5 text-center sm:text-left border-t-2 border-transparent font-hk font-bold text-secondary cursor-pointer transition-colors active" :class="{ 'active': activeTab === 'description' }">
                        Description
                    </span>

                    <span @click="activeTab = 'additional-information'" class="tab-item bg-white hover:bg-grey-light px-10 py-5 text-center sm:text-left border-t-2 border-transparent font-hk font-bold text-secondary cursor-pointer transition-colors" :class="{ 'active': activeTab === 'additional-information' }">
                        Additional Information
                    </span>

                    <span @click="activeTab = 'reviews'" class="tab-item bg-white hover:bg-grey-light px-10 py-5 text-center sm:text-left border-t-2 border-transparent font-hk font-bold text-secondary cursor-pointer transition-colors" :class="{ 'active': activeTab === 'reviews' }">
                        Reviews
                    </span>

                </div>
                <div class="tab-content relative">
                    <div :class="{ 'active': activeTab === 'description' }" class="tab-pane bg-grey-light py-10 md:py-16 transition-opacity active" role="tabpanel">
                        <div class="w-5/6 mx-auto text-center sm:text-left">
                            <div class="font-hk text-secondary text-base">
                                Versatile, comfortable, and chic! Three words that describe Blake by Elyssi. This backpack purse is A durable leather backpack with two large compartments and 2 smaller compartments on the front and back of it so you can carry all your belongings.

                            </div>
                        </div>
                    </div>
                    <div :class="{ 'active': activeTab === 'additional-information' }" class="tab-pane bg-grey-light py-10 md:py-16 transition-opacity" role="tabpanel">
                        <div class="w-5/6 mx-auto">
                            <div class="font-hk text-secondary text-base">
                                On the main compartment has multiple pockets available for your tools, chargers, make up, keys, etc. <br><br>  Size::13.4”Lx 6.5”W x 15.4”H. <br> Weight: 1.57pounds. <br> Color: light brown.

                            </div>
                        </div>
                    </div>
                    <div :class="{ 'active': activeTab === 'reviews' }" class="tab-pane bg-grey-light py-10 md:py-16 transition-opacity" role="tabpanel">

                        <div class="w-5/6 mx-auto border-b border-grey-darker pb-8 text-center sm:text-left">
                            <div class="flex justify-center sm:justify-start items-center pt-3 xl:pt-5">
                                <i class="bx bxs-star text-primary"></i>
                                <i class="bx bxs-star text-primary"></i>
                                <i class="bx bxs-star text-primary"></i>
                                <i class="bx bxs-star text-primary"></i>
                                <i class="bx bxs-star text-primary"></i>
                            </div>
                            <p class="font-hkbold text-secondary text-lg pt-3">Perfect for everyday use</p>
                            <p class="font-hk text-secondary pt-4 lg:w-5/6 xl:w-2/3">I loooveeeee this product!!! It feels so soft and smells like real leather!!! I ordered this fancy backpack looking for something that can be used at work and, at the same time, after work; and I found it.  Honestly.. Amazing!!</p>
                            <div class="flex justify-center sm:justify-start items-center pt-3">
                                <p class="font-hk text-grey-darkest text-sm"><span>By</span> Melanie Ashwood</p>
                                <span class="font-hk text-grey-darkest text-sm block px-4">.</span>
                                <p class="font-hk text-grey-darkest text-sm">6 days ago</p>
                            </div>
                        </div>

                        <div class="w-5/6 mx-auto border-b border-transparent pb-8 text-center sm:text-left">
                            <div class="flex justify-center sm:justify-start items-center pt-3 xl:pt-5">
                                <i class="bx bxs-star text-primary"></i>
                                <i class="bx bxs-star text-primary"></i>
                                <i class="bx bxs-star text-primary"></i>
                                <i class="bx bxs-star text-primary"></i>
                                <i class="bx bxs-star text-primary"></i>
                            </div>
                            <p class="font-hkbold text-secondary text-lg pt-3">Gift for my girlfriend</p>
                            <p class="font-hk text-secondary pt-4 lg:w-5/6 xl:w-2/3">I paid this thing thinking about my girlfriend’s birthday present, however I had my doubts cuz’ she is kind of picky. But Seriously, from now on, Elyssi is my best friend! She loved it!! She’s crazy about it!  DISCLAIMER: It is smaller than it appears. </p>
                            <div class="flex justify-center sm:justify-start items-center pt-3">
                                <p class="font-hk text-grey-darkest text-sm"><span>By</span> Jake Houston</p>
                                <span class="font-hk text-grey-darkest text-sm block px-4">.</span>
                                <p class="font-hk text-grey-darkest text-sm">4 days ago</p>
                            </div>
                        </div>

                        <form class="w-5/6 mx-auto">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-10 gap-y-5 pt-10">
                                <div class="w-full">
                                    <label class="font-hk text-secondary text-sm block mb-2" for="name">Name</label>
                                    <input type="text" placeholder="Enter your Name" class="form-input" id="name">
                                </div>
                                <div class="w-full pt-10 sm:pt-0">
                                    <label class="font-hk text-secondary text-sm block mb-2" for="email">Email address</label>
                                    <input type="email" placeholder="Enter your email" class="form-input " id="email">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-10 gap-y-5 pt-10">
                                <div class="w-full">
                                    <label class="font-hk text-secondary text-sm block mb-2" for="review_title">Review Title</label>
                                    <input type="text" placeholder="Enter your review title" class="form-input " id="review_title">
                                </div>
                                <div class="w-full pt-10 sm:pt-0">
                                    <label class="font-hk text-secondary text-sm block mb-2">Rating</label>
                                    <div class="flex pt-4">
                                        <i class="bx bxs-star text-grey-darker text-xl pr-1"></i>
                                        <i class="bx bxs-star text-grey-darker text-xl pr-1"></i>
                                        <i class="bx bxs-star text-grey-darker text-xl pr-1"></i>
                                        <i class="bx bxs-star text-grey-darker text-xl pr-1"></i>
                                        <i class="bx bxs-star text-grey-darker text-xl"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="sm:w-12/25 pt-10">
                                <label for="message" class="font-hk text-secondary text-sm block mb-2">Review Message</label>
                                <textarea placeholder="Write your review here" class="form-textarea h-28" id="message"></textarea>
                            </div>
                        </form>
                        <div class="w-5/6 mx-auto pt-8 md:pt-10 pb-4 text-center sm:text-left">
                            <a href="/" class="btn btn-primary">Submit Review</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pb-20 md:pb-32">
                <div class="text-center mb-12">
                    <h2 class="font-butler text-secondary text-3xl md:text-4xl lg:text-4.5xl">Related Products</h2>
                    <p class="font-hk text-secondary-lighter text-lg md:text-xl pt-2 pb-6 sm:pb-8 lg:pb-0">Get the latest news &amp; updates from Elyssi</p>
                </div>
                <div class="product-slider relative glide--ltr glide--carousel glide--swipeable" x-data="" x-init="
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
                <div class="pt-12 relative glide__slides" style="transition: transform 0ms cubic-bezier(0.165, 0.84, 0.44, 1) 0s; width: 5022px; transform: translate3d(-1624px, 0px, 0px);">

                    <div class="relative group glide__slide pt-16 md:pt-0 glide__slide--clone" style="width: 279px; margin-right: 0px;">
                        <div class="sm:px-5 lg:px-4">
                            <div class="relative rounded flex justify-center items-center">
                                <div class="aspect-w-1 aspect-h-1 w-full">
                                    <img src="https://source.unsplash.com/1000x640/?tch-1" alt="product image" class="object-cover">
                                </div>
                                <div class="absolute top-0 right-0 bg-white px-5 py-1 m-4 rounded-full">
                                    <p class="text-v-red font-hk font-bold text-sm uppercase tracking-wide">
                                        Hot
                                    </p>
                                </div>
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 flex justify-center items-center bg-secondary bg-opacity-85 transition-opacity">
                                    <a href="/cart" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-cart.svg " class="h-6 w-6" alt="icon cart">
                                    </a>
                                    <a href="/product" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-search.svg" class="h-6 w-6" alt="icon search">
                                    </a>
                                    <a href="/account/wishlist/" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all">
                                        <img src="/assets/img/icons/icon-heart.svg" class="h-6 w-6" alt="icon heart">
                                    </a>
                                </div>
                            </div>
                            <a href="/product" class="flex justify-between items-center pt-6">
                                <div>
                                    <h3 class="font-hk text-base text-secondary">Submarine Watch</h3>
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                        </div>
                                        <span class="font-hk text-sm text-secondary ml-2">45</span>
                                    </div>
                                </div>
                                <span class="font-hkbold text-primary text-xl">$120.0</span>
                            </a>
                        </div>
                    </div><div class="relative group glide__slide pt-16 md:pt-0 glide__slide--clone" style="width: 279px; margin-left: 0px; margin-right: 0px;">
                        <div class="sm:px-5 lg:px-4">
                            <div class="relative rounded flex justify-center items-center">
                                <div class="aspect-w-1 aspect-h-1 w-full">
                                    <img src="https://source.unsplash.com/1000x640/?ack-2" alt="product image" class="object-cover">
                                </div>
                                <div class="absolute top-0 right-0 bg-white px-5 py-1 m-4 rounded-full">
                                    <p class="text-v-green font-hk font-bold text-sm uppercase tracking-wide">
                                        New
                                    </p>
                                </div>
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 flex justify-center items-center bg-secondary bg-opacity-85 transition-opacity">
                                    <a href="/cart" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-cart.svg " class="h-6 w-6" alt="icon cart">
                                    </a>
                                    <a href="/product" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-search.svg" class="h-6 w-6" alt="icon search">
                                    </a>
                                    <a href="/account/wishlist/" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all">
                                        <img src="/assets/img/icons/icon-heart.svg" class="h-6 w-6" alt="icon heart">
                                    </a>
                                </div>
                            </div>
                            <a href="/product" class="flex justify-between items-center pt-6">
                                <div>
                                    <h3 class="font-hk text-base text-secondary">Woodie Blake</h3>
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                        </div>
                                        <span class="font-hk text-sm text-secondary ml-2">45</span>
                                    </div>
                                </div>
                                <span class="font-hkbold text-primary text-xl">$115.0</span>
                            </a>
                        </div>
                    </div><div class="relative group glide__slide pt-16 md:pt-0 glide__slide--clone" style="width: 279px; margin-left: 0px; margin-right: 0px;">
                        <div class="sm:px-5 lg:px-4">
                            <div class="relative rounded flex justify-center items-center">
                                <div class="aspect-w-1 aspect-h-1 w-full">
                                    <img src="https://source.unsplash.com/1000x640/?oes-1" alt="product image" class="object-cover">
                                </div>
                                <div class="absolute top-0 right-0 bg-white px-5 py-1 m-4 rounded-full">
                                    <p class="text-v-blue font-hk font-bold text-sm uppercase tracking-wide">
                                        trend
                                    </p>
                                </div>
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 flex justify-center items-center bg-secondary bg-opacity-85 transition-opacity">
                                    <a href="/cart" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-cart.svg " class="h-6 w-6" alt="icon cart">
                                    </a>
                                    <a href="/product" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-search.svg" class="h-6 w-6" alt="icon search">
                                    </a>
                                    <a href="/account/wishlist/" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all">
                                        <img src="/assets/img/icons/icon-heart.svg" class="h-6 w-6" alt="icon heart">
                                    </a>
                                </div>
                            </div>
                            <a href="/product" class="flex justify-between items-center pt-6">
                                <div>
                                    <h3 class="font-hk text-base text-secondary">Cocktail Vans</h3>
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                        </div>
                                        <span class="font-hk text-sm text-secondary ml-2">45</span>
                                    </div>
                                </div>
                                <span class="font-hkbold text-primary text-xl">$33.0</span>
                            </a>
                        </div>
                    </div><div class="relative group glide__slide pt-16 md:pt-0 glide__slide--clone" style="width: 279px; margin-left: 0px; margin-right: 0px;">
                        <div class="sm:px-5 lg:px-4">
                            <div class="relative rounded flex justify-center items-center">
                                <div class="aspect-w-1 aspect-h-1 w-full">
                                    <img src="https://source.unsplash.com/1000x640/?oes-4" alt="product image" class="object-cover">
                                </div>
                                <div class="absolute top-0 right-0 bg-white px-5 py-1 m-4 rounded-full">
                                    <p class="text-primary-light font-hk font-bold text-sm uppercase tracking-wide">
                                        20%
                                    </p>
                                </div>
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 flex justify-center items-center bg-secondary bg-opacity-85 transition-opacity">
                                    <a href="/cart" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-cart.svg " class="h-6 w-6" alt="icon cart">
                                    </a>
                                    <a href="/product" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-search.svg" class="h-6 w-6" alt="icon search">
                                    </a>
                                    <a href="/account/wishlist/" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all">
                                        <img src="/assets/img/icons/icon-heart.svg" class="h-6 w-6" alt="icon heart">
                                    </a>
                                </div>
                            </div>
                            <a href="/product" class="flex justify-between items-center pt-6">
                                <div>
                                    <h3 class="font-hk text-base text-secondary">Siberian Boots</h3>
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                        </div>
                                        <span class="font-hk text-sm text-secondary ml-2">45</span>
                                    </div>
                                </div>
                                <span class="font-hkbold text-primary text-xl">$67.0</span>
                            </a>
                        </div>
                    </div><div class="relative group glide__slide pt-16 md:pt-0 glide__slide--clone" style="width: 279px; margin-left: 0px; margin-right: 0px;">
                        <div class="sm:px-5 lg:px-4">
                            <div class="relative rounded flex justify-center items-center">
                                <div class="aspect-w-1 aspect-h-1 w-full">
                                    <img src="https://source.unsplash.com/1000x640/?tch-3" alt="product image" class="object-cover">
                                </div>
                                <div class="absolute top-0 right-0 bg-white px-5 py-1 m-4 rounded-full">
                                    <p class="text-v-red font-hk font-bold text-sm uppercase tracking-wide">
                                        Hot
                                    </p>
                                </div>
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 flex justify-center items-center bg-secondary bg-opacity-85 transition-opacity">
                                    <a href="/cart" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-cart.svg " class="h-6 w-6" alt="icon cart">
                                    </a>
                                    <a href="/product" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-search.svg" class="h-6 w-6" alt="icon search">
                                    </a>
                                    <a href="/account/wishlist/" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all">
                                        <img src="/assets/img/icons/icon-heart.svg" class="h-6 w-6" alt="icon heart">
                                    </a>
                                </div>
                            </div>
                            <a href="/product" class="flex justify-between items-center pt-6">
                                <div>
                                    <h3 class="font-hk text-base text-secondary">Silver One</h3>
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                        </div>
                                        <span class="font-hk text-sm text-secondary ml-2">45</span>
                                    </div>
                                </div>
                                <span class="font-hkbold text-primary text-xl">$137.0</span>
                            </a>
                        </div>
                    </div><div class="relative group glide__slide pt-16 md:pt-0" style="width: 279px; margin-left: 0px; margin-right: 0px;">
                        <div class="sm:px-5 lg:px-4">
                            <div class="relative rounded flex justify-center items-center">
                                <div class="aspect-w-1 aspect-h-1 w-full">
                                    <img src="https://source.unsplash.com/1000x640/?ack-2" alt="product image" class="object-cover">
                                </div>
                                <div class="absolute top-0 right-0 bg-white px-5 py-1 m-4 rounded-full">
                                    <p class="text-v-green font-hk font-bold text-sm uppercase tracking-wide">
                                        New
                                    </p>
                                </div>
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 flex justify-center items-center bg-secondary bg-opacity-85 transition-opacity">
                                    <a href="/cart" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-cart.svg " class="h-6 w-6" alt="icon cart">
                                    </a>
                                    <a href="/product" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-search.svg" class="h-6 w-6" alt="icon search">
                                    </a>
                                    <a href="/account/wishlist/" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all">
                                        <img src="/assets/img/icons/icon-heart.svg" class="h-6 w-6" alt="icon heart">
                                    </a>
                                </div>
                            </div>
                            <a href="/product" class="flex justify-between items-center pt-6">
                                <div>
                                    <h3 class="font-hk text-base text-secondary">Woodie Blake</h3>
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                        </div>
                                        <span class="font-hk text-sm text-secondary ml-2">45</span>
                                    </div>
                                </div>
                                <span class="font-hkbold text-primary text-xl">$115.0</span>
                            </a>
                        </div>
                    </div>

                    <div class="relative group glide__slide pt-16 md:pt-0 glide__slide--active" style="width: 279px; margin-left: 0px; margin-right: 0px;">
                        <div class="sm:px-5 lg:px-4">
                            <div class="relative rounded flex justify-center items-center">
                                <div class="aspect-w-1 aspect-h-1 w-full">
                                    <img src="https://source.unsplash.com/1000x640/?rse-1" alt="product image" class="object-cover">
                                </div>
                                <div class="absolute top-0 right-0 bg-white px-5 py-1 m-4 rounded-full">
                                    <p class="text-v-blue font-hk font-bold text-sm uppercase tracking-wide">
                                        trend
                                    </p>
                                </div>
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 flex justify-center items-center bg-secondary bg-opacity-85 transition-opacity">
                                    <a href="/cart" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-cart.svg " class="h-6 w-6" alt="icon cart">
                                    </a>
                                    <a href="/product" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-search.svg" class="h-6 w-6" alt="icon search">
                                    </a>
                                    <a href="/account/wishlist/" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all">
                                        <img src="/assets/img/icons/icon-heart.svg" class="h-6 w-6" alt="icon heart">
                                    </a>
                                </div>
                            </div>
                            <a href="/product" class="flex justify-between items-center pt-6">
                                <div>
                                    <h3 class="font-hk text-base text-secondary">Beautiful Brown</h3>
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                        </div>
                                        <span class="font-hk text-sm text-secondary ml-2">45</span>
                                    </div>
                                </div>
                                <span class="font-hkbold text-primary text-xl">$55.0</span>
                            </a>
                        </div>
                    </div>

                    <div class="relative group glide__slide pt-16 md:pt-0" style="width: 279px; margin-left: 0px; margin-right: 0px;">
                        <div class="sm:px-5 lg:px-4">
                            <div class="relative rounded flex justify-center items-center">
                                <div class="aspect-w-1 aspect-h-1 w-full">
                                    <img src="https://source.unsplash.com/1000x640/?ass-3" alt="product image" class="object-cover">
                                </div>
                                <div class="absolute top-0 right-0 bg-white px-5 py-1 m-4 rounded-full">
                                    <p class="text-primary-light font-hk font-bold text-sm uppercase tracking-wide">
                                        20%
                                    </p>
                                </div>
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 flex justify-center items-center bg-secondary bg-opacity-85 transition-opacity">
                                    <a href="/cart" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-cart.svg " class="h-6 w-6" alt="icon cart">
                                    </a>
                                    <a href="/product" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-search.svg" class="h-6 w-6" alt="icon search">
                                    </a>
                                    <a href="/account/wishlist/" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all">
                                        <img src="/assets/img/icons/icon-heart.svg" class="h-6 w-6" alt="icon heart">
                                    </a>
                                </div>
                            </div>
                            <a href="/product" class="flex justify-between items-center pt-6">
                                <div>
                                    <h3 class="font-hk text-base text-secondary">Coffee Cream</h3>
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                        </div>
                                        <span class="font-hk text-sm text-secondary ml-2">45</span>
                                    </div>
                                </div>
                                <span class="font-hkbold text-primary text-xl">$65.0</span>
                            </a>
                        </div>
                    </div>

                    <div class="relative group glide__slide pt-16 md:pt-0" style="width: 279px; margin-left: 0px; margin-right: 0px;">
                        <div class="sm:px-5 lg:px-4">
                            <div class="relative rounded flex justify-center items-center">
                                <div class="aspect-w-1 aspect-h-1 w-full">
                                    <img src="https://source.unsplash.com/1000x640/?tch-1" alt="product image" class="object-cover">
                                </div>
                                <div class="absolute top-0 right-0 bg-white px-5 py-1 m-4 rounded-full">
                                    <p class="text-v-red font-hk font-bold text-sm uppercase tracking-wide">
                                        Hot
                                    </p>
                                </div>
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 flex justify-center items-center bg-secondary bg-opacity-85 transition-opacity">
                                    <a href="/cart" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-cart.svg " class="h-6 w-6" alt="icon cart">
                                    </a>
                                    <a href="/product" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-search.svg" class="h-6 w-6" alt="icon search">
                                    </a>
                                    <a href="/account/wishlist/" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all">
                                        <img src="/assets/img/icons/icon-heart.svg" class="h-6 w-6" alt="icon heart">
                                    </a>
                                </div>
                            </div>
                            <a href="/product" class="flex justify-between items-center pt-6">
                                <div>
                                    <h3 class="font-hk text-base text-secondary">Submarine Watch</h3>
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                        </div>
                                        <span class="font-hk text-sm text-secondary ml-2">45</span>
                                    </div>
                                </div>
                                <span class="font-hkbold text-primary text-xl">$120.0</span>
                            </a>
                        </div>
                    </div>

                    <div class="relative group glide__slide pt-16 md:pt-0" style="width: 279px; margin-left: 0px; margin-right: 0px;">
                        <div class="sm:px-5 lg:px-4">
                            <div class="relative rounded flex justify-center items-center">
                                <div class="aspect-w-1 aspect-h-1 w-full">
                                    <img src="https://source.unsplash.com/1000x640/?ack-2" alt="product image" class="object-cover">
                                </div>
                                <div class="absolute top-0 right-0 bg-white px-5 py-1 m-4 rounded-full">
                                    <p class="text-v-green font-hk font-bold text-sm uppercase tracking-wide">
                                        New
                                    </p>
                                </div>
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 flex justify-center items-center bg-secondary bg-opacity-85 transition-opacity">
                                    <a href="/cart" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-cart.svg " class="h-6 w-6" alt="icon cart">
                                    </a>
                                    <a href="/product" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-search.svg" class="h-6 w-6" alt="icon search">
                                    </a>
                                    <a href="/account/wishlist/" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all">
                                        <img src="/assets/img/icons/icon-heart.svg" class="h-6 w-6" alt="icon heart">
                                    </a>
                                </div>
                            </div>
                            <a href="/product" class="flex justify-between items-center pt-6">
                                <div>
                                    <h3 class="font-hk text-base text-secondary">Woodie Blake</h3>
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                        </div>
                                        <span class="font-hk text-sm text-secondary ml-2">45</span>
                                    </div>
                                </div>
                                <span class="font-hkbold text-primary text-xl">$115.0</span>
                            </a>
                        </div>
                    </div>

                    <div class="relative group glide__slide pt-16 md:pt-0" style="width: 279px; margin-left: 0px; margin-right: 0px;">
                        <div class="sm:px-5 lg:px-4">
                            <div class="relative rounded flex justify-center items-center">
                                <div class="aspect-w-1 aspect-h-1 w-full">
                                    <img src="https://source.unsplash.com/1000x640/?oes-1" alt="product image" class="object-cover">
                                </div>
                                <div class="absolute top-0 right-0 bg-white px-5 py-1 m-4 rounded-full">
                                    <p class="text-v-blue font-hk font-bold text-sm uppercase tracking-wide">
                                        trend
                                    </p>
                                </div>
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 flex justify-center items-center bg-secondary bg-opacity-85 transition-opacity">
                                    <a href="/cart" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-cart.svg " class="h-6 w-6" alt="icon cart">
                                    </a>
                                    <a href="/product" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-search.svg" class="h-6 w-6" alt="icon search">
                                    </a>
                                    <a href="/account/wishlist/" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all">
                                        <img src="/assets/img/icons/icon-heart.svg" class="h-6 w-6" alt="icon heart">
                                    </a>
                                </div>
                            </div>
                            <a href="/product" class="flex justify-between items-center pt-6">
                                <div>
                                    <h3 class="font-hk text-base text-secondary">Cocktail Vans</h3>
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                        </div>
                                        <span class="font-hk text-sm text-secondary ml-2">45</span>
                                    </div>
                                </div>
                                <span class="font-hkbold text-primary text-xl">$33.0</span>
                            </a>
                        </div>
                    </div>

                    <div class="relative group glide__slide pt-16 md:pt-0" style="width: 279px; margin-left: 0px; margin-right: 0px;">
                        <div class="sm:px-5 lg:px-4">
                            <div class="relative rounded flex justify-center items-center">
                                <div class="aspect-w-1 aspect-h-1 w-full">
                                    <img src="https://source.unsplash.com/1000x640/?oes-4" alt="product image" class="object-cover">
                                </div>
                                <div class="absolute top-0 right-0 bg-white px-5 py-1 m-4 rounded-full">
                                    <p class="text-primary-light font-hk font-bold text-sm uppercase tracking-wide">
                                        20%
                                    </p>
                                </div>
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 flex justify-center items-center bg-secondary bg-opacity-85 transition-opacity">
                                    <a href="/cart" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-cart.svg " class="h-6 w-6" alt="icon cart">
                                    </a>
                                    <a href="/product" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-search.svg" class="h-6 w-6" alt="icon search">
                                    </a>
                                    <a href="/account/wishlist/" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all">
                                        <img src="/assets/img/icons/icon-heart.svg" class="h-6 w-6" alt="icon heart">
                                    </a>
                                </div>
                            </div>
                            <a href="/product" class="flex justify-between items-center pt-6">
                                <div>
                                    <h3 class="font-hk text-base text-secondary">Siberian Boots</h3>
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                        </div>
                                        <span class="font-hk text-sm text-secondary ml-2">45</span>
                                    </div>
                                </div>
                                <span class="font-hkbold text-primary text-xl">$67.0</span>
                            </a>
                        </div>
                    </div>

                    <div class="relative group glide__slide pt-16 md:pt-0" style="width: 279px; margin-left: 0px; margin-right: 0px;">
                        <div class="sm:px-5 lg:px-4">
                            <div class="relative rounded flex justify-center items-center">
                                <div class="aspect-w-1 aspect-h-1 w-full">
                                    <img src="https://source.unsplash.com/1000x640/?tch-3" alt="product image" class="object-cover">
                                </div>
                                <div class="absolute top-0 right-0 bg-white px-5 py-1 m-4 rounded-full">
                                    <p class="text-v-red font-hk font-bold text-sm uppercase tracking-wide">
                                        Hot
                                    </p>
                                </div>
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 flex justify-center items-center bg-secondary bg-opacity-85 transition-opacity">
                                    <a href="/cart" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-cart.svg " class="h-6 w-6" alt="icon cart">
                                    </a>
                                    <a href="/product" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-search.svg" class="h-6 w-6" alt="icon search">
                                    </a>
                                    <a href="/account/wishlist/" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all">
                                        <img src="/assets/img/icons/icon-heart.svg" class="h-6 w-6" alt="icon heart">
                                    </a>
                                </div>
                            </div>
                            <a href="/product" class="flex justify-between items-center pt-6">
                                <div>
                                    <h3 class="font-hk text-base text-secondary">Silver One</h3>
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                        </div>
                                        <span class="font-hk text-sm text-secondary ml-2">45</span>
                                    </div>
                                </div>
                                <span class="font-hkbold text-primary text-xl">$137.0</span>
                            </a>
                        </div>
                    </div>

                <div class="relative group glide__slide pt-16 md:pt-0 glide__slide--clone" style="width: 279px; margin-left: 0px; margin-right: 0px;">
                        <div class="sm:px-5 lg:px-4">
                            <div class="relative rounded flex justify-center items-center">
                                <div class="aspect-w-1 aspect-h-1 w-full">
                                    <img src="https://source.unsplash.com/1000x640/?ack-2" alt="product image" class="object-cover">
                                </div>
                                <div class="absolute top-0 right-0 bg-white px-5 py-1 m-4 rounded-full">
                                    <p class="text-v-green font-hk font-bold text-sm uppercase tracking-wide">
                                        New
                                    </p>
                                </div>
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 flex justify-center items-center bg-secondary bg-opacity-85 transition-opacity">
                                    <a href="/cart" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-cart.svg " class="h-6 w-6" alt="icon cart">
                                    </a>
                                    <a href="/product" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-search.svg" class="h-6 w-6" alt="icon search">
                                    </a>
                                    <a href="/account/wishlist/" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all">
                                        <img src="/assets/img/icons/icon-heart.svg" class="h-6 w-6" alt="icon heart">
                                    </a>
                                </div>
                            </div>
                            <a href="/product" class="flex justify-between items-center pt-6">
                                <div>
                                    <h3 class="font-hk text-base text-secondary">Woodie Blake</h3>
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                        </div>
                                        <span class="font-hk text-sm text-secondary ml-2">45</span>
                                    </div>
                                </div>
                                <span class="font-hkbold text-primary text-xl">$115.0</span>
                            </a>
                        </div>
                    </div><div class="relative group glide__slide pt-16 md:pt-0 glide__slide--clone" style="width: 279px; margin-left: 0px; margin-right: 0px;">
                        <div class="sm:px-5 lg:px-4">
                            <div class="relative rounded flex justify-center items-center">
                                <div class="aspect-w-1 aspect-h-1 w-full">
                                    <img src="https://source.unsplash.com/1000x640/?rse-1" alt="product image" class="object-cover">
                                </div>
                                <div class="absolute top-0 right-0 bg-white px-5 py-1 m-4 rounded-full">
                                    <p class="text-v-blue font-hk font-bold text-sm uppercase tracking-wide">
                                        trend
                                    </p>
                                </div>
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 flex justify-center items-center bg-secondary bg-opacity-85 transition-opacity">
                                    <a href="/cart" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-cart.svg " class="h-6 w-6" alt="icon cart">
                                    </a>
                                    <a href="/product" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-search.svg" class="h-6 w-6" alt="icon search">
                                    </a>
                                    <a href="/account/wishlist/" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all">
                                        <img src="/assets/img/icons/icon-heart.svg" class="h-6 w-6" alt="icon heart">
                                    </a>
                                </div>
                            </div>
                            <a href="/product" class="flex justify-between items-center pt-6">
                                <div>
                                    <h3 class="font-hk text-base text-secondary">Beautiful Brown</h3>
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                        </div>
                                        <span class="font-hk text-sm text-secondary ml-2">45</span>
                                    </div>
                                </div>
                                <span class="font-hkbold text-primary text-xl">$55.0</span>
                            </a>
                        </div>
                    </div><div class="relative group glide__slide pt-16 md:pt-0 glide__slide--clone" style="width: 279px; margin-left: 0px; margin-right: 0px;">
                        <div class="sm:px-5 lg:px-4">
                            <div class="relative rounded flex justify-center items-center">
                                <div class="aspect-w-1 aspect-h-1 w-full">
                                    <img src="https://source.unsplash.com/1000x640/?ass-3" alt="product image" class="object-cover">
                                </div>
                                <div class="absolute top-0 right-0 bg-white px-5 py-1 m-4 rounded-full">
                                    <p class="text-primary-light font-hk font-bold text-sm uppercase tracking-wide">
                                        20%
                                    </p>
                                </div>
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 flex justify-center items-center bg-secondary bg-opacity-85 transition-opacity">
                                    <a href="/cart" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-cart.svg " class="h-6 w-6" alt="icon cart">
                                    </a>
                                    <a href="/product" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-search.svg" class="h-6 w-6" alt="icon search">
                                    </a>
                                    <a href="/account/wishlist/" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all">
                                        <img src="/assets/img/icons/icon-heart.svg" class="h-6 w-6" alt="icon heart">
                                    </a>
                                </div>
                            </div>
                            <a href="/product" class="flex justify-between items-center pt-6">
                                <div>
                                    <h3 class="font-hk text-base text-secondary">Coffee Cream</h3>
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                        </div>
                                        <span class="font-hk text-sm text-secondary ml-2">45</span>
                                    </div>
                                </div>
                                <span class="font-hkbold text-primary text-xl">$65.0</span>
                            </a>
                        </div>
                    </div><div class="relative group glide__slide pt-16 md:pt-0 glide__slide--clone" style="width: 279px; margin-left: 0px; margin-right: 0px;">
                        <div class="sm:px-5 lg:px-4">
                            <div class="relative rounded flex justify-center items-center">
                                <div class="aspect-w-1 aspect-h-1 w-full">
                                    <img src="https://source.unsplash.com/1000x640/?tch-1" alt="product image" class="object-cover">
                                </div>
                                <div class="absolute top-0 right-0 bg-white px-5 py-1 m-4 rounded-full">
                                    <p class="text-v-red font-hk font-bold text-sm uppercase tracking-wide">
                                        Hot
                                    </p>
                                </div>
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 flex justify-center items-center bg-secondary bg-opacity-85 transition-opacity">
                                    <a href="/cart" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-cart.svg " class="h-6 w-6" alt="icon cart">
                                    </a>
                                    <a href="/product" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-search.svg" class="h-6 w-6" alt="icon search">
                                    </a>
                                    <a href="/account/wishlist/" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all">
                                        <img src="/assets/img/icons/icon-heart.svg" class="h-6 w-6" alt="icon heart">
                                    </a>
                                </div>
                            </div>
                            <a href="/product" class="flex justify-between items-center pt-6">
                                <div>
                                    <h3 class="font-hk text-base text-secondary">Submarine Watch</h3>
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                        </div>
                                        <span class="font-hk text-sm text-secondary ml-2">45</span>
                                    </div>
                                </div>
                                <span class="font-hkbold text-primary text-xl">$120.0</span>
                            </a>
                        </div>
                    </div><div class="relative group glide__slide pt-16 md:pt-0 glide__slide--clone" style="width: 279px; margin-left: 0px;">
                        <div class="sm:px-5 lg:px-4">
                            <div class="relative rounded flex justify-center items-center">
                                <div class="aspect-w-1 aspect-h-1 w-full">
                                    <img src="https://source.unsplash.com/1000x640/?ack-2" alt="product image" class="object-cover">
                                </div>
                                <div class="absolute top-0 right-0 bg-white px-5 py-1 m-4 rounded-full">
                                    <p class="text-v-green font-hk font-bold text-sm uppercase tracking-wide">
                                        New
                                    </p>
                                </div>
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 flex justify-center items-center bg-secondary bg-opacity-85 transition-opacity">
                                    <a href="/cart" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-cart.svg " class="h-6 w-6" alt="icon cart">
                                    </a>
                                    <a href="/product" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all mr-3">
                                        <img src="/assets/img/icons/icon-search.svg" class="h-6 w-6" alt="icon search">
                                    </a>
                                    <a href="/account/wishlist/" class="bg-white hover:bg-primary-light rounded-full p-3 flex items-center transition-all">
                                        <img src="/assets/img/icons/icon-heart.svg" class="h-6 w-6" alt="icon heart">
                                    </a>
                                </div>
                            </div>
                            <a href="/product" class="flex justify-between items-center pt-6">
                                <div>
                                    <h3 class="font-hk text-base text-secondary">Woodie Blake</h3>
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                        </div>
                                        <span class="font-hk text-sm text-secondary ml-2">45</span>
                                    </div>
                                </div>
                                <span class="font-hkbold text-primary text-xl">$115.0</span>
                            </a>
                        </div>
                    </div></div>
            </div>

            <div data-glide-el="controls">
                <div class="transition-all shadow-md rounded-full absolute left-25 sm:left-35 md:left-0 top-0 md:top-50 transform -translate-y-1/2 bg-grey hover:bg-primary border border-grey-dark z-30 cursor-pointer group" data-glide-dir="<">
                    <div class="h-12 w-12 flex items-center justify-center">
                        <i class="bx bx-chevron-left text-primary transition-colors group-hover:text-white text-3xl leading-none"></i>
                    </div>
                </div>
                <div class="transition-all shadow-md rounded-full absolute right-25 sm:right-35 md:right-0 top-0 md:top-50 transform -translate-y-1/2 bg-grey hover:bg-primary border border-grey-dark z-30 cursor-pointer group" data-glide-dir=">">
                    <div class="h-12 w-12 flex items-center justify-center">
                        <i class="bx bx-chevron-right text-primary transition-colors group-hover:text-white text-3xl leading-none"></i>
                    </div>
                </div>
            </div>
        </div>

            </div>
        </div>

        <div class="my-16 container">
            <h1 class="mx-auto text-4xl mb-10">Related Products</h1>
            <x-product.slider :products="$relatedProducts"></x-product.slider>
        </div>

        <footer class="mt-16">
            <x-footer></x-footer>
        </footer>
    </div>

@endsection
