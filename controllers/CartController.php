<?php
include_once(getenv('ROOT_DIR') . "/models/CartModel.php");
include_once(getenv('ROOT_DIR') . "/lib/BaseController.php");
class CartController extends BaseController
{
    //list of all cart items for a user
    public function findAll($url_matchs, $request_method, $options)
    {
        $cartModel = new CartModel();
        $cart = $cartModel->findAll();
        $this->returnJson($cart);
    }

    //insert a cart item
    public function insertCart($url_matchs, $params, $data)
    {
        // parse json from post body
        try {
            $cartData = json_decode($data['body'], true);
            $cartModel = new CartModel();
            $cart = $cartModel->insertCart($cartData);
            $this->returnJson($cart);
        } catch (Exception $e) {
            $this->returnJson(array("error" => $e->getMessage()));
        }
    }

    //update a cart item
    public function updateCart($url_matchs, $params, $data)
    {
        // parse json from post body
        try {
            // patch data
            $cartData = json_decode($data['body'], true);
            // get id from url match
            $id = $url_matchs[1];

            $cartModel = new CartModel();
            $cart = $cartModel->updateCart($id, $cartData);
            $this->returnJson($cart);
        } catch (Exception $e) {
            $this->returnJson(array("error" => $e->getMessage()));
        }
    }

    //delete a cart item
    public function deleteCart($url_matchs)
    {
        // get id from url match
        $id = $url_matchs[1];
        $cartModel = new CartModel();
        $cart = $cartModel->deleteCart($id);
        $this->returnJson($cart);
    }
}
