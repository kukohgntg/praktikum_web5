<?php
header("Content-Type: application/json; charset=UTF-8");
include "app/Routes/ProductRoutes.php";

use app\Routes\ProductRoutes;
//menangkap request method
$method = $_SERVER['REQUEST_METHOD'];
//menangkap request path
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//memangil route
$productRoute = new ProductRoutes();
$productRoute->handle($method, $path);
