<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.index');
    }

    public function orders()
    {
        $orders = Order::paginate(5); // TODO: only for user
        return view('account.orders', [
            'orders' => $orders,
        ]);
    }
}
