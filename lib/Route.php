<?php
// route class to handle routing
class Route{
    // the request uri
    private $request_uri;
    // the request method
    private $request_method;
    // the request body
    private $request_body;
    // the request params
    private $request_params;
    // the request headers
    private $request_headers;

    // constructor
    public function __construct($request_uri, $request_method, $request_body, $request_params, $request_headers){
        $this->request_uri = $request_uri;
        $this->request_method = $request_method;
        $this->request_body = $request_body;
        $this->request_params = $request_params;
        $this->request_headers = $request_headers;
    }

    // get the request uri
    public function getRequestUri(){
        return $this->request_uri;
    }

    // analyze the request uri and route to the right controller
    public function getController(){
        // use regex to match the controller and id in uri
        $regex = "";
    }
}