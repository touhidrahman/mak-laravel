@extends('layouts.admin')

@section('content')

    <x-admin.product.header :product="$product">
        <x-admin.product.activation :product="$product"></x-admin.product.activation>
    </x-admin.product.header>

    <section class="grid gap-8 grid-cols-4">
        <div class="col-span-3">
            @include('admin.products._product-stocks')
        </div>
        <div class="col-span-1">
            @include('admin.products._stock-create')
        </div>
    </section>

@endsection
