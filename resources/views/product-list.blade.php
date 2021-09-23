@extends('layouts.shop')

@section('body')

    <div id="main">
        <x-navbar></x-navbar>

        <div class="container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
            @foreach ($products as $product)
                <x-product.card :product="$product"></x-product.card>
            @endforeach
        </div>

        <div class="mt-10 mb-16 container">
            {{ $products->links() }}
        </div>

        <x-product.slider></x-product.slider>

        <footer class="mt-16">
            <x-footer></x-footer>
        </footer>
    </div>

@endsection
