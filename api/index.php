<?php

header('Access-Control-Allow-Origin: *');

include 'Autoload.php';

use App\JWT\JWT;
use App\Http\Response;
use App\Route\Router;

$params = $_POST;
// $token = $_POST['token'];

// Like middleware
$token = '40uifdnaifj19f0aj0a';
if(!JWT::authenticated($token))
    return Response::json("User not authenticated");

Router::execute();
