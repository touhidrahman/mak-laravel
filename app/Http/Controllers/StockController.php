<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required',
            'size' => 'required|string',
            'color_id' => 'required',
            'qty' => 'required|integer',
            'sku' => '',
        ]);

        Stock::insert($data);

        toast('Stock created', 'success');
        return back();
    }
}
