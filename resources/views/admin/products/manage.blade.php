@extends('layouts.admin')

@section('content')
    <header class="flex justify-between">

        <div class="overflow-hidden flex">
            <img src="{{ $product->thumb_1 }}" class="h-24 w-auto object-cover block mr-8">
            <h2 class="font-semibold text-3xl text-gray-600">{{ $product->name }}</h2>
        </div>

        <form class="" action=" {{ route('admin.products.manage', $product->id) }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">

            <div class="flex">
                <div class="w-64">
                    <x-form.select name="active" label="">
                        <option value="" disabled>Please select</option>
                        <option value="true" {{ $product->active ? 'selected' : '' }}>Active</option>
                        <option value="false" {{ !$product->active ? 'selected' : '' }}>Disabled</option>
                    </x-form.select>
                </div>

                <button type="submit" class="btn btn-secondary ml-4">Save</button>
            </div>
        </form>
    </header>

    @include('admin.products._products-toolbar')

    <section class="grid gap-8 grid-cols-4">
        {{-- stocks table --}}
        <div class="col-span-3">
            <h1 class="text-2xl font-bold mb-6">Stocks</h1>
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>SKU</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Qty</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stocks as $stock)
                            <tr>
                                <td>
                                    {{ $stock->sku }}
                                </td>
                                <td>
                                    <span class="text-xl font-bold">{{ $stock->size }}</span>
                                </td>
                                <td>
                                    {{ $stock->color->name }}
                                </td>
                                <td>
                                    @if ($stock->qty > 10)
                                        <div class="text-green-500">{{ $stock->qty }}</div>
                                    @else
                                        <div class="text-red-500">{{ $stock->qty }}</div>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-ghost" href="{{ route('admin.stocks.edit', [
                                        'product_id' => $stock->product->id,
                                        'id' => $stock->id
                                    ]) }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Create stock --}}
        <div class="">
            <h2 class=" text-2xl font-semibold mb-6">Create Stock</h2>
            <form action="{{ route('admin.stocks.store', $product->id) }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <x-form.select name="size" label="Size">
                    <option selected disabled value="">Please select</option>
                    @foreach ($sizes as $size)
                        <option value="{{ $size }}" {{ old('size') ? 'selected' : '' }}>{{ $size }}
                        </option>
                    @endforeach
                </x-form.select>
                <x-form.select name="color_id" label="Color">
                    <option selected disabled value="">Please select</option>
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}" {{ old('color_id') ? 'selected' : '' }}>
                            {{ $color->name }}
                        </option>
                    @endforeach
                </x-form.select>
                <x-form.input type="number" name="qty" label="Quantity"></x-form.input>
                <x-form.input type="text" name="sku" label="SKU"></x-form.input>

                <div class="space-x-4">
                    <button type="submit" class="btn btn-secondary">Save</button>
                    <button type="reset" class="btn btn-ghost btn-secondary">Reset</button>
                </div>
            </form>
        </div>
    </section>

@endsection
