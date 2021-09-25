<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function show()
    {
        return view('checkout.show');
    }

    public function pay(Request $request)
    {
        $stripeCharge = $request->user()->charge(
            100, $request->paymentMethodId
        );
    }
}
