<form action="{{ route('checkout') }}" method="POST"
    class="block w-full">
    @csrf

    <div class="bg-grey-light py-8 px-8">

        @include('shop.cart._cart-info')
        @include('shop.cart._shipping-address-form')
        @include('shop.cart._coupon-form')

        <button type="submit"
            class="bg-primary w-full hover:bg-primary-light font-hk font-semibold transition-colors text-sm text-white px-5 md:px-8 py-4 md:py-5 rounded uppercase focus:outline-none inline-block tracking-wide">
            Proceed to checkout
        </button>
    </div>
</form>
