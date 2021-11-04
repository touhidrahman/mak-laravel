<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ColorController extends Controller
{
    public function index()
    {
        return view('admin.color.index', [
            'colors' => Color::orderBy('name', 'ASC')->get(),
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'name'=> 'required',
            'hex' => 'required|max:7',
        ]);

        Color::create($data);
        toast('Color saved', 'success');

        return redirect()->route('admin.color');
    }

    public function destroy(Color $color)
    {
        $color->delete();
        toast('Color deleted', 'success');
        return redirect()->route('admin.color');
    }
}
