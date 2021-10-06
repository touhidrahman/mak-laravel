<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::where('status', '=', 'CREATED')->with(['user'])->paginate(20);
        return view('admin.orders.index', [
            'orders' => $orders
        ]);
    }

    public function manage(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $orderItems = OrderItem::where('order_id', '=', $id)->with(['product', 'stock', 'color'])->get();
        return view('admin.orders.manage', [
            'order' => $order,
            'orderItems' => $orderItems,
        ]);
    }
}
