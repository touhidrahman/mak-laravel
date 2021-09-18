@extends('layouts.auth')

@section('content')

    <h2 class="font-semibold text-xl text-gray-600">Edit Subcategory: {{ $subcategory->name }}</h2>
    <p class="text-gray-500 mb-6"></p>

    <form class="lg:col-span-2" action="{{ route('admin.subcategories.update', $subcategory->id) }}" method="POST">
        @csrf

        <x-form.select name="category_id" label="Category">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ $category->id == $subcategory->category?->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </x-form.select>

        <x-form.input name="name" :required="true" value="{{ $subcategory->name }}" placeholder="Subcategory Name">
        </x-form.input>

        <div class="space-x-4">
            <x-form.submit>Update</x-form.submit>
            <x-form.cancel route="{{ route('admin.subcategories') }}">Cancel</x-form.cancel>
        </div>
    </form>

@endsection
