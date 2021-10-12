<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.index');
    }

    public function orders()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', '=', $user->id)->latest()->paginate(5);
        return view('account.orders', [
            'orders' => $orders,
        ]);
    }

    public function show(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $orderItems = OrderItem::where('order_id', '=', $id)->with(['product', 'stock'])->orderBy('id', 'ASC')->get();
        return view('account.show', [
            'order' => $order,
            'orderItems' => $orderItems,
        ]);
    }
}
