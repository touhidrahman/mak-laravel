<h4 class="font-hkbold text-secondary text-2xl pb-3 text-center sm:text-left">Cart Totals</h4>

<div class="mb-12 pt-4">
    <div class="border-grey-darker pb-1 flex justify-between">
        <span class="font-hk text-secondary">Base Price</span>
        <span class="font-hk text-secondary">€{{ $cartTotalWithoutVat }}</span>
    </div>
    <div class="border-grey-darker pt-2 pb-1 flex justify-between">
        <span class="font-hk text-secondary">VAT 19%</span>
        <span class="font-hk text-secondary">+ €{{ $vatAmount }}</span>
    </div>
    <div class="border-b border-grey-darker pt-2 pb-1 flex justify-between">
        <span class="font-hk text-secondary">Subtotal</span>
        <span class="font-hk text-secondary">€{{ $cartTotal }}</span>
    </div>
    <div class="border-b border-grey-darker pt-2 pb-1 flex justify-between">
        <span class="font-hk text-secondary">Shipping</span>
        <span class="font-hk text-secondary">+ €{{ $shippingCharge }}</span>
    </div>
    <div class="pt-3 flex justify-between">
        <span class="font-hkbold text-secondary">Total</span>
        <span class="font-hkbold text-secondary font-bold">€{{ $grandTotal }}</span>
    </div>
</div>
