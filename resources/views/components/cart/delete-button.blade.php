@props(['cart', 'cartItem'])

<form action="{{ route('cart.items.delete', ['id' => $cart->id, 'cartItemId' => $cartItem->id]) }}"
    method="POST" class="inline-block">
    @csrf
    <button type="submit" class="bg-transparent">
        <i class="bx bx-x text-grey-darkest text-2xl sm:text-3xl md:mr-6 mr-2 cursor-pointer"></i>
    </button>
</form>
