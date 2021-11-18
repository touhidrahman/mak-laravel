@extends('layouts.admin')

@section('content')
    <x-admin.product.header :product="$product"></x-admin.product.header>

    <x-admin.section-heading class="mt-10 mb-6">Edit Product Categories</x-admin.section-heading>

    <div class="p-4 border border-solid border-gray-300 mb-12 max-w-screen-md">
        Current Categories:
        <span class="mx-4">
            {{ $product?->category?->name ?? '' }}
        </span>
        <i class="bx bx-right-arrow"></i>
        <span class="mx-4">
            {{ $product?->subcategory?->name ?? '' }}
        </span>
        <i class="bx bx-right-arrow"></i>
        <span class="mx-4">
            {{ $product?->subsubcategory?->name ?? '' }}
        </span>
    </div>

    <form class="block max-w-screen-sm" action="{{ route('admin.products.updateCategories', $product->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="">
            <x-admin.category-select :categories="$categories"></x-admin.category-select>

            <x-form.submit-cancel cancelRoute="{{ route('admin.products.manage', $product->id) }}"></x-form.submit-cancel>
        </div>
    </form>

@endsection
