@extends('layouts.shop')

@section('body')

    <div id="main">
        <x-navbar></x-navbar>

        <div class="flex flex-col justify-center mt-12">
            <h2 class="text-gray-400 text-xl mx-auto">Welcome, {{ auth()->user()->name }}</h2>

            <form class="mx-auto flex my-24" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-primary hover:bg-primary-light font-hk font-semibold transition-colors text-sm text-white px-5 md:px-8 py-4 md:py-5 rounded uppercase focus:outline-none inline-block tracking-wide">
                    Log out
                </button>
            </form>
        </div>
    </div>

@endsection
