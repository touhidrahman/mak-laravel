@extends('layouts.shop')

@section('body')

    <div id="main">
        <x-shop.navbar></x-shop.navbar>

        <div class="mt-12 md:flex md:flex-row flex-col container">
            <div class="lg:w-1/4 md:pr-8">
                @include('shop.account._account-sidebar')
            </div>

            <div class="lg:w-3/4 mt-12 md:mt-0">
                @yield('account-content')
            </div>
        </div>

        <div class="md:mt-12 mt-0">
            <x-footer></x-footer>
        </div>
    </div>

@endsection
