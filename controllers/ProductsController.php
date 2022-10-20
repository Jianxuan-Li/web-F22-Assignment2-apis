<?php
include_once(getenv('ROOT_DIR') . "/models/ProductModel.php");
include_once(getenv('ROOT_DIR') . "/lib/BaseController.php");

// The product controller class
class ProductsController extends BaseController{

    // list of all products
    // detail of action function params check lib/Route.php
    public function findAll($url_matchs, $request_method, $options) {
        $productModel = new ProductModel();
        $products = $productModel->getAllProducts();
        $this->returnJson($products);
    }

    // find a product by id
    public function findById($url_matchs) {
        // get id from url match
        $id = $url_matchs[1];
        $productModel = new ProductModel();
        $product = $productModel->findProductById($id);
        $this->returnJson($product);
    }

    // insert a product
    public function insertProduct($url_matchs, $params, $data) {
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