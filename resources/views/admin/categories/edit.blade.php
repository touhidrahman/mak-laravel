@extends('layouts.auth')

@section('content')

    <x-admin.section-heading>
        Edit Category: {{ $category->name }}
    </x-admin.section-heading>
    <p class="text-gray-500 mb-6">

    </p>

    <form class="lg:col-span-2" action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{ $category->id }}">

        <x-form.input name="name" :required="true" value="{{ $category->name }}" placeholder="Category Name">
        </x-form.input>

        <div class="space-x-4">
            <x-form.submit>Update</x-form.submit>
            <x-form.cancel route="{{ route('admin.categories') }}">Cancel</x-form.cancel>
        </div>
    </form>

@endsection
