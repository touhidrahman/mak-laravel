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

    public function otherImages(Request $request, $id)
    {
        return view('admin.products.upload', [
            'product' => Product::find($id),
            'images' => ProductImage::where('product_id', $id)->get(),
        ]);
    }

    public function uploadOtherImages(Request $request)
    {

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
