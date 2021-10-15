<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use Illuminate\Http\Request;

class ChargeController extends Controller
{
    public function index(Request $request)
    {
        $charge = Charge::find(1);
        return view('admin.charges.index', [
            'charge' => $charge,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'amount' => ['required', 'integer', 'min:0'],
            'min_order_amount' => ['nullable', 'integer', 'min:0'],
        ]);

        toast('Saved', 'success');
        Charge::insert($data);
        return back();
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'amount' => ['required', 'integer', 'min:0'],
            'min_order_amount' => ['nullable', 'integer', 'min:0'],
        ]);

        $charge = Charge::find($id);
        $charge->update($data);
        toast('Saved', 'success');
        return back();
    }
}
