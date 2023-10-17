<?php
use Dotenv\Dotenv;
require 'vendor/autoload.php';
require './common/Route.php';
use Trinhduc\AssignPhp2\Controllers\Product\commentProduct;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (isset($_GET['url'])){
    $url = $_GET['url'];
} else $url ='main';

$route = new \common\Route();
$route->addRoute('add',[commentProduct::class,'addComment']);



$handler = $route->getRoute($url);
call_user_func($handler);