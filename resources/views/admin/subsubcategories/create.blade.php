@extends('layouts.auth')

@section('content')

    <h2 class="font-semibold text-xl text-gray-600">Create Subcategory</h2>
    <p class="text-gray-500 mb-6"></p>


    <form class="lg:col-span-2" action="{{ route('admin.subsubcategories.store') }}" method="POST">
        @csrf

        <x-form.select label="Category" name="category_id">
            <option value="" selected disabled>Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </x-form.select>

        <x-form.select label="Subcategory" name="subcategory_id">
            <option value="" selected disabled>Select Subcategory</option>
        </x-form.select>

        <x-form.input name="name" :required="true" placeholder="Sub-subcategory Name"></x-form.input>

        <div class="space-x-4">
            <x-form.submit>Save</x-form.submit>
            <x-form.cancel route="{{ route('admin.subsubcategories') }}">Cancel</x-form.cancel>
        </div>
    </form>

@endsection
