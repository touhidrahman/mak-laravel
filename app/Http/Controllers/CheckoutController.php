<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $user = Auth::user();
        // move cart to unpaid order
        $cart = Cart::findOrFail($request->session()->get('cart_id'));

        // create an empty order
        $order = $user->orders()->create([]);

        $toSaveOrderItems = [];
        $stripeLineItems = [];
        foreach ($cart->cartItems as $cartItem) {
            $product = Product::findOrFail($cartItem['product_id']);
            $stock = Stock::where('color_id', '=', $cartItem['color_id'])
                ->where('product_id', '=', $product->id)
                ->where('size', '=', $cartItem['size'])->first();

            if ($stock) {
                $orderItem = [
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'stock_id' => $stock->id,
                    'qty' => $cartItem['qty'],
                    'unit_price' => $cartItem['unit_price'],
                ];

                array_push($toSaveOrderItems, $orderItem);

                // make stripe line items
                $item = [
                    'price_data' => [
                        'currency' => 'eur',
                        'unit_amount' => $cartItem['unit_price'],
                        'product_data' => [
                            'name' => $product->name,
                            'description' => 'SKU: ' . $stock->sku,
                            'images' => [$product->thumb_1],
                            'metadata' => [
                                'sku' => $stock->sku,
                                'product_id' => $product->id,
                                'stock_id' => $stock->id,
                                'order_id' => $order->id,
                                'user_id' => $user->id,
                            ]
                        ],
                    ],
                    'quantity' => $cartItem['qty'],
                ];

                array_push($stripeLineItems, $item);
            }
        }
        $order->orderItems()->insert($toSaveOrderItems);
        // save order id to session
        $request->session()->put('order_id', $order->id);

        // redirect to payment form
        return $request->user()->checkout($stripeLineItems, [
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel'),
        ]);
    }

    public function checkoutSuccess(Request $request)
    {
        $stripeCheckoutSessionId = $request->get('session_id');
        $order = Order::findOrFail($request->session()->get('order_id'));
        $order->update(['stripe_checkout_session_id' => $stripeCheckoutSessionId]);

        // clear session cart
        $request->session()->remove('cart_id');
        $request->session()->remove('order_id');
        $request->session()->remove('cart_items_count');

        alert('Payment Complete', 'Thank you for your order', 'success');
        return redirect()->route('home');
    }

    public function checkoutCancel(Request $request)
    {
        $session = Session::retrieve($request->get('session_id'));
        $customer = User::retrieve($session->customer);

        return view('checkout.cancel', ['customerName' => $customer->name]);
    }
}
