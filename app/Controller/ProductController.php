<?php

namespace app\Controller;

include "app/Traits/ApiResponseFormatter.php";
include "app/Models/Product.php";

use app\Models\Product;
use app\Traits\ApiResponseFormatter;

class ProductController
{
    //menggunakan trait
    use ApiResponseFormatter;

    public function index()
    {
        //object model product yang sudah di buat
        $productModel = new Product();
        //memanggil fungsi get all product
        $response = $productModel->findAll();
        //mengembalikan respon dengan memformat terlebih dahulu
        return $this->apiResponse(200, "success", $response);
    }
    public function getById($id)
    {
        $productModel = new Product();
        $response = $productModel->findById($id);
        return $this->apiResponse(200, "success", $response);
    }
    public function insert()
    {
        //mendapatkan input json
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);
        //validasi input
        if (json_last_error()) {
            return $this->apiResponse(400, "error invalid input", null);
        }
        //jika input benar
        $productModel = new Product();
        $response = $productModel->create(["product_name" => $inputData['product_name']]);
        return $this->apiResponse(200, "success", $response);
    }
    public function update($id)
    {
        //mendapatkan input json
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);
        //validasi input
        if (json_last_error()) {
            return $this->apiResponse(400, "error invalid input", null);
        }
        //jika input benar
        $productModel = new Product();
        $response = $productModel->update(["product_name" => $inputData['product_name']], $id);
        return $this->apiResponse(200, "success", $response);
    }
    public function delete($id)
    {
        $productModel = new Product();
        $response = $productModel->destroy($id);
        return $this->apiResponse(200, "success", $response);
    }
}
