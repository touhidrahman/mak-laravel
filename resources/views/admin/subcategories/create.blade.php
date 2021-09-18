@extends('layouts.auth')

@section('content')

    <h2 class="font-semibold text-xl text-gray-600">Create Subcategory</h2>
    <p class="text-gray-500 mb-6"></p>

    <form class="lg:col-span-2" action="/admin/subcategories/create" method="POST">
        @csrf

        <x-form.select name="category_id" label="Category">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </x-form.select>
        <x-form.input name="name" :required="true" placeholder="Subcategory Name"></x-form.input>

        <x-form.submit>Save</x-form.submit>
    </form>

@endsection
