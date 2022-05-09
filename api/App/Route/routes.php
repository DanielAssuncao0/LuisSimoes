<?php

// include '../Controller.php';
use App\Controller\Controller;
use App\Route\Router;

Router::addRoute('/', Controller::class, 'summary');
Router::addRoute('/summary', Controller::class, 'summary');
Router::addRoute('/details', Controller::class, 'details');
// Router::addRoute('/restore', Controller::class, 'restore');