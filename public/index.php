<?php
include_once("../config.php");
// intake all the traffic, and route to the right controller

// get the request uri
$request_uri = $_SERVER['REQUEST_URI'];

// get the request method
$request_method = strtolower($_SERVER['REQUEST_METHOD']);

// get the request body
$request_body = file_get_contents('php://input');

// get the request params
$request_params = $_REQUEST;

// get the request headers
$request_headers = getallheaders();

// get the request ip
$request_ip = $_SERVER['REMOTE_ADDR'];

// get the request time
$request_time = $_SERVER['REQUEST_TIME'];

// get the request time float
$request_time_float = $_SERVER['REQUEST_TIME_FLOAT'];

// transform the request uri to the controller name
if ($request_uri == "/"){
    $controller_name = "IndexController";
} else {
    $controller_name = ucfirst(strtolower(substr($request_uri, 1))) . "Controller";
}

// get the controller file path
$controller_file = getenv('ROOT_DIR') . "/controllers/" . $controller_name . ".php";

// check if the controller file exists
if (file_exists($controller_file)) {
    // include the controller file
    include_once($controller_file);

    // check if the controller class exists
    if (class_exists($controller_name)) {
        // create the controller object
        $controller = new $controller_name();

        // check if the controller has the method
        if (method_exists($controller, $request_method)) {
            // call the controller method
            $controller->$request_method($request_params, $request_body, $request_headers, $request_ip, $request_time, $request_time_float);
        } else {
            // return 405 method not allowed
            http_response_code(405);
        }
    } else {
        // return 404 not found
        http_response_code(404);
    }
} else {
    // return 404 not found
    http_response_code(404);
}