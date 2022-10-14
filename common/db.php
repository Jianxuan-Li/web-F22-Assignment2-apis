<?php
// plz note: just change config in the config file, don't change this file
include_once(getenv('ROOT_DIR') . "/config.php");
// ref: https://www.php.net/manual/en/pdo.connections.php

// Singleton for connection object
/*
 Example of use:
    $db = DB::getInstance();
    $db->query("SELECT * FROM users");
    $db->bind(":id", 1);
    $rows = $db->resultset();
    print_r($rows);
*/
class DB {
    // the pdo instance of database
    protected static $instance;

    private function __construct() {
        try {
            // try to create pdo object
            self::$instance = new PDO(getDSN(), getDBParam('db_username'), getDBParam('db_password'), array(
                PDO::ATTR_PERSISTENT => getDBParam('db_pconnect'),
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ));
        } catch (PDOException $e) {
            // use error page if connection failed
            $error = $e->getMessage();
            include("common/error.php");
            die();
        }
    }

    // return connection instance
    public static function getInstance() {
        if (!self::$instance) {
            new DB();
        }

        return self::$instance;
    }
}
