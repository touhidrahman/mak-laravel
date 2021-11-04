{{-- DESKTOP --}}
<div class="sm:pt-10 hidden sm:block">
    <h1 class="font-hkbold text-secondary text-2xl pb-3 text-center sm:text-left">Cart Items</h1>

    <div class="pt-8">
        <div class="flex justify-between border-b border-grey-darker">
            <div class="w-1/2 lg:w-3/5 xl:w-1/2 pl-8 sm:pl-12 pb-2">
                <span class="font-hkbold text-secondary text-sm uppercase">Product Name</span>
            </div>
            <div class="w-1/4 sm:w-1/6 lg:w-1/5 xl:w-1/4 pb-2 text-right sm:mr-2 md:mr-18 lg:mr-12 xl:mr-18">
                <span class="font-hkbold text-secondary text-sm uppercase">Quantity</span>
            </div>
            <div class="w-1/4 lg:w-1/5 xl:w-1/4 pb-2 text-right md:pr-10">
                <span class="font-hkbold text-secondary text-sm uppercase">Price</span>
            </div>
        </div>

        @foreach ($cart->cartItems as $cartItem)
            <div class="py-3 border-b border-grey-dark flex justify-between items-center mb-0 md:flex-row">
                <x-cart.delete-button :cart="$cart" :cartItem="$cartItem"></x-cart.delete-button>
                <div
                    class="w-1/2 lg:w-3/5 xl:w-1/2 flex flex-row items-center border-b-0 border-grey-dark pt-0 pb-0 text-left">
                    <div class="w-20 mx-0 relative pr-0">
                        <div class="h-20 rounded flex items-center justify-center">
                            <div class="aspect-w-1 aspect-h-1 w-full">
                                <img src="{{ $cartItem->product->thumb_1 }}" alt="product image"
                                    class="object-cover" />
                            </div>
                        </div>
                    </div>
                    <div class="font-hk text-secondary text-base mt-2 ml-4">
                        {{ $cartItem->product->name }}
                        <div class="text-gray-300">
                            Color: {{ $cartItem->color->name }} | Size: {{ $cartItem->size }}
                        </div>
                        <div class="text-gray-300">
                            Unit Price: €{{ $cartItem->unit_price / 100 }}
                        </div>
                    </div>
                </div>
                <div class="w-full sm:w-1/5 xl:w-1/4 text-center border-b-0 border-grey-dark pb-0">
                    <div class="mx-auto mr-8 xl:mr-4">
                        <div class="flex justify-center">
                            <form
                                action="{{ route('cart.items.reduce', ['id' => $cart->id, 'cartItemId' => $cartItem->id]) }}"
                                method="POST">
                                @csrf
                                <button type="submit"
                                    class="px-3 py-1 hover:bg-primary hover:text-white border-primary border-solid bg-transparent border rounded-md text-primary">
                                    -
                                </button>
                            </form>
                            <div class="inline-flex justify-center align-center px-8">{{ $cartItem->qty }}</div>
                            <form
                                action="{{ route('cart.items.increase', ['id' => $cart->id, 'cartItemId' => $cartItem->id]) }}"
                                method="POST">
                                @csrf
                                <button type="submit"
                                    class="px-3 py-1 hover:bg-primary hover:text-white border-primary border-solid bg-transparent border rounded-md text-primary">
                                    +
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="w-1/4 lg:w-1/5 xl:w-1/4 text-right pr-10 xl:pr-10 pb-4">
                    <span class="font-hk text-secondary">
                        €{{ ($cartItem->unit_price * $cartItem->qty) / 100 }}
                    </span>
                </div>
            </div>
        @endforeach

    </div>
</div>

{{-- MOBILE --}}
<div class="sm:hidden">
    <h1 class="font-hkbold text-secondary text-2xl pb-8 text-center sm:text-left">Cart Items</h1>

    @foreach ($cart->cartItems as $cartItem)
        <div class="bg-white p-6 shadow-md border border-gray-200 rounded-md max-w-sm">
            <h5 class="text-gray-900 font-bold text-lg tracking-tight mb-2">{{ $cartItem->product->name }}</h5>

            <div class="font-normal text-gray-400 mb-3 flex">
                <x-cart.delete-button :cart="$cart" :cartItem="$cartItem"></x-cart.delete-button>

                <div class="h-16 overflow-hidden">
                    <img src="{{ $cartItem->product->thumb_1 }}" alt="product image"
                        class="object-cover h-16 w-auto mr-4" />
                </div>
                <div class="flex-1 text-sm">
                    Color: {{ $cartItem->color->name }}<br>
                    Size: {{ $cartItem->size }}<br>
                    Unit Price: €{{ $cartItem->unit_price / 100 }}
                </div>
            </div>

            <div class="flex justify-between align-end mt-4">
                <div class="flex justify-center">
                    <form
                        action="{{ route('cart.items.reduce', ['id' => $cart->id, 'cartItemId' => $cartItem->id]) }}"
                        method="POST">
                        @csrf
                        <button type="submit"
                            class="px-3 py-1 hover:bg-primary hover:text-white border-primary border-solid bg-transparent border rounded-md text-primary">
                            -
                        </button>
                    </form>
                    <div class="inline-flex justify-center align-center px-8">{{ $cartItem->qty }}</div>
                    <form
                        action="{{ route('cart.items.increase', ['id' => $cart->id, 'cartItemId' => $cartItem->id]) }}"
                        method="POST">
                        @csrf
                        <button type="submit"
                            class="px-3 py-1 hover:bg-primary hover:text-white border-primary border-solid bg-transparent border rounded-md text-primary">
                            +
                        </button>
                    </form>
                </div>

                <div class="font-hk">
                    €{{ ($cartItem->unit_price * $cartItem->qty) / 100 }}
                </div>
            </div>
        </div>
    @endforeach

</div>

<div class="flex flex-col sm:flex-row sm:justify-between sm:items-center pt-8 sm:pt-12">
    <a href="/shop"
        class="bg-transparent border border-primary border-solid text-primary hover:bg-primary-light font-hk font-semibold transition-colors text-sm hover:text-white px-5 md:px-8 py-4 md:py-5 rounded uppercase focus:outline-none inline-block tracking-wide mt-5 sm:mt-0">
        Continue Shopping
    </a>
</div>
