<div class="bg-grey-light py-8 px-5 md:px-8">
    <h1 class="font-hkbold text-secondary text-2xl pb-6 text-center sm:text-left">Order List</h1>

    <div class="hidden sm:block">
        <div class="flex justify-between pb-3">
            <div class="w-1/3 md:w-2/5 pl-4">
                <span class="font-hkbold text-secondary text-sm uppercase">Order</span>
            </div>
            <div class="w-1/4 xl:w-1/5 text-center">
                <span class="font-hkbold text-secondary text-sm uppercase">Items</span>
            </div>
            <div class="w-1/6 md:w-1/5 text-center mr-3">
                <span class="font-hkbold text-secondary text-sm uppercase">Price</span>
            </div>
            <div class="w-3/10 md:w-1/5 text-center">
                <span class="font-hkbold text-secondary text-sm uppercase pr-8 md:pr-16 xl:pr-8">Status</span>
            </div>
        </div>
    </div>

    @foreach ($orders as $order)
    <a href="{{ route('account.orders.show', $order->id) }}" class="bg-white shadow px-4 py-5 sm:py-4 rounded mb-3 flex flex-col sm:flex-row justify-between items-center">

        <div class="w-full sm:w-1/3 md:w-2/5 flex flex-col md:flex-row md:items-center border-b sm:border-b-0 border-grey-dark pb-4 sm:pb-0 text-center sm:text-left">
            <span class="font-hkbold text-secondary text-sm uppercase text-center pb-2 block sm:hidden">
                Order
            </span>
            <span  class="font-hk text-secondary text-base mt-2">Order ID {{ $order->id }}</span>
        </div>

        <div class="w-full sm:w-1/5 text-center border-b sm:border-b-0 border-grey-dark pb-4 sm:pb-0">
            <span class="font-hkbold text-secondary text-sm uppercase text-center pt-3 pb-2 block sm:hidden">Items</span>
            <span class="font-hk text-secondary">{{ $order->orderItems()->count() }}</span>
        </div>

        <div class="w-full sm:w-1/6 xl:w-1/5 text-center sm:text-right sm:pr-6 xl:pr-16 border-b sm:border-b-0 border-grey-dark pb-4 sm:pb-0">
            <span class="font-hkbold text-secondary text-sm uppercase text-center pt-3 pb-2 block sm:hidden">Price</span>
            <span class="font-hk text-secondary">{{ $order->price_formatted }}</span>
        </div>

        <div class="w-full sm:w-3/10 md:w-1/4 xl:w-1/5 text-center sm:text-right">
            <div class="pt-3 sm:pt-0">
                <p class="font-hkbold text-secondary text-sm uppercase text-center pb-2 block sm:hidden">Status</p>
                <span class="bg-primary-lightest border border-primary-light px-4 py-3 inline-block rounded font-hk text-primary">
                    {{ $order->status }}
                </span>
            </div>
        </div>

    </a>
    @endforeach

    <div class="pt-6 -mx-6">
        {{ $orders->links() }}
    </div>
</div>
