@extends('layouts.admin')

@section('content')

    <h2 class="font-semibold text-xl text-gray-600">Edit Sub-subcategory: {{ $subsubcategory->name }}</h2>
    <p class="text-gray-500 mb-6"></p>

    <form class="lg:col-span-2" action="{{ route('admin.subsubcategories.update', $subsubcategory->id) }}" method="POST">
        @csrf

        <x-form.select label="Category" name="category_id">
            <option value="" selected disabled>Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ $category->id == $subsubcategory->category?->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </x-form.select>

        <x-form.select name="subcategory_id" label="Subcategory">
            @foreach ($subcategories as $subcategory)
                <option value="{{ $subcategory->id }}"
                    {{ $subcategory->id == $subsubcategory->subcategory?->id ? 'selected' : '' }}>
                    {{ $subcategory->name }}
                </option>
            @endforeach
        </x-form.select>

        <x-form.input name="name" :required="true" value="{{ $subsubcategory->name }}" placeholder="Sub-subcategory Name">
        </x-form.input>

        <div class="space-x-4">
            <x-form.submit>Update</x-form.submit>
            <x-form.cancel route="{{ route('admin.subsubcategories') }}">Cancel</x-form.cancel>
        </div>
    </form>

@endsection
