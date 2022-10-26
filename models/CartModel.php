<!-- for cart -->
<?php
include_once(getenv('ROOT_DIR') . "/lib/BaseModel.php");

// The product model class
class CartModel extends BaseModel
{
    // get all item in cart
    public function findAll()
    {
        $sql = "SELECT * FROM cart";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    // get item in cart by id
    public function findById($id)
    {
        $sql = "SELECT * FROM cart WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // insert item in cart
    public function insertCart($data)
    {
        $sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":user_id", $data['user_id']);
        $stmt->bindParam(":product_id", $data['product_id']);
        $stmt->bindParam(":quantity", $data['quantity']);
        $stmt->execute();
        $result = $this->findById($this->db->lastInsertId());
        return $result;
    }

    // update item in cart
    public function updateCart($id, $data)
    {
        $sql = "UPDATE cart SET user_id = :user_id, product_id = :product_id, quantity = :quantity WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":user_id", $data['user_id']);
        $stmt->bindParam(":product_id", $data['product_id']);
        $stmt->bindParam(":quantity", $data['quantity']);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $this->findById($id);
        return $result;
    }

    // delete item in cart
    public function deleteCart($id)
    {
        $sql = "DELETE FROM cart WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $this->findById($id);
        return $result;
    }
}
