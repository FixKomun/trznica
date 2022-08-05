<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function uploadProduct(array $productDetails);
    public function getCategory();
    public function getProduct();
    public function uploadImage($fileDetails);
    public function deleteImage($imageName);
    public function editProduct(array $productDetails, $id);
    public function getProductSingle($id);
    public function getUserProducts($id);
}
