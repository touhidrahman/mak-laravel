@extends('layouts.auth')

@section('content')
    <h2 class="font-semibold text-xl text-gray-600">Create Product</h2>
    <p class="text-gray-500 mb-6"></p>

    <form class="lg:col-span-2" action="/admin/products/create" method="POST">
        @csrf

        <div class="flex flex-col max-w-xl mb-4">
            <label for="" class="text-gray-700 ">
                Name
            </label>
            <input type="text" name="name" placeholder="Product name" />
        </div>

        <div class="flex flex-col max-w-xl mb-4">
            <label for="" class="text-gray-700 ">
                Brand
            </label>
            <input type="text" name="name" placeholder="Product name" />
        </div>

        <div class="flex flex-col max-w-xl mb-4">
            <label for="" class="text-gray-700 ">
                Season
            </label>
            <input type="text" name="name" placeholder="Product name" />
        </div>

        <div class="flex flex-col max-w-xl mb-4">
            <label for="" class="text-gray-700 ">
                Material
            </label>
            <input type="text" name="name" placeholder="Product name" />
        </div>

        <div class="flex flex-col max-w-xl mb-4">
            <label for="" class="text-gray-700 ">
                Product Code
            </label>
            <input type="text" name="name" placeholder="Product name" />
        </div>

        <div class="flex flex-col max-w-xl mb-4">
            <label for="" class="text-gray-700 ">
                Tags
            </label>
            <input type="text" name="name" placeholder="Product name" />
        </div>

        <div class="flex flex-col max-w-xl mb-4">
            <label for="" class="text-gray-700 ">
                Size
            </label>
            <input type="text" name="name" placeholder="Product name" />
        </div>

        <div class="flex flex-col max-w-xl mb-4">
            <label for="" class="text-gray-700 ">
                Color
            </label>
            <input type="text" name="name" placeholder="Product name" />
        </div>


        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white">Save</button>
    </form>

@endsection
