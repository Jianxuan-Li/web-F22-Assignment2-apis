<?php
include_once(getenv('ROOT_DIR') . "/lib/BaseController.php");

// the index controller class
class IndexController extends BaseController
{
    // get the index page
    public function index()
    {
        // variables for the view
        $apis = array(
            "products" => array(
                array(
                    "url" => "/api/v1/product",
                    "method" => "GET",
                    "description" => "List all products"
                ),
                array(
                    "url" => "/api/v1/product/{id}",
                    "method" => "GET",
                    "description" => "Find a product by id"
                ),
                array(
                    "url" => "/api/v1/product",
                    "method" => "POST",
                    "description" => "Insert a product"
                ),
                array(
                    "url" => "/api/v1/product/{id}",
                    "method" => "PATCH",
                    "description" => "Update a product"
                ),
                array(
                    "url" => "/api/v1/product/{id}",
                    "method" => "DELETE",
                    "description" => "Delete a product"
                )
            )
        );

        // load the index page
        $this->loadView("index", $apis);
    }
}
