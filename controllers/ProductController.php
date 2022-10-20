<?php
include_once(getenv('ROOT_DIR') . "/models/ProductModel.php");
include_once(getenv('ROOT_DIR') . "/lib/BaseController.php");

// The product controller class
class ProductController extends BaseController
{

    // list of all products
    // detail of action function params check lib/Route.php
    public function findAll($url_matchs, $request_method, $options)
    {
        $productModel = new ProductModel();
        $products = $productModel->getAllProducts();
        $this->returnJson($products);
    }

    // find a product by id
    public function findById($url_matchs)
    {
        // get id from url match
        $id = $url_matchs[1];
        $productModel = new ProductModel();
        $product = $productModel->findProductById($id);
        $this->returnJson($product);
    }

    // insert a product
    public function insertProduct($url_matchs, $params, $data)
    {
        // parse json from post body
        try {
            $productData = json_decode($data['body'], true);
            $productModel = new ProductModel();
            $product = $productModel->insertProduct($productData);
            $this->returnJson($product);
        } catch (Exception $e) {
            $this->returnJson(array("error" => $e->getMessage()));
        }
    }

    // update a product
    public function updateProduct($url_matchs, $params, $data)
    {
        // parse json from post body
        try {
            // patch data
            $productData = json_decode($data['body'], true);
            // get id from url match
            $id = $url_matchs[1];

            $productModel = new ProductModel();
            $product = $productModel->updateProduct($id, $productData);
            $this->returnJson($product);
        } catch (Exception $e) {
            $this->returnJson(array("error" => $e->getMessage()));
        }
    }

    // delete a product
    public function deleteProduct($url_matchs)
    {
        try {
            // get id from url match
            $id = $url_matchs[1];
            $productModel = new ProductModel();
            $productModel->deleteProduct($id);
            $this->returnJson(array("deleted" => $id));
        } catch (Exception $e) {
            $this->returnJson(array("error" => $e->getMessage()));
        }
    }
}
