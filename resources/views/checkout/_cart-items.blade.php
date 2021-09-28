<form action="{{ route('checkout') }}" method="POST"
    class="flex flex-col-reverse lg:flex-row justify-between pb-16 sm:pb-20 lg:pb-24">
    @csrf

    <input type="hidden" name="cart_id" value="{{$cart->id}}">

    <div class="lg:w-3/5">
        <div class="pt-10">
            <h1 class="font-hkbold text-secondary text-2xl pb-3 text-center sm:text-left">Cart Items</h1>

            <div class="pt-8">
                <div class="hidden sm:block">
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
                </div>

                @foreach ($cart->cartItems as $cartItem)
                    <div
                        class="py-3 border-b border-grey-dark flex-row justify-between items-center mb-0 hidden md:flex">
                        <i class="bx bx-x text-grey-darkest text-2xl sm:text-3xl mr-6 cursor-pointer"></i>
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
                            </div>
                        </div>
                        <div class="w-full sm:w-1/5 xl:w-1/4 text-center border-b-0 border-grey-dark pb-0">
                            <div class="mx-auto mr-8 xl:mr-4">
                                <div class="flex justify-center"
                                    x-data="{ productQuantity: parseInt('{{ $cartItem->qty }}', 10) }">
                                    <input type="number" id="quantity-form-desktop"
                                        class="form-input form-quantity rounded-r-none w-16 py-0 px-2 text-center"
                                        x-model="productQuantity" min="1" />
                                    <div class="flex flex-col">
                                        <span
                                            class="px-1 bg-white border border-l-0 border-grey-darker flex-1 rounded-tr cursor-pointer"
                                            @click="productQuantity++"><i
                                                class="bx bxs-up-arrow text-xs text-primary pointer-events-none"></i></span>
                                        <span
                                            class="px-1 bg-white flex-1 border border-t-0 border-l-0 rounded-br border-grey-darker cursor-pointer"
                                            @click="productQuantity > 1 ? productQuantity-- : productQuanity = 1"><i
                                                class="bx bxs-down-arrow text-xs text-primary pointer-events-none"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-1/4 lg:w-1/5 xl:w-1/4 text-right pr-10 xl:pr-10 pb-4">
                            <span class="font-hk text-secondary">
                                {{ $cartItem->unit_price * $cartItem->qty }}
                            </span>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center pt-8 sm:pt-12">
            <a href="/shop" class="btn btn-outline">Continue Shopping</a>
            <a href="/" class="btn btn-primary mt-5 sm:mt-0">Update Cart
            </a>
        </div>
    </div>

    {{-- cart info --}}
    <div class="sm:w-2/3 md:w-full lg:w-1/3 mx-auto lg:mx-0 mt-16 lg:mt-0">
        <div class="bg-grey-light py-8 px-8">

            <h4 class="font-hkbold text-secondary text-2xl pb-3 text-center sm:text-left">Shipping Address</h4>

            <div class="pt-4 md:pt-5 pb-10">
                <div class="flex justify-between w-full">
                    <input type="text" placeholder="First Name" class="form-input mb-4 w-1/2 sm:mb-5 mr-2"
                        id="first_name" />
                    <input type="text" placeholder="Last Name" class="form-input mb-4  w-1/2 sm:mb-5 ml-1"
                        id="last_name" />
                </div>

                <input type="text" placeholder="Your address" class="form-input w-full mb-4 sm:mb-5" id="address" />

                <input type="text" placeholder="Apartment, Suite, etc (optional)" class="form-input w-full mb-4 sm:mb-5"
                    id="address2" />
                <div class="flex justify-between w-full">
                    <input type="text" placeholder="Post code" class="form-input w-1/2 mb-4 sm:mb-5 mr-2"
                        id="post_code" />
                    <input type="text" placeholder="City" class="form-input w-1/2 mb-4 sm:mb-5 ml-1" id="city" />
                </div>
                <input type="text" placeholder="Country" class="form-input w-full mb-4 sm:mb-5" id="country" />
            </div>

            <h4 class="font-hkbold text-secondary text-2xl pb-3 text-center sm:text-left">Cart Totals</h4>

            {{-- Coupon --}}
            {{-- <div class="pt-4">
                <p class="font-hkbold text-secondary pt-1 pb-4">Add Coupon</p>
                <div class="flex justify-between">
                    <label for="discount_code" class="block relative h-0 w-0 overflow-hidden">Discount Code</label>
                    <input type="text" placeholder="Discount code" class="w-3/5 xl:w-2/3 form-input"
                        id="discount_code" />
                    <button class="w-2/5 xl:w-1/3 ml-4 lg:ml-2 xl:ml-4 btn btn-outline btn-sm"
                        aria-label="Apply button">Apply</button>
                </div>
            </div> --}}

            <div class="mb-12 pt-4">
                <div class="border-b border-grey-darker pb-1 flex justify-between">
                    <span class="font-hk text-secondary">Subtotal</span>
                    <span class="font-hk text-secondary">$236</span>
                </div>
                <div class="border-b border-grey-darker pt-2 pb-1 flex justify-between">
                    <span class="font-hk text-secondary">VAT</span>
                    <span class="font-hk text-secondary">19%</span>
                </div>
                <div class="pt-3 flex justify-between">
                    <span class="font-hkbold text-secondary">Total</span>
                    <span class="font-hkbold text-secondary">$200</span>
                </div>
            </div>

            <button type="submit"
                class="bg-primary w-full hover:bg-primary-light font-hk font-semibold transition-colors text-sm text-white px-5 md:px-8 py-4 md:py-5 rounded uppercase focus:outline-none inline-block tracking-wide">
                Proceed to checkout
            </button>
        </div>
    </div>
</form>
