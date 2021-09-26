@extends('layouts.base')

@section('body')

    <main class="flex flex-col sm:flex-row sm:justify-around bg-gray-100">

        <section class="flex-1 min-h-screen">


            <article class="py-8 sm:px-6 lg:px-8">
                @yield('content')

                @isset($slot)
                    {{ $slot }}
                @endisset
            </article>
        </section>
    </main>

@endsection
