@extends('layouts.admin')

@section('content')
    <div class="flex justify-between">
        <div class="overflow-hidden flex">
            <img src="{{ $product->thumb_1 }}" class="h-24 w-auto object-cover block mr-8">
            <h2 class="font-semibold text-3xl text-gray-600">Edit {{ $product->name }}</h2>
        </div>
        <button @click="showModal = true" class="btn btn-outline btn-error mr-4">Delete</button>
        <x-modal.delete title="Delete Product {{ $product->name }}?"
            actionRoute="{{ route('admin.products.delete', $product->id) }}">
        </x-modal.delete>
    </div>

    <form class="grid grid-cols-3 gap-8 mt-12" action="{{ route('admin.products.update', $product->id) }}" method="POST">
        @csrf

        <div class="">
            <x-form.input name="name" :required="true" placeholder="Product Name" value="{{$product->name}}"></x-form.input>
            {{-- <div class="grid grid-cols-2 gap-8 max-w-xl">
                <x-form.input name="sku" :required="true" label="SKU / Product Code" value="{{$product->sku}}"></x-form.input>
            </div> --}}
            <div class="grid grid-cols-2 gap-8 max-w-xl">
                <x-form.input name="selling_price" :required="true" value="{{$product->selling_price}}" label="Selling Price (Eurocent)" type="number"
                    placeholder="10.81 = 1081"></x-form.input>
                <x-form.input name="discounted_price" value="{{$product->discounted_price}}" label="Discounted Price (Eurocent)" type="number"></x-form.input>
            </div>
        </div>

        <div class="">
            <x-form.textarea name="seo_text" label="Short Description (Used for SEO) *">{{$product->seo_text}}</x-form.textarea>
            <x-form.textarea-rich name="description" label="Description *">{{$product->description}}</x-form.textarea-rich>
        </div>

        <div class="">
            <x-form.input name="brand" placeholder="" value="{{$product->brand}}"></x-form.input>
            <x-form.input name="season" placeholder="" value="{{$product->season}}"></x-form.input>
            <x-form.input name="material" placeholder="" value="{{$product->material}}"></x-form.input>
            <div class="grid grid-cols-2 gap-8 max-w-xl">
                <x-form.input name="dimension" value="{{$product->dimension}}" label="Dimension (with unit)" placeholder="10 X 15 x 3 cm"></x-form.input>
                <x-form.input name="weight" value="{{$product->weight}}" label="Weight (with unit)" placeholder="0.4 kg"></x-form.input>
            </div>
            <x-form.input name="tags" value="{{$product->tags}}" placeholder="Tags (Comma separated)"></x-form.input>

            <x-form.submit-cancel cancelRoute="{{ route('admin.products') }}"></x-form.submit-cancel>
        </div>
    </form>

@endsection
