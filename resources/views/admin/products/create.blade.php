@extends('layouts.admin')

@section('content')
    <h2 class="font-semibold text-xl text-gray-600">Create Product</h2>
    <p class="text-gray-500"></p>

    @include('admin.products._products-toolbar')

    <form class="grid grid-cols-3 gap-8" action="/admin/products/create" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="">
            <x-admin.category-select :categories="$categories"></x-admin.category-select>
            <x-form.input name="name" :required="true" placeholder="Product Name"></x-form.input>
            <div class="grid grid-cols-2 gap-8 max-w-xl">
                <x-form.input name="sku" :required="true" label="SKU / Product Code"></x-form.input>
            </div>
            <div class="grid grid-cols-2 gap-8 max-w-xl">
                <x-form.input name="selling_price" :required="true" label="Selling Price (Eurocent)" type="number" placeholder="10.81 = 1081"></x-form.input>
                <x-form.input name="discounted_price"  label="Discounted Price (Eurocent)" type="number"></x-form.input>
            </div>
        </div>

        <div class="">
            <x-form.textarea name="seo_text" label="Short Description (Used for SEO) *"></x-form.textarea>
            <x-form.textarea-rich name="description" label="Description *"></x-form.textarea-rich>
        </div>

        <div class="">
            <x-form.input name="brand" placeholder=""></x-form.input>
            <x-form.input name="season" placeholder=""></x-form.input>
            <x-form.input name="material" placeholder=""></x-form.input>
            <div class="grid grid-cols-2 gap-8 max-w-xl">
                <x-form.input name="dimension" label="Dimension (with unit)" placeholder="10 X 15 x 3 cm"></x-form.input>
                <x-form.input name="weight" label="Weight (with unit)" placeholder="0.4 kg"></x-form.input>
            </div>
            <x-form.input name="tags" placeholder="Tags (Comma separated)"></x-form.input>

            <x-form.submit-cancel cancelRoute="{{ route('admin.products') }}"></x-form.submit-cancel>
        </div>
    </form>

@endsection
