<?php
include_once(getenv('ROOT_DIR') . "/lib/BaseModel.php");

// The product model class
class CartModel extends BaseModel
{
    // get all item in cart
    public function findAll()
    {
        $sql = "SELECT * FROM cart";
        $stmt = self::$instance->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    // get items in cart by user id
    public function findById($id)
    {
        $sql = "SELECT * FROM cart WHERE user_id = :id";
        $stmt = self::$instance->prepare($sql);
        $stmt->execute(array(':id' => $id));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // insert item in cart
    public function insertCart($data)
    {
        return $this->insert('cart', $data);
    }

    // update item in cart
    public function updateCart($id, $data)
    {
        return $this->update('cart', $data, "id=$id");
    }

    // delete item in cart
    public function deleteCart($id)
    {
        return $this->deleteById('cart', $id);
    }
}
