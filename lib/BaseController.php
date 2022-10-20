<?php
// the base controller class, return the JSON data
class BaseController{
    // return the JSON data
    public function returnJson($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    // load view by php html file
    public function loadView($viewName, $data = array()) {
        // extract the data
        extract($data);
        // load the view
        include_once(getenv('ROOT_DIR') . "/views/" . $viewName . ".php");
    }
}