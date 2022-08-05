<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use App\Models\Category;

class ProductRepository implements ProductRepositoryInterface
{
    public function uploadProduct(array $productDetails)
    {
        return Product::create($productDetails);
    }
    public function getCategory()
    {
        return Category::all();
    }
    public function getProduct()
    {
        return Product::with('user')->get();
    }
    public function uploadImage($fileDetails)
    {

        $imageName = time() . '.' . $fileDetails['file']->extension();
        $fileDetails['file']->move(public_path('uploads'), $imageName);
        return $imageName;
    }
    public function deleteImage($imageName)
    {
        $imagePath = public_path() . $imageName;
        if (file_exists($imagePath)) {
            @unlink($imagePath);
        }
        return 'image deleted';
    }
    public function editProduct($productDetails, $id)
    {
        return Product::where('id', $id)->update($productDetails);
    }
    public function getProductSingle($id)
    {
        return Product::with('user')->where('id', $id)->get();
    }
    public function getUserProducts($id)
    {
        return Product::where('user_id', $id)->with('user')->get();
    }
}
