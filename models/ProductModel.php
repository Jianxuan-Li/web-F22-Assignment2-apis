<?php
include_once(getenv('ROOT_DIR') . "/lib/BaseModel.php");

// The product model class
class ProductModel extends BaseModel{
    // get all products
    public function getAllProducts() {
        $sql = "SELECT * FROM products";
        $stmt = self::$instance->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // find a product by id
    public function findProductById($id) {
        $sql = "SELECT * FROM products WHERE id=:id";
        $stmt = self::$instance->prepare($sql);
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // insert a product
    public function insertProduct($data) {
        return $this->insert('products', $data);
    }

    // update a product
    public function updateProduct($id, $data) {
        return $this->update('products', $data, "id=$id");
    }

    // delete a product
    public function deleteProduct($id) {
        return $this->deleteById('products', $id);
    }
}