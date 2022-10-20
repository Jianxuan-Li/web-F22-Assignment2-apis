<?php
include_once("../config.php");

// route class to handle routing
class Route{
    private $routes = array();

    // constructor
    public function __construct(){
        $this->handleRequest();
    }

    public function handleRequest(){
        // get the request uri
        $this->request_uri = $_SERVER['REQUEST_URI'];

        // get the request method
        $this->request_method = strtolower($_SERVER['REQUEST_METHOD']);

        // get the request body
        $this->request_body = file_get_contents('php://input');

        // get the request params
        $this->request_params = $_REQUEST;

        // get the request headers
        $this->request_headers = getallheaders();

        // get the request ip
        $this->request_ip = $_SERVER['REMOTE_ADDR'];

        // get the request time
        $this->request_time = $_SERVER['REQUEST_TIME'];

        // get the request time float
        $this->request_time_float = $_SERVER['REQUEST_TIME_FLOAT'];
    }

    // register a regex route
    public function register($url_regex, $controller_name, $method_name, $request_method = "get", $options = array()){
        $this->routes[] = array(
            "url_regex" => $url_regex,
            "controller_name" => $controller_name,
            "method_name" => $method_name,
            "request_method" => $request_method,
            "options" => $options
        );
    }

    // get the request uri
    public function getRequestUri(){
        return $this->request_uri;
    }

    // analyze the request uri and route to the right controller
    public function dispatch(){
        // loop through the routes
        foreach ($this->routes as $route){
            // check if the route matches the request uri
            if (!preg_match($route['url_regex'], $this->request_uri, $matches)){
                continue;
            }

            // check if the request method matches
            if ($route['request_method'] != $this->request_method){
                continue;
            }

            // get the controller name
            $controller_name = $route['controller_name'];

            // get the method name
            $method_name = $route['method_name'];

            // check if the controller exists
            if (file_exists("../controllers/" . $controller_name . ".php")){
                // include the controller
                include_once("../controllers/" . $controller_name . ".php");

                // check if the controller class exists
                if (class_exists($controller_name)){
                    // create the controller object
                    $controller = new $controller_name();

                    // check if the controller has the method
                    if (method_exists($controller, $method_name)){
                        // call the controller method
                        $controller->$method_name($matches, $this->request_method, array(
                            "params" => $this->request_params,
                            "body" => $this->request_body,
                            "headers" => $this->request_headers,
                            "ip" => $this->request_ip,
                            "time" => $this->request_time,
                            "time_float" => $this->request_time_float
                        ));
                        return;
                    } else {
                        // return 405 method not allowed
                        http_response_code(405);
                    }
                } else {
                    // return 500 internal server error
                    http_response_code(500);
                }
            } else {
                // return 404 not found
                http_response_code(404);
            }
        }
    }
}