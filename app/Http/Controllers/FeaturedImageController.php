<?php

namespace App\Http\Controllers;

use App\Models\FeaturedImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FeaturedImageController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.featured-images.index', [
            'featuredImages' => FeaturedImage::all(),
        ]);
    }

    public function show(Request $request)
    {
        return view('admin.featured-images.show');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'image' => 'mimes:jpg,png,jpeg|max:2048',
            'title' => 'required|max:120',
            'title_color' => 'required',
            'page_path' => 'required',
            'button_label' => 'required|string|max:40',
        ]);


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $url = $this->doUpload($file);
            $data['image_url'] = $url;
            unset($data['image']);

            FeaturedImage::create($data);

            alert('Image uploaded', 'Featured image uploaded and set properly', 'success');
            return redirect()->route('admin.featured-images');
        }

        toast('Uploading images failed', 'error');
        return back();
    }

    public function destroy($id)
    {
        try {
            $item = FeaturedImage::findOrfail($id);
            $this->deleteFile($item->image_url);
            $item->delete();
            toast('Deleted', 'success');
        } catch (\Throwable $th) {
            toast('Error deleting', 'error');
        }
        return back();
    }

    private function doUpload($file)
    {
        $newName =  time() . '.' . $file->getClientOriginalExtension();
        $filepath = $file->storeAs('featured_images', $newName, 's3');
        Storage::disk('s3')->setVisibility($filepath, 'public');
        return $filepath;
    }

    private function deleteFile($filepath)
    {
        Storage::disk('s3')->delete($filepath);
    }
}
