<?php

namespace App\Http\Controllers;

use App\Models\Color;
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
            'qty' => 'required|integer|min:0',
            'sku' => 'unique:stocks,sku',
        ]);

        try {
            Stock::insert($data);
            toast('Stock created', 'success');
        } catch (\Illuminate\Database\QueryException $th) {
            alert('Combination already exists', '', 'error');
        }

        return back();
    }

    public function edit($product_id, $id)
    {
        return view('admin.stocks.edit', [
            'stock' => Stock::find($id),
            'colors' => Color::orderBy('name', 'ASC')->get(),
            'sizes' => ['XS', 'S', 'M', 'L', 'XL', 'XXL'],
        ]);
    }

    public function update(Request $request, $product_id)
    {
        $data = $request->validate([
            'size' => 'required|string',
            'color_id' => 'required',
            'qty' => 'required|integer|min:0',
        ]);

        try {
            Stock::find($request->id)->update($data);
        } catch (\Illuminate\Database\QueryException $th) {
            alert('Combination already exists', '', 'error');
        }

        return redirect()->route('admin.products.manage', $product_id);
    }
}
