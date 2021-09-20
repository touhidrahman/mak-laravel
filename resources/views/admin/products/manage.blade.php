@extends('layouts.auth')

@section('content')
    <h2 class="font-semibold text-xl text-gray-600">Manage {{ $product->name }}</h2>
    <p class="text-gray-500 mb-6">Upload product pictures, add related products and so on</p>

    <form class="grid grid-cols-3 gap-8" action="/admin/products/manage" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">

        <div class="">
            <x-form.field>
                <x-form.label name=" Cover Image 1" required="true"></x-form.label>
                <input type="file" name="thumb_1" id="thumb_1" />
                <x-form.error name="thumb_1"></x-form.error>
            </x-form.field>

            <x-form.field>
                <x-form.label name="Cover Image 2" required="true"></x-form.label>
                <input type="file" name="thumb_2" id="thumb_2" />
                <x-form.error name="thumb_2"></x-form.error>
            </x-form.field>
        </div>

        <div class="col-span-2">

            <x-form.submit>Save</x-form.submit>
        </div>
    </form>

@endsection
