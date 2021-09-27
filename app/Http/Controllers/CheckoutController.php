<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        // find product
        $product = Product::findOrFail($request->input('product_id'));
        // find/create a user
        $user = User::firstOrCreate([
            'email' => $request->input('email'),
        ], [
            'name' => $request->input('name'),
            'street' => $request->input('street'),
            'password' => Str::random(10),
        ]);

        Auth::attempt(['email' => $user->email, 'password' => $user->password], true);
        // add the order
        $user->orders()->create([
            'product_id' => $product->id,
            'price' => $product->selling_price,
        ]);
        // redirect to payment form

        return redirect()->route('checkout');
    }

    public function goToStripe(Request $request)
    {
        $items = [
            [
                'price_data' => [
                    'currency' => 'eur',
                    'unit_amount' => 199,
                    'product_data' => [
                        'name' => 'T-shirt',
                        'description' => 'SKU: ABC',
                        // 'images' => [''],
                        'metadata' => ['product_id' => 1, 'stock_id' => 1, 'order_id' => 1, 'user_id' => 1]
                    ],
                ],
                'quantity' => 1,
            ]
        ];
        return $request->user()->checkout($items, [
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel'),
        ]);
    }

    public function checkoutSuccess(Request $request)
    {
        $session = Session::retrieve($request->get('session_id'));
        $customer = User::retrieve($session->customer);

        return view('checkout.success', ['customerName' => $customer->name]);
    }

    public function checkoutCancel(Request $request)
    {
        $session = Session::retrieve($request->get('session_id'));
        $customer = User::retrieve($session->customer);

        return view('checkout.cancel', ['customerName' => $customer->name]);
    }
}
