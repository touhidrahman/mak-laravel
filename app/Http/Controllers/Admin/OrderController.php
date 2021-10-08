<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $selectedStatus = $request->input('status', 'CREATED');
        $orders = Order::where('status', '=', $selectedStatus)->with(['user'])->latest('created_at')->paginate(20);
        return view('admin.orders.index', [
            'orders' => $orders
        ]);
    }

    public function manage(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $orderItems = OrderItem::where('order_id', '=', $id)->with(['product', 'stock'])->orderBy('id', 'ASC')->get();
        return view('admin.orders.manage', [
            'order' => $order,
            'orderItems' => $orderItems,
        ]);
    }

    public function pick(Request $request, $id, $orderItemId)
    {
        $orderItem = OrderItem::where('order_id', '=', $id)
            ->where('id', '=', $orderItemId)
            ->with(['product', 'stock'])
            ->first();

        $orderItem->stock()->increment('qty', 0 - $orderItem->qty);
        $orderItem->increment('picked_qty', $orderItem->qty);

        toast('Item marked as picked, inventory adjusted', 'success');
        return back();
    }

    public function changeStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $toUpdate = [
            'status' => $request->input('status'),
        ];
        if ($request->input('shipping_carrier')) {
            $toUpdate['shipping_carrier'] = $request->input('shipping_carrier');
        }
        if ($request->input('shipping_tracking')) {
            $toUpdate['shipping_tracking'] = $request->input('shipping_tracking');
        }
        if ($request->input('status') == 'DISPATCHED') {
            $toUpdate['dispatched_at'] = Carbon::now();
        }
        $order->update($toUpdate);

        toast('Status updated', 'success');
        return back();
    }
}
