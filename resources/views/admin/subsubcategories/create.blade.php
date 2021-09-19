@extends('layouts.auth')

@section('content')

    <h2 class="font-semibold text-xl text-gray-600">Create Subcategory</h2>
    <p class="text-gray-500 mb-6"></p>

    <div class="flex flex-col justify-around">
        @livewire('dropdowns', ['category' => $concert->category_id, 'subcategory' => $concert->subcategory_id])
    </div>

    <form class="lg:col-span-2" action="/admin/subsubcategories/create" method="POST">
        @csrf

        <div class="flex flex-col justify-around">
            @livewire('dropdowns')
        </div>

        <x-form.input name="name" :required="true" placeholder="Subcategory Name"></x-form.input>

        <x-form.submit>Save</x-form.submit>
    </form>

@endsection
