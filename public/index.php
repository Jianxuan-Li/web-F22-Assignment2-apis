<?php
include_once("../config.php");
// intake all the traffic, and route to the right controller
include_once("../lib/Route.php");

// route class to handle routing
$route = new Route();

// register the routes
$route->register("/^\/api\/v1\/products\/?$/", "ProductsController", "findAll");
$route->register("/^\/api\/v1\/products\/([0-9]+)\/?$/", "ProductsController", "findById");

$route->dispatch();