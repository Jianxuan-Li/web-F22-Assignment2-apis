<?php
include_once(getenv('ROOT_DIR') . "/lib/BaseController.php");

// the index controller class
class IndexController extends BaseController{
    // get the index page
    public function get() {
        echo "/products for all products";
    }
}