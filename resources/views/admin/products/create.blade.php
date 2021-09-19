@extends('layouts.auth')

@section('content')
    <h2 class="font-semibold text-xl text-gray-600">Create Product</h2>
    <p class="text-gray-500 mb-6"></p>

    <form class="grid grid-cols-3 gap-8" action="/admin/products/create" method="POST">
        @csrf

        <div class="">
            <x-admin.category-select :categories=" $categories">
            </x-admin.category-select>
            <x-form.input name="name" :required="true" placeholder="Product Name"></x-form.input>
            <x-form.input name="brand" placeholder=""></x-form.input>
            <x-form.input name="season" placeholder=""></x-form.input>
            <x-form.input name="material" placeholder=""></x-form.input>
            <x-form.input name="code" label="Product Code"></x-form.input>
            <x-form.input name="qty" label="Quantity"></x-form.input>
            <x-form.input name="tags" placeholder=""></x-form.input>
            <x-form.select name="size" label="Size">
                <option value="" selected disabled>Select size</option>
                <option value="XS">XS</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
            </x-form.select>
            <x-form.select name="color_id" label="Color">
                <option value="" selected disabled>Select color</option>
                @foreach ($colors as $color)
                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                @endforeach
            </x-form.select>
        </div>

        <div class="col-span-2">
            <x-form.textarea name="seo_text" label="Search engine description (Short)"></x-form.textarea>
            <x-form.textarea name="description"></x-form.textarea>

            <x-form.submit>Save</x-form.submit>
        </div>
    </form>

@endsection
