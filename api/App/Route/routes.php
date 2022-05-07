<?php

// include '../Controller.php';
use App\Controller\Controller;
use App\Route\Router;

Router::addRoute('/summary', Controller::class, 'summary');
Router::addRoute('/details', Controller::class, 'details');