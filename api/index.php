<?php

include 'Autoload.php';
include 'App/Route/Router.php';
use App\Route\Router;

$params = $_POST;
// $token = $_POST['token'];

// if(!JWT::authenticated($token))
//     return Response::json("User not authenticated");

Router::execute();
