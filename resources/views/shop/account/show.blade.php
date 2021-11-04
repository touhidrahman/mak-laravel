@extends('shop.account._account-layout')

@section('account-content')

    <div class="bg-grey-light py-8 px-5 md:px-8">
        <h1 class="font-hkbold text-secondary text-2xl pb-6 text-center sm:text-left">Order {{ $order->id }}</h1>
        <div class="bg-green-100 text-green-400 rounded-full py-2 px-4">
            {{ $order->status }}
        </div>

        <div class="mt-8 mb-16">
            <h3 class="font-semibold text-lg mb-8">Shipping Address</h3>
            <div class="grid grid-cols-2 gap-8">
                <div class="grid gap-4 grid-cols-4">
                    <div class="text-gray-500">To</div>
                    <div class="col-span-3">
                        <div>{{ $order->user->name }}</div>
                    </div>

                    <div class="text-gray-500">Address</div>
                    <div class="col-span-3">
                        <div>{{ $order->user->street . ' ' . $order->user->house_no }}</div>
                        <div>{{ $order->user->zipcode . ' ' . $order->user->city }}</div>
                        <div>{{ ($order->user->state ? $order->user->state . ', ' : '') . $order->user->country }}</div>
                    </div>

                    <div class="text-gray-500">Contact</div>
                    <div class="col-span-3">
                        <div>{{ $order->user->phone }}</div>
                        <div>{{ $order->user->email }}</div>
                    </div>
                </div>

                <div class="grid gap-4 grid-cols-4">
                    <div class="text-gray-500">Total Price</div>
                    <div class="col-span-3">
                        <div>{{ $order->priceFormatted }}</div>
                    </div>

                    <div class="text-gray-500">Order Created</div>
                    <div class="col-span-3">
                        <div>{{ $order->created_at . ' (' . $order->created_at->diffForHumans() . ')' }}</div>
                    </div>

                    <div class="text-gray-500">Dispatched at</div>
                    <div class="col-span-3">
                        <div>{{ $order->dispatched_at }}</div>
                    </div>

                    <div class="text-gray-500">Delivered at</div>
                    <div class="col-span-3">
                        <div>{{ $order->delivered_at }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden sm:block">
            <div class="flex justify-between pb-3">
                <div class="w-1/3 md:w-2/5 pl-4">
                    <span class="font-hkbold text-secondary text-sm uppercase">Product</span>
                </div>
                <div class="w-1/4 xl:w-1/5 text-center">
                    <span class="font-hkbold text-secondary text-sm uppercase">Quantity</span>
                </div>
                <div class="w-1/6 md:w-1/5 text-center mr-3">
                    <span class="font-hkbold text-secondary text-sm uppercase">Unit Price</span>
                </div>
                <div class="w-3/10 md:w-1/5 text-right">
                    <span class="font-hkbold text-secondary text-sm uppercase">Subtotal</span>
                </div>
            </div>
        </div>

        @foreach ($orderItems as $orderItem)
            <div
                class="bg-white shadow px-4 py-5 sm:py-4 rounded mb-3 flex flex-col sm:flex-row justify-between items-center">

                <div
                    class="w-full sm:w-1/3 md:w-2/5 flex flex-col md:flex-row md:items-center border-b sm:border-b-0 border-grey-dark pb-4 sm:pb-0 text-center sm:text-left">
                    <span class="font-hkbold text-secondary text-sm uppercase text-center pb-2 block sm:hidden">
                        Product
                        <br>
                        <span class="text-sm text-gray-400">Size: {{ $orderItem->stock?->size }}, Color: {{ $orderItem->stock?->color->name }}</span>
                    </span>
                    <div class="w-20 mx-auto sm:mx-0 relative sm:mr-3 sm:pr-0">
                        <div class="aspect-w-1 aspect-h-1 w-full">
                            <img src="{{ $orderItem->product->thumb_1 }}" alt="product image" class="object-cover" />
                        </div>
                    </div>
                    <span class="font-hk text-secondary text-base mt-2">{{ $orderItem->product->name }}</span>
                </div>

                <div class="w-full sm:w-1/5 text-center border-b sm:border-b-0 border-grey-dark pb-4 sm:pb-0">
                    <span
                        class="font-hkbold text-secondary text-sm uppercase text-center pt-3 pb-2 block sm:hidden">Quantity</span>
                    <span class="font-hk text-secondary">{{ $orderItem->qty }}</span>
                </div>

                <div
                    class="w-full sm:w-1/6 xl:w-1/5 text-center sm:text-right sm:pr-6 xl:pr-16 border-b sm:border-b-0 border-grey-dark pb-4 sm:pb-0">
                    <span class="font-hkbold text-secondary text-sm uppercase text-center pt-3 pb-2 block sm:hidden">Unit
                        Price</span>
                    <span class="font-hk text-secondary">{{ $orderItem->unit_price_formatted }}</span>
                </div>

                <div class="w-full sm:w-3/10 md:w-1/4 xl:w-1/5 text-center sm:text-right">
                    <div class="pt-3 sm:pt-0">
                        <p class="font-hkbold text-secondary text-sm uppercase text-center pb-2 block sm:hidden">Subtotal
                        </p>
                        <span
                            class="text-primary">
                            {{ $orderItem->subtotal_price_formatted }}
                        </span>
                    </div>
                </div>

            </div>
        @endforeach

    </div>

@endsection
