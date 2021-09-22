@extends('layouts.shop')

@section('body')

    <div id="main">
        <x-navbar></x-navbar>


        <x-product.slider></x-product.slider>

        <footer class="mt-16">
            <x-footer></x-footer>
        </footer>
    </div>

@endsection
