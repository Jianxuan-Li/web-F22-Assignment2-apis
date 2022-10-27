<?php
include_once(getenv('ROOT_DIR') . "/models/OrderModel.php");
include_once(getenv('ROOT_DIR') . "/lib/BaseController.php");
class OrderController extends BaseController
{

    // get all orders
    public function findAll()
    {
        $orderModel = new OrderModel();
        $orders = $orderModel->findAll();
        $this->returnJson($orders);
    }


    // find all orders of user by user id
    public function findById($url_matchs)
    {
        // get id from url match
        $id = $url_matchs[1];
        $OrderModel = new OrderModel();
        $cart = $OrderModel->getAllOrdersFromUserID($id);
        $this->returnJson($cart);
    }


    //insert an order
    public function insertOrder($url_matchs, $params, $data)
    {
        // parse json from post body
        try {
            $orderData = json_decode($data['body'], true);
            $orderModel = new OrderModel();
            $order = $orderModel->insertOrder($orderData);
            $this->returnJson($order);
        } catch (Exception $e) {
            echo $e->getMessage();
            $this->returnJson(array("error" => $e->getMessage()));
        }
    }

    //update an order
    public function updateOrder($url_matchs, $params, $data)
    {
        // // parse json from post body
        // try {
        //     // patch data
        //     $orderData = json_decode($data['body'], true);
        //     // get id from url match
        //     $id = $url_matchs[1];

        //     $orderModel = new OrderModel();
        //     $order = $orderModel->updateOrder($id, $orderData);
        //     $this->returnJson($order);
        // } catch (Exception $e) {
        //     $this->returnJson(array("error" => $e->getMessage()));
        // }
    }
}
