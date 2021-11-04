@extends('layouts.shop')

@section('body')

    <main id="main">
        <x-shop.navbar></x-shop.navbar>

        <section class="container mt-8 lg:mt-16 mb-24">

            <div class="flex flex-col lg:flex-row justify-between pb-16 sm:pb-10 lg:pb-24">
                <div class="lg:w-3/5">
                    @include('shop.cart._cart-items')
                </div>

                <div class="sm:w-2/3 md:w-full lg:w-1/3 mx-auto lg:mx-0 mt-16 lg:mt-0">
                    @include('shop.cart._checkout-sidebar')
                </div>
            </div>

        </section>

        <x-footer></x-footer>
    </main>
@endsection
