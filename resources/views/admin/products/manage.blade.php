@extends('layouts.admin')

@section('content')

    <x-admin.product.header :product="$product">
        <x-admin.product.activation :product="$product"></x-admin.product.activation>
    </x-admin.product.header>

    <section class="grid gap-8 grid-cols-4">
        <div class="col-span-3">
            <x-admin.section-heading class="mt-10 mb-6">Manage Stocks</x-admin.section-heading>

            @include('admin.products._product-stocks')
        </div>

        <div class="col-span-1">
            <x-admin.section-heading class="mt-10 mb-6">Create Stock</x-admin.section-heading>

            @include('admin.products._stock-create')
        </div>
    </section>

@endsection
