@extends('layouts.auth')

@section('content')
    <h2 class="font-semibold text-xl text-gray-600">Create Product</h2>
    <p class="text-gray-500 mb-6"></p>

    <form class="grid grid-cols-3 gap-8" action="/admin/products/create" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="">
            <x-admin.category-select :categories=" $categories"></x-admin.category-select>
            <x-form.input name="name" :required="true" placeholder="Product Name"></x-form.input>
            <x-form.input name="brand" placeholder=""></x-form.input>
            <x-form.input name="season" placeholder=""></x-form.input>
            <x-form.input name="material" placeholder=""></x-form.input>
            <x-form.input name="code" label="Product Code"></x-form.input>
        </div>

        <div class="col-span-2">
            <div class="grid grid-cols-2 gap-8 max-w-xl">
                <x-form.input name="selling_price" label="Selling Price (Eurocent)" type="number"></x-form.input>
                <x-form.input name="discounted_price" label="Discounted Price (Eurocent)" type="number"></x-form.input>
            </div>
            <x-form.textarea name="seo_text" label="Search engine description (Short)"></x-form.textarea>
            <x-form.textarea name="description"></x-form.textarea>
            <x-form.input name="tags" placeholder=""></x-form.input>

            <x-form.submit-cancel cancelRoute="{{ route('admin.products') }}"></x-form.submit-cancel>
        </div>
    </form>

@endsection
