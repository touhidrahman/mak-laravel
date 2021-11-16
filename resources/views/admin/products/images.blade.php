@extends('layouts.admin')

@section('content')
<x-admin.product.header :product="$product"></x-admin.product.header>

<x-admin.section-heading class="mt-10 mb-6">Product Images</x-admin.section-heading>

    <div class="grid grid-cols-3 gap-8">
        <form class="block" action="{{ route('admin.products.uploadImages', $product->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">

            <x-form.field>
                <x-form.select name="color_id" label="Color">
                    <option class="text-gray-300" value="" selected>--(Default)--</option>
                    @foreach ($availableColors as $color)
                        <option value="{{ $color->id }}">
                            <i class="bx bx-circle mr-3" style="color: {{ $color->hex }}"></i>
                            {{ $color->name }}
                        </option>
                    @endforeach
                </x-form.select>
            </x-form.field>

            <x-form.field>
                <x-form.label name="Images (800 X 1200px, ~200 kb)" required=""></x-form.label>
                <input type="file" name="images[]" id="images" multiple />
                <x-form.error name="images"></x-form.error>
            </x-form.field>

            <x-form.submit-cancel cancelRoute="{{ route('admin.products.manage', $product->id) }}"></x-form.submit-cancel>
        </form>

        <div class="col-span-2">
            <h1 class="text-2xl  mb-8">Default Images</h1>
            <div class="grid grid-cols-6 gap-4 mb-12">
                @foreach ($images as $image)
                    @if (!$image->color_id)
                        @include('admin.products._product-image-card')
                    @endif
                @endforeach
            </div>

            @foreach ($availableColors as $availableColor)
                <h1 class="text-2xl mb-8">{{ $availableColor->name }}</h1>

                <div class="grid grid-cols-6 gap-4 mb-12">
                    @foreach ($images as $image)
                        @if ($image->color_id == $availableColor->id)
                            @include('admin.products._product-image-card')
                        @endif
                    @endforeach
                </div>

            @endforeach
        </div>
    </div>
@endsection
