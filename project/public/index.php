<?php

use Src\Http\Request;
use Src\Http\Response;
use Src\Http\Route;
use Config\Database;
session_start();

require_once '../routes/web.php';




$route = new Route(new Request , new Response);
// var_dump($route->request->path());
// var_dump($route->request->Methode());
// exit;
$route->resolve(); 

