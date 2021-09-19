@extends('layouts.auth')

@section('content')
    <h2 class="font-semibold text-xl text-gray-600">Create Product</h2>
    <p class="text-gray-500 mb-6"></p>

    <form class="lg:col-span-2" action="/admin/products/create" method="POST">
        @csrf

        <x-admin.category-select :categories="$categories"></x-admin.category-select>

        <x-form.input name="name" :required="true" placeholder="Product Name"></x-form.input>
        <x-form.input name="brand" placeholder=""></x-form.input>
        <x-form.input name="season" placeholder=""></x-form.input>
        <x-form.input name="material" placeholder=""></x-form.input>
        <x-form.input name="product code" placeholder=""></x-form.input>
        <x-form.input name="tags" placeholder=""></x-form.input>

        <div class="flex flex-col max-w-xl mb-4">
            <label for="" class="text-gray-700 ">
                Size
            </label>
            <input type="text" name="name" placeholder="Product name" />
        </div>

        <div class="flex flex-col max-w-xl mb-4">
            <label for="" class="text-gray-700 ">
                Color
            </label>
            <input type="text" name="name" placeholder="Product name" />
        </div>

        <x-form.submit>Save</x-form.submit>
    </form>

@endsection
