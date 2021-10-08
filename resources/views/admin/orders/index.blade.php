@extends('layouts.admin')

@section('content')

    <h1 class="text-3xl font-bold">Orders</h1>

    @include('admin.orders._toolbar')

    <section class="mt-10">

        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Shipping Address</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>

                            <td>
                                {{
                                    $order->user->zipcode . ' ' . $order->user->city . ', ' . $order->user->country
                                }}
                            </td>

                            <td>
                                {{ $order->priceFormatted }}
                            </td>

                            <td>
                                @if ($order->status == 'CREATED')
                                <span class="bg-green-100 text-green-600 rounded-full px-3 py-1 text-xs">{{ $order->status }}</span>
                                @else
                                <span class="bg-red-100 text-red-600 rounded-full px-3 py-1 text-xs">{{ $order->status }}</span>
                                @endif
                            </td>

                            <td>
                                {{ $order->created_at }}
                            </td>

                            <th>
                                <a href="{{ route('admin.orders.manage', $order->id) }}"
                                    class="btn btn-ghost btn-xs">manage</a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $orders->links() }}
        </div>

    </section>

@endsection
