@extends('layouts.admin')

@section('content')
    <header class="flex justify-between">
        <h2 class="font-semibold text-3xl text-gray-600">Order {{ $order->id }}</h2>
    </header>

    <div class="my-8"></div>

    <section class="grid gap-8 grid-cols-4">
        <div class="col-span-3">
            <h1 class="text-2xl font-bold mb-6">Order Items</h1>
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>SKU</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Qty</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderItems as $orderItem)
                            <tr>
                                <td>{{$orderItem->product->name}}</td>
                                <td>{{$orderItem->sku}}</td>
                                <td>{{$orderItem->size}}</td>
                                <td>{{$orderItem->color?->name}}</td>
                                <td>{{$orderItem->qty}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="">
            <h2 class=" text-2xl font-semibold mb-6">Status</h2>
            <form action="{{ route('admin.stocks.store', $order->id) }}" method="POST">
                @csrf

                <div class="space-x-4">
                    <button type="submit" class="btn btn-secondary">Save</button>
                    <button type="reset" class="btn btn-ghost btn-secondary">Reset</button>
                </div>
            </form>
        </div>
    </section>

@endsection
