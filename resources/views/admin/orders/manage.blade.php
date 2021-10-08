@extends('layouts.admin')

@section('content')
    <header class="flex justify-between">
        <h2 class="font-semibold text-3xl text-gray-600">
            <a href="{{ url()->previous() }}" class="mr-8">
                <i class="bx bx-arrow-back"></i>
            </a>
            Order {{ $order->id }}
        </h2>
        <span class="badge {{ $order->status == 'CREATED' ? 'badge-success' : 'badge-info' }}">{{ $order->status }}</span>
    </header>

    <div class="my-8">
        <h3 class="font-semibold text-lg">Shipping Address</h3>
        <div class="grid grid-cols-2 gap-8">
            <div class="grid gap-4 grid-cols-4">
                <div>To</div>
                <div class="col-span-3">
                    <div>{{ $order->user->name }}</div>
                </div>

                <div>Address</div>
                <div class="col-span-3">
                    <div>{{ $order->user->street .' '. $order->user->house_no }}</div>
                    <div>{{ $order->user->zipcode .' '. $order->user->city }}</div>
                    <div>{{ ($order->user->state ? $order->user->state .', ' : ''). $order->user->country }}</div>
                </div>

                <div>Contact</div>
                <div class="col-span-3">
                    <div>{{ $order->user->phone }}</div>
                    <div>{{ $order->user->email }}</div>
                </div>
            </div>

            <div class="grid gap-4 grid-cols-4">
                <div>Total Price</div>
                <div class="col-span-3">
                    <div>{{ $order->priceFormatted }}</div>
                </div>

                <div>Order Created</div>
                <div class="col-span-3">
                    <div>{{ $order->created_at . ' (' . $order->created_at->diffForHumans() . ')' }}</div>
                </div>

                <div>Dispatched at</div>
                <div class="col-span-3">
                    <div>{{ $order->dispatched_at }}</div>
                </div>

                <div>Delivered at</div>
                <div class="col-span-3">
                    <div>{{ $order->delivered_at }}</div>
                </div>
            </div>
        </div>
    </div>

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
                            <th>Order Qty</th>
                            <th>Inventory</th>
                            <th>Picked Qty</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderItems as $orderItem)
                            <tr>
                                <td>{{$orderItem->product->name}}</td>
                                <td>{{$orderItem->stock?->sku}}</td>
                                <td>{{$orderItem->stock?->size}}</td>
                                <td>{{$orderItem->stock?->color->name}}</td>
                                <td>{{$orderItem->qty}}</td>
                                <td>{{$orderItem->stock?->qty}}</td>
                                <td>{{$orderItem->picked_qty == 0 ? '' : $orderItem->picked_qty}}</td>
                                <td>
                                    @if ($orderItem->picked_qty == 0)
                                    <form method="POST" action="{{route('admin.orders.pick', ['id' => $order->id, 'orderItemId' => $orderItem->id])  }}">
                                        @csrf
                                        <button type="submit" class="btn btn-secondary btn-xs">Pick</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="">
            <h2 class=" text-2xl font-semibold mb-6">Status</h2>
            <form action="{{ route('admin.orders.change-status', $order->id) }}" method="POST">
                @csrf
                <x-form.select name="status" label="Order Status">
                    <option value="">(Select)</option>
                    @foreach (['PROCESSING', 'DISPATCHED', 'DELIVERED'] as $statusLabel)
                    <option value="{{ $statusLabel }}" {{ $order->status ==  $statusLabel ? 'selected' : '' }}>{{$statusLabel}}</option>
                    @endforeach
                </x-form.select>

                <x-form.input name="shipping_carrier" label="Shipping Carrier" value="{{$order->shipping_carrier}}"></x-form.input>
                <x-form.input name="shipping_tracking" label="Tracking No" value="{{$order->shipping_tracking}}"></x-form.input>

                <div class="space-x-4">
                    <button type="submit" class="btn btn-secondary">Save</button>
                </div>
            </form>

        </div>
    </section>

@endsection
