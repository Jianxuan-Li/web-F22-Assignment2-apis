<?php
// the base controller class, return the JSON data
class BaseController{
    // return the JSON data
    public function returnJson($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}