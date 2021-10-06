@extends('layouts.admin')

@section('content')

    <h1 class="text-3xl font-bold">Orders</h1>


    <section class="mt-10">

        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Shipping Address</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>

                            <td>
                                {{
                                    $order->user->street . ' ' . $order->user->house_no . ', ' .
                                    $order->user->zipcode . ' ' . $order->user->city . ', ' . $order->user->country
                                }}
                            </td>

                            <td>
                                @if ($order->status == 'CREATED')
                                <span class="bg-green-100 text-green-600 rounded-full px-3 py-1 text-xs">{{ $order->status }}</span>
                                @else
                                <span class="bg-red-100 text-red-600 rounded-full px-3 py-1 text-xs">{{ $order->status }}</span>
                                @endif
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
