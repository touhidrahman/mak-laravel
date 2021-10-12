<?php

namespace App\Http\Livewire\Auth;

use App\Models\Cart;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Login extends Component
{
    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];

    public function authenticate()
    {
        $this->validate();

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->addError('email', trans('auth.failed'));

            return;
        }

        $user = Auth::user();
        $role = $user->role;

        // check for old cart item
        $cart = Cart::where('user_id', '=', $user->id)->whereNull('checked_out_at')->latest()->first();
        if ($cart) {
            Session::put('cart_id', $cart->id);
            Session::put('cart_items_count', $cart->cartItems()->sum('qty'));
        }

        return 'ADMIN' == strtoupper($role)
            ? redirect()->intended(route('admin'))
            : redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
