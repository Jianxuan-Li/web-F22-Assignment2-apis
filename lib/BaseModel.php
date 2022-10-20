<?php
include_once(getenv('ROOT_DIR') . "/lib/db.php");
// The base model class
class BaseModel{
    // the pdo instance of database
    public static $instance;

    public function __construct() {
        self::$instance = DB::getInstance();
    }

    // insert a row into table and return the last insert id
    public function insert($table, $data) {
        $fields = array_keys($data);
        $values = array_values($data);
        $sql = "INSERT INTO $table (" . implode(',', $fields) . ") VALUES (:" . implode(',:', $fields) . ")";
        $stmt = self::$instance->prepare($sql);
        $stmt->execute($data);
        return self::$instance->lastInsertId();
    }

    // update a row in table
    public function update($table, $data, $where) {
        $fields = array_keys($data);
        $values = array_values($data);
        $sql = "UPDATE $table SET ";
        foreach ($fields as $field) {
            $sql .= "$field=:$field,";
        }
        $sql = rtrim($sql, ',');
        $sql .= " WHERE $where";
        $stmt = self::$instance->prepare($sql);
        $stmt->execute($data);
    }

    // delete by id
    public function deleteById($table, $id) {
        $sql = "DELETE FROM $table WHERE id=:id";
        $stmt = self::$instance->prepare($sql);
        $stmt->execute(array(':id' => $id));
    }

    // delete a row in table
    public function delete($table, $where) {
        $sql = "DELETE FROM $table WHERE $where";
        $stmt = self::$instance->prepare($sql);
        $stmt->execute();
    }

    // select a row in table
    public function select($table, $where) {
        $sql = "SELECT * FROM $table WHERE $where";
        $stmt = self::$instance->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}