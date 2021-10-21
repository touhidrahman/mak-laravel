@extends('layouts.admin')

@section('content')
    <header class="flex justify-between">

        <div class="overflow-hidden flex">
            <img src="{{ $product->thumb_1 }}" class="h-24 w-auto object-cover block mr-8">
            <h2 class="font-semibold text-3xl text-gray-600">{{ $product->name }}</h2>
            <a href="{{route('product.details', $product->slug)}}" target="_blank" class="ml-4">
                <i class="bx bx-link-external text-2xl"></i>
            </a>
        </div>

        <div class="flex">
            <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-primary mr-4">Edit</a>

            <form class="flex" action=" {{ route('admin.products.manage', $product->id) }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
                <x-form.select name="active" label="">
                    <option value="" disabled>Please select</option>
                    <option value="true" {{ $product->active ? 'selected' : '' }}>Active</option>
                    <option value="false" {{ !$product->active ? 'selected' : '' }}>Disabled</option>
                </x-form.select>
                <button type="submit" class="btn btn-secondary ml-4">Save</button>
            </form>
        </div>

    </header>

    @include('admin.products._products-toolbar')
    @include('admin.products._product-images-toolbar')

    <section class="grid gap-8 grid-cols-4">
        @include('admin.products._product-stocks')
        @include('admin.products._stock-create')
    </section>

@endsection
