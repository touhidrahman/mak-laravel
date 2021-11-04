@extends('layouts.shop')

@section('content')

<main class="h-screen w-full">

    <div class="mt-12 flex align-center justify-center">
        <x-logo></x-logo>
    </div>
    <h1 class="text-2xl text-gray-400 mt-24 text-center">This page is under maintenance. Please come back later!</h1>

    <div class="mt-20 flex align-center justify-center">
        <a href="/shop">
            <x-shop.button-primary>Go back</x-shop.button-primary>
        </a>
    </div>
</main>
