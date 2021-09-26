<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Stock;
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
            'selected_color_id' => 'required',
            'selected_size' => 'required',
        ]);

        // choose correct stock
        $stock = Stock::where('size', '=', $data['selected_size'])
            ->where('color_id', '=', $data['selected_color_id'])
            ->where('product_id', '=', $data['product_id'])
            ->first();

        // get user
        $user = Auth::user();
        // create an order if not exists
        $order = $request->input('order_id')
            ? Order::findOrFail($request->input('order_id'))
            : Order::create(['user_id' => $user ? $user->id : null, 'price' => 0 ]);

        // add cart item
        $order->orderItems()->create([
            'product_id' => $data['product_id'],
            'stock_id' => $stock->id,
        ]);
        // calculate total
        $order->increment('price', Product::findOrFail($request->input('product_id'))->selling_price);
        // add to session
        $request->session()->put('cart', $order);
    }
}
