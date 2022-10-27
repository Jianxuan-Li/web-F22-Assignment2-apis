<?php
include_once(getenv('ROOT_DIR') . "/lib/BaseModel.php");

// The user model class
class UserModel extends BaseModel{
    // get all users
    public function getAllUsers() {
        $sql = "SELECT * FROM users";
        $stmt = self::$instance->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // find a user by id
    public function findUsersById($id) {
        $sql = "SELECT * FROM users WHERE id=:id";
        $stmt = self::$instance->prepare($sql);
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // insert a users
    public function insertUsers($data) {
        return $this->insert('users', $data);
    }

    // update a users
    public function updateUsers($id, $data) {
        return $this->update('users', $data, "id=$id");
    }

    // delete a users
    public function deleteUsers($id) {
        return $this->deleteById('users', $id);
    }
}