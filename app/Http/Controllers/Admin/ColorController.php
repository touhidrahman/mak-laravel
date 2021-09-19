<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ColorController extends Controller
{
    public function index()
    {
        return view('admin.colors.index', [
            'colors' => Color::all(),
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'name'=> 'required',
            'hex' => 'required|max:6',
        ]);

        Color::create($data);
        toast('Color saved', 'success');

        return redirect()->route('admin.colors');
    }

    public function destroy(Color $color)
    {
        $color->delete();
        toast('Color deleted', 'success');
        return redirect()->route('admin.colors');
    }
}
