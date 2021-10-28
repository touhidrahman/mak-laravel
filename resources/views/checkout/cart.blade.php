@extends('layouts.shop')

@section('body')

    <main id="main">
        <x-shop.navbar></x-shop.navbar>

        <section class="container mt-8 lg:mt-16 mb-24">

            <div class="flex flex-col lg:flex-row justify-between pb-16 sm:pb-10 lg:pb-24">

                @include('checkout._cart-items')

                @include('checkout._checkout-sidebar')

            </div>

        </section>

        <x-footer></x-footer>
    </main>
@endsection
