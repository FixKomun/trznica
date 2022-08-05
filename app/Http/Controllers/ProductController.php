<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Http\Requests\ProductRequest;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function uploadProduct(ProductRequest $request)
    {
        $request->validated();

        $productDetails = $request->all([
            'name',
            'price',
            'category_id',
            'description',
            'image',
            'user_id',
        ]);

        return response()->json([
            'data' => $this->productRepository->uploadProduct($productDetails)
        ]);
    }
    public function getCategory()
    {
        return response()->json($this->productRepository->getCategory());
    }
    public function getProduct()
    {
        return $this->productRepository->getProduct();
    }

    public function uploadImage(ImageRequest $request)
    {
        $request->validated();
        $fileDetails = $request->all([
            'file'
        ]);
        return response()->json($this->productRepository->uploadImage($fileDetails));
    }

    public function deleteImage(Request $request)
    {
        $imageName = $request->imageName;
        return response()->json($this->productRepository->deleteImage($imageName));
    }

    public function editProduct(ProductRequest $request)
    {
        $request->validated();
        $id = $request->id;
        $productDetails = $request->all([
            'name',
            'price',
            'category_id',
            'description',
            'image',
            'user_id'
        ]);
        return response()->json([
            'data' => $this->productRepository->editProduct($productDetails, $id)
        ]);
    }
    public function getProductSingle(Request $request)
    {
        $id = $request->id;
        return response()->json($this->productRepository->getProductSingle($id));
    }

    public function userProducts(Request $request)
    {
        $id = $request->id;
        return response()->json($this->productRepository->getUserProducts($id));
    }
}
