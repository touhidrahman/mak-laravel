@extends('layouts.shop')

@section('body')

    <main id="main">
        <x-navbar></x-navbar>

        <section class="container mt-16 mb-24">
            @include('checkout._cart-items')
        </section>

        <x-footer></x-footer>
    </main>
@endsection
