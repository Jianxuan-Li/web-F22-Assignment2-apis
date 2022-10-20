<?php
include_once("../config.php");
// intake all the traffic, and route to the right controller
include_once("../lib/Route.php");

// route class to handle routing
$route = new Route();

// register the routes
$route->register("/^\/api\/v1\/product\/?$/", "ProductController", "findAll");
$route->register("/^\/api\/v1\/product\/([0-9]+)\/?$/", "ProductController", "findById");
$route->register("/^\/api\/v1\/product\/?$/", "ProductController", "insertProduct", "post");
$route->register("/^\/api\/v1\/product\/([0-9]+)\/?$/", "ProductController", "updateProduct", "patch");
$route->register("/^\/api\/v1\/product\/([0-9]+)\/?$/", "ProductController", "deleteProduct", "delete");

// home page
$route->register("/\/?$/", "IndexController", "index");

$route->dispatch();