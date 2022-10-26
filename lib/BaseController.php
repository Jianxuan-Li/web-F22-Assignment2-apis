<?php
// the base controller class, return the JSON data
class BaseController{
    // return the JSON data
    public function returnJson($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    // return 404 error
    public function return404($msg = "404 Not Found") {
        header('HTTP/1.1 404 Not Found');
        header('Content-Type: application/json');
        echo json_encode(array("error" => $msg));
    }
    

    // load view by php html file
    public function loadView($viewName, $data = array()) {
        // extract the data
        extract($data);
        // load the view
        include_once(getenv('ROOT_DIR') . "/views/" . $viewName . ".php");
    }
}