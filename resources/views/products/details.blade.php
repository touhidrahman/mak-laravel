@extends('layouts.shop')

@section('body')

    <div id="main">
        <x-navbar></x-navbar>

        {{-- <div class="container py-6">
            <x-shop.breadcrumb></x-shop.breadcrumb>
        </div> --}}

        <div class="container">

            <div class="pt-16 pb-24 flex flex-col lg:flex-row justify-between -mx-5">
                {{-- gallery --}}
                <div class="lg:w-1/2 flex flex-col-reverse sm:flex-row-reverse lg:flex-row justify-between px-5"
                    x-data="{ selectedImage: '{{ $product->images[0]->path }}' }">
                    <div class="sm:pl-5 md:pl-4 lg:pl-0 lg:pr-2 xl:pr-3 flex flex-row sm:flex-col">

                        @foreach ($product->images as $image)
                            <div class="w-28 sm:w-32 lg:w-24 xl:w-28 relative pb-5 mr-3 sm:pr-0">
                                <div
                                    class="bg-v-pink border border-grey relative rounded flex items-center justify-center w-full">
                                    <img class="cursor-pointer object-cover" @click="selectedImage = $event.target.src"
                                    x-bind:class="selectedImage == '{{$image->path}}' ? 'border-primary border-2 border-solid' : ''"
                                        alt="product image" src="{{ $image->path }}">
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="w-full relative pb-5 sm:pb-0">
                        <div
                            class="bg-v-pink border border-grey relative rounded flex items-center justify-center aspect-w-1 aspect-h-1">
                            <img class="object-cover" alt="product image" :src="selectedImage"
                                src="{{ $product->images[0]->path }}">
                        </div>
                    </div>
                </div>
                {{-- end gallery --}}

                {{-- product details --}}
                <form action="{{ route('add-to-cart') }}" method="POST" class="lg:w-1/2 pt-8 lg:pt-0 px-5 block">
                    @csrf
                    <div class="border-b border-grey-dark mb-8">
                        <div class="flex items-center">
                            <h2 class=" font-butler text-3xl md:text-4xl lg:text-4.5xl">{{ $product->name }}</h2>
                            <p
                                class="bg-primary rounded-full ml-8 px-5 py-2 leading-none font-hk font-bold text-white uppercase text-sm">
                                20% off</p>
                        </div>
                        <div class="flex items-center pt-3">
                            <span class="font-hk text-secondary text-2xl">€{{ $product->selling_price / 100 }}</span>
                            <span class="font-hk text-grey-darker text-xl line-through pl-5">€35.0</span>
                        </div>
                    </div>

                    <p class="font-hk text-secondary pb-5">
                        {{ $product->seo_text }}
                    </p>

                    <div class="flex justify-between pb-4">
                        <div class="w-1/3 sm:w-1/5">
                            <p class="font-hk text-secondary">Color</p>
                        </div>
                        <div x-data="{ selected_color_id: '' }" class="w-2/3 sm:w-5/6 flex items-center">
                            @foreach ($available_colors as $color)
                                <i @click="selected_color_id = '{{ $color->id }}'"
                                    class="bx bxs-circle text-3xl rounded-full mr-4 border-2 border-transparent hover:border-black transition-colors cursor-pointer"
                                    x-bind:class="selected_color_id == '{{ $color->id }}' ? 'border-primary' : ''"
                                    style="color: {{ $color->hex }}"></i>
                            @endforeach

                            <input x-model="selected_color_id" type="hidden" name="selected_color_id" name="selected_color_id" value="">
                            <input type="hidden" name="product_id" name="product_id" value="{{ $product->id }}">
                        </div>
                    </div>

                    <div class="flex items-center justify-between pb-4">
                        <div class="w-1/3 sm:w-1/5">
                            <p class="font-hk text-secondary">Size</p>
                        </div>
                        <div class="w-2/3 sm:w-5/6">
                            <select id="selected_size" name="selected_size" class="w-2/3 form-select">
                                @foreach ($available_sizes as $size)
                                    <option value="{{ $size }}">{{ $size }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center justify-between pb-8">
                        <div class="w-1/3 sm:w-1/5">
                            <p class="font-hk text-secondary">Quantity</p>
                        </div>
                        <div class="w-2/3 sm:w-5/6 flex" x-data="{ productQuantity: 1 }">
                            <label for="quantity-form" class="block relative h-0 w-0 overflow-hidden">Quantity form</label>
                            <input type="number" id="quantity-form"
                                class="form-input form-quantity rounded-r-none w-16 py-0 px-2 text-center"
                                x-model="productQuantity" min="1">
                            <div class="flex flex-col">
                                <span
                                    class="px-1 bg-white border border-l-0 border-grey-darker flex-1 rounded-tr cursor-pointer"
                                    @click="productQuantity++">
                                    <i class="bx bxs-up-arrow text-xs text-primary pointer-events-none"></i>
                                </span>
                                <span
                                    class="px-1 bg-white flex-1 border border-t-0 border-l-0 rounded-br border-grey-darker cursor-pointer"
                                    @click="productQuantity > 1 ? productQuantity-- : productQuantity = 1">
                                    <i class="bx bxs-down-arrow text-xs text-primary pointer-events-none"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="flex pb-8 group">
                        <button
                            type="submit"
                            class="bg-primary hover:bg-primary-light font-hk font-semibold transition-colors text-sm text-white px-5 md:px-8 py-4 md:py-5 rounded uppercase focus:outline-none inline-block tracking-wide">
                            Add to Cart
                        </button>
                    </div>

                    @if ($product->material)
                        <div class="flex pb-2">
                            <p class="font-hk text-secondary">Material:</p>
                            <p class="font-hkbold text-secondary pl-3">{{ $product->material }}</p>
                        </div>
                    @endif
                    @if ($product->code)
                        <div class="flex pb-2">
                            <p class="font-hk text-secondary">SKU:</p>
                            <p class="font-hkbold text-secondary pl-3">{{ $product->code }}</p>
                        </div>
                    @endif
                </form>
                {{-- end product details --}}
            </div>

            <div class="pb-16 sm:pb-20 md:pb-24">
                <div class="tabs flex flex-col sm:flex-row" role="tablist">

                    <span
                        class="tab-item active bg-white hover:bg-grey-light px-10 py-5 text-center sm:text-left border-t-2 border-transparent font-hk font-bold text-secondary cursor-pointer transition-colors active"
                        >
                        Description
                    </span>

                </div>
                <div class="tab-content relative">
                    <div class="tab-pane active bg-grey-light py-10 md:py-16 transition-opacity active" role="tabpanel">
                        <div class="w-5/6 mx-auto text-center sm:text-left">
                            <div class="font-hk text-secondary text-base">
                                {{ $product->description }}
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

        <style>

        </style>
    </div>

@endsection
