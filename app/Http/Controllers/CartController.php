<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Charge;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public $VAT_PERCENT = 19;

    public function cart(Request $request)
    {
        $cart = Cart::find($request->session()->get('cart_id'));
        if (!$cart) {
            toast('Cart is empty!', 'info');
            return back();
        }
        $chargeRecord = Charge::latest()->first();

        $shippingChargeCent = $cart->total >= $chargeRecord?->min_order_amount
            ? 0
            : $chargeRecord->amount;
        $cartTotalCent = $cart->total;
        $vatAmountCent = $cartTotalCent * $this->VAT_PERCENT / 100;
        $cartTotalWithoutVatCent = $cartTotalCent - $vatAmountCent;
        $grandTotalCent = $cartTotalCent + $shippingChargeCent;

        return view('shop.cart.index', [
            'cart' => $cart,
            'cartTotal' => $this->centToFormatted($cartTotalCent),
            'grandTotal' => $this->centToFormatted($grandTotalCent),
            'vatAmount' => $this->centToFormatted($vatAmountCent),
            'cartTotalWithoutVat' => $this->centToFormatted($cartTotalWithoutVatCent),
            'shippingCharge' => $this->centToFormatted($shippingChargeCent),
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

        // check size color combination exists
        $stock = Stock::where('product_id', '=', $data['product_id'])
            ->where('color_id', '=', $data['color_id'])
            ->where('size', '=', $data['size'])
            ->first();
        if (!$stock || $stock->qty < $data['qty']) {
            alert('Out of stock!', 'Unfortunately the selected size & color is no longer available. Please try a different combination.', 'error');
            return back();
        }

        // check cart exists in session
        $cart = Cart::find($request->session()->get('cart_id'));
        if (!$cart) {
            $cart = Cart::create(['user_id' => Auth::user()?->id, 'checked_out_at' => null]);
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

        toast('Added to cart', 'success', 'bottom-right');
        $request->session()->put('cart_items_count', $cart->cartItems()->sum('qty'));

        return back();
    }

    public function deleteFromCart(Request $request, $id, $cartItemId)
    {
        $cartItem = CartItem::where('cart_id', '=', $id)->where('id', '=', $cartItemId)->first();
        $cartItem->delete();
        $cart = Cart::findOrFail($id);
        $request->session()->put('cart_items_count', $cart->cartItems()->sum('qty'));

        return back();
    }

    public function reduceQty(Request $request, $id, $cartItemId)
    {
        $cartItem = CartItem::where('cart_id', '=', $id)->where('id', '=', $cartItemId)->first();
        if ($cartItem->qty > 1) {
            $cartItem->increment('qty', -1);
            $cart = Cart::findOrFail($id);
            $request->session()->put('cart_items_count', $cart->cartItems()->sum('qty'));
        }
        return back();
    }

    public function increaseQty(Request $request, $id, $cartItemId)
    {
        CartItem::where('cart_id', '=', $id)->where('id', '=', $cartItemId)->first()->increment('qty', 1);
        $cart = Cart::findOrFail($id);
        $request->session()->put('cart_items_count', $cart->cartItems()->sum('qty'));
        return back();
    }

    public function changeQty(Request $request, $id)
    {
        // TODO
        return back();
    }

    public function centToFormatted(int $cent)
    {
        return number_format($cent / 100, 2, ',', '.');
    }

}
