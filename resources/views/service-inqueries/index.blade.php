@extends('layouts.shop')

@section('body')

    <div id="main">
        <x-shop.navbar></x-shop.navbar>

        <div class="container">

            <x-product.new-arrival></x-product.new-arrival>

            <x-shop.feature></x-shop.feature>

            <div class="pb-20 md:pb-32">
                <x-product.slider-title>
                    Trending

                    <x-slot name="subtitle">Our trending collection!</x-slot>
                </x-product.slider-title>

                <x-product.slider :products="$trendingProducts"></x-product.slider>
            </div>
        </div>

        <x-footer></x-footer>
    </div>

@endsection
