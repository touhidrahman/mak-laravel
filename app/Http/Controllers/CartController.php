<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // validate
        $data = $request->validate([
            'product_id' => 'required',
            'stock_id' => 'required',
        ]);
        $user = Auth::user();
        // create an order if not exists
        $order = $request->input('order_id')
            ? Order::findOrFail($request->input('order_id'))
            : Order::create(['user_id' => $user ? $user->id : null, 'price' => 0 ]);

        // add cart item
        $order->orderItems()->create([...$data]);
        // calculate total
        $order->increment('price', Product::findOrFail($request->input('product_id')));
        // add to session
        $request->session()->put('cart', $order);
    }
}
