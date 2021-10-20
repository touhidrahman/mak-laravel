<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Charge;
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
        // check shipping address filled
        $data = $request->validate([
            'name' => 'required',
            'street' => 'required',
            'house_no' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'country' => 'required',
            'phone' => '',
            'state' => '',
        ]);

        $user = Auth::user();
        $user->update($data);
        // move cart to unpaid order
        $cart = Cart::findOrFail($request->session()->get('cart_id'));

        // create an empty order
        $order = $user->orders()->create([]);

        $toSaveOrderItems = [];
        $stripeLineItems = [];
        $subtotalByItem = [];
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

                $price = $cartItem['unit_price'] * $cartItem['qty'];
                array_push($subtotalByItem, $price);

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
        // update order and order items
        $order->orderItems()->insert($toSaveOrderItems);
        $subTotal = array_sum($subtotalByItem);
        $chargeRecord = Charge::latest()->first();
        $shippingCost = $subTotal >= $chargeRecord?->min_order_amount ? 0 : $chargeRecord->amount;
        $order->update(['price' => $subTotal, 'shipping_cost' => $shippingCost]);

        // save order id to session
        $request->session()->put('order_id', $order->id);

        // make stripe checkout config, add shipping rate if applicable
        $stripeCheckoutConfig = [
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel'),
            'payment_method_types' => ['card', 'sepa_debit', 'sofort', 'giropay'],
            'client_reference_id' => $order->id
        ];
        if ($shippingCost > 0) {
            $stripeCheckoutConfig['shipping_rates'] = [$chargeRecord->name]; // charge->name is stripe charge id
        }

        // redirect to payment form
        return $request->user()->checkout($stripeLineItems, $stripeCheckoutConfig);
    }

    public function checkoutSuccess(Request $request)
    {
        $stripeCheckoutSessionId = $request->get('session_id');
        $order = Order::findOrFail($request->session()->get('order_id')); // TODO check if request/session exists when returning from stripe checkout
        $order->update(['stripe_checkout_session_id' => $stripeCheckoutSessionId]);

        try {
            $cart = Cart::find($request->session()->get('cart_id'))->update(['checked_out_at' => now()]);
            CartItem::where('cart_id', '=', $cart->id)->delete();
        } catch (\Throwable $th) {

        }

        // clear session cart
        $request->session()->remove('cart_id');
        $request->session()->remove('order_id');
        $request->session()->remove('cart_items_count');

        alert('Payment Complete', 'Thank you for your order', 'success');
        return redirect()->route('home');
    }

    public function checkoutCancel(Request $request)
    {
        alert('Payment Failed!', 'Your order was not successful. Please try again.', 'error');
        return redirect()->route('cart');
    }
}
