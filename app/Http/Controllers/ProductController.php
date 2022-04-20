<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class ProductController extends Controller
{
    public function uploadProduct(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:70',
            'price' => 'required|numeric|max:10000',
            'category_id' => 'required',
            'description' => 'required|max:500',
            'image' => 'required',
            'user_id' => 'required'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $request->image,
            'user_id' => $request->user_id
        ]);

        return $product;
    }
    public function getCategory()
    {
        $categories = Category::all();
        return $categories;
    }
    public function getProduct()
    {
        $products = Product::with('user')->get();
        return $products;
    }

    public function uploadImage(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:jpg,png,jpeg'
        ]);

        $imageName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('uploads'), $imageName);
        return $imageName;
    }

    public function deleteImage(Request $request)
    {
        if (!$request->close)
            return;
        $imageName = $request->imageName;
        $imagePath = public_path() . $imageName;
        if (file_exists($imagePath)) {
            @unlink($imagePath);
            return 'file found and deleted';
        }
        return 'deleted';
    }

    public function getProductSingle(Request $request)
    {
        return Product::with('user')->where('id', $request->id)->get();
    }

    public function editProduct(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:70',
            'price' => 'required|numeric|max:10000',
            'category_id' => 'required',
            'description' => 'required|max:450',
            'image' => 'required',
            'user_id' => 'required'
        ]);

        $product = Product::where('id', $request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $request->image,
            'user_id' => $request->user_id
        ]);

        return $product;
    }
    public function userProducts(Request $request)
    {
        return Product::where('user_id', $request->id)->with('user')->get();
    }
}
