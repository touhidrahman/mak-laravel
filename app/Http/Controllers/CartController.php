<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cart()
    {
        $cart = Cart::where('user_id', '=', Auth::user()->id)->whereNull('checked_out_at')->latest()->first();
        return view('checkout.cart', [
            'cart' => $cart,
        ]);
    }

    public function addToCart(Request $request)
    {
        // validate
        $data = $request->validate([
            'product_id' => 'required',
            'color_id' => 'required',
            'size' => 'required',
            'qty' => 'required|integer|min:1|max:20',
            'unit_price' => 'integer',
        ]);

        // get user
        $user = Auth::user();
        // check cart exists in session
        $cart = Cart::findOrFail($request->session()->get('cart_id'));
        if (!$cart) {
            $cart = Cart::create(['user_id' => $user->id, 'checked_out_at' => null]);
            // add to session
            $request->session()->put('cart_id', $cart->id);
        }

        // check if cart item exists, then increase qty
        $existingCartItem = $cart->cartItems()
            ->where('product_id', '=', $data['product_id'])
            ->where('color_id', '=', $data['color_id'])
            ->where('size', '=', $data['size'])
            ->first();

        if ($existingCartItem) {
            $existingCartItem->increment('qty', $data['qty']);
        } else {
            // otherwise add cart item
            $cart->cartItems()->create($data);
        }

        alert('Added to cart', 'Test', 'success');
        return back();
    }
}
