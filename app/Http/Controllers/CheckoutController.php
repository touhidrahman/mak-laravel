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
    public function cart()
    {
        return view('checkout.cart');
    }

    public function confirm(Request $request)
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

    public function checkout()
    {
        $order = Order::with(['product'])
            ->where('user_id', auth()->id())
            ->whereNull('paid_at')
            ->latest()
            ->firstOrFail();

        $paymentIntent = auth()->user()->createSetupIntent();

        return view('checkout.checkout', [
            'paymentIntent' => $paymentIntent,
            'order' => $order,
        ]);
    }

    public function pay(Request $request)
    {
        $user = auth()->user();
        $order = Order::where('user_id', $user)->findOrFail($request->input('order_id'));
        $paymentMethod = $request->input('payment_method');

        try {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($paymentMethod);
            $user->charge($order->price, $paymentMethod);

            $order->update(['paid_at' => now()]);
        } catch (\Exception $ex) {
            alert('Payment could not be processed!', 'Please try again', 'error');
            return back();
        }

        alert('Thank you!', 'Your order is placed', 'success');
        return redirect()->route('checkout.success');

        // $stripeCharge = $request->user()->charge(
        //     100,
        //     $request->paymentMethodId
        // );
    }


    // old
    public function goToStripe(Request $request)
    {
        return $request->user()->checkout(['price_tshirt' => 1], [
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
}
