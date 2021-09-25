@extends('layouts.admin')

@section('content')

    <h2 class="font-semibold text-xl text-gray-600">Create Category</h2>
    <p class="text-gray-500 mb-6"></p>

    <form class="lg:col-span-2" action="/admin/categories/create" method="POST">
        @csrf

        <x-form.input name="name" :required="true" placeholder="Category Name"></x-form.input>

        <x-form.submit>Save</x-form.submit>
    </form>

@endsection
