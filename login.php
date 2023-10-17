<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[url('./public/IMG/background.jpg')]">
<div class="container w-[30%] h-[500px] m-auto ">


<?php
use Dotenv\Dotenv;
require 'vendor/autoload.php';
require './common/Route.php';
use Trinhduc\AssignPhp2\Product\product;
use Trinhduc\AssignPhp2\Users\users;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (isset($_GET['url'])){
    $url = $_GET['url'];
} else $url ='main';

$route = new \common\Route();
$route->addRoute('dn',[users::class,'showLogin']);
$route->addRoute('login',[users::class,'login']);
$route->addRoute('dx',[users::class,'logout']);
$route->addRoute('edit',[users::class,'showEdit']);
$route->addRoute('update',[users::class,'update']);
$route->addRoute('dk',[users::class,'showRegister']);
$route->addRoute('register',[users::class,'register']);
$route->addRoute('qmk',[users::class,'showForgot']);
$route->addRoute('forget',[users::class,'forGet']);
$handler = $route->getRoute($url);
call_user_func($handler);
?>


</div>
</body>
</html>
