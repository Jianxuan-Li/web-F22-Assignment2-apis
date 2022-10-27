<?php
include_once(getenv('ROOT_DIR') . "/lib/BaseModel.php");

class OrderModel  extends BaseModel
{

    // get all orders
    public function findAll()
    {
        $sql = "SELECT * FROM orders";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $orders;
    }


    //get all orders from user
    public function getAllOrdersFromUserID($id)
    {
        $sql = "SELECT * FROM orders WHERE user_id=:id";
        $stmt = self::$instance->prepare($sql);
        $stmt->execute(array(':id' => $id));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //get all orders by bill number
    public function getOrderByBillNumber($bill_no)
    {
        $sql = "SELECT * FROM orders WHERE bill_no=:bill_no";
        $stmt = self::$instance->prepare($sql);
        $stmt->execute(array(':bill_no' => $bill_no));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //insert an order from list of products
    public function insertOrder($data)
    {
        //get random int for order number
        $bill_no = rand(100, 999999);
        //default status is pending
        $status =   0; //'pending'
        //loop through the products and insert them into the order
        foreach ($data as $product) {
            $order = array(
                'user_id' => $product['user_id'],
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
                'bill_no' => $bill_no,
                'status' => $status
            );
            try {
                $this->insert('orders', $order);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        return $bill_no;
    }
}
