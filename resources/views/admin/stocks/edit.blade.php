@extends('layouts.auth')

@section('content')
    <h2 class="font-semibold text-3xl text-gray-600">Edit Stock</h2>

    <form class="w-96 mt-12" action="{{ route('admin.stocks.update', [
            'product_id' => $stock->product->id,
            'id' => $stock->id
        ]) }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $stock->id }}">

        <x-form.select name="size" label="Size">
            <option selected disabled value="">Please select</option>
            @foreach ($sizes as $size)
                <option value="{{ $size }}" {{ $stock->size == $size ? 'selected' : '' }}>{{ $size }}
                </option>
            @endforeach
        </x-form.select>
        <x-form.select name="color_id" label="Color">
            <option selected disabled value="">Please select</option>
            @foreach ($colors as $color)
                <option value="{{ $color->id }}" {{ $stock->color->id == $color->id ? 'selected' : '' }}>
                    {{ $color->name }}
                </option>
            @endforeach
        </x-form.select>
        <x-form.input type="number" name="qty" label="Quantity" value="{{ $stock->qty }}"></x-form.input>
        <x-form.input type="text" name="sku" label="SKU" value="{{ $stock->sku }}"></x-form.input>

        <x-form.submit-cancel cancelRoute="{{ url()->previous() }}"></x-form.submit-cancel>
    </form>

@endsection
