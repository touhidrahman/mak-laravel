<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Stock;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ProductImagesController extends Controller
{
    public function thumbnails(Request $request, $id)
    {
        return view('admin.products.thumbnails', [
            'product' => Product::find($id),
        ]);
    }

    public function uploadThumbnails(Request $request, Product $product)
    {
        $data = $request->validate([
            'thumb_1' => 'mimes:jpg,png,jpeg|max:2048',
            'thumb_2' => 'mimes:jpg,png,jpeg|max:2048',
        ]);

        $toSave = [];
        foreach(['thumb_1', 'thumb_2'] as $key) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $url = $this->doUpload($file, $request->id);
                $toSave[$key] = $url;
            }
        }

        if (count($toSave) > 0) {
            $product->update($toSave);
            return back();
        }

        return back();
    }

    public function images(Request $request, $id)
    {
        $product = Product::find($id);
        $availableColorIds = Stock::select('color_id')->where('product_id', $id)->distinct()->get();
        $availableColors = Color::whereIn('id', $availableColorIds)->get();

        return view('admin.products.images', [
            'product' => $product,
            'availableColors' => $availableColors,
            'images' => ProductImage::where('product_id', $id)->get(),
        ]);
    }

    public function uploadImages(Request $request)
    {
        $images = $request->file('images');
        if ($images && count($images) > 0) {
            $i = 0;
            foreach($images as $image) {
                ProductImage::insert([
                    'product_id' => $request->id,
                    'path' => $this->doUpload($image, $request->id),
                    'serial' => $i,
                    'color_id' => $request->input('color_id') ?? null,
                ]);
                $i++;
            }
        }

        return back();
    }

    public function deleteImage(Request $request, $productId, $imageId)
    {
        $image = ProductImage::find($imageId);
        Storage::disk('s3')->delete($image->path);
        $image->delete();

        return back();
    }

    private function doUpload($file, $productId)
    {
        $newName =  $productId . '/' . hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
        $filepath = $file->storeAs('catalog_images', $newName, 's3');
        Storage::disk('s3')->setVisibility($filepath, 'public');
        return Storage::disk('s3')->url($filepath);
    }
}
