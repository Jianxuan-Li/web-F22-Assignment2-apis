<?php
include_once(getenv('ROOT_DIR') . "/lib/BaseModel.php");

// The comment of product model class
class CommentModel extends BaseModel
{
    // define table name
    protected $table = "comments";

    // get all comments
    public function getAllComments()
    {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = self::$instance->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // get all comments by product id
    public function getCommentsByProductId($productId)
    {
        $sql = "SELECT * FROM {$this->table} WHERE product_id = :product_id";
        $stmt = self::$instance->prepare($sql);
        $stmt->execute(array(':product_id' => $productId));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // insert a comment
    public function insertComment($data)
    {
        return $this->insert($this->table, $data);
    }

    // update a comment
    public function updateComment($id, $data)
    {
        return $this->update($this->table, $data, "id=$id");
    }

    // delete a comment
    public function deleteComment($id)
    {
        return $this->deleteById($this->table, $id);
    }
}