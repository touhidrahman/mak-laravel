@extends('layouts.auth')

@section('content')
    <h2 class="font-semibold text-3xl text-gray-600">Manage {{ $product->name }}</h2>
    <p class="text-gray-500">Manage Stocks and Product Options</p>

    @include('admin.products._products-toolbar')

    <form class="grid grid-cols-3 gap-8" action="{{ route('admin.products.manage', $product->id) }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">

        <div class="">
            <div class="w-64">
                <x-form.select name="active" label="Is Active">
                    <option value="" disabled>Please select</option>
                    @foreach ([true, false] as $item)
                    <option value="{{$item}}" {{ $product->active == $item ? 'selected' : '' }}>{{ $item ? 'Active' : 'Disabled' }}</option>
                    @endforeach
                </x-form.select>
            </div>

            <x-form.submit-cancel cancelRoute="{{ route('admin.products') }}"></x-form.submit-cancel>
        </div>
    </form>

@endsection

