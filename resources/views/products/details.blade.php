@extends('layouts.shop')

@section('body')

    <div id="main">
        <x-navbar></x-navbar>

        {{-- <div class="container py-6">
            <x-shop.breadcrumb></x-shop.breadcrumb>
        </div> --}}

        <div class="container">

            <div class="pt-16 pb-24 flex flex-col lg:flex-row justify-between -mx-5">
                @include('products._gallery2')

                @include('products._details')
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
