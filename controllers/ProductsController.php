<?php
include_once(getenv('ROOT_DIR') . "/models/ProductModel.php");
include_once(getenv('ROOT_DIR') . "/lib/BaseController.php");

// The product controller class
class ProductsController extends BaseController{

    // list of all products
    public function get() {
        $productModel = new ProductModel();
        $products = $productModel->getAllProducts();
        $this->returnJson($products);
    }

    // find a product by id
    public function findProductById($id) {
        $productModel = new ProductModel();
        return $productModel->findProductById($id);
    }

    // insert a product
    public function insertProduct($data) {
        $productModel = new ProductModel();
        return $productModel->insertProduct($data);
    }

    // update a product
    public function updateProduct($data, $where) {
        $productModel = new ProductModel();
        $productModel->updateProduct($data, $where);
    }

    // delete a product
    public function deleteProduct($where) {
        $productModel = new ProductModel();
        $productModel->deleteProduct($where);
    }
}